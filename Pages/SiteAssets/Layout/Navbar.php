<nav class="px-4 py-3 bg-white">

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
        <!-- Account buttons -->
        <div class="relative" x-data="{ open: false }">
          <span @click="open = !open">
            <img class="size-12 object-cover rounded-full" src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fHww" />
          </span>

          <ul class="absolute top-full mt-2 right-0 py-2 rounded-lg bg-white shadow-card w-52" x-cloak x-show="open" @click.outside="open = false">
            <li class="">
              <a href="#" class="flex items-center gap-2 px-4 py-3 border-b border-gray-100 text-gray-400 hover:text-gray-700">
                <i icon-name="grid" class="h-4 w-4"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="">
              <a href="#" class="flex items-center gap-2 px-4 py-3 text-gray-400 hover:text-gray-700">
                <i icon-name="log-out" class="h-4 w-4"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li id="close" class="block md:hidden absolute top-4 right-4 text-gray-600">
        <i icon-name="x"></i>
      </li>
    </ul>



  </div>
</nav>
