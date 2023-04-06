<aside id="sidebar" class="absolute -left-full transition-all lg:relative lg:left-0 h-full bg-sidebar text-white z-10 lg:basis-72 flex-shrink-0">
  <div class="">

    <h1 class="text-2xl font-bold px-10 py-6">FindHouseQuick</h1>

    <ul class="mt-10">
      <li class="px-10 relative before:absolute before:left-0 before:bg-white before:h-full before:w-1 before:rounded-full">
        <a href="#" class="transition-all py-3 px-5 flex items-center gap-4 shadow-side bg-white text-primary rounded-lg">
          <i icon-name="layout-dashboard" class="h-5 w-5"></i> <span>Dashboard</span>
        </a>
      </li>

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>User Management:</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>New User</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>View User</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Users List</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
<!-- Dropdown End -->

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Property Management</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Banners</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Cards</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Buttons</span>
              </a>
            </li>

            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Modals</span>
              </a>
            </li>

            <li class="">
              <a href="Paginations.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Pagination</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
<!-- Dropdown End -->

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Support and Communication</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Messages</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Tickets</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Buttons</span>
              </a>
            </li>

            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Modals</span>
              </a>
            </li>

            <li class="">
              <a href="Paginations.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Pagination</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
<!-- Dropdown End -->

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Transaction Management</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Banners</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Cards</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Buttons</span>
              </a>
            </li>

            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Modals</span>
              </a>
            </li>

            <li class="">
              <a href="Paginations.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Pagination</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
<!-- Dropdown End -->

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Analytics and Reporting</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Banners</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Cards</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Buttons</span>
              </a>
            </li>

            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Modals</span>
              </a>
            </li>

            <li class="">
              <a href="Paginations.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Pagination</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      
<!-- Dropdown End -->

      <!-- Dropdown -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Security and Privacy</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="Alerts.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Banners</span>
              </a>
            </li>
            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Cards</span>
              </a>
            </li>

            <li class="">
              <a href="Buttons.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Buttons</span>
              </a>
            </li>

            <li class="">
              <a href="" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Modals</span>
              </a>
            </li>

            <li class="">
              <a href="Paginations.php" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Pagination</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      
<!-- Dropdown End -->


      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="log-out" class="h-5 w-5"></i> <span>Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
</aside>