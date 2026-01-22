<?php
/**
 * CsrfToken - Cross-Site Request Forgery protection
 *
 * Generates and validates unique tokens for form submissions.
 * Tokens expire after 1 hour and can only be used once.
 */

class CsrfToken
{
    private string $storageDir;
    private int $expirySeconds;

    public function __construct(string $storageDir, int $expirySeconds = 3600)
    {
        $this->storageDir = rtrim($storageDir, '/');
        $this->expirySeconds = $expirySeconds;

        // Ensure storage directory exists
        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }
    }

    /**
     * Generate a new CSRF token
     *
     * @return string The generated token
     */
    public function generate(): string
    {
        $token = bin2hex(random_bytes(32));
        $filename = $this->getFilename($token);

        $data = [
            'created' => time(),
            'expires' => time() + $this->expirySeconds,
            'used' => false
        ];

        file_put_contents($filename, json_encode($data), LOCK_EX);

        return $token;
    }

    /**
     * Validate a CSRF token
     *
     * @param string $token The token to validate
     * @return bool True if valid, false otherwise
     */
    public function validate(string $token): bool
    {
        // Basic format validation (64 hex chars)
        if (!preg_match('/^[a-f0-9]{64}$/', $token)) {
            return false;
        }

        $filename = $this->getFilename($token);

        if (!file_exists($filename)) {
            return false;
        }

        $content = file_get_contents($filename);
        if ($content === false) {
            return false;
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            return false;
        }

        // Check if expired
        if (!isset($data['expires']) || $data['expires'] < time()) {
            unlink($filename);
            return false;
        }

        // Check if already used
        if (!empty($data['used'])) {
            unlink($filename);
            return false;
        }

        return true;
    }

    /**
     * Consume a CSRF token (mark as used and delete)
     *
     * @param string $token The token to consume
     */
    public function consume(string $token): void
    {
        $filename = $this->getFilename($token);

        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    /**
     * Clean up expired tokens
     */
    public function cleanup(): void
    {
        $files = glob($this->storageDir . '/*.json');
        $now = time();

        foreach ($files as $file) {
            $content = file_get_contents($file);
            if ($content === false) {
                continue;
            }

            $data = json_decode($content, true);
            if (!is_array($data) || !isset($data['expires']) || $data['expires'] < $now) {
                unlink($file);
            }
        }
    }

    private function getFilename(string $token): string
    {
        // Hash token for filesystem safety
        $hash = hash('sha256', $token);
        return $this->storageDir . '/' . $hash . '.json';
    }
}
