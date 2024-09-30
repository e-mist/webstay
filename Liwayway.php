<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WebStay: Liwayway Apartment</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
<section class="header">

<a href="home.php" class="logo" ><img src="images/logo.png"></a>

   <nav class="navbar">
      <a href="apartments">Back to Apartments</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<div class="heading" style="background:url(images/Liwayway/bg-liwayway.jpg) no-repeat; opacity: 0.80; text-align:center">
   <h1>Liwayway Apartment Apartment</h1>
</div>

<!-- packages section starts  -->

<section class="packages">
   <div class="box-container">
      
      <!-- Room 1 -->
      <div class="box">
         <div class="image">
            <img src="images/Liwayway/1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Room 1</h3>
            <a href="reservation.php" class="btn">Reserve Now</a>
         </div>
      </div>

      <!-- Room 2 -->
      <div class="box">
         <div class="image">
            <img src="images/Liwayway/2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Room 2</h3>
            <a href="reservation.php" class="btn">Reserve Now</a>
         </div>
      </div>

   </div>
</section>
</body>
</html>
