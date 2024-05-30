  <section class="px-8 pb-8">

    <div class="p-4 bg-white rounded-xl">

      <h1 class="text-gray-700 font-bold text-xl">Edit Profile</h1>
      <!-- <div class="flex justify-between">

      <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

    </div> -->

      <div class="mt-4 mb-2 bg-gray-100 p-4 rounded-xl">
        <div class="flex gap-4">
          <img class="w-40 aspect-square rounded-xl shadow-card" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YXZhdGFyfGVufDB8fDB8fHww" alt="user_profile_pic" />
          <div class="flex-1">
            <p class="font-bold text-lg">Sarah Reichert</p>
            <small class="text-gray-500 text-base">Estate Developer</small>

            <hr class="border-t border-slate-100 my-4" />
            <button class="px-4 py-2 text-white text-sm rounded-lg bg-error font-medium hover:bg-red-500">Delete Account</button>
          </div>
        </div>

      </div>

      <div class="flex flex-wrap flex-col md:flex-row gap-4">

        <div class="flex-1">

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Basic Informations</h2>

            <div class="grid grid-cols-2 gap-4">
              <div class="">
                <label for="name" class="text-sm text-gray-700 font-medium">First name</label>
                <input type="text" id="name" name="name" placeholder="Enter first name" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <label for="email" class="text-sm text-gray-700 font-medium">Last name</label>
                <input type="text" id="name" name="name" placeholder="Enter last name" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <label for="city" class="text-sm text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <label for="city" class="text-sm text-gray-700 font-medium">Phone</label>
                <input type="email" id="email" name="email" placeholder="Enter email" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <label for="city" class="text-sm text-gray-700 font-medium">Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <label for="city" class="text-sm text-gray-700 font-medium">DOB</label>
                <input type="email" id="email" name="email" placeholder="Enter email" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="">
                <span for="male" class="text-sm text-gray-700 font-medium">Gender</span>
                <div class="flex gap-4 mt-2">
                  <div class="flex items-center gap-x-2">
                    <label for="male" class="text-sm text-gray-700 font-medium">Male</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Female</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                </div>
              </div>

              <div class="">
                <span for="male" class="text-sm text-gray-700 font-medium">Marital Status</span>
                <div class="flex gap-4 mt-2">
                  <div class="flex items-center gap-x-2">
                    <label for="male" class="text-sm text-gray-700 font-medium">Single</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Married</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Divorced</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Widowed</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                </div>
              </div>

              <div class="">
                <span for="male" class="text-sm text-gray-700 font-medium">Employment Status</span>
                <div class="flex gap-4 mt-2">
                  <div class="flex items-center gap-x-2">
                    <label for="male" class="text-sm text-gray-700 font-medium">Employed</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Unemployed</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Self employed</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                </div>
              </div>

              <div class="">
                <label for="" class="text-sm text-gray-700 font-medium">State</label>
                <div class="flex items-center relative w-full">
                  <select name="" id="" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                    <option value="">Select</option>
                    <option value="">Land</option>
                    <option value="">Hotel</option>
                    <option value="">House</option>
                    <option value="">Shortlet</option>
                  </select>
                  <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
                </div>
              </div>

              <div class="">
                <label for="lga" class="text-sm text-gray-700 font-medium">LGA</label>
                <div class="flex items-center relative w-full">
                  <select name="" id="" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                    <option value="">Select</option>
                    <option value="">Land</option>
                    <option value="">Hotel</option>
                    <option value="">House</option>
                    <option value="">Shortlet</option>
                  </select>
                  <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
                </div>
              </div>

              <div class="">
                <span for="male" class="text-sm text-gray-700 font-medium">Religion</span>
                <div class="flex gap-4 mt-2">
                  <div class="flex items-center gap-x-2">
                    <label for="male" class="text-sm text-gray-700 font-medium">Christian</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Muslim</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                  <div class="flex items-center gap-x-2">
                    <label for="female" class="text-sm text-gray-700 font-medium">Others</label>
                    <input type="radio" id="email" name="email" placeholder="Enter email" class="">
                  </div>
                </div>
              </div>

            </div>

          </div>


          <div class="flex justify-between">

            <button class="px-6 py-3 mt-4 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Update</button>
            <button class="px-6 py-3 mt-4 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>


          </div>



        </div>
      </div>


    </div>


  </section>
