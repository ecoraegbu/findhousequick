<?php
class Config {
    // Static variable to cache the config array
    private static $config = null;
    
    /**
     * Get a value from the config array based on a specified path
     *
     * @param string|null $path The path to the value, e.g. 'database/host'
     * @return mixed|false The value if found, false otherwise
     */
    public static function get($path = null) {
        // Load the config array into the static variable if it hasn't been loaded yet
        if (!self::$config) {
            self::$config = include 'Config/site_config.php';
        }

        // If a path is specified, traverse the config array to find the value
        if ($path) {
            $config =& self::$config; // Use a reference to the cached config array to avoid copying
            $path = explode('/', $path);

            foreach ($path as $bit) {
                if (isset($config[$bit])) {
                    $config =& $config[$bit]; // Use a reference to the array value to avoid copying
                } else {
                    return false;
                }
            }
            echo ($config);
            return $config;
        }

        return false;
    }
}
