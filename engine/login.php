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
        $data = [
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ];
        
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        
        $validation = new Validator($data);
        $result = $validation->validate($rules);
        
        if ($validation->passes()) {
            $user = new User();
            $login = $user->login(Input::get('username'), Input::get('password'));
            
            if ($login) {
                $response['status'] = 'success';
                $response['message'] = 'Login successful';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Invalid username or password';
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