<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto">
      <?php include('Layout/Header.php') ?>

      <!-- Start -->
      <section class="px-8 pb-8">

        <div class="p-4 bg-white rounded-xl">
          <h1 class="text-gray-700 font-bold">Forms</h1>

          <div class="flex flex-wrap flex-col md:flex-row gap-4">

            <div class="flex-1">

              <div class="mt-4">
                <h2 class="text-sm text-gray-400 font-bold -mb-1">Text Input</h2>

                <small class="text-gray-500 font-medium inline-block mb-2">Focus and hover effects</small>


                <div class="">
                  <label for="" class="text-sm text-gray-700 font-medium">Default Input</label>
                  <input type="text" placeholder="Placeholder text" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>
                <div class="mt-2">
                  <label for="" class="text-sm text-gray-700 font-medium">Disabled Input</label>
                  <input type="text" disabled placeholder="Placeholder text" class="cursor-not-allowed disabled:bg-gray-200 text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

              </div>


              <div class="mt-4">
                <h2 class="text-sm text-gray-400 font-bold -mb-1">Select Input</h2>

                <small class="text-gray-500 font-medium inline-block mb-2">Focus and hover effects</small>

                <div class="">
                  <label for="" class="text-sm text-gray-700 font-medium">Default Input</label>
                  <div class="flex items-center relative w-full">
                    <select name="" id="" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                      <option value="">Select</option>
                      <option value="">Option 1</option>
                      <option value="">Option 2</option>
                    </select>
                    <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
                  </div>
                </div>

                <div class="mt-2">
                  <label for="" class="text-sm text-gray-700 font-medium">Default Input</label>
                  <div class="flex items-center relative w-full">
                    <select name="" id="" disabled class="cursor-not-allowed disabled:bg-gray-200 bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                      <option value="">Select</option>
                      <option value="">Option 1</option>
                      <option value="">Option 2</option>
                    </select>
                    <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
                  </div>
                </div>

              </div>
            </div>

            <div class="flex-1">


              <div class="mt-4">
                <h2 class="text-sm text-gray-400 font-bold -mb-1">Text Input Errors</h2>

                <small class="text-gray-500 font-medium inline-block mb-2">Border and text effects</small>


                <div class="">
                  <label for="" class="text-sm text-gray-700 font-medium">Only Input Border</label>
                  <input type="text" placeholder="Placeholder text" class="text-sm border-2 border-red-500 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>
                <div class="mt-2">
                  <label for="" class="text-sm text-gray-700 font-medium">Only Input Text</label>
                  <input type="text" placeholder="Placeholder text" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <small class="text-red-500">Please this field is required</small>
                </div>

                <div class="mt-2">
                  <label for="" class="text-sm text-gray-700 font-medium">Both Input Border and Text</label>
                  <input type="text" placeholder="Placeholder text" class="text-sm border-2 border-red-500 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <small class="text-red-500">Please this field is required</small>
                </div>
              </div>
            </div>
          </div>


        </div>


      </section>

      <!-- End -->


    </main>

  </div>


  <?php include('Layout/Footer.php') ?>
</body>

</html>