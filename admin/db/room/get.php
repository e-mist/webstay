<?php
include "../../../database.php";

$allRoomsApartment = mysqli_query($conn, "SELECT * FROM `room` ");
$allRoomsApartmentsData = mysqli_fetch_all($allRoomsApartment);

echo json_encode(value: $allRoomsApartmentsData);


?>