<?php include('includes/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

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

<a href="home.php" class="logo" ><img src="images/logo1.png"></a>

   <nav class="navbar">
      <a href="home">home</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
      <a href="about.php" class="active">about</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->  
<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
   <h1>about us</h1>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>why choose us?</h3>
      <p>Lorem ipsum dolor sit amet. Est porro officia cum tempora quaerat est modi earum aut reiciendis deleniti ab quia incidunt et cupiditate quae id quia ipsa. Ad doloribus unde est libero sequi est iusto delectus aut similique accusamus id asperiores eveniet ad quibusdam unde est quasi debitis! Et necessitatibus recusandae ea optio rerum est aliquam quam ad placeat animi ut sapiente iusto. Nam debitis molestias et placeat nulla At quidem mollitia et aperiam quos non voluptatibus voluptas et recusandae ratione!</p>
      <p>Hanap ka ba apartment boi?</p>
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>gandang apartment</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>baka webstay to</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>papadaliin ang inyo buhay</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->


<!-- button pang up -->
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>