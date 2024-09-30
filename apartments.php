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
   <title>WebStay: Apartments</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   <style>
   body {
      font-family: Arial, sans-serif;         
      background-color: #f0f8ff; /* Light blue background */
   }
   
   .box{
      display: grid;
      align-items: end;
      gap: 1rem;
   }
   
   .content{
      display: grid;
      align-items: end;
      justify-content: center;
      gap: 1rem;
   }
   
   .filter-container {
      /* width: 1350px; */
      width: 100%;
      padding: 20px;
      border: 2px solid #1e90ff; /* Blue border */
      border-radius: 8px;
      margin: 20px auto;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: grid;
      gap: 3rem;
   }
   
   .filter-container label {
      display: block;
      margin: 10px 0 5px;
      color: #1e90ff;
   } 

   .more-filters {
      text-align: center;
   } 

   .more-filters button {
      background-color: #ffd700; /* Yellow button background */
      border: none;
      color: #fff;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
   }

   .more-filters button:hover {
      background-color: #f0c420; /* Darker yellow on hover */
   }

   .additional-filters {
      display: none; /* Hidden by default */
   }

   .filter-container input, .filter-container select{
      border: 1px solid gray;
      padding: .5rem 1rem;
      font-size: 1rem;
      border-radius: 10px;
   }

   .row {
      display: flex;
      gap: 5rem;
      width: 100%;
   }

   .col {
      display: grid;
      gap: 0.5rem;
      width: 100%;
   }


   .flex{
      display: flex;
      gap: 1rem;
      align-items: center;
   }

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.row-slider{
   display: flex;
   gap:1rem;
}
.btn-apply{
   align-self: end; 
   margin-left: 1rem;
   padding: .5rem 1rem;
   cursor: pointer
}

.price-slider{
   position: relative;
}

.slider-cont{
   top: 12px;
   position: relative;
   background-color: rgb(195, 195, 189);
   height: 8px;
   border-radius: 10px;
   width: 100%;
   overflow: hidden;
}

.slider-cont .progress{
   position: absolute;
   height: 10px;
   background-color: yellow;
   border-radius: 10px;
   left: 0%;
   right: 0%;
}
.price-slider input{
   position: absolute;
   border: none;
   top: 3px;
   width: 100%;
   height: 6px;
   background: #17A2B8;
  pointer-events: none;
  background: none;
  -webkit-appearance: none;
}

.price-slider input[type="range"]::-webkit-slider-thumb{
   height: 17px;
   width: 17px;
   border-radius: 50px;
   /* pointer-events: auto; */
   -webkit-appearance: none;
   background: #04d6ec;
   border: none;
}


   </style>

</head>
<body>
   <!-- header section starts  -->
   <section class="header">
      <a href="homepage.php" class="logo" ><img src="images/logo.png"></a>
      
      <nav class="navbar">
         <a href="apartments.php" class="active">apartments</a>
         <a href="" id="logoutBtn" class="btn">Log Out</a>
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
   <div class="filter-container">
      <div class="row">
         <div class="col">
            <label for="">Search your destination:</label>
            <input type="text" placeholder="Enter name here.." id="name">
         </div>
         
         <div class="col">
            <div>
               <label for="">Apartment Type:</label>
            </div>
            <select name="" id="type" >
               <option value=""></option>
               <option value="Studio">Studio</option>
               <option value="Bed Spacer">Bed Spacer</option>
            </select>
         </div>
         
         <div class="col">
            <div class="wrapper-slider">
               <label for="">Price Range: </label>
               <div class="price-input">
                  <div class="row-slider">
                     <div class="col">
                        <label for="">Min: </label>
                        <input type="number" id="min-input" value="0">
                     </div>
                     <div class="col">
                        <label for="">Max: </label>
                        <input type="number" id="max-input" value="10000">
                     </div>
                     <div class="col">
                        <button class="btn-apply" id="btnApply">Apply</button>
                     </div>
                  </div>
               </div>
               <div class="slider-cont">
                  <div class="progress"></div>
               </div>
               <div class="price-slider">
                  <input type="range" name="" id="min"  min="0" max="10000"  value="0">
                  <input type="range" name="" id="max"  min="0" max="10000"  value="10000">
               </div>
            </div>
         </div>
      </div>
      
      <div class="additional-filters" id="additionalFilters">
         <div class="row">
            <div class="col">
               <label for="">Room Capacity:</label>
               <select name="" id="capacity">
                  <option value="1">1 Person</option>
                  <option value="2">2 Persons</option>
                  <option value="3">3 Persons</option>
                  <option value="4">4 Persons</option>
                  <option value="5">5 Persons</option>
                  <option value="6" selected>6 Persons</option>
               </select>
            </div>
            
            <div class="col">
               <div>
                  <label for="">Utility:</label>
               </div>
               <div class="row">
                  <div class="flex">
                     <label for="">Water</label>
                     <input type="checkbox" name="water" id="water">
                  </div>
                  <div class="flex">
                     <label for="">Electricity</label>
                     <input type="checkbox" name="electricity" id="electricity">
                  </div>
               </div>
     
            </div>
            <div class="col">
               <div>
                  <label for="">Agreements:</label>
               </div>
               <div class="row">
                  <div class="flex">
                     <label for="">Contract</label>
                     <input type="checkbox" name="contract" id="contract">
                  </div>
                  <div class="flex">
                     <label for="">Curfew</label>
                     <input type="checkbox" name="curfew" id="curfew">
                  </div>
               </div>
            </div>
         </div>

         <br>
         <br>
         <div class="row">
            
            <div class="col">
               <div>
                  <label for="">Special Features:</label>
               </div>
               <div class="row">
                  <div class="flex">
                     <label for="">Allowed Pet</label>
                     <input type="checkbox" name="pet" id="pet">
                  </div>
                  <div class="flex">
                     <label for="">Allowed Parking</label>
                     <input type="checkbox" name="parking" id="parking">
                  </div>
                  <div class="flex">
                     <label for="">Allowed Visitors</label>
                     <input type="checkbox" name="visitors" id="visitors">
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <!-- More Filters Button -->
      <div class="more-filters">
         <button id="moreFilters" onclick="toggleFilters()">More Filters ▼</button>
      </div>
   </div>
   <!-- filter section ends -->

   <div class="box-container" id="apartments-data">
   
   </div>


</section>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- <script>
function toggleParkingCount() {
    var parkingYes = document.getElementById("parking-yes");
    var parkingCount = document.getElementById("parking-count");
    if (parkingYes.checked) {
        parkingCount.classList.add("active");
    } else {
        parkingCount.classList.remove("active");
    }
}
</script> -->
<!-- more filters button toggle -->

<script>
        function toggleFilters() {
            var additionalFilters = document.getElementById("additionalFilters");
            var moreFiltersButton = document.getElementById("moreFilters");

            if (additionalFilters.style.display === "none" || additionalFilters.style.display === "") {
                additionalFilters.style.display = "block";
                moreFiltersButton.textContent = "Less Filters ▲";
            } else {
                additionalFilters.style.display = "none";
                moreFiltersButton.textContent = "More Filters ▼";
            }
        }
    </script>
<!-- more filters button toggle -->
<script src="./dependencies/jquery.js"></script>
<script src="./dependencies/sweetalert.js"></script>
<script src="./js/admin/apartments.js"></script>
</body>
<style>

</style>
</html>