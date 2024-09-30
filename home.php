<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WebStay</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function(){
          $(".scroll-top").click(function() {
              $("html, body").animate({ 
                  scrollTop: 0 
              }, "slow");
              return false;
          });
      });
   </script>
</head>
<body>
<!-- header section starts  -->
<section class="header">
   <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header section ends -->
<!-- home section starts  -->
<section class="home">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
      <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg); background-size: cover; width: 100%; height: 100vh;">

            <div class="content">
               <span style="font-family: 'Times New Roman', Times, serif ">Apartment Locator</span>
               <h3>WebStay</h3>
               <a href="homepage.php" class="btn">Get Started</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg); background-size: cover; width: 100%; height: 100vh;">
            <div class="content">
               <span>Apartment Locator</span>
               <h3>Explore Sumacab Este</h3>
               <a href="homepage.php" class="btn">Get Started</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg); background-size: cover; width: 100%; height: 100vh;">
            <div class="content">
               <span>Apartment Locator</span>
               <h3>Apartment</h3>
               <a href="homepage.php" class="btn">Get Started</a>
            </div>
         </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
</section>
<!-- home section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>