<?php
class Session {
    public static function exists($name) {
        return isset($_SESSION[$name]);
    }

    public static function put($name, $value) {
        $_SESSION[$name] = $value;
        return true; // success
    }

    public static function get($name) {
        return self::exists($name) ? $_SESSION[$name] : null;
    }

    // Update existing session data
    public static function update($name, $value) {
        if (self::exists($name)) {
            $_SESSION[$name] = $value;
            return true; // success
        } else {
            return false; // variable not found
        }
    }

    public static function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
            return true; // success
        } else {
            return false; // variable not found
        }
    }

    // Get all session data
    public static function all() {
        return $_SESSION;
    }

    public static function destroy() {
        if (session_destroy()) {
            return true; // success
        } else {
            return false; // session destruction failed
        }
    }

    // Flash messages
    public static function flash($name, $string = '') {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
            return true; // success
        }
    }
}