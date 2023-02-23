<?php
class Sanitizer {

/**
 * Sanitize a string by removing tags and special characters
 * @param string $input The string to sanitize
 * @return string The sanitized string
 */
public static function sanitizeString($input) {
    // Strip tags
    $output = strip_tags($input);
    // Remove special characters
    $output = htmlspecialchars($output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    // Trim whitespace
    $output = trim($output);
    // Return the sanitized string
    return $output;
}

/**
 * Sanitize an email address by removing invalid characters
 * @param string $email The email address to sanitize
 * @return string The sanitized email address
 */
public static function sanitizeEmail($email) {
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate email address
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    // Return the sanitized email address
    return $email;
}

/**
 * Sanitize a URL by removing invalid characters
 * @param string $url The URL to sanitize
 * @return string The sanitized URL
 */
public static function sanitizeUrl($url) {
    // Remove all illegal characters from URL
    $url = filter_var($url, FILTER_SANITIZE_URL);
    // Validate URL
    $url = filter_var($url, FILTER_VALIDATE_URL);
    // Return the sanitized URL
    return $url;
}

/**
 * Sanitize an integer by removing non-numeric characters
 * @param int|string $number The number to sanitize
 * @return int|string The sanitized number
 */
public static function sanitizeInt($number) {
    // Remove non-numeric characters
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    // Return the sanitized number
    return $number;
}

/**
 * Sanitize a float by removing non-numeric characters
 * @param float|string $number The number to sanitize
 * @return float|string The sanitized number
 */
public static function sanitizeFloat($number) {
    // Remove non-numeric characters
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // Return the sanitized number
    return $number;
}

public function sanitizeDateTime($datetime)
{
    $datetime = filter_var($datetime, FILTER_SANITIZE_STRING);
    $datetime = preg_replace('/[^\d\-:\s]/', '', $datetime);
    $datetime = date('Y-m-d H:i:s', strtotime($datetime));
    return $datetime;
}

public function sanitizeFile($file)
{
    $file = filter_var($file, FILTER_SANITIZE_STRING);
    $file = strtolower($file);
    $file = preg_replace('/[^\w\._]+/', '', $file);
    $file = str_replace(['../', './'], '', $file);
    $file = trim($file, '.');
    return $file;
}


}
