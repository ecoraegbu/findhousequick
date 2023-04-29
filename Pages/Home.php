<?php
require_once(dirname(__FILE__, 2) . '/Core/Init.php');
$property = new Property();
$properties = $property->get_all_property();
?>
<?php include('SiteAssets/Layout/Head.php') ?>

<link rel="stylesheet" href="./SiteAssets/Plugins/css/splide.min.css">

<title>Home | FindHouseQuick</title>
</head>

<body class="">

  <header class="">
    <?php include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="">
    <div class="bg-primary md:bg-gradient-to-r md:from-primary md:via-primary md:to-primary-light overflow-hidden h-auto bg-cover">
      <div class="relative h-full flex items-end justify-between">
        <div class="px-10 py-8 md:px-11 flex items-center h-full">
          <div class="relative z-10 py-10">
            <h1 class="text-5xl font-bold text-white ">
              Find Your Dream Home. </h1>
            <!-- <p class="max-w-lg mt-4 mb-8 text-white ">
              We are a real estate agency that will help you find the best residence you dream of, let's
              discuss for your dream house!
            </p> -->

            <div class="relative flex items-center max-w-md mt-10">
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
  <section class="px-10 sm:px-20 md:px-10 my-5">
    <div class="max-w-7xl mx">
      <!-- <span class="text-primary font-light text-lg">Our featured properties.</span>
      <h1 class="text-5xl font-bold text-text before:block before:bg-gray-100 before:h-48 before:w-36 before:absolute before:left-0 before:-mt-16 before:rounded-lg before:-z-10">Our Listings.</h1>
 -->

      <div class="flex gap-12">

        <div class="basis-60 hidden lg:block">
          <div class="sticky top-0 z-10 py-4 shadow-md bg-gray-50 w-1">
            <p class="text-xl text-slate-700 font-medium px-10">Categories</p>
            <ul>
            <li class="group px-4">
                <div class="border-b group-hover border-b-gray-200 py-2 flex justify-between items-center">
                  <div class="">

                    <p class="text-slate-400 -mb-1 p-5">Lands</p>
                    <span class="text-slate-600"></span>

                  </div>
                  <div class="">
                    <i icon-name="chevron-right" class="h-4 w-4"></i>
                  </div>
                </div>

                <div class="absolute hidden shadow-lg bg-white group-hover:block top-0 left-full h-auto w-60">
                  
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                </div>
              </li>
              <li class="group px-4">
                <div class="border-b group-hover border-b-gray-200 py-2 flex justify-between items-center">
                  <div class="">

                    <p class="text-slate-400 -mb-1 p-5">Hotels</p>
                    <span class="text-slate-600"></span>

                  </div>
                  <div class="">
                    <i icon-name="chevron-right" class="h-4 w-4"></i>
                  </div>
                </div>

                <div class="absolute hidden shadow-lg bg-white group-hover:block top-0 left-full h-auto w-60">
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">5 star Hotels</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">4 star Hotels</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">3 star Hotels</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Motels</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                </div>
              </li>

              <li class="group px-4">
                <div class="border-b group-hover border-b-gray-200 py-2 flex justify-between items-center">
                  <div class="">

                    <p class="text-slate-400 -mb-1 p-5">Homes on Sale</p>
                    <span class="text-slate-600"></span>

                  </div>
                  <div class="">
                    <i icon-name="chevron-right" class="h-4 w-4"></i>
                  </div>
                </div>

                <div class="absolute hidden shadow-lg bg-white group-hover:block top-0 left-full h-auto w-60">
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                </div>
              </li>
              <li class="group px-4">
                <div class="border-b group-hover border-b-gray-200 py-2 flex justify-between items-center">
                  <div class="">

                    <p class="text-slate-400 -mb-1 p-5">Homes For Rent</p>
                    <span class="text-slate-600"></span>

                  </div>
                  <div class="">
                    <i icon-name="chevron-right" class="h-4 w-4"></i>
                  </div>
                </div>

                <div class="absolute hidden shadow-lg bg-white group-hover:block top-0 left-full h-auto w-60">
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                </div>
              </li>
                            <li class="group px-4">
                <div class="border-b group-hover border-b-gray-200 py-2 flex justify-between items-center">
                  <div class="">

                    <p class="text-slate-400 -mb-1 p-5">Shorlet Apartments</p>
                    <span class="text-slate-600"></span>

                  </div>
                  <div class="">
                    <i icon-name="chevron-right" class="h-4 w-4"></i>
                  </div>
                </div>

                <div class="absolute hidden shadow-lg bg-white group-hover:block top-0 left-full h-auto w-60">
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                  <div class="group-hover px-4 py-2">
                    <p class="text-slate-400 -mb-1">Cars</p>
                    <span class="text-slate-600">24,000 ads</span>
                  </div>
                </div>
              </li>
              


              
            </ul>
          </div>
        </div>


        <div class="flex-1">

          <div class="splide" data-splide='{"type":"loop"}' aria-label="Splide Basic HTML Example">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide h-60 w-full">
                  <img src="https://images.pexels.com/photos/2581922/pexels-photo-2581922.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="w-full h-full object-cover">
                </li>
                <li class="splide__slide h-60 w-full">
                  <img src="https://images.pexels.com/photos/7193708/pexels-photo-7193708.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="w-full h-full object-cover">
                </li>
                <li class="splide__slide h-60 w-full">
                  <img src="https://images.pexels.com/photos/16082425/pexels-photo-16082425.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="w-full h-full object-cover">

                </li>
              </ul>
            </div>
          </div>


          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-10">
            <?php
            foreach ($properties as $property) : ?>
              <?php $urls = json_decode($property->images);


              // Define the document root of your web server
              $document_root = 'C:\wamp64\www\findhousequick';

              // Define the file path to be converted
              $file_path = $urls->{'profile-pic'};

              // Remove the document root from the beginning of the file path
              $file_path = str_replace($document_root, '', $file_path);

              // Replace backslashes with forward slashes
              //$file_path = str_replace('\\', '/', $file_path);

              // Prepend '../' to the file path
              $relative_path = '..' . $file_path;


              ?>

              <div class="shadow-card p-4 rounded-lg bg-white group transition-all">
                <div class="relative">
                  <img src="<?= $relative_path ?>" class="aspect-video object-cover w-full rounded-lg" alt="">
                  <div class="w-full h-full bg-black bg-opacity-50 opacity-0  group-hover:opacity-100 absolute inset-0 rounded-lg p-2 transition-all">
                    <div class="flex flex-wrap gap-1">
                      <span class="bg-primary text-white px-2 py-1.5 text-xs rounded-md"><?= ucfirst($property->status) ?></span>
                      <span class="bg-success text-white px-2 py-1.5 text-xs rounded-md"><?= ucfirst($property->purpose) ?></span>
                      <!-- <span class="bg-purple-700 text-white px-2 py-1.5 text-sm rounded-md">For Rent</span>
                  <span class="bg-error text-white px-2 py-1.5 text-sm rounded-md">Occupied</span> -->
                    </div>
                  </div>
                </div>

                <a href="preview.php?property= <?= $property->id ?>" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="<?= $property->type . ', ' . $property->city; ?>"><?= $property->type . ', ' . $property->city; ?>.</a>
                <p class="text-sm text-gray-400 -mt-1"><?= $property->city . ', ' . $property->state; ?></p>

                <p class="text-primary font-semibold mt-1 text-xl">&#x20A6;<?= number_format($property->price, 2) ?><small class="text-gray-500 font-normal"></small>
                </p>
              </div>


            <?php endforeach; ?>


          </div>

          <div class="text-center mt-16">
            <a href="" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">View More</a>
          </div>
        </div>
      </div>




    </div>

  </section>



  <!-- Listing End -->

  <?php include('SiteAssets/Layout/Footer.php') ?>

  <script src="./SiteAssets/Plugins/js/splide.min.js"></script>

  <script>
    new Splide('.splide').mount();

    // const swiper = new Swiper('.swiper', {
    //   direction: 'vertical',
    //   loop: true,

    //   navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    //   },


    // });
  </script>
</body>