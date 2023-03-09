<?php include('Layout/AuthHeader.php') ?>

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


        <form action="" class="mt-10">

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
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

          <div class="relative bg-main flex items-center pl-2 rounded-lg mt-3">
            <span class="inline-block bg-white p-2 text-primary rounded-lg">
              <i icon-name="lock" class="h-4 w-4"></i>
            </span>
            <input type="text" placeholder="Comfirm Your Password" class="text-sm px-2 py-4 bg-main text-gray-700 rounded-lg w-full outline-none">
          </div>
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
          <a href="Login.php" class="text-gray-600 text-sm">Already have an account? <span class="text-primary font-semibold">Sign In</span></a>
        </div>

      </div>

    </section>
  </div>
  <?php include('Layout/AuthFooter.php') ?>
</body>