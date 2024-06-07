<aside id="sidebar" class="absolute -left-full transition-all lg:relative lg:left-0 h-full bg-sidebar text-white z-10 lg:basis-72 flex-shrink-0">
  <div class="">

    <h1 class="text-2xl font-bold px-10 py-6">FindHouseQuick</h1>

    <ul class="mt-10">
      <li class="px-10 relative before:absolute before:left-0 before:bg-white before:h-full before:w-1 before:rounded-full">
        <a href="#dashboard" class="transition-all py-3 px-5 flex items-center gap-4 shadow-side bg-white text-primary rounded-lg">
          <i icon-name="layout-dashboard" class="h-5 w-5"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#profile" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="user" class="h-5 w-5"></i> <span>Profile</span>
        </a>
      </li>
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <div class="group" x-data="{open: false}">
          <a href="#" @click="open=!open" class="group transition-all py-3 px-5 flex items-center gap-4 group-hover:bg-primary group-hover:bg-opacity-25 rounded-lg">
            <i icon-name="component" class="h-5 w-5"></i> <span>Account</span>
          </a>

          <ul class="bg-primary bg-opacity-25 rounded-md" x-cloak x-show="open" @click.outside="open=false">
            <li class="">
              <a href="#change_password" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Change Password</span>
              </a>
            </li>
            <li class="">
              <a href="#update_profile" class="flex items-center gap-4 py-2.5 px-5 text-sm text-gray-300 hover:text-white">
                <i icon-name="chevron-right" class="h-4 w-4"></i> <span>Update Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#new_property" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="landmark" class="h-5 w-5"></i> <span>New Property</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#view_tenants" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="users" class="h-5 w-5"></i> <span>View Tenants</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#view_listings" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="list" class="h-5 w-5"></i> <span>View Listings</span>
        </a>
      </li>

      <!-- <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full"> -->
      <!--   <a href="" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg"> -->
      <!--     <i icon-name="scroll" class="h-5 w-5"></i> <span>Documents</span> -->
      <!--   </a> -->
      <!-- </li> -->

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#messages" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="mails" class="h-5 w-5"></i> <span>Messages</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#view_complaints" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="fingerprint" class="h-5 w-5"></i> <span>View Complaints</span>
        </a>
      </li>
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#issue_notices" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="sticky-note" class="h-5 w-5"></i> <span>Issue Notices</span>
        </a>
      </li>
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#payments" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="banknote" class="h-5 w-5"></i> <span>Payments</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="../logout.php" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="log-out" class="h-5 w-5"></i> <span>Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
