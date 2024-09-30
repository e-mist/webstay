<?php
include "../../../database.php";

$name = $_POST['name'];
$apartment = $_POST['apartment'];


if($apartment == "All"){
    $query = "SELECT * FROM `reservations` WHERE `name` LIKE '%$name%' ORDER BY id DESC";
}else{
    $query = "SELECT * FROM `reservations` WHERE `apartment`='$apartment' AND `name` LIKE '%$name%' ORDER BY id DESC";
}


$search = mysqli_query($conn, $query);
$searchData = mysqli_fetch_all($search);

echo json_encode(value: $searchData);

?>