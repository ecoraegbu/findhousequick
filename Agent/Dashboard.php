<?php
require_once(dirname(__FILE__, 2) . '/Core/Init.php');

?>
<?php include('Layout/Head.php') ?>

<body>
<div id="loading-indicator" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50" style="display:none;">
    <div class="loader border-t-4 border-b-4 border-blue-500 h-12 w-12 rounded-full animate-spin"></div>
  </div>

  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto">
      <?php include('Layout/Header.php') ?>

      <div id="content">


      </div>

    </main>

  </div>



  <?php include('Layout/Footer.php') ?>
</body>

</html>