<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto">
      <?php include('Layout/Header.php') ?>

      <!-- Start -->
      <section class="px-8">

        <div class="p-4 bg-white rounded-xl">
          <h1 class="text-gray-700 font-bold">Paginations</h1>

          <div class="mt-4">
            <ul class="flex justify-between gap-4 font-medium">
              <li class="mr-auto">
                <a href="" class="text-primary inline-block bg-main p-2 rounded-lg">
                  <i icon-name="chevrons-left" class="h-5 w-5"></i>
                </a>
              </li>

              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  1
                </a>
              </li>
              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  2
                </a>
              </li>
              <!-- Active class -->
              <li>
                <a href="" class="inline-block bg-primary text-white text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  3
                </a>
              </li>
              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  4
                </a>
              </li>
              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  5
                </a>
              </li>
              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  ...
                </a>
              </li>
              <li>
                <a href="" class="text-primary inline-block bg-main text-sm py-2 px-4 rounded-lg hover:bg-primary hover:text-white">
                  100
                </a>
              </li>

              <li class="ml-auto">
                <a href="" class="text-primary inline-block bg-main p-2 rounded-lg">
                  <i icon-name="chevrons-right" class="h-5 w-5"></i>
                </a>
              </li>
            </ul>
          </div>

        </div>


      </section>

      <!-- End -->


    </main>

  </div>


  <?php include('Layout/Footer.php') ?>
</body>

</html>