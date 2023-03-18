<?php
class Input {
    public static function exists() {
        return (!empty($_POST) || !empty($_GET));
    }

    public static function get($item) {
        if (isset($_POST[$item])) {
            $post_value = filter_input(INPUT_POST, $item);
            if ($post_value !== null) {
                return $post_value;
            }
        }
        
        if (isset($_GET[$item])) {
            $get_value = filter_input(INPUT_GET, $item);
            if ($get_value !== null) {
                return $get_value;
            }
        }
        if (isset($_FILES[$item])) {
            return $_FILES[$item];
        }
        
        return null;
    }

    
}
