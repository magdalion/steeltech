<?php
/**
 * RateLimiter - File-based rate limiting for contact form
 *
 * Limits requests per IP address using file storage.
 * Default: 5 requests per hour per IP.
 */

class RateLimiter
{
    private string $storageDir;
    private int $maxRequests;
    private int $windowSeconds;

    public function __construct(
        string $storageDir,
        int $maxRequests = 5,
        int $windowSeconds = 3600
    ) {
        $this->storageDir = rtrim($storageDir, '/');
        $this->maxRequests = $maxRequests;
        $this->windowSeconds = $windowSeconds;

        // Ensure storage directory exists
        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }
    }

    /**
     * Check if the IP is rate limited
     *
     * @param string $ip Client IP address
     * @return bool True if request is allowed, false if rate limited
     */
    public function isAllowed(string $ip): bool
    {
        $filename = $this->getFilename($ip);
        $data = $this->readData($filename);

        // Clean expired entries
        $now = time();
        $data = array_filter($data, fn($timestamp) => $timestamp > ($now - $this->windowSeconds));

        // Check if under limit
        return count($data) < $this->maxRequests;
    }

    /**
     * Record a request for the given IP
     *
     * @param string $ip Client IP address
     */
    public function recordRequest(string $ip): void
    {
        $filename = $this->getFilename($ip);
        $data = $this->readData($filename);

        // Clean expired entries and add new one
        $now = time();
        $data = array_filter($data, fn($timestamp) => $timestamp > ($now - $this->windowSeconds));
        $data[] = $now;

        $this->writeData($filename, $data);
    }

    /**
     * Get remaining requests for the IP
     *
     * @param string $ip Client IP address
     * @return int Number of remaining requests
     */
    public function getRemainingRequests(string $ip): int
    {
        $filename = $this->getFilename($ip);
        $data = $this->readData($filename);

        // Clean expired entries
        $now = time();
        $data = array_filter($data, fn($timestamp) => $timestamp > ($now - $this->windowSeconds));

        return max(0, $this->maxRequests - count($data));
    }

    /**
     * Get seconds until rate limit resets
     *
     * @param string $ip Client IP address
     * @return int Seconds until reset
     */
    public function getSecondsUntilReset(string $ip): int
    {
        $filename = $this->getFilename($ip);
        $data = $this->readData($filename);

        if (empty($data)) {
            return 0;
        }

        $oldestTimestamp = min($data);
        $resetTime = $oldestTimestamp + $this->windowSeconds;

        return max(0, $resetTime - time());
    }

    /**
     * Clean up expired rate limit files
     */
    public function cleanup(): void
    {
        $files = glob($this->storageDir . '/*.json');
        $now = time();

        foreach ($files as $file) {
            $data = $this->readData($file);
            $data = array_filter($data, fn($timestamp) => $timestamp > ($now - $this->windowSeconds));

            if (empty($data)) {
                unlink($file);
            } else {
                $this->writeData($file, $data);
            }
        }
    }

    private function getFilename(string $ip): string
    {
        // Hash IP for privacy and filesystem safety
        $hash = hash('sha256', $ip);
        return $this->storageDir . '/' . $hash . '.json';
    }

    private function readData(string $filename): array
    {
        if (!file_exists($filename)) {
            return [];
        }

        $content = file_get_contents($filename);
        if ($content === false) {
            return [];
        }

        $data = json_decode($content, true);
        return is_array($data) ? $data : [];
    }

    private function writeData(string $filename, array $data): void
    {
        file_put_contents($filename, json_encode(array_values($data)), LOCK_EX);
    }
}
