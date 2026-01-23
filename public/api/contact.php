<?php
/**
 * Contact Form Handler
 *
 * POST /api/contact.php
 * Receives contact form data and sends email via PHPMailer.
 *
 * Required fields: name, email, message, csrf_token
 * Optional fields: phone, subject, lang
 */

// Define constant to allow config file access
define('STEELTECH_API', true);

// Set headers
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'method_not_allowed']);
    exit;
}

// Load dependencies
require_once __DIR__ . '/config/mail.config.php';
require_once __DIR__ . '/includes/RateLimiter.php';
require_once __DIR__ . '/includes/CsrfToken.php';
require_once __DIR__ . '/includes/InputValidator.php';

// Try to load Composer autoloader for PHPMailer
$autoloaderPath = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloaderPath)) {
    require_once $autoloaderPath;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Send JSON response
 */
function sendResponse(bool $success, string $errorCode = '', int $httpCode = 200): void
{
    http_response_code($httpCode);
    echo json_encode([
        'success' => $success,
        'error' => $errorCode ?: null
    ]);
    exit;
}

/**
 * Get client IP address
 */
function getClientIP(): string
{
    $headers = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'REMOTE_ADDR'];

    foreach ($headers as $header) {
        if (!empty($_SERVER[$header])) {
            $ip = $_SERVER[$header];
            // Handle comma-separated IPs (X-Forwarded-For)
            if (strpos($ip, ',') !== false) {
                $ip = trim(explode(',', $ip)[0]);
            }
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }

    return '0.0.0.0';
}

try {
    // Get JSON input
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);

    if (!is_array($input)) {
        sendResponse(false, 'invalid_request', 400);
    }

    // Initialize classes
    $rateLimiter = new RateLimiter(
        __DIR__ . '/storage/rate_limits',
        RATE_LIMIT_MAX_REQUESTS,
        RATE_LIMIT_WINDOW_SECONDS
    );
    $csrfManager = new CsrfToken(__DIR__ . '/storage/csrf_tokens', CSRF_TOKEN_EXPIRY_SECONDS);
    $validator = new InputValidator();

    // Get client IP
    $clientIP = getClientIP();

    // Check rate limit
    if (!$rateLimiter->isAllowed($clientIP)) {
        sendResponse(false, 'rate_limited', 429);
    }

    // Check honeypot (silent fail - don't tell bots they were caught)
    if ($validator->isBot($input['website'] ?? null)) {
        // Silently "succeed" but don't send email
        sendResponse(true);
    }

    // Validate CSRF token
    $csrfToken = $input['csrf_token'] ?? '';
    if (empty($csrfToken) || !$csrfManager->validate($csrfToken)) {
        sendResponse(false, 'invalid_csrf', 403);
    }

    // Consume the CSRF token (one-time use)
    $csrfManager->consume($csrfToken);

    // Sanitize input
    $data = $validator->sanitizeFormData($input);

    // Validate form data
    if (!$validator->validateContactForm($data)) {
        $errors = $validator->getErrors();
        $firstError = array_key_first($errors);
        sendResponse(false, $firstError . '_invalid', 400);
    }

    // Record this request for rate limiting
    $rateLimiter->recordRequest($clientIP);

    // Load email template
    $templateFile = __DIR__ . '/templates/email-' . $data['lang'] . '.html';
    if (!file_exists($templateFile)) {
        $templateFile = __DIR__ . '/templates/email-hr.html';
    }
    $emailTemplate = file_get_contents($templateFile);

    // Replace placeholders in template
    $subjectLabel = $validator->getSubjectLabel($data['subject'], $data['lang']);
    $phoneDisplay = $data['phone'] ?: ($data['lang'] === 'hr' ? 'Nije navedeno' : 'Not provided');

    // Consent confirmation text
    $consentGiven = !empty($input['consent']);
    $consentText = $data['lang'] === 'hr'
        ? ($consentGiven ? '✓ Korisnik je prihvatio uvjete obrade osobnih podataka.' : '✗ Suglasnost nije dana.')
        : ($consentGiven ? '✓ User has accepted the terms of personal data processing.' : '✗ Consent was not given.');

    $emailBody = str_replace(
        ['{{NAME}}', '{{EMAIL}}', '{{PHONE}}', '{{SUBJECT}}', '{{MESSAGE}}', '{{DATE}}', '{{IP}}', '{{CONSENT}}'],
        [
            $data['name'],
            $data['email'],
            $phoneDisplay,
            $subjectLabel,
            nl2br($data['message']),
            date('d.m.Y H:i:s'),
            $clientIP,
            $consentText
        ],
        $emailTemplate
    );

    // Email subject line
    $emailSubjectLine = $data['lang'] === 'hr'
        ? 'Novi upit sa web stranice - ' . $subjectLabel
        : 'New website inquiry - ' . $subjectLabel;

    // Check if PHPMailer is available
    if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        error_log('PHPMailer not installed. Run: composer require phpmailer/phpmailer');
        sendResponse(false, 'server_error', 500);
    }

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->SMTPAuth = SMTP_AUTH;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->CharSet = 'UTF-8';

    // Recipients
    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO_ADDRESS, MAIL_TO_NAME);
    $mail->addReplyTo($data['email'], $data['name']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $emailSubjectLine;
    $mail->Body = $emailBody;

    // Plain text alternative
    $plainText = $data['lang'] === 'hr'
        ? "Ime: {$data['name']}\nEmail: {$data['email']}\nTelefon: {$phoneDisplay}\nPredmet: {$subjectLabel}\n\nPoruka:\n{$data['message']}\n\n---\n{$consentText}"
        : "Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$phoneDisplay}\nSubject: {$subjectLabel}\n\nMessage:\n{$data['message']}\n\n---\n{$consentText}";
    $mail->AltBody = $plainText;

    $mail->send();

    sendResponse(true);

} catch (Exception $e) {
    error_log('Contact Form Error: ' . $e->getMessage());
    sendResponse(false, 'server_error', 500);
}
