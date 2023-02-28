<?php
require_once('Core/Init.php');
if(Input::exists()){
    
    if(Token::check(Input::get('token'))){
        
        $rules =[
          'email' => 'required|email|max:255',
	        'password' => 'required|string|min:8|max:255',
        ];
        $data = [];
        $data['email'] = Input::get('email');
        $data['password'] = Input::get('password');
        $validate = new Validator($data);
        $result = $validate->validate($rules);
        $user = new User();

        if($validate->passes()){
            
            $salt = Hash::salt(32);
            try {
                $user->create('users', array(
                    'email' =>Input::get('email'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' =>date('Y-m-d H:i:s'),
                    'role' => USER_ROLE_ORDINARY,
                    ));
                }
                catch(Exception $e) {
                    die($e->getMessage());
                }
            }else {
                foreach($validate->errors() as $error){
                    
                    
                }
            }

        } else {
            
        }
    }
?>
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
        <title>Sign Up Form</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
          }
    
          form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
          }
    
          h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 0;
          }
    
          input[type="email"],
          input[type="text"],
          input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            font-size: 16px;
            box-sizing: border-box;
          }
    
          input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
          }
    
          input[type="submit"]:hover {
            background-color: #45a049;
          }
    
          .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
          }
        </style>
      </head>
      <body>
        <form method="POST" action="signup.php">
          <h1>Sign Up</h1>
          <label for="email">Email:</label>
          <input type="text" name="email" id="email">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" >
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" name="confirm-password" id="confirm-password" >
          <input type ="hidden" name="token" value ="<?php echo Token::generate(); ?>">
          <input type="submit" value="Sign Up">
          <?php if (isset($error)): ?>
          <div class="error"><?php echo $error; ?></div>
          <?php endif; ?>
          
        </form>
      </body>
    </html>
    