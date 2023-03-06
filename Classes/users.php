<?php
class users{
public function login($email = null, $password = null, $remember = false)
{
    if (!$email && !$password && $this->exists()) {
        // User is already logged in.
        Session::put($this->sessionName, $this->data()->id);
        $this->isloggedin = true;
        return true;
    } else {
        $user = $this->find($email);
        if ($user) {
            // Verify if the entered password matches the hashed password in the database.
            if (Hash::make($password, $this->data()->salt) === $this->data()->password) {
                Session::put($this->sessionName, $this->data()->email);
                $this->isloggedin = true;
                if ($remember) {
                    $hash = Hash::unique();
                    $hashcheck = $this->database_connection->get('userssessions', array('userid', '=', $this->data()->id));
                    if (!$hashcheck->count()) {
                        $this->database_connection->insert('userssessions', array(
                            'userid' => $this->data()->id,
                            'hash' => $hash
                        ));
                    } else {
                        $hash = $hashcheck->first()->hash;
                    }
                    Cookie::put($this->cookieName, $hash, Config::get('remember/cookie_expiry'));
                }
                return true;
            } else {
                // Passwords don't match.
                return "The password you entered is incorrect. Please try again.";
            }
        }
    }
    // User not found.
    return "The email you entered is not registered.";
}
public function login($email = null, $password = null, $remember = false)
{
    if (!$email && !$password && $this->exists()) {
        // User is already logged in.
        Session::put($this->sessionName, $this->data()->id);
        $this->isloggedin = true;
        return true;
    } else {
        $user = $this->find($email);
        if ($user) {
            // Verify if the entered password matches the hashed password in the database.
            if (Hash::make($password, $this->data()->salt) === $this->data()->password) {
                Session::put($this->sessionName, $this->data()->email);
                $this->isloggedin = true;
                if ($remember) {
                    $hash = Hash::unique();
                    $hashcheck = $this->database_connection->get('userssessions', array('userid', '=', $this->data()->id));
                    if (!$hashcheck->count()) {
                        $this->database_connection->insert('userssessions', array(
                            'userid' => $this->data()->id,
                            'hash' => $hash
                        ));
                    } else {
                        $hash = $hashcheck->first()->hash;
                    }
                    Cookie::put($this->cookieName, $hash, Config::get('remember/cookie_expiry'));
                }
                return true;
            } else {
                // Passwords don't match.
                return "The password you entered is incorrect. Please try again.";
            }
        }
    }
    // User not found.
    return "The email you entered is not registered.";
}
}