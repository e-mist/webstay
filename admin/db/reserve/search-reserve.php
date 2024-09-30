<?php
include "../../../database.php";

$id = $_POST['id'];


$search = mysqli_query($conn, "SELECT * FROM `reservations` WHERE `id` = '$id' ");
$searchData = mysqli_fetch_assoc($search);

echo json_encode(value: $searchData);

?>