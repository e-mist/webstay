<?php
include "../../../database.php";

$name = !empty($_POST['name']) ? $_POST['name'] : "";
$type = !empty($_POST['type']) ? $_POST['type'] : "";
$minPrice = !empty($_POST['minPrice']) ? $_POST['minPrice'] : 0;
$maxPrice = !empty($_POST['maxPrice']) ? $_POST['maxPrice'] : 10000;
$capacity = !empty($_POST['capacity']) ? $_POST['capacity'] : 6;
$water = !empty($_POST['water']) ? $_POST['water'] : "";
$electricity = !empty($_POST['electricity']) ? $_POST['electricity'] : "";
$contract = !empty($_POST['contract']) ? $_POST['contract'] : "";
$curfew = !empty($_POST['curfew']) ? $_POST['curfew'] : "";
$pet = !empty($_POST['pet']) ? $_POST['pet'] : "";
$parking = !empty($_POST['parking']) ? $_POST['parking'] : "";
$visitors = !empty($_POST['visitors']) ? $_POST['visitors'] : "";

$sql = "SELECT * FROM `apartments`WHERE `rent_min` >= '$minPrice' AND (`rent_max` <= '$maxPrice' OR `rent_min` <= '$maxPrice') ";    

if(!empty($name)){
    $sql .= "AND `name` LIKE '%$name%' ";
}
if(!empty($type)){
    $sql .= "AND `type` = '$type' ";
}
if(!empty($capacity)){
    $sql .= "AND `capacity_min` <= $capacity ";
}
if(!empty($water)){
    $sql .= "AND `water` = '$water' ";
}
if(!empty($electricity)){
    $sql .= "AND `electricity` = '$electricity' ";
}
if(!empty($contract)){
    $sql .= "AND `contract` = '$contract' ";
}
if(!empty($curfew)){
    $sql .= "AND `curfew` = '$curfew' ";
}
if(!empty($pet)){
    $sql .= "AND `pet` = '$pet' ";
}
if(!empty($parking)){
    $sql .= "AND `parking` = '$parking' ";
}
if(!empty($visitors)){
    $sql .= "AND `visitors` = '$visitors' ";
}




$allApartments = mysqli_query($conn, $sql);

$allApartmentsData = mysqli_fetch_all($allApartments);

echo json_encode(value: $allApartmentsData);



?>