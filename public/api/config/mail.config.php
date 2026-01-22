<?php
/**
 * SteelTech Mail Configuration
 *
 * IMPORTANT: Update SMTP_PASSWORD before deploying to production!
 * Get the password from cPanel -> Email Accounts -> dominik.jukic@steeltech.ba
 */

// Prevent direct access
if (!defined('STEELTECH_API')) {
    http_response_code(403);
    die('Direct access forbidden');
}

// SMTP Configuration - Using actual mail server hostname for proper TLS
define('SMTP_HOST', 'server1.webpage.ba');  // Mail server hostname (not localhost - SSL cert requires match)
define('SMTP_PORT', 587);                   // TLS port
define('SMTP_SECURE', 'tls');               // Use STARTTLS
define('SMTP_AUTH', true);                  // Enable authentication
define('SMTP_USERNAME', 'dominik.jukic@steeltech.ba');
define('SMTP_PASSWORD', 'dom222Asteze');  

// Email settings
define('MAIL_FROM_ADDRESS', 'dominik.jukic@steeltech.ba');
define('MAIL_FROM_NAME', 'SteelTech Web');
define('MAIL_TO_ADDRESS', 'dominik.jukic@steeltech.ba');
define('MAIL_TO_NAME', 'SteelTech');

// Rate limiting
define('RATE_LIMIT_MAX_REQUESTS', 5);       // Max requests per window
define('RATE_LIMIT_WINDOW_SECONDS', 3600);  // 1 hour window

// CSRF token settings
define('CSRF_TOKEN_EXPIRY_SECONDS', 3600);  // 1 hour
