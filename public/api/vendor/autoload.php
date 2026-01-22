<?php
/**
 * Manual autoloader for PHPMailer (when Composer is not available)
 *
 * This file loads PHPMailer classes without Composer.
 * If you install via Composer later, this file will be overwritten.
 */

spl_autoload_register(function ($class) {
    // PHPMailer namespace prefix
    $prefix = 'PHPMailer\\PHPMailer\\';
    $prefixLength = strlen($prefix);

    // Check if the class uses the PHPMailer namespace
    if (strncmp($prefix, $class, $prefixLength) !== 0) {
        return;
    }

    // Get the relative class name
    $relativeClass = substr($class, $prefixLength);

    // Build the file path
    $file = __DIR__ . '/phpmailer/phpmailer/src/' . $relativeClass . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
