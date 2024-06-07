  <section class="px-8 pb-8">

    <div class="p-4 bg-white rounded-xl">

      <h1 class="text-gray-700 font-bold text-xl">New Property</h1>
      <!-- <div class="flex justify-between">

      <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

    </div> -->

      <div class="mt-4 mb-2">
        <label for="" class="text-sm text-gray-700 font-medium">Property Types</label>
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

      <div class="flex flex-wrap flex-col md:flex-row gap-4">



        <div class="flex-1">

          <div class="mt-4">
            <h2 class="text-sm text-gray-400 font-bold mb-2">Basic Informations</h2>

            <div class="flex flex-wrap gap-4">
              <div class="flex-1 grid gap-4">
                <div class="flex-1 basis-96">
                  <label for="email" class="text-sm text-gray-700 font-medium">Address</label>
                  <input type="text" id="email" name="email" placeholder="Address" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="city" class="text-sm text-gray-700 font-medium">City</label>
                  <input type="text" id="city" name="city" placeholder="City" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="state" class="text-sm text-gray-700 font-medium">State</label>
                  <input type="text" id="state" name="state" placeholder="State" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="lga" class="text-sm text-gray-700 font-medium">LGA</label>
                  <input type="text" id="lga" name="lga" placeholder="LGA" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="lga" class="text-sm text-gray-700 font-medium">Status</label>
                  <input type="text" id="lga" name="lga" placeholder="Status" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>
              </div>

              <div class="flex-1 grid gap-4">
                <div class="flex-1 basis-96">
                  <label for="lga" class="text-sm text-gray-700 font-medium">Purpose</label>
                  <input type="text" id="lga" name="lga" placeholder="Purpose" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="lga" class="text-sm text-gray-700 font-medium">Price</label>
                  <input type="text" id="lga" name="lga" placeholder="Price" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="desc" class="text-sm text-gray-700 font-medium">Description</label>
                  <textarea placeholder="Description" id="desc" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary"></textarea>
                </div>

                <div class="flex-1 basis-96">
                  <label for="lga" class="text-sm text-gray-700 font-medium">No of Bedrooms</label>
                  <input type="text" id="lga" name="lga" placeholder="Price" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="email" class="text-sm text-gray-700 font-medium">No of Bathrooms</label>
                  <input type="text" id="email" name="email" placeholder="Mailing address" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>

                <div class="flex-1 basis-96">
                  <label for="email" class="text-sm text-gray-700 font-medium">No of Toilets</label>
                  <input type="text" id="email" name="email" placeholder="Mailing address" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                </div>
              </div>


            </div>

          </div>


          <div class="mt-8" x-data="handler()">
            <div class="flex justify-between items-center">
              <h2 class="text-sm text-gray-400 font-bold mb-2">Image Upload Informations</h2>

              <div>
                <button @click="addNewField()" class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add Field</button>
              </div>

            </div>

            <div class="flex flex-wrap items-end gap-4">
              <div class="basis-96">
                <label for="password" class="text-sm text-gray-700 font-medium">Name</label>
                <input type="text" id="password" name="password" placeholder="Name" value="Toilets" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div class="flex-1 basis-96">
                <input type="file" multiple id="confirmPassword" name="confirmPassword" placeholder="" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
              </div>

              <div>
                <button class="px-6 py-3 text-white text-sm rounded-lg bg-error font-medium hover:bg-red-500">&times</button>
              </div>

            </div>

            <div>
              <template x-for="(field, index) in fields" :key="index">
                <div class="flex flex-wrap items-end gap-4">
                  <div class="basis-96">
                    <label for="password" class="text-sm text-gray-700 font-medium">Name</label>
                    <input type="text" id="password" x-model="field.txt1" name="password" placeholder="Name" value="Toilets" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  </div>

                  <div class="flex-1 basis-96">
                    <input type="file" multiple x-model="field.txt2" id="confirmPassword" name="confirmPassword" placeholder="" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
                  </div>

                  <div>
                    <button class="px-6 py-3 text-white text-sm rounded-lg bg-error font-medium hover:bg-red-500" @click="removeField(index)">&times</button>
                  </div>

                </div>
              </template>
              <!-- <template x-for="(field, index) in fields" :key="index"> -->
              <!--   <tr> -->
              <!--     <td x-text="index + 1"></td> -->
              <!--     <td><input x-model="field.txt1" type="text" name="txt1[]" class="form-control"></td> -->
              <!--     <td><input x-model="field.txt2" type="text" name="txt2[]" class="form-control"></td> -->
              <!--     <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td> -->
              <!--   </tr> -->
              <!-- </template> -->
            </div>

          </div>

          <div class="flex justify-between">

            <button class="px-6 py-3 mt-4 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add New User</button>
            <button class="px-6 py-3 mt-4 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>


          </div>



        </div>
      </div>


    </div>


  </section>
