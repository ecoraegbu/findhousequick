<?php include('Layout/Head.php') ?>


<title>Home | FindHouseQuick</title>
</head>

<body class="">

  <header class="">
    <?php include('Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="px-4">
    <div class="flex gap-10 max-w-6xl mx-auto flex-col md:flex-row">
      <div class="basis-0 md:basis-60 text-text" x-data="{open: false}">
        <!-- Basic Search -->
        <p class="text-xl font-bold">Quick Search</p>

        <div class="mt-3">
          <label for="search">Search</label>
          <input type="text" id="search" placeholder="Search by name etc." class="p-2 border border-gray-200 rounded-md w-full">
        </div>

        <hr class="border-t border-gray-200 my-4">

        <!-- Advance Search -->
        <div class="flex justify-between items-center" @click="open =! open">
          <p class="text-xl font-bold">Advance Search</p>
          <i icon-name="chevron-down" class="h-5 w-5"></i>
        </div>

        <div class="" x-show="open" x-cloak>

          <div class="mt-3 flex flex-wrap gap-2">
            <div class="flex-1">
              <label for="type">Type</label>
              <select name="" id="type" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>

            <div class="flex-1">
              <label for="status">Status</label>
              <select name="" id="status" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>
          </div>

          <div class="mt-3 flex gap-2">
            <div class="flex-1">
              <label for="location">Location</label>
              <select name="" id="location" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>

            <div class="flex-1">
              <label for="room">Number of Rooms</label>
              <select name="" id="room" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>
          </div>

          <div class="mt-3 flex gap-2">
            <div class="flex-1">
              <label for="bedroom">Master Bedrooms</label>
              <select name="" id="bedroom" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>

            <div class="flex-1">
              <label for="status">Number of Toilets</label>
              <select name="" id="status" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>
          </div>

          <div class="mt-3 flex gap-2">
            <div class="flex-1">
              <label for="from">Price From</label>
              <select name="" id="from" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>

            <div class="flex-1">
              <label for="to">Price To</label>
              <select name="" id="to" class="px-2 py-2.5 border border-gray-200 rounded-md w-full bg-white text-gray-600 outline-none">
                <option value="">Select</option>
              </select>
            </div>
          </div>

          <button class="bg-primary text-white p-2 rounded-lg w-full mt-3">Apply Filter</button>

        </div>

      </div>

      <div class="flex-1">

        <h1 class="text-5xl text-text font-bold mt-4">Nomaden Omah Sekut</h1>
        <p class="text-gray-500 text-lg">3,000 search results</p>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="aspect-square object-cover rounded-lg" alt="">

            <a href="" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="Real Bluestyle house Working on">Real Bluestyle house Working on</a>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>


          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>


          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>


          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="shadow-card p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>






        </div>


        <div class="mt-10 mb-20">
          <ul class="flex gap-2">
            <li class="mr-auto">
              <a href="" class="inline-block rounded-lg bg-primary-light p-2 text-primary">
                <i icon-name="chevron-left" class="h-5 w-5"></i>
              </a>
            </li>

            <li class="">
              <a href="" class="inline-block rounded-lg bg-primary-light py-2 px-4 text-primary">
                1
              </a>
            </li>
            <!-- Active Class -->
            <li class="">
              <a href="" class="inline-block rounded-lg bg-primary py-2 px-4 text-white">
                2
              </a>
            </li>

            <li class="">
              <a href="" class="inline-block rounded-lg bg-primary-light py-2 px-4 text-primary">
                3
              </a>
            </li>

            <li class="">
              <a href="" class="inline-block rounded-lg bg-primary-light py-2 px-4 text-primary">
                ...
              </a>
            </li>

            <li class="ml-auto">
              <a href="" class="inline-block rounded-lg bg-primary-light p-2 text-primary">
                <i icon-name="chevron-right" class="h-5 w-5"></i>
              </a>
            </li>

          </ul>
        </div>


      </div>
    </div>
    </div>
  </section>
  <!-- Hero End -->



  <?php include('Layout/Footer.php') ?>
</body>