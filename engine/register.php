<?php
require_once('../Core/Init.php');
include 'messages.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
if(Input::exists()){
    
    if(Token::check(Input::get('token'))){
        
        $rules =[
          'email' => 'required|email|max:255|unique:users,email',
	        'password' => 'required|string|min:8|max:20|matches:confirm_password|regex:/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[@#$%&.*]).+$/',
          'confirm_password' => 'required|string|min:8|max:20',
        ];
        $data = [];
        $data['email'] = Input::get('email');
        $data['password'] = Input::get('password');
        $data['confirm_password'] = Input::get('confirm_password');
        $validation = new Validator($data);
        $result = $validation->validate($rules);
        $user = new User();

        if($validation->passes()){
            
            $salt = Hash::salt(32);
            $activationtoken = Token::generate();
            try {
                $user->create('users', array(
                    'email' =>Input::get('email'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' =>date('Y-m-d H:i:s'),
                    'role' => USER_ROLE_ORDINARY,
                    'activation_token' => $activationtoken,
                    ));
                    
                    //Session::flash()
                    // at this point, an email confirmation message should be sent to the user as well.
                            // Construct the activation link
                            $activationLink = BASE_URL."/activate.php?email=". Input::get('email')."&token=" . urlencode($activationtoken);
                            
                            $account_activation_message = str_replace('{{activation_link}}', $activationLink, $account_activation_message);

                            // Send an activation email
                            $email = new Email(Input::get('email'), 'Account Activation', $account_activation_message,'noreply@findhousequick.com','noreply@findhousequick.com', true);
                        
                            if ($email->send()) {
                                $response['status'] = 'success';
                                $response['message'] = 'Registration successful';
                            //echo '<div class="alert" style="position: fixed; top: 0; left: 0; width: 100%; background-color: #1877F2; color: white; text-align: center; padding: 10px;">' . Session::flash('account created', 'Your account has been successfully created. Please verify your account by clicking on the message sent to your email address.') . '</div>';
                            } else {
                                // Handle email sending failure
                                die('failed to send');
                            }
                }
                catch(Exception $e) {
                    //instead of dying the error message here, store it as the message element of the response array.
                    // $response['status'] would be equal to 'error'
                    die($e->getMessage());
                }
            }else {
                $response['status'] = 'error';
                $response['message'] = implode(', ', $validation->errors());
                /* foreach($validation->errors() as $error){
                    
                    
                } */
            }

        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid request';
        }
    }
    echo json_encode($response);
