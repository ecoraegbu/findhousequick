<?php
require_once(dirname(__FILE__, 2) . '/Core/Init.php');
$property = new Property();
$properties = $property->get_all_property();
?>
<?php include('SiteAssets/Layout/Head.php') ?>

<link rel="stylesheet" href="./SiteAssets/Plugins/css/splide.min.css">

<title>Home | FindHouseQuick</title>
</head>

<body class="bg-slate-100">

  <header class="">
    <?php include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Hero Section -->
  <section class="">
    <div class="bg-primary md:bg-gradient-to-r md:from-primary md:via-primary md:to-primary-light overflow-hidden h-auto bg-cover">
      <div class="relative h-full flex items-end justify-between">
        <div class="px-10 py-8 md:px-11 flex items-center h-full">

          <div class="relative z-10 py-10">
            <h1 class="text-5xl font-bold text-white">Find Your Dream Home. </h1>
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
  <section class="px-5 md:px-10 my-5">
    <div class="max-w-7xl mx-auto">
      <!-- <span class="text-primary font-light text-lg">Our featured properties.</span>
      <h1 class="text-5xl font-bold text-text before:block before:bg-gray-100 before:h-48 before:w-36 before:absolute before:left-0 before:-mt-16 before:rounded-lg before:-z-10">Our Listings.</h1>
 -->

      <div class="flex flex-col lg:flex-row gap-12">
        <!-- For Desktop -->
        <div class="basis-80 hidden lg:block">

          <div class="sticky top-4 border z-50 border-gray-50 py-6 bg-gray-50 rounded-xl">
            <p class="text-xl text-slate-700 font-bold px-4">Categories</p>
            <hr class="my-4 border-t border-gray-200">
            <ul>
              <li class="border-b border-b-gray-100 py-2 flex gap-2.5 px-4 justify-between items-center group">
                <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                <div class="mr-auto">
                  <p class="text-slate-600 -mb-2">Lands</p>
                  <span class="text-slate-400 text-xs">24,000</span>
                </div>
                <i icon-name="chevron-right" class="h-4 w-4"></i>
                <div class="absolute top-0 left-full h-full group-hover:block hidden">
                  <ul class="bg-white w-80 h-full shadow-md rounded-xl p-4 divide-y overflow-auto">
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">500 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,000</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="border-b border-b-gray-100 py-2 flex gap-2.5 px-4 justify-between items-center group">
                <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                <div class="mr-auto">
                  <p class="text-slate-600 -mb-2">Hostels</p>
                  <span class="text-slate-400 text-xs">24,000</span>
                </div>
                <i icon-name="chevron-right" class="h-4 w-4"></i>
                <div class="absolute top-0 left-full h-full group-hover:block hidden">
                  <ul class="bg-white w-80 h-full shadow-md rounded-xl p-4 divide-y overflow-auto">
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">50 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,000</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="border-b border-b-gray-100 py-2 flex gap-2.5 px-4 justify-between items-center group">
                <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=ga1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                <div class="mr-auto">
                  <p class="text-slate-600 -mb-2">homes on sale</p>
                  <span class="text-slate-400 text-xs">24,000</span>
                </div>
                <i icon-name="chevron-right" class="h-4 w-4"></i>
                <div class="absolute top-0 left-full h-full group-hover:block hidden">
                  <ul class="bg-white w-80 h-full shadow-md rounded-xl p-4 divide-y overflow-auto">
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=ga1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">50 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,000</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=ga1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="border-b border-b-gray-100 py-2 flex gap-2.5 px-4 justify-between items-center group">
                <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                <div class="mr-auto">
                  <p class="text-slate-600 -mb-2">Homes for Rent</p>
                  <span class="text-slate-400 text-xs">24,000</span>
                </div>
                <i icon-name="chevron-right" class="h-4 w-4"></i>
                <div class="absolute top-0 left-full h-full group-hover:block hidden">
                  <ul class="bg-white w-80 h-full shadow-md rounded-xl p-4 divide-y overflow-auto">
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">50 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,000</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="border-b border-b-gray-100 py-2 flex gap-2.5 px-4 justify-between items-center group">
                <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                <div class="mr-auto">
                  <p class="text-slate-600 -mb-2">Shorlet Apartments</p>
                  <span class="text-slate-400 text-xs">24,000</span>
                </div>
                <i icon-name="chevron-right" class="h-4 w-4"></i>
                <div class="absolute top-0 left-full h-full group-hover:block hidden">
                  <ul class="bg-white w-80 h-full shadow-md rounded-xl p-4 divide-y overflow-auto">
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">50 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,000</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                    <li class="flex gap-x-0.5 items-center">
                      <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8" alt="">
                      <a href="" class="block p-2">
                        <p class="text-slate-600 -mb-2">100 x 100 plot of land</p>
                        <span class="text-slate-400 font-semibold text-xs">24,101</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

            </ul>
          </div>
        </div>

        <!-- End of Desktop -->

        <!-- For Mobile -->
        <div class="block lg:hidden mt-12">
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5">

            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/992/992651.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2 whitespace-nowrap">Post Ads</p>
            </div>
            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2">Lands</p>
            </div>
            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2">Hostels</p>
            </div>
            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2">Homes for Sale</p>
            </div>
            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2">Homes for Rent</p>
            </div>
            <div class="bg-white py-8 px-10 border border-primary-light flex-1">
              <img src="https://cdn-icons-png.freepik.com/256/15419/15419543.png?ga=GA1.1.1100886180.1716379876&semt=ais_hybrid" class="aspect-square w-8 mx-auto" alt="">
              <p class="font-semibold text-xs text-center mt-2">Shorlet Apartments</p>
            </div>
          </div>
        </div>

        <!-- End of Mobile -->

        <div class="flex-1">
          <div class="gap-4 flex-col md:flex-row hidden lg:flex">

            <div class="splide flex-1" data-splide='{"type":"loop"}' aria-label="Splide Basic HTML Example">
              <div class="splide__track">
                <ul class="splide__list">
                  <li class="splide__slide h-60 w-full">
                    <img src="https://images.unsplash.com/photo-1572120360610-d971b9d7767c?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGhvdXNlfGVufDB8fDB8fHww" alt="" class="w-full h-full object-cover">
                  </li>
                  <li class="splide__slide h-60 w-full">
                    <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aG91c2V8ZW58MHx8MHx8fDA%3D" alt="" class="w-full h-full object-cover">
                  </li>
                  <li class="splide__slide h-60 w-full">
                    <img src="https://plus.unsplash.com/premium_photo-1674518276501-d960d87424a0?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG91c2V8ZW58MHx8MHx8fDA%3D" alt="" class="w-full h-full object-cover">
                  </li>
                </ul>
              </div>
            </div>

            <div id="map" class="basis-60">
<!--               <a href="" class="block w-full h-full">
                <img src="https://images.unsplash.com/photo-1628260412297-a3377e45006f?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGljb24lMjBpbWFnZXN8ZW58MHx8MHx8fDA%3D" class="bg-purple-400 h-full w-full object-cover rounded-2xl" alt="Drop your image icon here">
              </a> -->
            </div>


          </div>

          <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 mt-10" id="property_display" >
            <!--  -->

          </div>

          <!-- <div class="text-center mt-16">
            <a href="" id="view_more" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">View More</a>
          </div> -->
          <div class="text-center mt-16">
              <button id="view_more" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">View More</button>
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
  <script>
    (g => {
      var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window;
      b = b[c] || (b[c] = {});
      var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => {
        await (a = m.createElement("script"));
        e.set("libraries", [...r] + "");
        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
        e.set("callback", c + ".maps." + q);
        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        d[q] = f; a.onerror = () => h = n(Error(p + " could not load."));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a)
      }));
      d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({
      key: "AIzaSyDpKzaLDH-Uvq3akmmeQmqU9Md3lTr-QTk",
      v: "weekly"
    });
  </script>
</body>
<script src="../javascript/navbar.js" defer></script>
<script src="../javascript/home.js" ></script>
<script src="../javascript/location.js" defer></script>
</html>
