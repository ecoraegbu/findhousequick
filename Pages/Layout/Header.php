<header>
  <div class="flex gap-8 py-4 px-8 justify-between">
    <div class="lg:hidden flex items-center gap-2 text-gray-400 text-sm">
      <i icon-name="menu" class="h-5 w-5" id="menu"></i>
    </div>

    <div class="flex items-center gap-2 text-gray-400 text-sm">
      <i icon-name="search" class="h-5 w-5"></i>
      <span class="hidden sm:block">Tap to search</span>
    </div>

    <div class="flex items-center gap-2 ml-auto relative group" x-cloak x-data="{open:false}">
      <i icon-name="bell" class="h-5 w-5 text-primary cursor-pointer" @click="open=!open"></i>

      <ul class="absolute top-full -right-6 rounded-lg bg-white shadow-sidebar w-60 p-4" x-show="open" @click.outside="open=false">
        <li class="text-gray-400 text-sm font-bold flex items-center gap-2 justify-center">
          <i icon-name="bell-off" class="w-5 h-5"></i> Notification Empty
        </li>
      </ul>
    </div>

    <div class="flex items-center gap-3 text-sm relative" x-data="{open: false}">
      <img src="./../Assets/login.jpg" class="object-cover h-8 w-8 bg-primary rounded-full" alt="">
      <div class="" @click="open=!open">
        <p class="font-semibold -mb-1">Sarah Reichert</p>
        <small class="text-gray-400">Estate developer</small>
      </div>
      <ul class="bg-white py-2 shadow-sm absolute top-full right-0 mt-3 w-40 rounded-lg" x-cloak x-show="open" @click.outside="open=false">
        <li class="border-b border-gray-100">
          <a href="" class="px-4 py-2.5 inline-block  text-gray-400 hover:text-gray-600">Profile</a>
        </li>

        <li class="">
          <a href="" class="px-4 py-2.5 inline-block  text-gray-400 hover:text-gray-600">Logout</a>
        </li>
      </ul>
    </div>

  </div>
</header>