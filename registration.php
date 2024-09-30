<?php
    include('database.php'); 
    session_start();

    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname =  $_POST['lname'];
        $email =  $_POST['email'];   
        $contact = $_POST['contact'];
        $password =  $_POST['password'];

        $sql = "INSERT INTO tblregistration(registerid, firstname, lastname, contact, email, userpassword) 
            VALUES ('', '$fname','$lname','$contact','$email','$password')";

        $add = mysqli_query($conn,$sql);

        if(!$add){
            die('Unable to add new item');
        }
        else{
            header('location:login.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>WebStay: Registration Page</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Courier New', Courier, monospace;
    }

    /* Body Styles */
    body {
        background: url("images/Este.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    /* Wrapper Styles */
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 110vh;
        background: rgba(39, 39, 39, 0.6);
    }

    /* Form Box Styles */
    .form-box {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 850px;
        height: 600px;
        overflow: hidden;
        z-index: 2;
    }

    /* Register Container Styles */
    .register-container {
        width: 550px;
        display: flex;
        flex-direction: column;
        transition: .5s ease-in-out;
    }

    /* Top Section Styles */
    .top {
        padding: 10px 0;
    }

    .top span {
        color: #fff;
        font-size: small;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .top span a {
        font-weight: 500;
        color: #fff;
        margin-left: 5px;
    }

    /* Header Styles */
    header {
        color: #fff;
        font-size: 30px;
        text-align: center;
        padding: 10px 0 30px 0;
        margin-bottom: 15px;
    }

    /* Form Fields Styles */
    .two-forms {
        display: flex;
        gap: 5px;
    }

    .input-box {
        width: 100%;
        margin-bottom: 15px;
        position: relative;
    }

    .input-field {
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

    .input-field:hover,
    .input-field:focus {
        background: rgba(255, 255, 255, 0.24);
    }

    ::-webkit-input-placeholder {
        color: #fff;
    }

    .input-box i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 17px;
        color: #fff;
    }

    /* Submit Button Styles */
    .submit {
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
        display: block;
        margin: 0 auto;
        text-align: center;
        line-height: 45px;
        padding: 0 20px;
    }

    .submit:hover {
        background: rgba(255, 255, 255, 0.5);
        box-shadow: 1px 5px 7px 1px rgba(255, 255, 255, 0.2);
    }

    /* Two Column Styles */
    .two-col {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        font-size: small;
        margin-top: 10px;
        width: 100%;
    }

    .one {
        display: flex;
        gap: 5px;
    }

    .two {
        width: auto;
    }

    .two label a {
        text-decoration: none;
        color: #fff;
    }

    .two label a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <form method="POST" action="registration.php">
        <div class="wrapper">
            <div class="form-box">
                <div class="register-container" id="register">
                    <div class="top">
                        <span>Have an account? <a href="login.php">Log In</a></span>
                        <header>Sign up</header>
                    </div>
                    
                    <!-- First and Last Name Input Boxes -->
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Firstname" name="fname" required>
                            <i class="bx bx-user"></i>
                        </div>
                        
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Lastname" name="lname" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    
                    <!-- Contact Number Input Box -->
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Contact no." name="contact" required>
                        <i class="bx bx-user"></i>
                    </div>
                    
                    <!-- Email Input Box -->
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="pac******@gmail.com" name="email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    
                    <!-- Password Input Box -->
                    <div class="input-box pass-form">
                        <input type="password" class="input-field" placeholder="Password" name="password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    
                    <!-- Register Button -->
                    <div class="input-box">
                        <input type="submit" class="submit input-field" name="register" value="Register">
                    </div>
                    
                </div> <!-- .register-container -->
            </div> <!-- .form-box -->
        </div> <!-- .wrapper -->
    </form>
</body>
</html>