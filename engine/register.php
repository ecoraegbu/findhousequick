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
                $salt = Hash::salt(32);
                $activationtoken = Token::generate();
            
                $user->create('users', array(
                    'email' => Input::get('email'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'role' => USER_ROLE_ORDINARY,
                    'activation_token' => $activationtoken,
                ));
            
                // Construct the activation link
                $activationLink = BASE_URL . "/activate.php?email=" . Input::get('email') . "&token=" . urlencode($activationtoken);
                $account_activation_message = str_replace('{{activation_link}}', $activationLink, $account_activation_message);
            
                try {
                    // Send an activation email
                    $email = new Email(Input::get('email'), 'Account Activation', $account_activation_message, 'noreply@findhousequick.com', 'noreply@findhousequick.com', true);
            
                    if ($email->send()) {
                        $response['status'] = 'success';
                        $response['message'] = 'Registration successful';
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Registration successful, but email could not be sent';
                        //logError('Email could not be sent to ' . Input::get('email'), 'Email');
                    }
                } catch (Exception $e) {
                    $response['status'] = 'error';
                    $response['message'] = 'Registration successful, but email could not be sent';
                    //logError('Email could not be sent to ' . Input::get('email') . ': ' . $e->getMessage(), 'Email');
                }
            } catch (PDOException $e) {
                $response['status'] = 'error';
                $response['message'] = 'Database error: ' . $e->getMessage();
                //logError('Database error: ' . $e->getMessage(), 'Database');
            } catch (Exception $e) {
                $response['status'] = 'error';
                $response['message'] = 'Unexpected error: ' . $e->getMessage();
                //logError('Unexpected error: ' . $e->getMessage(), 'General');
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
