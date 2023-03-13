<?php include('Layout/Head.php') ?>


<title>Get In Touch | FindHouseQuick</title>
</head>

<body class="">

  <header class="">
    <?php include('Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="px-4">
    <div class="bg-black bg-blend-multiply bg-opacity-60 bg-login h-[300px] bg-cover max-w-7xl mx-auto rounded-3xl">
      <div class="grid place-items-center h-full">
        <div class="text-center">
          <h1 class="text-white text-5xl font-bold">Get In Touch</h1>
          <p class="text-gray-300 text-lg">Want to know more about our agency!</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero End -->

  <!-- Contact Us -->
  <section class="px-8 md:px-16 my-20">
    <!-- Wrapper -->
    <div class="max-w-6xl mx-auto">
      <div class="grid gap-10 grid-cols-1 md:grid-cols-2">
        <div class="">
          <h2 class="text-xl font-bold text-text">Send Us A Message</h2>
          <p class="font-light text-text">To provide exceptional real estate services and deliver the highest level of expertise.</p>

          <form action="" class="mt-5">
            <div class="flex gap-4 flex-col sm:flex-row">
              <div class="flex-1">
                <label for="name" class="text-text">Name</label>
                <input type="text" id="name" placeholder="Enter your name" class="p-2 border border-gray-200 w-full">
              </div>
              <div class="flex-1">
                <label for="email" class="text-text">Email Address</label>
                <input type="text" id="email" name="email" placeholder="Enter your email address" class="p-2 border border-gray-200 w-full">
              </div>
            </div>

            <div class="gap-4 mt-2.5">
              <div class="">
                <label for="name" class="text-text">Phone Number</label>
                <input type="text" id="phone" placeholder="Enter your phone number" class="p-2 border border-gray-200 w-full">
              </div>
            </div>


            <div class="gap-4 mt-2.5">
              <div class="">
                <label for="messagae" class="text-text">Message</label>
                <textarea name="messagae" placeholder="Write..." id="messagae" class="p-2 border border-gray-200 w-full" rows="6"></textarea>
              </div>
            </div>

          </form>


        </div>
        <div class="md:pl-10 md:border-l md:border-l-gray-200">
          <div class="text-text">
            <h2 class="text-xl font-bold">Call Us</h2>
            <p class="text-gray-400 my-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, cum.</p>
            <div class="flex items-center gap-2">
              <span class="inline-block p-2 rounded-lg bg-primary text-white"><i icon-name="phone" class="h-4 w-4"></i></span>
              <p class="font-bold">080283783</p>
            </div>
          </div>

          <div class="text-text mt-8">
            <h2 class="text-xl font-bold">Email Us</h2>
            <p class="text-gray-400 my-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, cum.</p>
            <div class="flex items-center gap-2">
              <span class="inline-block p-2 rounded-lg bg-primary text-white"><i icon-name="mail" class="h-4 w-4"></i></span>
              <p class="font-bold">example2mail.com</p>
            </div>
          </div>


          <div class="text-text mt-8">
            <h2 class="text-xl font-bold">Visit Us</h2>
            <p class="text-gray-400 my-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, cum.</p>
            <div class="flex items-center gap-2">
              <span class="inline-block p-2 rounded-lg bg-primary text-white"><i icon-name="map-pin mt-8" class="h-4 w-4"></i></span>
              <p class="font-bold">15031 Gladys Center</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>


  <?php include('Layout/Footer.php') ?>
</body>