<?php
require_once(dirname(__FILE__,2).'/Core/Init.php');
$user = new User();
if (!$user->isloggedin()){
  Redirect::to(BASE_URL);
}else{
  //check user authorization and redirect to appropriate page
  // 
}
?>
<?php include('Layout/Head.php') ?>

<body>
  <div class="flex h-screen">
    <?php include('Layout/Sidebar.php') ?>
    <main class="w-full bg-main overflow-auto">
      <?php include('Layout/Header.php') ?>

      <!-- Cards -->
      <section class="px-8 mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <!-- <section class="px-8 flex flex-wrap gap-8"> -->


        <div class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
          <div class="flex-shrink-0 bg-main h-12 w-12 text-primary grid place-items-center rounded-md">
            <i icon-name="building" class="h-6 w-6"></i>
          </div>
          <div class="">
            <p class="text-sm text-gray-400">Total Tenants</p>
            <p class="text-2xl font-bold tracking-tighter text-gray-800">2039</p>
          </div>
        </div>

        <div class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
          <div class="flex-shrink-0 bg-success-light h-12 w-12 text-success grid place-items-center rounded-md">
            <i icon-name="layout-grid" class="h-6 w-6"></i>
          </div>
          <div class="">
            <p class="text-sm text-gray-400">Total Listings</p>
            <p class="text-2xl font-bold tracking-tighter text-gray-800">2039</p>
          </div>
        </div>

        <div class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
          <div class="flex-shrink-0 bg-warning-light h-12 w-12 text-warning grid place-items-center rounded-md">
            <i icon-name="user-plus" class="h-6 w-6"></i>
          </div>
          <div class="">
            <p class="text-sm text-gray-400">Total Landlords</p>
            <p class="text-2xl font-bold tracking-tighter text-gray-800">2039</p>
          </div>
        </div>

        <div class="flex-1 bg-white rounded-xl p-4 flex gap-4 items-center">
          <div class="flex-shrink-0 bg-error-light h-12 w-12 text-error grid place-items-center rounded-md">
            <i icon-name="users" class="h-6 w-6"></i>
          </div>
          <div class="">
            <p class="text-sm text-gray-400">Total Users</p>
            <p class="text-2xl font-bold tracking-tighter text-gray-800">2039</p>
          </div>
        </div>

      </section>

      <!-- Cards End -->


      <section class="px-8 my-8">

        <div class="p-4 bg-white rounded-xl">
          <h1 class="text-gray-700 font-bold">Charts</h1>


          <div class="mt-4 w-full "><canvas id="acquisitions"></canvas></div>
        </div>
      </section>



    </main>

  </div>


  <!-- <script src="https://cdnjs.com/libraries/Chart.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

  <!-- <script src="https://www.jsdelivr.com/package/npm/chart.js?path=dist"></script> -->
  <script>
    (async function() {
      const data = [{
          month: 'Jan',
          count: 10
        },
        {
          month: 'Feb',
          count: 20
        },
        {
          month: 'Mar',
          count: 15
        },
        {
          month: 'Jun',
          count: 25
        },
        {
          month: 'Jul',
          count: 22
        },
        {
          month: 'Aug',
          count: 30
        },
        {
          month: 'Sep',
          count: 28
        },
        {
          month: 'Oct',
          count: 28
        },
        {
          month: 'Nov',
          count: 38
        },
        {
          month: 'Dec',
          count: 48
        },
      ];

      new Chart(
        document.getElementById('acquisitions'), {
          type: 'bubble',
          data: {
            labels: data.map(row => row.month),
            datasets: [{
                label: 'Acquisitions by year',
                data: data.map(row => row.count),
                backgroundColor: '#1877F2',
                borderSkipped: false,
              },
              {
                label: 'Finance by year',
                data: data.map(row => row.count)
              }
            ]
          }
        }
      );
    })();
  </script>
  <?php include('Layout/Footer.php') ?>
</body>

</html>