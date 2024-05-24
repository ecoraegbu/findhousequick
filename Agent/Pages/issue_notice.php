<section class="px-8 pb-8">

  <div class="p-4 bg-white rounded-xl">

    <h1 class="text-gray-700 font-bold text-xl">Tenant Issue Notice</h1>
    <!-- <div class="flex justify-between">

      <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

    </div> -->

    <div class="mt-4 mb-2 bg-gray-100 p-4 rounded-xl">
      <div class="flex gap-4">
        <img class="w-40 aspect-square rounded-xl shadow-card" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YXZhdGFyfGVufDB8fDB8fHww" alt="user_profile_pic" />
        <div class="flex-1">
          <p class="font-bold text-lg">Sarah Reichert</p>
          <small class="text-gray-500 text-base">Estate Developer</small>

          <hr class="border-t border-slate-300 my-4" />
          <a href="?user_id=1#payments" class="px-4 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Payments</a>
        </div>
      </div>

    </div>

    <div class="flex flex-wrap flex-col md:flex-row gap-4">

      <div class="flex-1">

        <div class="mt-4">
          <h2 class="text-sm text-gray-400 font-bold mb-2">Notice Informations</h2>
            
          <div class="grid gap-4">
            <div class="">
              <label for="notice_type" class="text-sm text-gray-700 font-medium">Notice Type</label>
              <div class="flex items-center relative w-full">
                <select name="" id="" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Quick Notice</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>

            <div class="">
              <label for="notice_mgs" class="text-sm text-gray-700 font-medium">Notice Message</label>
              <textarea placeholder="Notice message" name="notice_mgs" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </textarea>
            </div>

          </div>

        </div>


        <div class="flex justify-between">
          <button class="px-6 py-3 mt-4 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>
        </div>



      </div>
    </div>


  </div>


</section>
