<?php
require_once('core/init.php');
include 'messages.php';
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
             // Generate a unique activation token
            $activationtoken = Token::generate(); // Implement this function as needed
            try {
                $user->create('users', array(
                    'email' =>Input::get('email'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' =>date('Y-m-d H:i:s'),
                    'role' => USER_ROLE_ORDINARY,
                    'activation_token' => $activationtoken,
                    ));
                    
                    // Construct the activation link
        $activationLink = BASE_URL."/activate.php?email=". Input::get('email')."&token=" . urlencode($activationtoken);
        
        $account_activation_message = str_replace('{{activation_link}}', $activationLink, $account_activation_message);

        // Send an activation email
        $email = new Email(Input::get('email'), 'Account Activation', $account_activation_message,'noreply@findhousequick.com','noreply@findhousequick.com', true);
       
        if ($email->send()) {
       
        //echo '<div class="alert" style="position: fixed; top: 0; left: 0; width: 100%; background-color: #1877F2; color: white; text-align: center; padding: 10px;">' . Session::flash('account created', 'Your account has been successfully created. Please verify your account by clicking on the message sent to your email address.') . '</div>';
        } else {
            // Handle email sending failure
            die('failed to send');
        }
                }
                catch(Exception $e) {
                    die($e->getMessage());
                }
            }else {
                foreach($validation->errors() as $error){
                    
                    
                }
            }

        } else {
            
        }
    }
?>
<?php include('./Templates/Auth/Header.php') ?>

<!-- Page Title -->
<title>Sign Up | FindHouseQuick </title>
</head>

<body>
  <div class="grid grid-cols-1 md:grid-cols-none h-screen">
    <section class="bg-register hover:grayscale grayscale-0 transition-all hidden md:block bg-blend-multiply bg-primary bg-opacity-50 col-start-1 col-end-10">
      <h1 class="text-white text-2xl font-bold py-6 px-12">FindHouseQuick</h1>
      <p></p>
    </section>
    <section class="md:col-start-10 md:col-end-12 grid place-items-center overflow-auto">

      <div class="w-full px-6 py-6 max-w-sm">
        <h1 class="block md:hidden  text-white font-bold mb-10 bg-primary p-2 text-center rounded-lg text-2xl">FindHouseQuick</h1>

        <h2 class="text-3xl font-bold text-gray-900">Create your account.</h2>
        <p class="text-sm text-gray-500 mt-1">Get started, managing your properties better and easy</p>


        <form action="register.php" method="post" class="mt-10">

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="mail" class="h-4 w-4"></i>
            </span>
            <input type="text" name="email" id="email" placeholder="you@example.com" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- <small class="text-red-500">Email field is required</small> -->


          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="password" name="password" id="password" placeholder="Your Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- <small class="text-red-500">Password field is required</small> -->

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Comfirm Your Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <input type ="hidden" name="token" value ="<?php echo Token::generate(); ?>">
          <?php if (isset($error)) : ?>
            <small class="text-red-500"><?php echo $error; ?></small>
          <?php endif; ?>
          <!-- <small class="text-red-500">Password field is required</small> -->

          <!-- <div class="text-right mt-1">
            <a href="" class="text-sm text-primary font-semibold">Forgot Password?</a>
          </div> -->


          <button type="submit" class="mt-6 w-full px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Sign Up</button>

        </form>


        <div class="flex gap-2 items-center mt-8 mb-4">
          <span class="bg-gray-100 h-0.5 w-full"></span>
          <span class="flex-shrink-0 text-sm w-8 h-8 rounded-full grid place-items-center text-gray-600">
            Or
          </span>
          <span class="bg-gray-100 h-0.5 w-full"></span>
        </div>


        <div class="text-center">
          <a href="login.php" class="text-gray-600 text-sm">Already have an account? <span class="text-primary font-semibold">Sign In</span></a>
        </div>

      </div>

    </section>
  </div>
  <?php include('./Templates/Auth/Footer.php') ?>
  <script>
  // Wait for 3 seconds before removing the flash message
  setTimeout(function() {
    var message = document.querySelector('.alert');
    if (message) {
      message.parentNode.removeChild(message);
    }
  }, 3000);
</script>
</body>
</html>