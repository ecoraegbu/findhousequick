<section class="px-8 pb-8">


  <div class="p-4 bg-white rounded-xl">

    <h1 class="text-gray-700 font-bold text-xl">Send New Message</h1>
    <!-- <div class="flex justify-between">

      <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

    </div> -->


    <div class="flex flex-wrap flex-col md:flex-row gap-4">
      <div class="flex-1">
        <div class="mt-4">
          <h2 class="text-sm text-gray-400 font-bold mb-2">Please be respectful in your messager</h2>

          <div class="grid gap-4">
            <div class="">
              <label for="notice_type" class="text-sm text-gray-700 font-medium">Users</label>
              <div class="flex items-center relative w-full">
                <input id="tom-select-it" class="w-full" placeholder="Select user" />
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>

            <div class="">
              <label for="subject" class="text-sm text-gray-700 font-medium">Subject</label>
              <input type="text" id="subject" name="subject" placeholder="Subject of the message" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="">
              <label for="message" class="text-sm text-gray-700 font-medium">Message</label>
              <textarea placeholder="Type your message here" name="message" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary"></textarea>
            </div>

            <div class="">
              <label for="uploads" class="text-sm text-gray-700 font-medium">Upload files</label>
              <input type="file" id="uploads" name="uploads" multiple class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

          </div>

        </div>


        <div class="flex justify-between mt-4">
          <button class="px-6 py-3 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add new message</button>
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
