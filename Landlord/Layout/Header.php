<header>
  <div class="flex gap-8 py-4 px-8 justify-between">
    <div class="lg:hidden flex items-center gap-2 text-gray-400 text-sm">
      <i icon-name="menu" class="h-5 w-5" id="menu"></i>
    </div>

    <div class="flex items-center gap-2 text-gray-400 text-sm">
      <i icon-name="search" class="h-5 w-5"></i>
      <span class="hidden sm:block">Tap to search</span>
    </div>

    <div class="flex items-center gap-2 ml-auto relative group">
      <i icon-name="bell" class="h-5 w-5 text-primary cursor-pointer"></i>

      <ul class="absolute top-full -right-6 rounded-lg bg-white shadow-sidebar w-60 p-4 hidden group-hover:block">
        <!-- <li>
          <a href="" class="">HG</a>
        </li> -->
        <li class="text-gray-400 text-sm font-bold flex items-center gap-2 justify-center">
          <i icon-name="bell-off" class="w-5 h-5"></i> Notification Empty
        </li>
      </ul>
    </div>

    <div class="relative" x-data="{ open: false }">
      <div class="flex items-center gap-3 text-sm">
        <img src="./../Assets/login.jpg" class="object-cover h-8 w-8 bg-primary rounded-full" alt="">
        <div class="cursor-pointer" @click="open = !open">
          <p class="font-semibold -mb-1">Sarah Reichert</p>
          <small class="text-gray-400">Estate developer</small>
        </div>


        <ul class="absolute top-full mt-2 right-0 py-2 rounded-lg bg-white shadow-sm w-52" x-cloak x-show="open" @click.outside="open = false">
          <li class="">
            <a href="#" class="flex gap-2 px-4 py-3 border-b border-gray-100 text-gray-400 hover:text-gray-700">
              <i icon-name="user" class="h-4 w-4"></i>
              <span>Profile</span>
            </a>
          </li>

          <li class="">
            <a href="#" class="flex gap-2 px-4 py-3 text-gray-400 hover:text-gray-700">
              <i icon-name="log-out" class="h-4 w-4"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</header>