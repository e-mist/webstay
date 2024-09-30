<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            scroll-padding-top: 4rem;
            list-style: none;
            text-decoration: none;
        }
        :root{
            --main-color: #2288ff;
            --second-color: #192f6a;
            --text-color: #314862;
            --bg-color: #fff;
            --box-shadow: 2px 2px 18px rgb(14 52 54 / 15%);
        }
        img{
            width: 100%;
        }
        body{
            color: var(--text-color);
        }
        section{
            padding: 4.5rem 0 3rem;
        }
        .container{
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
        }
        header{
            display: block;
            width: 100%;
            height: 16%;
            background: var(--bg-color);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        .nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 35px;
        }
        .logo{
            display: flex;
            align-items: center;
            column-gap: 0.5rem;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
            text-transform: uppercase;
        }
        .logo .bx{
            font-size: 24px;
            color: var(--second-color);
        }
        .navbar{
            display: flex;
        }
        .navbar a{
            padding: 8px 17px;
            color: var(--text-color);
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 600;
            /* margin-left: 70px; */
        }
        .navbar2 a{
            padding: 8px 17px;
            color: #1f3d64;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 600;
            margin-left: 40px;
        }
        .navbar a:hover{
            color: var(--main-color);
        }
        .navbar2 a:hover{
            color: black;
        }
        #menu-icon{
            font-size: 24px;
            cursor: pointer;
            display: none;
        }
        #menu{
            display: none;
        }
        .btn{
            padding: 8px 22px;
            background: var(--main-color);
            color: var(--bg-color);
            border-radius: 5rem;
        }
        .btn:hover {
            background: #3492fd;
        }
        .home{
            margin-top: 5rem;
            background: url(images/homepage.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 440px;
            border-radius: 1.5rem;
            display: flex;
            align-items: center;
        }
        .home-text{
            padding-left: 35px;
        }
        .home-text h1{
            color: var(--bg-color);
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .about{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(18rem,auto));
            gap: 2rem;
        }
        .about-img img{
            border-radius: 3rem 0 3rem 3rem;
        }
        .about-text span{
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 500;
            color: var(--main-color);
        }
        .about-text h2{
            font-size: 1.7rem;
        }
        .about-text p{
            font-size: 0.938rem;
            margin: 1rem 0 1rem;
        }
    
        .heading{
            text-align: center;
            margin-bottom: 2rem;
        }
        .heading span{
            font-weight: 500;
            color: var(--main-color);
        }
        .heading h2{
            font-size: 1.7rem;
        }
        .heading p{
            font-size: 0.938rem;
        }
        .properties{
            background: #fbfbfb;
            border-radius: 2rem;
        }
        .properties-container{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, auto));
            gap: 3rem;
            padding: 0 50px;
        }
        .properties-container .box{
            background: var(--bg-color);
            padding: 10px;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
        }
        .properties-container .box:hover{
            transform: translateY(-10px);
            transition: 0.5s;
        }
        .properties-container .box img{
            border-radius: 1rem;
            height: 220px;
            object-fit: cover;
            object-position: center;
        }
        .properties-container .box h3{
            font-size: 1rem;
            font-weight: 600;
            float: right;
        }
        .properties-container .box .content{
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }
        .properties-container .box .content .text h3{
            font-weight: 500;
        }
        .properties-container .box .content .text p{
            font-size: 0.8rem;
        }
        .properties-container .box .content .icon{
            display: flex;
            align-items: center;
            column-gap: 1rem;
        }
        .properties-container .box .content .icon .bx{
            display: flex;
            align-items: center;
            font-size: 20px;
        }
        .properties-container .box .content .icon span{
            font-size: 12px;
            font-weight: 500;
            margin-left: 4px;
        }

        .sidebar{
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 250px;
            z-index: 999;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            align-items: flex-start;
            justify-content: flex-start; 
        }
        .sidebar li{
            width: 100%;
        }
        .sidebar a{
            width: 100%;
        }
        @media(max-width: 800px){
            
        }


    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay: Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="homepage.php" class="logo" ><img src="images/logo.png"></a>

            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="registration.php" class="btn">Sign Up</a></li>
                <li><a href="login.php" class="btn">User Log In</a></li>
                <li><a href="adminlogin.php" class="btn">Admin</a></li>
            </ul>

            <ul class="navbar">
                <li><a href="#section1">Home</a></li>
                <li><a href="#section2">About Us</a></li>
                <li><a href="#section3">Apartments</a></li>
            </ul>

            <div class="navbar2">
            <a href="registration.php" class="btn">Sign Up</a>
            <a href="login.php" class="btn">User Log In</a>
            <a href="adminlogin.php" class="btn">Admin</a>
            </div>
            <ul>
                <li onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </div>
    </header>
    <section class="home container" id="section1">
        <div class="home-text">
            <h1>Find your next<br> Perfect Place to<br> Live.</h1>
        </div>
    </section>
    <section class="about container" id="section2">
        <div class="about-img">
            <img src="images/BG homepage/main.jpg" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>New Beginning At Your New Apartment</h2>
            <p>In today's rapidly evolving digital landscape, the quest for streamlined solutions has become imperative,
                particularly in the realm of student accommodation. The global trend toward digitalization has reshaped numerous 
                facets of daily life, yet students and tenants near Sumacab Este currently lack a dedicated platform for their 
                accommodation needs. With the rise of digital solutions in urban living, the capstone project seeks to align with 
                this trend, introducing an advanced Apartment Locator that caters specifically to the needs of students in Barangay 
                Sumacab Este.</p>
        </div>
    </section>

    <section class="properties container" id="section3">
        <div class="heading">
            <span>Read Me</span>
            <h2>Our Feature Apartment</h2>
            <p>The existing challenges faced by students and tenants outside and inside the cities are rooted in the absence of a centralized
                 and digitalized dormitory search system. Traditional methods, such as local advertisements and word of mouth, result in
                  time-consuming searches, often yielding suboptimal results. This inefficiency is a pressing issue for students who need 
                  to find accommodations in close proximity to their educational institutions, impacting their overall academic experience. 
                  To enhance the Apartment Locator’s effectiveness, considerations should be given to factors such as the variety of preferences
                students may have, the reliability of the mapping system, and the usability of the backend tools for apartment administrators.</p>
        </div>
        <div class="properties-container container">
            <!-- Apartment 1 -->
            <div class="box">
                <img src="images/Santiago/Background.jpg" alt="">
                <h3>4000-6000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Santiago Apartment</h3>
                        <p>Sumacab Este </p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>5</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 2 -->
            <div class="box">
                <img src="images/M.K/Bedrooms.jpg" alt="">
                <h3>3500-4500 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>M.K Apartment</h3>
                        <p>Sumacab Este </p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>3</span></i>
                        <i class='bx bx-bath'><span>3</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 3 -->
            <div class="box">
                <img src="images/Mayang/Background.jpg" alt="">
                <h3>5,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Mayang Apartment</h3>
                        <p>Sumacab Este </p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>2</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 4 -->
            <div class="box">
                <img src="images/Quinonez/Background.jpg" alt="">
                <h3>6,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3> Quinones Apartment</h3>
                        <p>Sumacab Este </p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>4</span></i>
                        <i class='bx bx-bath'><span>4</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 5 -->
            <div class="box">
                <img src="images/Jaiden/Background2.jpg" alt="">
                <h3>4000-6000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Jaiden Apartment Complex</h3>
                        <p>Sumacab Este </p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>6</span></i>
                        <i class='bx bx-bath'><span>6</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 6 -->
            <div class="box">
                <img src="images/BG homepage/6.webp" alt="">
                <h3>5,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Rodrigo Hirmino</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>15</span></i>
                        <i class='bx bx-bath'><span>15</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 7 -->
            <div class="box">
                <img src="images/BG homepage/7.jpg" alt="">
                <h3>1,300 Per Head</h3>
                <div class="content">
                    <div class="text">
                        <h3>JMCK Boarding House</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>15</span></i>
                        <i class='bx bx-bath'><span>15</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 8 -->
            <div class="box">
                <img src="images/BG homepage/8.jpg" alt="">
                <h3>5,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Kuya Rom Dormitory</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>19</span></i>
                        <i class='bx bx-bath'><span>19</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 9 -->
            <div class="box">
                <img src="images/BG homepage/9.jpg" alt="">
                <h3>1,500 Per Head</h3>
                <div class="content">
                    <div class="text">
                        <h3>Angeline Apartment</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>2</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 10 -->
            <div class="box">
                <img src="images/BG homepage/10.webp" alt="">
                <h3>5,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Magneth Building</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>18</span></i>
                        <i class='bx bx-bath'><span>18</span></i>
                    </div>
                </div>
            </div>

            <!-- Apartment 11 -->
            <div class="box">
                <img src="images/Daisep/background.jpg" alt="">
                <h3>5,000 Per Room</h3>
                <div class="content">
                    <div class="text">
                        <h3>Daisep Dormitory</h3>
                        <p>Sumacab Este</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>54</span></i>
                        <i class='bx bx-bath'><span>54</span></i>
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    <script src="js/script.js"></script>
    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>
</html>