<?php
include "../../../database.php";

$allReservations = mysqli_query($conn, "SELECT * FROM `reservations` WHERE `status`='approved' ORDER BY `id` DESC");
$allReservationsData = mysqli_fetch_all($allReservations);

echo json_encode(value: $allReservationsData);

?>