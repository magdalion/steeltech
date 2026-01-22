<?php
/**
 * Cleanup Cron Job
 *
 * Run via cron to clean up expired rate limit and CSRF token files.
 * Recommended: Daily at 3 AM
 *
 * Cron entry:
 * 0 3 * * * /usr/bin/php /home/[username]/public_html/api/cleanup.php
 */

// Define constant to allow config file access
define('STEELTECH_API', true);

// Only allow CLI execution or authorized web request
$isCLI = php_sapi_name() === 'cli';
if (!$isCLI) {
    http_response_code(403);
    die('CLI access only');
}

require_once __DIR__ . '/config/mail.config.php';
require_once __DIR__ . '/includes/RateLimiter.php';
require_once __DIR__ . '/includes/CsrfToken.php';

echo "SteelTech API Cleanup - " . date('Y-m-d H:i:s') . "\n";

try {
    // Clean up rate limits
    $rateLimiter = new RateLimiter(
        __DIR__ . '/storage/rate_limits',
        RATE_LIMIT_MAX_REQUESTS,
        RATE_LIMIT_WINDOW_SECONDS
    );
    $rateLimiter->cleanup();
    echo "Rate limit files cleaned.\n";

    // Clean up CSRF tokens
    $csrfManager = new CsrfToken(__DIR__ . '/storage/csrf_tokens', CSRF_TOKEN_EXPIRY_SECONDS);
    $csrfManager->cleanup();
    echo "CSRF token files cleaned.\n";

    echo "Cleanup completed successfully.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
