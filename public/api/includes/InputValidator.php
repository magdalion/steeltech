<?php
/**
 * InputValidator - Input sanitization and validation
 *
 * Validates and sanitizes form inputs to prevent XSS and injection attacks.
 */

class InputValidator
{
    private array $errors = [];

    /**
     * Validate all contact form fields
     *
     * @param array $data Form data
     * @return bool True if valid, false otherwise
     */
    public function validateContactForm(array $data): bool
    {
        $this->errors = [];

        // Required: name
        if (empty($data['name'])) {
            $this->errors['name'] = 'Name is required';
        } elseif (strlen($data['name']) > 100) {
            $this->errors['name'] = 'Name must be 100 characters or less';
        }

        // Required: email
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        } elseif (strlen($data['email']) > 254) {
            $this->errors['email'] = 'Email must be 254 characters or less';
        }

        // Optional: phone (validate format if provided)
        if (!empty($data['phone'])) {
            // Allow digits, spaces, plus, dashes, parentheses
            $cleanPhone = preg_replace('/[\s\-\(\)]+/', '', $data['phone']);
            if (!preg_match('/^\+?[0-9]{6,20}$/', $cleanPhone)) {
                $this->errors['phone'] = 'Invalid phone number format';
            }
        }

        // Optional: subject (validate if provided)
        $validSubjects = [
            '', // empty is allowed
            'celicne-konstrukcije',
            'zavarivanje',
            'lasersko-rezanje',
            'antikorozivna-zastita',
            'transport',
            'ostalo'
        ];
        if (isset($data['subject']) && !in_array($data['subject'], $validSubjects)) {
            $this->errors['subject'] = 'Invalid subject selected';
        }

        // Required: message
        if (empty($data['message'])) {
            $this->errors['message'] = 'Message is required';
        } elseif (strlen($data['message']) < 10) {
            $this->errors['message'] = 'Message must be at least 10 characters';
        } elseif (strlen($data['message']) > 5000) {
            $this->errors['message'] = 'Message must be 5000 characters or less';
        }

        return empty($this->errors);
    }

    /**
     * Get validation errors
     *
     * @return array Validation errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Sanitize a string for display
     *
     * @param string $input Input string
     * @return string Sanitized string
     */
    public function sanitizeString(string $input): string
    {
        // Trim whitespace
        $input = trim($input);

        // Remove null bytes
        $input = str_replace("\0", '', $input);

        // Convert special characters to HTML entities
        return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Sanitize email address
     *
     * @param string $email Email address
     * @return string Sanitized email
     */
    public function sanitizeEmail(string $email): string
    {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Sanitize phone number
     *
     * @param string $phone Phone number
     * @return string Sanitized phone
     */
    public function sanitizePhone(string $phone): string
    {
        // Keep only digits, plus, spaces, dashes, parentheses
        return preg_replace('/[^\d\+\s\-\(\)]/', '', trim($phone));
    }

    /**
     * Prepare sanitized form data
     *
     * @param array $data Raw form data
     * @return array Sanitized data
     */
    public function sanitizeFormData(array $data): array
    {
        return [
            'name' => $this->sanitizeString($data['name'] ?? ''),
            'email' => $this->sanitizeEmail($data['email'] ?? ''),
            'phone' => $this->sanitizePhone($data['phone'] ?? ''),
            'subject' => $this->sanitizeString($data['subject'] ?? ''),
            'message' => $this->sanitizeString($data['message'] ?? ''),
            'lang' => in_array($data['lang'] ?? 'hr', ['hr', 'en']) ? $data['lang'] : 'hr'
        ];
    }

    /**
     * Check if honeypot field is filled (indicates bot)
     *
     * @param string|null $honeypot Honeypot field value
     * @return bool True if bot detected
     */
    public function isBot(?string $honeypot): bool
    {
        return !empty($honeypot);
    }

    /**
     * Get human-readable subject name
     *
     * @param string $subject Subject key
     * @param string $lang Language code
     * @return string Human-readable subject
     */
    public function getSubjectLabel(string $subject, string $lang = 'hr'): string
    {
        $subjects = [
            'hr' => [
                'celicne-konstrukcije' => 'Čelične konstrukcije',
                'zavarivanje' => 'Tehnologija zavarivanja i montaže',
                'lasersko-rezanje' => 'Lasersko rezanje',
                'antikorozivna-zastita' => 'Antikorozivna zaštita',
                'transport' => 'Usluge transporta',
                'ostalo' => 'Ostalo'
            ],
            'en' => [
                'celicne-konstrukcije' => 'Steel Structures',
                'zavarivanje' => 'Welding & Assembly Technology',
                'lasersko-rezanje' => 'Laser Cutting',
                'antikorozivna-zastita' => 'Anti-Corrosion Protection',
                'transport' => 'Transport Services',
                'ostalo' => 'Other'
            ]
        ];

        return $subjects[$lang][$subject] ?? ($lang === 'hr' ? 'Opći upit' : 'General Inquiry');
    }
}
