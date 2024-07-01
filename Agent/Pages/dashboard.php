<!-- Main Dashboard Section -->
<section class="px-8 mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
  <a href="#view_tenants" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-main h-12 w-12 text-primary grid place-items-center rounded-md">
      <i icon-name="building" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Total Tenants</p>
      <p id="total_tenants" class="text-2xl font-bold tracking-tighter text-gray-800">2039</p>
    </div>
  </a>
  <a href="#view_listings" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-success-light h-12 w-12 text-success grid place-items-center rounded-md">
      <i icon-name="layout-grid" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Total Listings</p>
      <p id="total_listings" class="text-2xl font-bold tracking-tighter text-gray-800">150</p>
    </div>
  </a>
  <a href="#rent_due" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-warning-light h-12 w-12 text-warning grid place-items-center rounded-md">
      <i icon-name="dollar-sign" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Rents Due</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">₦12,500</p>
    </div>
  </a>
  <a href="#view_complaints" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-error-light h-12 w-12 text-error grid place-items-center rounded-md">
      <i icon-name="alert-triangle" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Complaints</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">45</p>
    </div>
  </a>
  <a href="#inspection_appointments" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-info-light h-12 w-12 text-info grid place-items-center rounded-md">
      <i icon-name="calendar" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Inspection Appointments</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">10</p>
    </div>
  </a>
  <a href="#vacant_listings" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-secondary-light h-12 w-12 text-secondary grid place-items-center rounded-md">
      <i icon-name="home" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Total Vacant Listings</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">20</p>
    </div>
  </a>
  <a href="#maintenance_requests" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-primary-light h-12 w-12 text-primary grid place-items-center rounded-md">
      <i icon-name="wrench" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Maintenance Requests</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">15</p>
    </div>
  </a>
  <a href="#total_income" class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
    <div class="flex-shrink-0 bg-success-light h-12 w-12 text-success grid place-items-center rounded-md">
      <i icon-name="trending-up" class="h-6 w-6"></i>
    </div>
    <div>
      <p class="text-sm text-gray-400">Total Income</p>
      <p class="text-2xl font-bold tracking-tighter text-gray-800">₦50,000</p>
    </div>
  </a>
</section>

<!-- Recent Activities Section -->
<section class="mt-8 px-8">
  <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>
  <div class="bg-white rounded-xl p-4 space-y-4">
    <div class="flex justify-between">
      <p class="text-gray-600">New tenant registered: John Doe</p>
      <span class="text-gray-400 text-sm">2 hours ago</span>
    </div>
    <div class="flex justify-between">
      <p class="text-gray-600">Rent payment received: ₦1200 from Jane Smith</p>
      <span class="text-gray-400 text-sm">4 hours ago</span>
    </div>
    <div class="flex justify-between">
      <p class="text-gray-600">Maintenance completed: Leak repair at 123 Main St</p>
      <span class="text-gray-400 text-sm">1 day ago</span>
    </div>
  </div>
</section>

<!-- Upcoming Events Section -->
<section class="mt-8 px-8">
  <h2 class="text-lg font-semibold mb-4">Upcoming Events</h2>
  <div class="bg-white rounded-xl p-4 space-y-4">
    <div class="flex justify-between">
      <p class="text-gray-600">Property inspection at 456 Elm St</p>
      <span class="text-gray-400 text-sm">June 30, 2024</span>
    </div>
    <div class="flex justify-between">
      <p class="text-gray-600">Lease expiration: Apt 101, 789 Oak St</p>
      <span class="text-gray-400 text-sm">July 15, 2024</span>
    </div>
  </div>
</section>

<!-- Financial Summary Section -->
<section class="mt-8 px-8">
  <h2 class="text-lg font-semibold mb-4">Financial Summary</h2>
  <div class="bg-white rounded-xl p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-green-100 p-4 rounded-xl">
      <p class="text-gray-600">Total Income</p>
      <p class="text-2xl font-bold text-gray-800">₦100,000</p>
    </div>
    <div class="bg-red-100 p-4 rounded-xl">
      <p class="text-gray-600">Total Expenses</p>
      <p class="text-2xl font-bold text-gray-800">₦40,000</p>
    </div>
    <div class="bg-blue-100 p-4 rounded-xl">
      <p class="text-gray-600">Net Profit</p>
      <p class="text-2xl font-bold text-gray-800">₦60,000</p>
    </div>
  </div>
</section>

<!-- Tenant Feedback Section -->
<section class="mt-8 mb-11 px-8">
  <h2 class="text-lg font-semibold mb-4">Tenant Feedback</h2>
  <div class="bg-white rounded-xl p-4 space-y-4">
    <div class="bg-gray-50 p-4 rounded-md">
      <p class="text-gray-800">"Great service, very responsive!"</p>
      <p class="text-gray-400 text-sm">- John Doe, Apt 202</p>
    </div>
    <div class="bg-gray-50 p-4 rounded-md">
      <p class="text-gray-800">"Had a smooth move-in process."</p>
      <p class="text-gray-400 text-sm">- Jane Smith, Apt 305</p>
    </div>
  </div>
</section>

<!-- Icon Controller -->
<script>
  lucide.createIcons();
</script>
<footer class="p-4 border-t border-gray-200 mt-10">
    <div class="max-w-7xl mx-auto">
      <nav class="">

        <div class="md:flex text-center md:text-left justify-between items-start md:items-center">
          <!-- Logo -->
          <div class=" text-gray-400">39 Ohonre </div>
      <div class="text-gray-400">&copy; <?php echo date("Y"); ?> All Rights Reserved</div>
     
    </div>




        </div>
      </nav>
    </div>



  </footer>
