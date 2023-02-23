<?php
class User{
    private $database_connection;
    private $data;
    private $sessionName;
    private $cookieName;
    private $isloggedin;

// CONSTRUCT METHOD AUTOMATICALLY INITIATES A CONNECTION TO THE DATABASE GETS THE SESSION NAME AND COOKIE NAME CHECKS IF A USER IS LOGGED IN OTHERWISES INITIATES THE FIND USER PROTOCOL
public function __construct($user = null){
    $this->database_connection = Database::getInstance();
    $this->sessionName = Config::get('session/session_name');
    $this->cookieName = Config::get('remember/cookie_name');

    if(!$user){
        if(Session::exists($this->sessionName)){
            $user = Session::get($this->sessionName);
            
            if($this->find($user)){
                
                $this->isloggedin = true;
            }else{
                //process logout
                $this->logout();
            }
        } 
    }else{
        $this->find($user);
    }

}

//THE FUNCTION TO SEARCH THE DATABASE USER TABLE FOR A SPECIFIC USER
public function find($user = null){
    if ($user){
        $field =(is_numeric($user)) ? 'id' : 'email';
        $user_data =$this->database_connection->get('users',array($field, '=', $user));
        if($user_data->count()){

             $this->data= $user_data->first();
            return true;
        }
    }
    return false;
}


// THE FUNCTION TO CREATE A NEW USER ENTRY  IN THE DATABASE
public function create($table, $fields = array()){
    if(!$this->database_connection->insert($table, $fields)){
        throw new Exception('There was a problem creating an account');
    }
}

//THE FUNCTION FOR LOGGING INTO THE WEBSITE
public function login ($email = null, $password = null, $remember = false){
    

    if (!$email && !$password && $this->exists()){
        Session::put($this->sessionName, $this->data()->id);
     

    } else{
    $user = $this->find($email);    

        if($user){
            if($this->data()->password === Hash::make($password, $this->data()->salt)){
                Session::put($this->sessionName, $this->data()->email);
                
                if($remember){
                    $hash = Hash::unique();
                    $hashcheck = $this->database_connection->get('userssessions', array('userid', '=', $this->data()->id));
                    if(!$hashcheck->count()){
                        $this->database_connection->insert('userssessions', array(
                            'userid' => $this->data()->id,
                            'hash' => $hash
                        ));
                    }else{
                        $hash = $hashcheck->first()->hash;
                    }
                    Cookie::put($this->cookieName, $hash, Config::get('remember/cookie_expiry'));
                }
                }
            }
            return true;
    }
        return false;
}
//THE FUNCTION FOR UPDATING USER DATA IN THE DATABASE
public function update($table, $fields, $id = null){

    if(!$id && $this->isloggedin()){
        $id = $this->data()->id;
    }

    if(!$this->database_connection->update($table, $fields, $id )){
        throw new Exception('There was a problem updating your account');
    }
}

// THE FUNCTION FOR LOGGING OUT A USER FROM THE WEBSITE
public function logout(){

    $this->database_connection->delete('userssessions', array('userid', '=', $this->data()->id));
    Session::delete($this->sessionName);
    Cookie::delete($this->cookieName);
}


//FUNCTION TO ASCERTAIN WHETHER A USER IS LOGGED IN OR NOT THIS IS SET TO TRUE ON A SUCCESSFUL LOGIN AND SESSION SET
public function isloggedin(){
    return $this->isloggedin;
}

//FUNCTION EXISTS CHECKS IF A USER OR ENTRY EXISTS IN THE DATABASE
public function exists(){
    return (!empty($this->data)) ? true : false;
}


// DATA FUNCTION HELPS MAKE THE PRIVATE PROPERTY 'DATA' AVAILABLE FOR USE
public function data(){
    return $this->data; 
}

}