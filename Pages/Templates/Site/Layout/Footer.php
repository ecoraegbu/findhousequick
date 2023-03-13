  <footer class="p-4 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
      <nav class="">

        <div class="md:flex text-center md:text-left justify-between items-start md:items-center">
          <!-- Logo -->
          <div class="text-2xl text-primary font-semibold">FindHouseQuick</div>


          <!-- Navbar -->
          <ul class="items-center gap-6 block md:flex my-10 md:my-0">
            <li class="">
              <a href="" class="text-gray-500 hover:text-gray-700">Home</a>
            </li>
            <li class="">
              <a href="" class="text-gray-500 hover:text-gray-700">About Us</a>
            </li>
            <li class="">
              <a href="" class="text-gray-500 hover:text-gray-700">Get In Touch</a>
            </li>
            <li class="">
              <a href="" class="text-gray-500 hover:text-gray-700">Login</a>
            </li>
            <li class="">
              <a href="" class="text-gray-500 hover:text-gray-700">Register</a>
            </li>
          </ul>

          <div class="items-center gap-6 block md:flex">
            <!-- Social Icons -->
            <a href="" class="bg-primary p-2 rounded-md inline-block">
              <i icon-name="facebook" class="h-4 w-4 text-white"></i>
            </a>

            <a href="" class="bg-primary p-2 rounded-md inline-block">
              <i icon-name="instagram" class="h-4 w-4 text-white"></i>
            </a>

          </div>


        </div>
      </nav>
    </div>


    <div class="max-w-7xl mx-auto flex justify-between border-t border-gray-100 mt-4 pt-4">
      <div class="text-gray-400">2020 FindHouseQuick. All Rights Reserved</div>
      <div class="">
        <span class="bg-primary text-white inline-block p-2 rounded-lg scrollTop">
          <i icon-name="chevron-up" class="h-5 w-5"></i>
        </span>
      </div>
    </div>
  </footer>


  <!-- Development version -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  <!-- Production version -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <script>
    lucide.createIcons();

    const scrollUp = document.querySelector('.scrollTop');

    scrollUp.addEventListener('click', function() {
      scrollTo({
        behavior: 'smooth',
        top: 0
      })
    })
  </script>