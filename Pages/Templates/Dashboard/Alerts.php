<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto pb-8">
      <?php include('Layout/Header.php') ?>

      <!-- Tables-->
      <section class="px-8">

        <div class="p-4 bg-white rounded-xl">
          <h1 class="text-gray-700 font-bold">Alerts</h1>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Solid Banners</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 items-end gap-4">
              <div class="bg-primary p-4 rounded-lg text-white flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Did you know?</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-success p-4 rounded-lg text-white flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Congratulations</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-warning p-4 rounded-lg text-white flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Warning</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-error p-4 rounded-lg text-white flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Errors</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>

            </div>
          </div>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Outline Banners</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 items-end gap-4">
              <div class="bg-primary-light border p-4 rounded-lg text-primary flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Did you know?</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-success-light p-4 rounded-lg text-success flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Congratulations</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-warning-light p-4 rounded-lg text-warning flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Warning</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-error-light p-4 rounded-lg text-error flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Errors</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>

            </div>
          </div>



          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Outline Banners With Border</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 items-end gap-4">
              <div class="bg-primary-light p-4 rounded-lg border border-primary text-primary flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Did you know?</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-success-light p-4 rounded-lg border border-success text-success flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Congratulations</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-warning-light p-4 rounded-lg border border-warning text-warning flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Warning</p>
                  <p class="text-sm">You can switch between artboards</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>
              <div class="bg-error-light p-4 rounded-lg border border-error text-error flex justify-between items-center gap-4">
                <div class="">
                  <p class="font-bold -mb-1">Errors</p>
                  <p class="text-sm">Your OS has been upgraded to the latest version</p>
                </div>
                <i icon-name="x" class="h-4 w-4"></i>
              </div>

            </div>
          </div>

        </div>


      </section>

      <!-- Tables End -->


    </main>

  </div>


  <?php include('Layout/Footer.php') ?>
</body>

</html>