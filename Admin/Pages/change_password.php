<section class="px-8 pb-8">


  <div class="p-4 bg-white rounded-xl">

    <h1 class="text-gray-700 font-bold text-xl">Change Password</h1>
    <!-- <div class="flex justify-between">

      <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

    </div> -->


    <div class="flex flex-wrap flex-col md:flex-row gap-4">
      <div class="flex-1">
        <div class="mt-4">
          <h2 class="text-sm text-gray-400 font-bold mb-2">Please use a password you will remember</h2>

          <div class="grid gap-4">

            <div class="">
              <label for="password" class="text-sm text-gray-700 font-medium">New Password</label>
              <input type="text" id="password" name="password" placeholder="Enter new password" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="">
              <label for="confirm_password" class="text-sm text-gray-700 font-medium">Confirm New Password</label>
              <input type="text" id="confirm_password" name="confirm_password" placeholder="Enter new password confirmation" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

          </div>

        </div>


        <div class="flex justify-between mt-4">
          <button class="px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Change Password</button>
          <button class="px-6 py-3 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>
        </div>

      </div>
    </div>


  </div>


</section>


<script>
  var settings = {};
  new TomSelect('#tom-select-it', settings);
</script>
