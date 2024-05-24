<?php 
require_once 'Core/Init.php';
if (!empty($_GET)){
  $email = $_GET['email'];
  $reset_token = $_GET['reset_token'];
  $userid = $_GET['userid'];
}
if(Input::exists()){
  
if(Token::check(Input::get('token'))){

  $email = Input::get('email');
  $userid = Input::get('userid');
  $reset_token = Input::get('reset_token');
  $password = Input::get('password');
  $confirm_password = Input::get('confirm_password');

  $data =[];
  //$data['email'] = $email;
  $data['password'] = $password;
  //$data['reset_token'] = $reset_token;
  //$data['userid'] = $userid;
  $data['confirm_password'] = Input::get('confirm_password');
  $rules =[
    //'email' => 'required|email|max:255|unique:users,email',
    'password' => 'required|string|min:8|max:20|matches:confirm_password|regex:/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[@#$%&.*]).+$/',
    'confirm_password' => 'required|string|min:8|max:20',
  ];

  $validate = new Validator($data);
  $result = $validate->validate($rules);
 
  if ($validate->passes()){
    $user = new User();

    $salt = Hash::salt(32);
  
    $connection = Database::getInstance();
    $token = $connection->get('users', array('password_reset', '=' ,$reset_token));
    if($token->count()){
      if($token->first()->reset_token_expiration < time()){
        $error = 'reset link expired';
      } else{
        try {
          // we have to use a password reset table in the database with foreign key userid referencing the
          // users table so that we can delete the reset token after this try has run.
          //
          $user->update('users', array(
              'password' => Hash::make($password, $salt),
              'salt' => $salt,
              ), $userid);
              //Session::flash()
              Redirect::to(BASE_URL.'login.php');
          }
          catch(Exception $e) {
              die($e->getMessage());
          }
      }
     
    }  else{
          $error = "Sorry! but you did not request for a password change";
         
      }
  
  } else {
          foreach($validate->errors() as $error){
            
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

        <h2 class="text-3xl font-bold text-gray-900">Change Password</h2>
        <p class="text-sm text-gray-500 mt-1">Reset your password to what you can remember </p>


        <form action="reset.php" method = "post" class="mt-10">
          <div class="relative bg-main flex items-center pl-2 rounded-lg">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="mail" class="h-4 w-4"></i>
            </span>
            <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" readonly placeholder="you@example.com" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
            <input type="hidden" name="reset_token" value="<?php echo isset($reset_token) ? $reset_token : ''; ?>">
            <input type="hidden" name="userid" value="<?php echo isset($userid) ? $userid : ''; ?>">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
          </div>

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="text" name="password" placeholder="New Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- Error -->
          <!-- <small class="text-red-500">Password field is required</small> -->

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="text" name="confirm_password" placeholder="Comfirm New Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- Error -->
          <small class="text-red-500"><?php echo isset($error)? $error : ''; ?></small> 

          <button type="submit" class="mt-6 w-full px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Save Password</button>

        </form>


        <!-- <div class="flex gap-2 items-center mt-8 mb-4">
          <span class="bg-gray-100 h-0.5 w-full"></span>
          <span class="flex-shrink-0 text-sm w-8 h-8 rounded-full grid place-items-center text-gray-600">
            Or
          </span>
          <span class="bg-gray-100 h-0.5 w-full"></span>
        </div>


        <div class="text-center">
          <a href="login.php" class="text-gray-600 text-sm">Already have an account? <span class="text-primary font-semibold">Sign In</span></a>
        </div> -->

      </div>

    </section>
  </div>
  <?php include('./Templates/Auth/Footer.php') ?>
</body>
