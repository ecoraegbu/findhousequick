<?php
// require_once(dirname(__FILE__, 2) . '/Core/Init.php');
// $user = new User();
// if (!$user->isloggedin()) {
//   Redirect::to(BASE_URL);
// } else {
//   //check user authorization and redirect to appropriate page
//   // 
// }
?>
<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen" x-data="menu">
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