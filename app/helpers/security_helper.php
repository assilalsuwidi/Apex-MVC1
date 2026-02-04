<?php
/**
 * Security Helper
 * Functions for XSS, CSRF, CORS, and more
 */

// XSS Protection: Escape output
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// CSRF Protection: Generate Token
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// CSRF Protection: Verify Token
function verifyCsrfToken($token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        return true;
    }
    return false;
}

// CORS Protection: Set Secure Headers
function setSecureHeaders() {
    // CORS - Only allow same origin by default
    header("Access-Control-Allow-Origin: " . URLROOT);
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    
    // Security Headers
    header("X-Frame-Options: SAMEORIGIN");
    header("X-XSS-Protection: 1; mode=block");
    header("X-Content-Type-Options: nosniff");
    header("Content-Security-Policy: default-src 'self'; script-src 'self' https://code.jquery.com https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com; style-src 'self' 'unsafe-inline' https://maxcdn.bootstrapcdn.com; font-src 'self' https://maxcdn.bootstrapcdn.com;");
    header("Referrer-Policy: strict-origin-when-cross-origin");
}

// XXE Protection: Disable External Entities for XML parsing
function safeXmlParse($xmlString) {
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    // Disable external entities
    $oldValue = libxml_disable_entity_loader(true);
    $dom->loadXML($xmlString);
    libxml_disable_entity_loader($oldValue);
    return $dom;
}

// SSRF Protection: Validate URL before fetching
function isValidUrl($url) {
    $parsedUrl = parse_url($url);
    if (!$parsedUrl || !isset($parsedUrl['host'])) {
        return false;
    }

    // List of forbidden hosts (Internal IPs)
    $forbiddenHosts = [
        'localhost', '127.0.0.1', '0.0.0.0', '169.254.169.254',
    ];

    if (in_array(strtolower($parsedUrl['host']), $forbiddenHosts)) {
        return false;
    }

    // Only allow http and https
    if (!in_array($parsedUrl['scheme'], ['http', 'https'])) {
        return false;
    }

    return true;
}

// File Upload Protection: Secure File Validation
function validateUpload($file, $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'], $maxSize = 2097152) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return "Upload error.";
    }

    if ($file['size'] > $maxSize) {
        return "File too large.";
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    if (!in_array($mimeType, $allowedTypes)) {
        return "Invalid file type.";
    }

    return true;
}
