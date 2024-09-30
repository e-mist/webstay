<?php
include "../../../includes/database.php";

$name = $_POST['name'];
$apartment_assign = $_POST['apartment_assign'];

if($apartment_assign == "All"){
    $query = "SELECT * FROM `tenants` WHERE `name` LIKE '%$name%' ORDER BY id DESC";
}else{
    $query = "SELECT * FROM `tenants` WHERE `name` LIKE '%$name%' AND `apartment_assign` = '$apartment_assign' ORDER BY id DESC";
}

$allTenants = mysqli_query($conn, $query);
$allTenantsData = mysqli_fetch_all($allTenants);

echo json_encode($allTenantsData);


?>