<?php require_once(dirname(__FILE__, 2) . '/Core/Init.php'); ?>
<?php include('SiteAssets/Layout/Head.php') ?>

<title>Book Inspection | FindHouseQuick</title>
</head>
<div></div>

<body class="">

  <header class="">
    <?php include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="px-4">
    <div class="bg-black bg-blend-multiply bg-opacity-60 bg-login h-[300px] bg-cover max-w-7xl mx-auto rounded-3xl">
      <div class="grid place-items-center h-full">
        <div class="text-center">
          <h1 class="text-white text-5xl font-bold">Book Inspection</h1>
          <p class="text-gray-300 text-lg">Want to know more about this property</p>
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
          <h2 class="text-xl font-bold text-text">Book Inspection</h2>
          <p class="font-light text-text">See what you want to bye.</p>

          <form action="" class="mt-5">

            <div class="flex gap-4 flex-col sm:flex-row">
              <div class="flex-1">
                <label for="date" class="text-text">Date</label>
                <input type="date" id="name" placeholder="Enter inspection date" class="p-2 border border-gray-200 w-full">
              </div>
            </div>

            <div class="gap-4 mt-2.5">
              <div class="">
                <label for="time" class="text-text">Time</label>
                <input type="time" id="time" placeholder="Enter inspection time" class="p-2 border border-gray-200 w-full">
              </div>
            </div>

            <div class="gap-4 mt-2.5">
              <div class="">
                <label for="messagae" class="text-text">Additional notes</label>
                <textarea name="messagae" placeholder="Enter additional notes" id="messagae" class="p-2 border border-gray-200 w-full" rows="6"></textarea>
              </div>
            </div>

            <div class="mt-4">
              <a href="" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">Request Inspection</a>
            </div>

          </form>


        </div>
        <div class="md:pl-10 md:border-l md:border-l-gray-200">
          <!-- Slider with thumbnail -->
          <div class="">
            <div class="swiper swiper-preview">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="w-full h-[460px] object-cover rounded-2xl" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1576941089067-2de3c901e126?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGhvdXNlfGVufDB8fDB8fHww" class="w-full h-[460px] object-cover rounded-2xl" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="w-full h-[460px] object-cover rounded-2xl" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="w-full h-[460px] object-cover rounded-2xl" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="w-full h-[460px] object-cover rounded-2xl" alt="">
                </div>
              </div>
            </div>

            <!-- Thumbnail use php to programmatically create the slide. for the number of pictures in the picture array/ the size of the array. -->
            <div thumbsSlider="" class="swiper swiper-thumb flex flex-wrap gap-4 mt-4">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="aspect-square w-24  object-cover rounded-md" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="aspect-square w-24  object-cover rounded-md" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="aspect-square w-24  object-cover rounded-md" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="aspect-square w-24  object-cover rounded-md" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fHww" class="aspect-square w-24  object-cover rounded-md" alt="">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>


  <?php include('SiteAssets/Layout/Footer.php') ?>
  <script>
    const swiper = new Swiper('.swiper-similar', {
      // Optional parameters
      direction: 'horizontal',
      slidesPerView: 1,
      spaceBetween: 30,

      // If we need pagination

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },

    });

    const thumb = new Swiper('.swiper-thumb', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      slidesPerView: 6,
      spaceBetween: 16,
    });

    const preview = new Swiper('.swiper-preview', {
      // Optional parameters
      direction: 'horizontal',
      spaceBetween: 16,

      thumbs: {
        swiper: thumb,
      },


    });
  </script>
</body>
