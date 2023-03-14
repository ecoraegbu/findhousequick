<?php
require_once(dirname(__FILE__,2).'/Core/Init.php');

?>
<?php include('SiteAssets/Layout/Head.php') ?>


<title>Home | FindHouseQuick</title>
</head>

<body class="">

  <header class="">
    <?php include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="px-4">
    <div class="bg-primary md:bg-gradient-to-r md:from-primary md:via-primary md:to-primary-light overflow-hidden h-auto md:h-[600px] bg-cover max-w-7xl mx-auto rounded-3xl">
      <div class="relative h-full flex items-end justify-between">
        <div class="px-10 py-10 md:px-20 flex items-center h-full">
          <div class="relative z-10">
            <h1 class="text-6xl font-bold text-white ">
              Let's Find Your <br> Dream Home. </h1>
            <p class="max-w-lg mt-4 mb-8 text-white ">
              We are a real estate agency that will help you find the best residence you dream of, let's
              discuss for your dream house!
            </p>

            <div class="relative flex items-center max-w-md">
              <input type="text" class="bg-white  p-5 w-full outline-none rounded-lg shadow-md" placeholder="Search for listings">
              <button class="inline-block bg-primary p-2 text-white rounded-md absolute right-4">
                <i icon-name="search" class="h-4 w-4"></i>
              </button>
            </div>
            <p class="mt-4 text-white ">
              Trusted by millions of users
            </p>

          </div>

          <img src="./SiteAssets/Assets/house.png" class="hidden absolute w-[900px] bottom-0 z-0 md:-right-96 md:block lg:-right-32" alt="">

        </div>
      </div>
    </div>
  </section>
  <!-- Hero End -->


  <!-- Listings Section -->
  <section class="px-10 sm:px-20 md:px-10 my-20">
    <div class="max-w-6xl mx-auto">
      <span class="text-primary font-light text-lg">Our featured properties.</span>
      <h1 class="text-5xl font-bold text-text before:block before:bg-gray-100 before:h-48 before:w-36 before:absolute before:left-0 before:-mt-16 before:rounded-lg before:-z-10">
        Our Listings.</h1>


      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-10">

        <!-- Cards -->
        <div class="shadow-card p-4 rounded-lg bg-white group hover:-translate-y-4 transition-all">
          <div class="relative">
            <img src="https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="aspect-square object-cover rounded-lg" alt="">
            <div class="w-full h-full bg-black bg-opacity-50 opacity-0  group-hover:opacity-100 absolute inset-0 rounded-lg p-2 transition-all">
              <div class="flex flex-wrap gap-1">
                <span class="bg-primary text-white px-2 py-1.5 text-sm rounded-md">Available</span>
                <span class="bg-success text-white px-2 py-1.5 text-sm rounded-md">For Sale</span>
                <span class="bg-purple-700 text-white px-2 py-1.5 text-sm rounded-md">For Rent</span>
                <span class="bg-error text-white px-2 py-1.5 text-sm rounded-md">Occupied</span>
              </div>
            </div>
          </div>

          <a href="" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="Real Bluestyle house Working on">Real Bluestyle house Working on</a>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>

        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>

        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>

        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>


        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>


        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>

        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>

        <div class="shadow-card p-4 rounded-lg  bg-white">
          <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

          <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
          <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

          <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small>
          </p>
        </div>


      </div>

      <div class="text-center mt-16">
        <a href="" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">View More</a>
      </div>

    </div>

  </section>

  <!-- Listing End -->

  <?php include('SiteAssets/Layout/Footer.php') ?>
</body>