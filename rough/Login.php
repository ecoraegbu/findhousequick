<?php include('Layout/AuthHeader.php') ?>

<!-- Page Title -->
<title>Sign In | FindHouseQuick</title>
</head>

<body>
  <div class="grid grid-cols-1 md:grid-cols-none h-screen">
    <section class="bg-login hover:grayscale grayscale-0 transition-all hidden md:block bg-blend-multiply bg-primary bg-opacity-50 col-start-1 col-end-10">
      <h1 class="text-white text-2xl font-bold py-6 px-12">FindHouseQuick</h1>
      <p></p>
    </section>
    <section class="md:col-start-10 md:col-end-12 grid place-items-center">

      <div class="w-full px-6 max-w-sm">
        <h1 class="block md:hidden  text-white font-bold mb-10 bg-primary p-2 text-center rounded-lg text-2xl">FindHouseQuick</h1>

        <h2 class="text-3xl font-bold text-gray-900">Welcome back!</h2>
        <p class="text-sm text-gray-500 mt-1">Start managing your properties better and easy</p>


        <form action="" class="mt-10">
          <div class="relative bg-main flex items-center pl-2 rounded-lg">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="mail" class="h-4 w-4"></i>
            </span>
            <input type="text" placeholder="you@example.com" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- <small class="text-red-500">Email field is required</small> -->

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="text" placeholder="Your Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
          <!-- <small class="text-red-500">Password field is required</small> -->
          <div class="grid gap-x-4 gap-y-2 grid-cols-1 sm:grid-cols-2 mt-2">

            <div class="flex items-center gap-1 ">
              <input type="checkbox" class="accent-primary" name="remember" id="remember">
              <label for="remember" class="text-sm text-gray-500 font-semibold">Keep me logged In</label>
            </div>

            <div class="text-right">
              <a href="forgot.php" class="text-sm text-primary font-semibold">Forgot Password?</a>
            </div>
          </div>


          <button type="submit" class="mt-6 w-full px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Sign In</button>

        </form>


        <div class="flex gap-2 items-center mt-8 mb-4">
          <span class="bg-gray-100 h-0.5 w-full"></span>
          <span class="flex-shrink-0 text-sm w-8 h-8 rounded-full grid place-items-center text-gray-600">
            Or
          </span>
          <span class="bg-gray-100 h-0.5 w-full"></span>
        </div>


        <div class="text-center">
          <a href="Register.php" class="text-gray-600 text-sm">Don't have an account? <span class="text-primary font-semibold">Sign Up</span></a>
        </div>

      </div>

    </section>
  </div>
  <?php include('Layout/AuthFooter.php') ?>
</body>