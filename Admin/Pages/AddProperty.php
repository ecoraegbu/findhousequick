<section class="px-8 pb-8">

  <div class="p-4 bg-white rounded-xl">

    <h1 class="text-gray-700 font-bold">Add Property</h1>


    <div class="flex flex-wrap flex-col md:flex-row gap-4">

      <div class="flex-1">

        <div class="mt-4">
          <h2 class="text-sm text-gray-400 font-bold mb-2">Property Informations</h2>

          <div class="flex flex-wrap gap-4">

            <div class="flex-1 basis-96">
              <label for="property_type" class="text-sm text-gray-700 font-medium">Property Type</label>
              <div class="flex items-center relative w-full">
                <select name="property_type" id="property_type" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>

            <div class="flex-1 basis-96">
              <label for="address" class="text-sm text-gray-700 font-medium">Address</label>
              <input type="text" id="address" name="address" placeholder="Name" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>


            <div class="flex-1 basis-96">
              <label for="city" class="text-sm text-gray-700 font-medium">City</label>
              <div class="flex items-center relative w-full">
                <select name="city" id="city" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Benin</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>


            <div class="flex-1 basis-96">
              <label for="state" class="text-sm text-gray-700 font-medium">State</label>
              <div class="flex items-center relative w-full">
                <select name="state" id="state" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Edo</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>


            <div class="flex-1 basis-96">
              <label for="lga" class="text-sm text-gray-700 font-medium">Local Government Area</label>
              <div class="flex items-center relative w-full">
                <select name="lga" id="lga" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Oredo</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>

            <div class="flex-1 basis-96">
              <label for="status" class="text-sm text-gray-700 font-medium">Status</label>
              <div class="flex items-center relative w-full">
                <select name="status" id="status" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">Available</option>
                  <option value="">Occupied</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>


            <div class="flex-1 basis-96">
              <label for="purpose" class="text-sm text-gray-700 font-medium">Purpose</label>
              <div class="flex items-center relative w-full">
                <select name="purpose" id="purpose" class="bg-white appearance-none text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  <option value="">Select</option>
                  <option value="">For Sale</option>
                  <option value="">For Rent</option>
                  <option value="">For Lease</option>
                  <option value="">For Shortlet</option>
                </select>
                <i icon-name="chevron-down" class="h-5 w-5 absolute right-2 text-gray-500"></i>
              </div>
            </div>

            <div class="flex-1 basis-96">
              <label for="description" class="text-sm text-gray-700 font-medium">Description</label>
              <textarea id="description" name="description" placeholder="Description" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary"></textarea>
            </div>


            <div class="flex-1 basis-96">
              <label for="price" class="text-sm text-gray-700 font-medium">Price</label>
              <input type="number" id="price" name="price" placeholder="N0.00" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="flex-1 basis-96">
            </div>





          </div>

        </div>


        <div class="mt-8">
          <h2 class="text-sm text-gray-400 font-bold mb-2">Features Informations</h2>


          <div class="flex flex-wrap gap-4">

            <div class="flex-1 basis-96">
              <label for="bedrooms" class="text-sm text-gray-700 font-medium">Number of bedrooms</label>
              <input type="number" id="bedrooms" name="bedrooms" placeholder="0" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="flex-1 basis-96">
              <label for="toilets" class="text-sm text-gray-700 font-medium">Number of toilets</label>
              <input type="number" id="toilets" name="toilets" placeholder="0" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="flex-1 basis-96">
              <label for="bathrooms" class="text-sm text-gray-700 font-medium">Number of bathrooms</label>
              <input type="number" id="bathrooms" name="bathrooms" placeholder="0" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

            <div class="flex-1 basis-96">
              <label for="features" class="text-sm text-gray-700 font-medium">Other features</label>
              <input type="number" id="features" name="features" placeholder="0" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>


            <div class="flex-1 basis-96">
              <label for="file1" class="text-sm text-gray-700 font-medium">File One</label>
              <input type="file" id="file1" name="file1" placeholder="0" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
            </div>

          </div>

        </div>

        <div class="flex justify-between">

          <button class="px-6 py-3 mt-4 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">
            Upload Property
          </button>
          <button class="px-6 py-3 mt-4 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>


        </div>



      </div>
    </div>


  </div>


</section>