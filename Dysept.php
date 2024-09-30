<?php 
include('database.php');
session_start();

if(empty($_SESSION['user_status']) == true){
   $_SESSION['user_status'] = 'invalid';
}

if($_SESSION['user_status'] == 'invalid'){
   $_SESSION['user_status'] = 'invalid';
   echo "<script>window.location.href = '/webstay/login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WebStay: Dysept Apartment</title>

   <!-- Bootsrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

</head>
<body>
<section class="header">

<a href="homepage.php" class="logo" ><img src="images/logo.png"></a>

   <nav class="navbar">
      <a href="apartments">Back to Apartments</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<div class="heading" style="background:url(images/Santiago/bg-santiago.jpg) no-repeat; opacity: 0.80">
   <h1>Dysept Apartment</h1>
</div>

<!-- packages section starts  -->

<section class="packages">
   <div class="container-box" id="data">

   </div>
</section>
<style>
   .box{
      width: 27rem;
      text-align: center;
      border: 2px solid var(--main-color);
      border-radius: 10px;
      cursor: pointer;
   }

   .box img{
      height: 20rem;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      width: 100%;
   }

   .container-box{
      width: 100%;
      flex-wrap: wrap;
      display: flex;
      gap: 2rem;
      text-align: center;
      justify-content: center;
   }

   .content{
      padding: 2rem
   }

.img {
  position: relative; 
  display: flex;
  overflow-x: hidden;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  scroll-behavior: smooth;
  width: 27rem;
}

.images img {
  min-width: 27rem; 
  height: 25rem;
  cursor: default;
}
.images{
   position: relative;
}

.prev, .next {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.5);
  padding: 10px;
  cursor: pointer;
  z-index: 2;
  height: 40px;
  width: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%; 
}

.prev {
   top: 12rem;
  left: 5px;  
}

.next {
   top: 12rem;
  right: 5px; 
}


.prev svg, .next svg {
  fill: white;
  transition: fill 0.3s ease;
}

.prev svg:hover, .next svg:hover {
  fill: yellow; 
}




</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<script src="./dependencies/jquery.js"></script>
<script src="./js/admin/get-rooms/dysept.js"></script>

</html>
