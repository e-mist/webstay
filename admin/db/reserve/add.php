<?php
include "../../../database.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../phpmailer/src/Exception.php';
require '../../../phpmailer/src/PHPMailer.php';
require '../../../phpmailer/src/SMTP.php';

$id = $_POST['id'];
$status = "occoupied";

$apartment = $_POST['apartment'];
$room_no = $_POST['room_no'];
$payment = $_POST['payment'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$guests = $_POST['guests'];
$check_in = !empty($_POST['check_in']) ? $_POST['check_in'] : "";
$check_out = !empty($_POST['check_out']) ? $_POST['check_out'] : "";


$dir = "../../proof_uploads/";

$image_name = $_FILES['proof_payment']['name'];
$tmp = $_FILES['proof_payment']['tmp_name'];
$target_file = $dir.$image_name;

$query_add = "";

if(move_uploaded_file($tmp, $target_file) ){
    $query_update = "UPDATE `room` SET `status` = '$status' WHERE `id` = '$id'";

    if($check_in == "" && $check_out == ""){
        $query_add = "INSERT INTO `reservations`(`name`, `email`, `phone`, `address`, `no_of_person`, `apartment`, `room_no`, `proof_of_payment`) 
    VALUES ('$name','$email','$phone','$address','$guests', '$apartment', '$room_no', '$image_name')";
    }else{
        $query_add = "INSERT INTO `reservations`(`name`, `email`, `phone`, `address`, `check_in`, `check_out`, `no_of_person`, `apartment`, `room_no`, `proof_of_payment`) 
    VALUES ('$name','$email','$phone','$address','$check_in','$check_out','$guests', '$apartment', '$room_no', '$image_name')";
    }
    

    mysqli_query($conn, $query_update);
    mysqli_query($conn, $query_add);

    $mail = new PHPMailer(true);
            
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'webstay58@gmail.com';                     //SMTP username
    $mail->Password   = 'jvrk qawm loqy xfbu';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
    //Recipients
    $mail->setFrom('webstay58@gmail.com');
    $mail->addAddress($email);     //Add a recipient
            
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  'Payment Confirmation for '.$apartment.', Room No: '.$room_no;
    $mail->Body    = 'Dear '.$name.',<br><br>I hope this email finds you well.<br><br>
    Please find below the payment details for the apartment:<br>
    <b>Apartment Name</b>: '.$apartment.'<br>
    <b>Room No</b>: '.$room_no.'<br>
    <b>Total Payment: </b>: ₱'.$payment.'<br>
    <b>Proof of Payment: </b>: '.$image_name.'<br><br>
    Kindly wait for 24 hours for the payment to be validated.<br>
    If you have any further questions or require additional information,<br> feel free to contact me.<br><br>
    Thank you for your attention to this matter.<br><br>
    Best regards,<br>
    WebStay<br>
    webstay58@gmail.com';
            
    $mail->send();
}else{
    $query_update = "UPDATE `room` SET `status` = '$status' WHERE `id` = '$id'";

    if($check_in == "" && $check_out == "" ){
        $query_add = "INSERT INTO `reservations`(`name`, `email`, `phone`, `address`, `no_of_person`, `apartment`, `room_no`, `proof_of_payment`) 
    VALUES ('$name','$email','$phone','$address','$guests', '$apartment', '$room_no', '$image_name')";
    }else{
        $query_add = "INSERT INTO `reservations`(`name`, `email`, `phone`, `address`, `check_in`, `check_out`, `no_of_person`, `apartment`, `room_no`, `proof_of_payment`) 
    VALUES ('$name','$email','$phone','$address','$check_in','$check_out','$guests', '$apartment', '$room_no', '$image_name')";
    }

    mysqli_query($conn, $query_update);
    mysqli_query($conn, $query_add);

    $mail = new PHPMailer(true);
            
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'webstay58@gmail.com';                     //SMTP username
    $mail->Password   = 'jvrk qawm loqy xfbu';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
    //Recipients
    $mail->setFrom('webstay58@gmail.com');
    $mail->addAddress($email);     //Add a recipient
            
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  'Payment Notice for '.$apartment.', Room No: '.$room_no;
    $mail->Body    = 'Dear '.$name.',<br><br>I hope you are doing well.<br><br>
    Below are the payment details for the apartment:<br>
    <b>Apartment Name</b>: '.$apartment.'<br>
    <b>Room No</b>: '.$room_no.'<br>
    <b>Total Payment: </b>: ₱'.$payment.'<br><br>
    Please be advised that if payment is not made within 7 days, this transaction will be disregarded.<br>
    If you have any questions or need further clarification, feel free to reach out.<br><br>
    Thank you for your cooperation.<br><br>
    Best regards,<br>
    WebStay<br>
    webstay58@gmail.com';
            
    $mail->send();
}



?>