<nav class="px-4 py-3">

  <div class="flex justify-between items-center max-w-7xl mx-auto">
    <!-- Logo -->
    <div class="text-2xl text-primary font-semibold mr-auto">FindHouseQuick</div>

    <!-- Menu Icon -->
    <div id="menu" class="border border-gray-100 p-2 rounded-md cursor-pointer block md:hidden">
      <i icon-name="menu" class="text-primary"></i>
    </div>

    <!-- Navbar -->
    <ul id="navbar" class="items-center text-xl md:text-base gap-y-8 md:gap-6 inset-0 bg-white z-50 fixed md:relative hidden md:flex flex-col md:flex-row justify-center flex-1 text-center">
      <li class="md:ml-auto">
        <a href="home.php" class="text-gray-500 hover:text-primary">Home</a>
      </li>
      <li class="">
        <a href="listings.php" class="text-gray-500 hover:text-primary">Listings</a>
      </li>
      <li class="">
        <a href="about.php" class="text-gray-500 hover:text-primary">About Us</a>
      </li>
      <li class="">
        <a href="contact.php" class="text-gray-500 hover:text-primary">Get In Touch</a>
      </li>
      <li class="md:ml-auto items-center gap-6 md:flex">
        <!-- <a href="" class="bg-primary p-2 rounded-md inline-block">
          <i icon-name="search" class="h-4 w-4 text-white"></i>
        </a> -->

        <!-- Authentication buttons -->
        <div class="mt-4 md:mt-0 flex gap-4">
          <a href="../login.php" class="border border-primary text-primary font-medium px-4 py-2 rounded-md hover:bg-primary hover:text-white">Login</a>
          <a href="../register.php" class="bg-primary text-white font-medium px-4 py-2 rounded-md hover:bg-blue-600">Register</a>
        </div>
      </li>
      <li id="close" class="block md:hidden absolute top-4 right-4 text-gray-600">
        <i icon-name="x"></i>
      </li>
    </ul>



  </div>
</nav>