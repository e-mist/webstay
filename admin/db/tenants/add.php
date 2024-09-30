<?php
include "../../../includes/database.php";

$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$apartment_assign = $_POST['apartment_assign'];

mysqli_query($conn, "INSERT INTO `tenants`(`name`, `contact_number`, `apartment_assign`) VALUES ('$name','$contact_number','$apartment_assign')");
?>