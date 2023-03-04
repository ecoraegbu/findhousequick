<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto">
      <?php include('Layout/Header.php') ?>

      <!-- Tables-->
      <section class="px-8">

        <div class="p-4 bg-white rounded-xl">
          <h1 class="text-gray-700 font-bold">Buttons</h1>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Primary Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Small</button>
              <button class="px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Medium</button>
              <button class="px-8 py-3 text-white rounded-lg bg-primary font-medium hover:bg-blue-600">Large</button>
            </div>
          </div>


          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Secondary Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Small</button>
              <button class="px-6 py-3 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Medium</button>
              <button class="px-8 py-3 text-primary rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Large</button>
            </div>
          </div>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Success Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-success font-medium hover:bg-green-500">Small</button>
              <button class="px-6 py-3 text-white text-sm rounded-lg bg-success font-medium hover:bg-green-500">Medium</button>
              <button class="px-8 py-3 text-white rounded-lg bg-success font-medium hover:bg-green-500">Large</button>
            </div>
          </div>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Warning Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-warning font-medium hover:bg-yellow-500">Small</button>
              <button class="px-6 py-3 text-white text-sm rounded-lg bg-warning font-medium hover:bg-yellow-500">Medium</button>
              <button class="px-8 py-3 text-white rounded-lg bg-warning font-medium hover:bg-yellow-500">Large</button>
            </div>
          </div>

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Error Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-error font-medium hover:bg-red-500">Small</button>
              <button class="px-6 py-3 text-white text-sm rounded-lg bg-error font-medium hover:bg-red-500">Medium</button>
              <button class="px-8 py-3 text-white rounded-lg bg-error font-medium hover:bg-red-500">Large</button>
            </div>
          </div>


          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Disabled Buttons</h2>
            <div class="flex items-end gap-4">
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary opacity-50 font-medium cursor-not-allowed">Small</button>
              <button class="px-6 py-2 text-gray-500 text-sm rounded-lg bg-gray-200 opacity-50 font-medium cursor-not-allowed">Small</button>
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-success opacity-50 font-medium cursor-not-allowed">Small</button>
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-warning opacity-50 font-medium cursor-not-allowed">Small</button>
              <button class="px-6 py-2 text-white text-sm rounded-lg bg-error opacity-50 font-medium cursor-not-allowed">Small</button>

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