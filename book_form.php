<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

   $connection = mysqli_connect('localhost','root','','webstay_db');

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      // $location = $_POST['location'];
      $guests = $_POST['guests'];
      // $arrivals = $_POST['arrivals'];
      // $leaving = $_POST['leaving'];

      if($name == "" || $email == "" || $phone == "" || $address == "" || $guests == ""){
         $_SESSION['err_message'] = "Fill up all fields";
         header('location:reservation.php');
      }else{
         // $request = " insert into book_form(id, name, email, phone, address, location, guests, arrivals, leaving) values('','$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
         $request = " insert into book_form(id, name, email, phone, address, guests) values('','$name','$email','$phone','$address','$guests') ";
         mysqli_query($connection, $request);
         $_SESSION['success_message'] = "room booked successfully. Please check your gmail.";

         $mail = new PHPMailer(true);
         
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'edrylmoratas.p.use@gmail.com';                     //SMTP username
            $mail->Password   = 'odyb owdh mwae geiq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('edrylmoratas.p.use@gmail.com');
            $mail->addAddress($email);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'WebStay Reservation Success.';
            $mail->Body    = 'Thank you <b>'.$name.'</b> your reservation is added.';
        
            $mail->send();
         header('location:reservation.php');
      }

       

   }else{
      echo 'something went wrong please try again!';  
   }

?>