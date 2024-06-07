<?php
$GLOBALS['config'] = array(
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'session_authentication' => 'user_role',
        'token_name' => 'token',
        'attempts' => 'login_attempts'
    )
); 





// database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'findhousequick');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// website settings
define('ROOT_DIRECTORY', $_SERVER['DOCUMENT_ROOT']);
define('BASE_PATH', dirname(__FILE__,2));
define('SITE_NAME', 'FindHouseQuick');
define('BASE_URL', 'http://localhost/findhousequick/');
define('DEFAULT_PAGE_TITLE', 'FindHouseQuick - Your One-Stop Real Estate Destination');
define('DEFAULT_META_DESCRIPTION', 'FindHouseQuick is the ultimate real estate platform that connects landlords, tenants, and agents in one place.');
define('DEBUG_MODE', true);
define('ENCRYPTION_ALGORITHM', 'AES-256-CBC');
define('ENCRYPTION_KEY', 'your_encryption_key');
define('SESSION_NAME', 'findhousequick_session');
define('SESSION_TIMEOUT', 60 * 60); // session timeout in seconds (1 hour)
define('EMAIL_TEMPLATES_DIR', __DIR__ . '/../templates/emails/');
define('ITEMS_PER_PAGE', 10);

// email settings
// email settings
define('MAIL_HOST', 'premium105.web-hosting.com');
define('MAIL_PORT', '465');
define('MAIL_USERNAME', 'noreply@findhousequick.com');
define('MAIL_PASSWORD', 'Chukwuka123@');
define('MAIL_FROM_NAME', 'FindHouseQuick Support');
define('MAIL_FROM_EMAIL', 'noreply@findhousequick.com');
define('MAIL_SECURE', 'SSL');

// contact settings
define('EMAIL_ADDRESS', 'support@findhousequick.com');
define('ADDRESS', '39, Ohonre street, off adolor college road, Ugbowo. Benin City, Edo State');
define('PHONE', '+2348100253033');
define('BUSINESS_NAME', 'FINDHOUSEQUICK');

// geolocation
define('GOOGLE_GEO_API_URL', 'https://www.googleapis.com/geolocation/v1/geolocate');
define('GOOGLE_GEO_API_KEY', 'your-api-key');
define('GOOGLE_GEO_API_TIMEOUT', 30); // seconds

// user roles
define('USER_ROLE_ADMIN', 6);
define('USER_ROLE_AGENT', 5);
define('USER_ROLE_LANDLORD', 4);
define('USER_ROLE_TENANT', 3);
define('USER_ROLE_ORDINARY', 2);
define('USER_ROLE_GUEST', 1);

// other settings
define('MAX_FILE_SIZE', 1024 * 1024 * 2); // maximum file size in bytes (2 MB)
define('DEFAULT_TIMEZONE', 'Africa/Lagos'); // default timezone for date and time functions

?>