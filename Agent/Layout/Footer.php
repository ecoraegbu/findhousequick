  <!-- Development version -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  <!-- Production version -->
  <!-- <script src="https://unpkg.com/lucide@latest"></script> -->

  <script src="./JS/navbar.js"></script>
  <script src="./JS/pages.js"></script>


  <script>
    if (window.location.hash == "" || window.location.hash == "#") {
      window.location.href = 'index.php#Dashboard'
    }
  </script>