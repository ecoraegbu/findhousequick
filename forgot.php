<?php
require_once 'core/init.php';
if(Input::exists()){

  if(Token::check(Input::get('token'))){
    $data =[];
      $email = Input::get('email');
      $data['email'] = $email;
        $rules = [ 'email' => 'required|email'];
        $validation = new Validator($data);
        $result = $validation->validate($rules);
        if($validation->passes()){
          //generate a token
          $reset_token = Token::generate();
          $expiration_time = time() + 3600; // token expires in 1 hour

          //store the token in the database
          $user = new User;
          $fields = array(
            'password_reset' => $reset_token,
            'reset_token_expiration' => $expiration_time
          );
          if($user->find($email)){
              // create the url pass the user email address and user id to the url
              $reset_url = BASE_URL . "forgot.php?reset_token=" . $reset_token . "&email=" . $user->data()->email. "&userid=" . $user->data()->id;

              $message = "Click the following link to reset your password: $reset_url";
              //mail($email, "Password Reset", $message);
            try{
              // update the data base, and send the email to the user
              $user->update('users', $fields, $user->data()->id);
              // Send an email to the user
              echo $reset_url;
            } catch(Exception $e){
  
            }
          }else{
            // user records not found add error that would be echoed out.
            $error = "user record not found";
          }

        }else{
          foreach($validation->errors() as $error){

          }
        }

  }

}

?>
<?php include('./Templates/Auth/Header.php') ?>

<body>
  <div class="grid grid-cols-1 md:grid-cols-none h-screen">
    <section class="bg-reset bg-center hover:grayscale grayscale-0 transition-all hidden md:block bg-blend-multiply bg-primary bg-opacity-50 col-start-1 col-end-10">
      <h1 class="text-white text-2xl font-bold py-6 px-12">FindHouseQuick</h1>
      <p></p>
    </section>
    <section class="md:col-start-10 md:col-end-12 grid place-items-center">

      <div class="w-full px-6 max-w-sm">
        <h1 class="block md:hidden  text-white font-bold mb-10 bg-primary p-2 text-center rounded-lg text-2xl">FindHouseQuick</h1>

        <h2 class="text-3xl font-bold text-gray-900">Reset Password</h2>
        <p class="text-sm text-gray-500 mt-1">Did you forget your password again? You can change your password</p>


        <form action="forgot.php" method="post" class="mt-10">
          <div class="relative bg-main flex items-center pl-2 rounded-lg">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="mail" class="h-4 w-4"></i>
            </span>
            <input type="text" name="email" id="email" placeholder="you@example.com" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
          </div>
          <?php if (isset($error)) : ?>
            <small class="text-red-500"><?php echo $error; ?></small>
          <?php endif; ?>
          <!-- <small class="text-red-500">Email field is required</small> -->


          <button type="submit" class="mt-6 w-full px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Reset Password</button>

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
</body>