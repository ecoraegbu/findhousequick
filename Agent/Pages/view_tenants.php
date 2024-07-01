<section class="px-8">
  <div class="mt-4 p-4 bg-white rounded-xl">
    <h1 class="text-gray-700 font-bold">View Listings</h1>
    <div class="mt-4 overflow-auto">
      <table class="w-full min-w-table">
        <thead>
          <tr class="border-t border-b font-bold text-gray-500 text-xs uppercase">
            <td class="py-4 w-1/12">#</td>
            <td class="py-4">Name</td>
            <td class="py-4">Phone</td>
            <td class="py-4">Email</td>
            <td class="py-4">Address</td>
            <td class="py-4">Tenancy Start</td>
            <td class="py-4">Tenancy end</td>
            <td class="py-4">Actions</td>
          </tr>
        </thead>
        <tbody id="tenants-table">
          <!-- Table rows will be populated here -->
        </tbody>
        <tr class="border-t border-b font-bold text-gray-500"></tr>
      </table>
    </div>
    <div class="mt-4 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
  <div>
    <span>Showing <span id="start-index"></span> to <span id="end-index"></span> of <span id="total-items"></span> entries</span>
  </div>
  <div id="pagination-controls" class="flex space-x-1">
    <!-- Pagination buttons will be dynamically inserted here -->
  </div>
  <div>
<!--   <button id="prev-page" class="px-3 py-1 m-4 bg-gray-200 rounded-md mr-2 hover:cursor-pointer" >&laquo; Previous</button>
  <button id="next-page" class="px-3 py-1 m-4 bg-gray-200 rounded-md hover:cursor-pointer" >Next &raquo;</button> -->
  </div>
</div>
  </div>
</section>