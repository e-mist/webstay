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
   <title>WebStay: Reservation</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css"> 
   <link rel="stylesheet" href="css/reservation.css">


</head>
<body>
   
<!-- header section starts  -->

<section class="header">

<a href="home.php" class="logo" ><img src="images/logo.png"></a>

   <nav class="navbar">
      <a href="apartments.php">apartments</a>
      <a href="homepage.php" class="btn">Log Out</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
   <h1>Sumacab Este Apartment</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title"><span id="title">RESERVATION</span> Form</h1>

   <form class="book-form" id="reservation-form" enctype="multipart/form-data">
      <div class="first-form show">
         <div class="flex">
            <div class="inputBox">
               <span>Name :</span>
               <input type="text" placeholder="enter your name" name="name" id="name">
            </div>
            <div class="inputBox">
               <span>Email :</span>
               <input type="email" placeholder="enter your email" name="email" id="email">
            </div>
            <div class="inputBox">
               <span>Phone :</span>
               <input type="text" maxlength="11" placeholder="enter your number" name="phone" id="phone">
            </div>
            <div class="inputBox">
               <span>Address :</span>
               <input type="text" placeholder="enter your address" name="address" id="address">
            </div>
            <div class="inputBox unshow " id="contractAgreement">
               <span>Start of Rent:</span>
               <input type="date" placeholder="" name="check_in" id="check_in" readonly>
            </div>
            <div class="inputBox unshow " id="contractAgreement">
               <span>End of Rent:</span>
               <input type="date" placeholder="" name="check_out" id="check_out" readonly>
            </div>
            <div class="inputBox">
               <span>No Of Person: &nbsp;Limit(<span id="limitPerson">0</span>)</span>
               <input type="number" placeholder="number of person" name="guests" id="guests">
            </div>
            
         </div>
         <button class="btn" id="nextBtn">Next</button>
      </div>
      <div class="second-form unshow">
            <h1>Apartment Name: <span id="apartment_name"></span></h1>
            <h1>Room No: <span id="reserve_room_no"></span></h1>
            <h1>Total Payment: <span id="reserve_payment"></span></h1>
            <br>
            <span class="note">Note: Payment Thru GCash Only.</span>
            <h1>GCash Number: 09705000772</h1>
         <br>
         <input type="number" name="id" id="id" hidden>
         <input type="text" name="apartment" id="apartment" hidden>
         <input type="number" name="room_no" id="room_no" hidden>
         <input type="number" name="payment" id="payment" hidden>
         <div class="flex">
            <div class="inputBox">
               <span>Upload your payment proof:</span>
               <input type="file" name="proof_payment" id="proof_payment">
            </div>
         </div>

         <button class="btn" >Submit</button>
      </div>
      

   </form>
</section>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
<!-- booking section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<!-- <script src="js/script.js"></script> -->
<script src="./dependencies/jquery.js"></script>
<script src="./dependencies/sweetalert.js"></script>
<script src="./dependencies/moment.js"></script>
<script src="./js/admin/reservation.js"></script>

</body>
</html>