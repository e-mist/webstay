<?php include('includes/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WebStay</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      .container_filter {
         background-color: #f9f9f9;
         padding: 20px;
         margin-bottom: 20px;
         border-radius: 5px;
      }

      .hto {
         margin-top: 0;
      }

      .filter-option {
         margin-top: 20px;
      }

      .filter-option label {
         display: block;
         margin-bottom: 5px;
      }

      .filter-option input[type="radio"],
      .filter-option input[type="checkbox"],
      .filter-option select {
         margin-bottom: 10px;
      }

      .time-container {
         margin-bottom: 10px;
      }

      .time-container label {
         margin-right: 10px;
      }

      .btn-submit {
         background-color: #4caf50;
         color: white;
         padding: 10px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .btn-submit:hover {
         background-color: #45a049;
      }
   </style>

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

   <a href="home.php" class="logo" ><img src="images/try.png"></a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="package" class="active">package</a>
      <a href="book.php">book</a>
      <a href="about.php">about</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
   <h1>per room</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

<h1 class="heading-title">Sumacab Este Apartment</h1>

<!-- filter section starts -->
<form action="">
   <div class="container_filter">
      <div class="row">
         <div class="col-3">
               <label for="smoking">Smoking:</label>
                  <input type="checkbox" id="smoking-yes" name="smoking" value="yes">
               <label for="smoking-yes">Yes</label>
                  <input type="checkbox" id="smoking-no" name="smoking" value="no">
               <label for="smoking-no">No</label>
         </div>

         <div class="col-3">
               <label for="curfew">Curfew:</label>
                  <input type="checkbox" id="curfew-yes" name="curfew" value="yes">
               <label for="curfew-yes">With Curfew</label>
                  <input type="checkbox" id="curfew-no" name="curfew" value="no">
               <label for="curfew-no">No Curfew</label>
                  <input type="time" id="curfew-time" name="curfew-time">
         </div>

         <div class="col-3">
               <label for="bed-type">Bed Type:</label>
                  <select name="bed-type" id="bed-type">
                     <option value="studio">Studio Type</option>
                     <option value="apartment">Apartment</option>
                     <option value="bed-spacer">Bed Spacer</option>
                  </select>
         </div>

         <div class="col-3">
               <label for="parking">Parking:</label>
                  <input type="checkbox" id="parking-yes" name="parking" value="yes">
               <label for="parking-yes">Yes</label>
                  <input type="checkbox" id="parking-no" name="parking" value="no">
               <label for="parking-no">No</label>
                  <select name="parking-count" id="parking-count">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                  </select>
         </div>

      </div>

      <div class="row">
         <div class="col-4">
               <label for="gender">Gender:</label>
                  <select name="gender" id="gender">
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     <option value="both">Both</option>p
                  </select>
            </div>

      </div>
   </div>



</form>
<!--    
        <div class="filter-column">
            <div class="filter-option ">
                
            </div>
            <div class="filter-option">
                
            </div>
            <div class="filter-option">
               
            </div>
        </div>
        <div class="filter-column">
            <div class="filter-option">
                
            </div>
        </div>
        <div class="filter-column">
            <div class="filter-option">
                
            </div>
            <div class="filter-option">
                <label for="capacity">Capacity:</label>
                <select name="capacity" id="capacity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="more">More than 5</option>
                </select>
            </div>
        </div>
        <div class="filter-option">
            <label for="price-range">Price Range:</label>
            <div>
                <input type="range" id="price-range" name="price-range" min="500" max="10000">
                <span>Min: </span><span id="min-price">500</span>
                <span>Max: </span><span id="max-price">10000</span>
            </div>
        </div>
        <div class="submit-btn-container">
            <button type="submit" class="btn-submit">Submit</button>
        </div>
   </div>
    -->

<!-- filter section ends -->

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/apartment1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Santiago Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our Dubai top selling packages!</p>
            <h2>BDT 10,900</h2> -->
            <a href="Santiago.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Siwa Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our Delhi top selling packages!</p>
            <h2>BDT 9,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment3.jpg" alt="">
         </div>
         <div class="content">
            <h3>Liwayway Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our Japan top selling packages!</p>
            <h2>BDT 11,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment4.jpg" alt="">
         </div>
         <div class="content">
            <h3>Quinones Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our Australia top selling packages!</p>
            <h2>BDT 13,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Jaiden Apartment Complex</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our china top selling packages!</p>
            <h2>BDT 7,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Rodrigo Hirmino Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our singapur top selling packages!</p>
            <h2>BDT 12,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Jmck Boarding House </h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our spain top selling packages!</p>
            <h2>BDT 18,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment4.jpg" alt="">
         </div>
         <div class="content">
            <h3>Kuya Rom's Dormitory</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our canada top selling packages!</p>
            <h2>BDT 21,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment3.jpg" alt="">
         </div>
         <div class="content">
            <h3>Angeline Apartment</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our barli top selling packages!</p>
            <h2>BDT 14,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Magneth Building</h3>
            <p>Enjoy the Emirates with unforgettable fun with our nepal top selling packages!</p>
            <h2>BDT 7,900</h2>
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/apartment1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Daisep Dormitory</h3>
            <!-- <p>Enjoy the Emirates with unforgettable fun with our bangladesh top selling packages!</p>
            <h2>BDT 5,900</h2> -->
            <a href="book.php" class="btn">See more</a>
         </div>
      </div>

      <!-- <div class="box">
         <div class="image">
            <img src="images/img-12.jpg" alt="">
         </div>
         <div class="content">
            <h3>Japan Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Japan top selling packages!</p>
            <h2>BDT 11,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div> -->

   </div>

   <div class="load-more"><span class="btn">load more</span></div>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

</section>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>