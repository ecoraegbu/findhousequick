<?php
$account_activation_message = '
<!DOCTYPE html>
<html>
<head>
  <title>Account Activation - FindHouseQuick</title>
  <style>
    /* Facebook Blue Color */
    .fb-blue {
      color: #1877F2;
    }

    /* Container Styles */
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
    }

    /* Header Styles */
    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    /* Button Styles */
    .btn {
      background-color: #1877F2;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
    }

    /* Content Styles */
    .content {
      background-color: #F7F7F7;
      padding: 20px;
      border-radius: 5px;
    }

    /* Footer Styles */
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1 class="fb-blue">FindHouseQuick</h1>
    </div>
    <div class="content">
      <h2>Account Activation</h2>
      <p>Dear User,</p>
      <p>Thank you for choosing FindHouseQuick! To activate your account, please click the button below:</p>
      <p><a href="{{activation_link}}">Activate Your Account</a></p>
      <p>If you have any questions or need assistance, please feel free to contact us.</p>
    </div>
    <div class="footer">
      &copy; 2023 FindHouseQuick. All rights reserved.
    </div>
  </div>
</body>
</html>
';

$passord_reset_message ='
<!DOCTYPE html>
<html>
<head>
  <title>Account Activation - FindHouseQuick</title>
  <style>
    /* Facebook Blue Color */
    .fb-blue {
      color: #1877F2;
    }

    /* Container Styles */
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
    }

    /* Header Styles */
    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    /* Button Styles */
    .btn {
      background-color: #1877F2;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
    }

    /* Content Styles */
    .content {
      background-color: #F7F7F7;
      padding: 20px;
      border-radius: 5px;
    }

    /* Footer Styles */
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1 class="fb-blue">FindHouseQuick</h1>
    </div>
    <div class="content">
      <h2>Account Activation</h2>
      <p>Dear User,</p>
      <p>Thank you for choosing FindHouseQuick! To Reset your Password, please click the link below:</p>
      <p><a href="{{password_reset}}">Reset Password</a></p>
      <p>If you have any questions or need assistance, please feel free to contact us.</p>
    </div>
    <div class="footer">
      &copy; 2023 FindHouseQuick. All rights reserved.
    </div>
  </div>
</body>
</html>
';