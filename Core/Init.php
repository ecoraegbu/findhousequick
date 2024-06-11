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
    //Here we're grabbing the user's ip
        if (Ip::getClientIP()) {
            if (Session::exists('client_ip')) {
                if (Session::get('client_ip') !== Ip::getClientIP()) {
                    Session::delete('client_ip');
                    Session::put('client_ip', Ip::getClientIP());
                }
            } else {
                Session::put('client_ip', Ip::getClientIP());
            }
        } else{
            Session::put('client_ip', false);
        }
        // Here were grabbing the user's location from his ip and setting it as a session variable
        if (Geolocation::getLocationByIP()){
            $coordinate = array('latitude' => Geolocation::getLocationByIP()['location']['lat'],
            'longitude' => Geolocation::getLocationByIP()['location']['lng']);
            if (Session::exists('coordinates')){
                if (Session::get('coordinates') !== $coordinate){
                    Session::delete('coordinates');
                    Session::put('coordinates', $coordinate);
                }
            }else {
                Session::put('coordinates', $coordinate);
            }
        } else{
            Session::put('coordinates', false);
        }


if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashcheck = Database::getinstance()->get('userssessions', array('hash', '=', $hash));

    if ($hashcheck->count()) {
        $user = new User($hashcheck->first()->userid);
        $user->login();
    }
}
