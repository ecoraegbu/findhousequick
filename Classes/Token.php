<?php class Token{
    public static function generate(){
        if (Session::put(Config::get('session/token_name'), md5(uniqid()))){
            return Session::get(Config::get('session/token_name'));
        }else{
            
        }
        return false;
    }

    public static function check($token){
        $tokenName = Config::get('session/token_name');
        if (Session::exists($tokenName) && $token === Session::get($tokenName)){
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
