<!DOCTYPE html>
<html>
<head>
  <title>Star Rating System</title>
  <style>
    .rating {
      font-size: 0; /* remove whitespace between inline-block elements */
    }

    .star {
      display: inline-block;
      font-size: 32px;
      color: #8E793E;
      cursor: pointer;
      margin-right: 5px;
    }

    .star:hover,
    .star:focus,
    .star.active {
      color: #FFD700;
    }
  </style>
</head>
<body>
  <div class="rating">
    <span class="star" data-value="1">&#9733;</span>
    <span class="star" data-value="2">&#9733;</span>
    <span class="star" data-value="3">&#9733;</span>
    <span class="star" data-value="4">&#9733;</span>
    <span class="star" data-value="5">&#9733;</span>
  </div>
  <input type="hidden" name="rating" id="rating-input">

  <script>
    const stars = document.querySelectorAll('.star');

    stars.forEach(function(star) {
      star.addEventListener('click', function() {
        const rating = this.getAttribute('data-value');
        document.getElementById('rating-input').value = rating;
        setRating(rating);
      });

      star.addEventListener('mouseover', function() {
        const rating = this.getAttribute('data-value');
        setRating(rating);
      });

      star.addEventListener('mouseout', function() {
        const rating = document.getElementById('rating-input').value;
        setRating(rating);
      });
    });

    function setRating(rating) {
      stars.forEach(function(star) {
        if (star.getAttribute('data-value') <= rating) {
          star.classList.add('active');
        } else {
          star.classList.remove('active');
        }
      });
    }
  </script>
</body>
</html>
