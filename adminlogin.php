<?php
    include('database.php'); 
    session_start();


    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = '$email' AND password = '$password'";
        $query = mysqli_query($conn, $sql);

        $row = mysqli_num_rows($query);

        if ($row==0) {
            $_SESSION['status'] = 'invalid';
            header('location:adminlogin.php?notmatch');
        } else {
            $_SESSION['em'] = $email;
            $_SESSION['pw'] = $password;
            $_SESSION['status'] = 'valid';
            header('location:admindashboard.php');
        }

    }

    if(empty($_SESSION['status']) == true){
        $_SESSION['status'] = 'invalid';
      }
      
      if($_SESSION['status'] == 'valid'){
          echo "<script>location.href = '/webstay/admindashboard.php'</script>";
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }
        body{
            background: url("images/Este.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 110vh;
            background: rgba(39, 39, 39, 0.6);
        }
        .nav{
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgba(39,39,39, 0.6), transparent);
            z-index: 100;
        }
        .nav-logo p{
            color: white;
            font-size: 25px;
            font-weight: 600;
        }
        .nav-menu ul{
            display: flex;
        }
        .nav-menu ul li{
            list-style-type: none;
        }
        .nav-menu ul li .link{
            text-decoration: none;
            font-weight:500;
            color: #fff;
            padding-bottom: 15px;
            margin:0 25px;
        }
        .link:hover, .active{
            border-bottom: 2px solid #fff;
        }
        .nav-button .btn{
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
        }
        .btn:hover{
            background: rgba(255, 255, 255, 0.3)
        }
        #registerBtn{
            margin-left: 15px;
        }
        .btn.white-btn{
            background: rgba(255, 255, 255, 0.7);
        }
        .btn.btn.white-btn:hover{
            background: rgba(255, 255, 255, 0.5);
        }
        .nav-menu-btn{
            display: none;
        }
        .form-box{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 850px;
            height: 600px;
            overflow: hidden;
            z-index: 2;
        }
        .login-container{
            width: 500px;
            display: flex;
            flex-direction: column;
            transition: .5s ease-in-out;
        }
        .top span{
            color:#fff;
            font-size: small;
            padding: 10px 0;
            display: flex;
            justify-content: center;
        }
        .top span a{
            font-weight: 500;
            color: #fff;
            margin-left: 5px;
        }
        header{
            color: #fff;
            font-size: 30px;
            text-align: center;
            padding: 10px 0 30px 0;
            margin-bottom: 15px;
        }
        .two-forms{
            display: flex;
            gap: 5px;
        }
        .input-field{
            font-size: 15px;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            height: 50px;
            width: 100%;
            padding: 0 10px 0 45px;
            border: none;
            border-radius: 30px;
            outline: none;
            transition: .2s ease;
        }
        .input-field:hover, .input-field:focus{
            background: rgba(255, 255, 255, 0.24);
        }
        ::-webkit-input-placeholder{
            color: #fff;
        }
        .input-box i{
            position: relative;
            top: -35px;
            left: 17px;
            color: #fff;
        }
        .submit{
            font-size: 15px;
            font-weight: 500;
            color: black;
            height: 45px;
            width: 100%;
            border: none;
            border-radius: 30px;
            outline: none;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: .3s ease-in-out;
        }
        .submit:hover{
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 1px 5px 7px 1px rgba(255, 255, 255, 0.2);
        }
        .two-col{
            display: flex;
            justify-content: space-between;
            color: #fff;
            font-size: small;
            margin-top: 10px;
        }
        .two-col .one{
            display: flex;
            gap: 5px;
        }
        .two label a{
            text-decoration: none;
            color: #fff;
        }
        .two label a:hover{
            text-decoration: underline;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>WebStay:Admin Login Page</title>
</head>
<body>
<form method="POST" action="">
        <div class="wrapper">
        <div class="form-box">

        <div class="login-container" id="login" >
            <div class="top">
                <span>Switch as User Account?<a href="login.php">Login</a></span>
                <header>Admin Account</header>
            </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Enter your Email" name="email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Enter your Password" name="password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Log In" name="login">
                </div>
        </div>
    </div>
</div>
</form>

</body>
</html>