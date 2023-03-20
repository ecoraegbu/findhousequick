<?php
class Hash {
    public static function make($string, $salt = ''){
        return hash('sha256', $string.$salt);
    }
    public static function salt($length){
        return md5(rand(0, $length));
    }
    public static function unique(){
        return self::make(uniqid());
    }
    public static function generate_unique_id($length, $prefix = '') {
        return $prefix . '_' . substr(md5(uniqid()), 0, $length);
    }
}