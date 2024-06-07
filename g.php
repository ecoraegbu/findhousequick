<?php
require_once 'Core/Init.php';
var_dump (Session::session());
//$db = database::getInstance();
//$db->execute_sql_script('findhousequick', 'sql/activity_log.sql');
// Send an activation email
/* $email = new Email('ecoraegbu@gmail.com', 'Account Activation', 'account_activation_message','noreply@findhousequick.com','noreply@findhousequick.com', true);
                        
if ($email->send()) {
   echo 'hurray!';
//echo '<div class="alert" style="position: fixed; top: 0; left: 0; width: 100%; background-color: #1877F2; color: white; text-align: center; padding: 10px;">' . Session::flash('account created', 'Your account has been successfully created. Please verify your account by clicking on the message sent to your email address.') . '</div>';
} else {
    // Handle email sending failure
    die('failed to send');
} */