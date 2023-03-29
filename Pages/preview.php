<?php 
include('SiteAssets/Layout/Head.php') ;
require_once(dirname(__FILE__,2).'/Core/Init.php');
if(Input::exists()){
  $property_id = Input::get('property');
  $property = new Property();
  $house = $property->get_property_details($property_id);
  $images = json_decode($house->images);
  $pictures = [];
  // Define the document root of your web server
$document_root = 'C:\wamp64\www\findhousequick';
    foreach ($images as $name => $value){
      // Define the file path to be converted
      $file_path = $images->{$name};
      // Remove the document root from the beginning of the file path
      $file_path = str_replace($document_root, '', $file_path);
      // Prepend '../' to the file path
      $relative_path = '..' . $file_path;
      $pictures[$name] = $relative_path;
    }
}
?>


<title>Preview | FindHouseQuick</title>
</head>

<body class="">

  <header class="">
    <?php //include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Preview Section -->
  <section class="px-4">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-8">
      <!-- Slider with thumbnail -->
      <div class="">
        <div class="swiper swiper-preview">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?php echo $pictures['profile-pic']; ?>" class="w-full h-[460px] object-cover rounded-2xl" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo $pictures['bedroom-pic']; ?>" class="w-full h-[460px] object-cover rounded-2xl" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo $pictures['parlor-pic']; ?>" class="w-full h-[460px] object-cover rounded-2xl" alt="">
            </div>
          </div>
        </div>

        <!-- Thumbnail use php to programmatically create the slide. for the number of pictures in the picture array/ the size of the array. -->
        <div thumbsSlider="" class="swiper swiper-thumb flex flex-wrap gap-4 mt-4">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?php echo $pictures['profile-pic']; ?>" class="aspect-square w-24  object-cover rounded-md" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo $pictures['bedroom-pic']; ?>" class="aspect-square w-24 object-cover rounded-md" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo $pictures['parlor-pic']; ?>" class="aspect-square w-24 object-cover rounded-md" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="">

        <!-- Status Card -->
        <div class="">
          <!-- Available -->
          <span class="bg-success-light text-success px-2 py-1.5 text-sm rounded-md"><?php echo $house->status;?></span>
          <!-- For Sale -->
          <span class="bg-primary-light text-primary px-2 py-1.5 text-sm rounded-md ml-2"><?php echo $house->purpose;?></span>
          <!-- For Rent -->
          <!-- <span class="bg-purple-100 text-purple-700 px-2 py-1.5 text-sm rounded-md ml-2">For Rent</span> -->
          <!-- Not Available -->
          <!-- <span class="bg-error-light text-error px-2 py-1.5 text-sm rounded-md ml-2">Not Available</span> -->
        </div>

        <h1 class="text-5xl text-text font-bold mt-4 mb-5"><?php echo $house->type . ', '. $house->city?></h1>
        <p class="text-gray-600 font-light text-lg"><?php echo $house->description?>.</p>


        <div class="flex flex-wrap gap-4 mt-10">
          <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
            <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl"><?php echo $house->toilets;?></span>
            <span class="text-gray-600">Toilets</span>
          </div>
          <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
            <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl"><?php echo $house->bathrooms;?></span>
            <span class="text-gray-600">Bathrooms</span>
          </div>
          <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
            <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl"><?php echo $house->bedrooms;?></span>
            <span class="text-gray-600">Rooms</span>
          </div>
          <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
            <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">08</span>
            <span class="text-gray-600">Parkings</span>
          </div>
          <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
            <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">03</span>
            <span class="text-gray-600">Sitting room</span>
          </div>

        </div>


        <div class="mt-10">
          <p class="text-primary text-2xl font-bold"><?php echo $house->price;?> <small class="text-gray-500 font-normal">/ Per year</small></p>
        </div>

        <div class="mt-2">
          <a href="" class="bg-primary text-white px-6 py-3 inline-block rounded-lg hover:bg-blue-600">Rent Now</a>
          <a href="" class="bg-gray-100 text-primary px-6 py-3 inline-block rounded-lg ml-2 hover:bg-gray-200">Call Us</a>
        </div>

      </div>
    </div>
  </section>
  <!-- Preview End -->


  <!-- Listings Section -->
  <section class="px-10 sm:px-20 md:px-10 my-20">
    <div class="max-w-6xl mx-auto">
      <span class="text-primary font-light text-lg">More Listings.</span>
      <h1 class="text-5xl font-bold text-text before:block before:bg-gray-100 before:h-48 before:w-36 before:absolute before:left-0 before:-mt-16 before:rounded-lg before:-z-10">Similar Listings.</h1>


      <!-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-10"> -->


      <!-- Slider main container -->
      <div class="swiper swiper-similar mt-10">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

          <!-- Slides -->


          <div class="swiper-slide border border-gray-100 p-4 rounded-lg bg-white group">
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



          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>


          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1974596/pexels-photo-1974596.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>


          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/1022936/pexels-photo-1022936.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/2128329/pexels-photo-2128329.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

          <div class="swiper-slide border border-gray-100 p-4 rounded-lg  bg-white">
            <img src="https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600" class="aspect-square object-cover rounded-lg" alt="">

            <h2 class="mt-3 text-text font-semibold text-xl">Real Bluestyle house</h2>
            <p class="text-sm text-gray-400 -mt-1">San Diego, California USA</p>

            <p class="text-primary font-semibold mt-1 text-xl">N3,000,000 <small class="text-gray-500 font-normal">/yearly</small></p>
          </div>

        </div>


        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>



      </div>

      <div class="text-center mt-16">
        <a href="" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">View More</a>
      </div>

    </div>

  </section>

  <!-- Listing End -->



  <?php include('SiteAssets/Layout/Footer.php') ?>
  <!-- Slide -->
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