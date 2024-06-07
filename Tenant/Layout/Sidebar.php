<aside id="sidebar" class="absolute -left-full transition-all lg:relative lg:left-0 h-full bg-sidebar text-white z-10 lg:basis-72 flex-shrink-0">
  <div class="">

    <h1 class="text-2xl font-bold px-10 py-6">FindHouseQuick</h1>

    <ul class="mt-10">
      <li class="px-10 relative before:absolute before:left-0 before:bg-white before:h-full before:w-1 before:rounded-full">
        <a href="#dashboard" class="transition-all py-3 px-5 flex items-center gap-4 shadow-side bg-white text-primary rounded-lg">
          <i icon-name="layout-dashboard" class="h-5 w-5"></i> <span>Dashboard</span>
        </a>
      </li>
      <!-- view profile -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#profile" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>View Profile</span>
        </a>
      </li>
      <!-- send receive and read messages in the database, deleted messages will be marked with
          a number in the field deleted, this would make the message unavailable to the tenant but the 
        record will remain. -->
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
        <a href="#messages" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>Messages</span>
        </a>
      </li>

      <!-- apartment history i.e all the apartments the tenants have lived in before -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>Apartment History</span>
        </a>
      </li>


      <!-- view details of rent such as date paid, expiry, rent amount etc. -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#rent_details" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>Rent Details</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#view_complaints" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="fingerprint" class="h-5 w-5"></i> <span>Complaints</span>
        </a>
      </li>

      <!-- upload required documents and view the uploads -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>Uploads</span>
        </a>
      </li>
      <!-- make payments and download receipts -->
      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="#payments" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="table" class="h-5 w-5"></i> <span>Payments</span>
        </a>
      </li>

      <li class="px-10 relative hover:before:absolute hover:before:left-0 hover:before:bg-primary hover:before:bg-opacity-25 hover:before:h-full hover:before:w-1 hover:before:rounded-full">
        <a href="" class="transition-all py-3 px-5 flex items-center gap-4 hover:bg-primary hover:bg-opacity-25 rounded-lg">
          <i icon-name="log-out" class="h-5 w-5"></i> <span>Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
