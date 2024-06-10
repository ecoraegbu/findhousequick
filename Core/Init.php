<?php
session_start();


// Add the root directory to the include path
$rootDirectory = dirname(__FILE__,2);

//echo $rootDirectory.'/Core/Init.php';
spl_autoload_register(function ($class) {
    $rootDirectory = dirname(__FILE__,2);
    require_once $rootDirectory.'/Classes/' . $class . '.php';
});
require_once $rootDirectory.'/Functions/Sanitize.php';


    $ip_address = Ip::getClientIP();
    $coordinates = Geolocation::getLocationByIP();

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashcheck = Database::getinstance()->get('userssessions', array('hash', '=', $hash));

    if ($hashcheck->count()) {
        $user = new User($hashcheck->first()->userid);
        $user->login();
    }
}
