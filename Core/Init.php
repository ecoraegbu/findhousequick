<?php
session_start();

$GLOBALS['config'] = array(
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class){
    require_once 'Classes/'.$class.'.php';
});
require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashcheck = Database::getinstance()->get('userssessions', array('hash', '=', $hash));
     
    if($hashcheck->count()){
        $user = new User($hashcheck->first()->userid);
        $user->login();
    }
}