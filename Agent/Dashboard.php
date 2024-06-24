<?php
require_once(dirname(__FILE__, 2) . '/Core/Init.php');

?>
<?php include('Layout/Head.php') ?>

<body>
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