<section class="px-8 pb-8">

  <div class="mt-4 p-4 bg-white rounded-xl">
    <h1 class="text-gray-700 font-bold">All Tickets</h1>
    <div class="mt-4 overflow-auto">

      <table id="myTable" class="w-full">
        <thead>
          <tr class="border-t border-b font-bold text-gray-500 text-xs uppercase">
            <td class="py-4 w-1/12">#</td>
            <td class="py-4">Title</td>
            <td class="py-4">Subject</td>
            <td class="py-4">Name of Client</td>
            <td class="py-4">Notes</td>
            <td class="py-4">Created By</td>
            <td class="py-4">Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4">25</td>
            <td class="py-4">C OF O</td>
            <td class="py-4">Name problem</td>
            <td class="py-4">John Doe</td>
            <td class="py-4">Steps to carryout</td>
            <td class="py-4">Admin One</td>
            <td class="py-4">
              <a href="" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 h-4 w-4">
                  <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                </svg>
              </a>
              <a href="" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy-x h-4 w-4">
                  <line x1="12" x2="18" y1="12" y2="18"></line>
                  <line x1="12" x2="18" y1="18" y2="12"></line>
                  <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                  <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                </svg>
              </a>
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>

</section>

<script>
  let table = new DataTable('#myTable');
</script>