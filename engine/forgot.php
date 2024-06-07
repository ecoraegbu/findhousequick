<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $data = [];
        $email = Input::get('email');
        $data['email'] = $email;
        $rules = ['email' => 'required|email'];
        $validation = new Validator($data);
        $result = $validation->validate($rules);
        
        if ($validation->passes()) {
            $reset_token = Token::generate();
            $expiration_time = time() + 3600; // token expires in 1 hour
            
            $user = new User;
            $fields = [
                'password_reset' => $reset_token,
                'reset_token_expiration' => $expiration_time
            ];
            
            if ($user->find($email)) {
                $reset_url = BASE_URL . "reset.php?reset_token=" . $reset_token . "&email=" . $user->data()->email . "&userid=" . $user->data()->id;
                $message = "Click the following link to reset your password: $reset_url";
                //mail($email, "Password Reset", $message);
                
                try {
                    $user->update('users', $fields, $user->data()->id);
                    $response['status'] = 'success';
                    $response['message'] = 'Reset link sent to your email';
                } catch (Exception $e) {
                    $response['status'] = 'error';
                    $response['message'] = 'Failed to update user data';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'User record not found';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = implode(', ', $validation->errors());
        }
    } 
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
