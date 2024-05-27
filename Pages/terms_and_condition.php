<?php require_once(dirname(__FILE__, 2) . '/Core/Init.php'); ?>
<?php include('SiteAssets/Layout/Head.php') ?>

<title>Terms and Conditions | FindHouseQuick</title>
</head>
<div></div>

<body class="">

  <header class="">
    <?php include('SiteAssets/Layout/Navbar.php') ?>
  </header>

  <!-- Contact Us -->
  <section class="px-8 md:px-16 my-20">
    <!-- Wrapper -->
    <div class="max-w-6xl mx-auto">
      <hdgroup>
        <h1 class="text-slate-700 font-bold tracking-tighter text-2xl">Terms and Conditions</h1>
        <hr class="border-t border-slate-200 my-4" />
        <h2 class="text-slate-500 font-bold tracking-tighter text-xl">3 bedroom flat duplex</h2>
      </hdgroup>
      <div class="mt-4">
        <p class="text-slate-500">
          Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.
        </p>
      </div>
      <div class="mt-10 flex gap-4">
        <a href="" class="px-6 py-3 text-white bg-primary inline-block rounded-lg hover:bg-blue-600">Accept terms and conditions</a>
        <a href="" class="px-6 py-3 text-primary bg-primary-light inline-block rounded-lg hover:bg-blue-100">Download terms and conditions</a>
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
