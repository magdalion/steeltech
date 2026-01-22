<?php
/**
 * CSRF Token Generator Endpoint
 *
 * GET /api/csrf-token.php
 * Returns a fresh CSRF token for form submission.
 */

// Define constant to allow config file access
define('STEELTECH_API', true);

// Set headers
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Load config
require_once __DIR__ . '/config/mail.config.php';
require_once __DIR__ . '/includes/CsrfToken.php';

try {
    // Initialize CSRF token manager
    $storageDir = __DIR__ . '/storage/csrf_tokens';
    $csrfManager = new CsrfToken($storageDir, CSRF_TOKEN_EXPIRY_SECONDS);

    // Generate new token
    $token = $csrfManager->generate();

    // Return token
    echo json_encode([
        'csrf_token' => $token,
        'expires_in' => CSRF_TOKEN_EXPIRY_SECONDS
    ]);

} catch (Exception $e) {
    error_log('CSRF Token Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Failed to generate token']);
}
