<?php
require_once 'core/init.php';

Config::get('remember/cookie_name') ;
if (Input::exists()){
    
    if(Token::check(Input::get('token'))){
        
        $data =[];
        $email = Input::get('email');
        $password = Input::get('password');
        $data['email'] = $email;
        $data['password'] = $password;
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',];

        $validate = new Validator($data);
        $result = $validate->validate($rules);
        if ($validate->passes()){
            
            $user = new User();
            
            $remember = (Input::get('remember') === 'on') ? true : false;
        
           $login = $user->login( Input::get('email'), Input::get('password'), $remember);
           
            if($login){
              
                Redirect::to('findhousequick/index.php');
            }  else{
                foreach($user->errors() as $error){
                  
                }
            }
        
        } else {
                foreach($validate->errors() as $error){
                  
                }
            }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
      .login {
        width: 400px;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
      }
      .login h1 {
        text-align: center;
        margin-bottom: 20px;
      }
      .form-group {
        margin-bottom: 20px;
      }
      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      input[type="text"],
      input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 10px;
      }
      input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #0062cc;
      }
      .error {
        color: #dc3545;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <div class="login">
      <h1>Login</h1>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="email">Username</label>
          <input type="text" name="email" id="email" >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" >
        </div>
        <div class="form-group">
            <input type ="hidden" name="token" value ="<?php echo Token::generate(); ?>">
          <input type="submit" value="Login">
        </div>
        <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
      </form>
    </div>
  </body>
</html>
