<?php
include "../../../database.php";

$id = $_POST['id'];
$room_id = $_POST['room_id'];

mysqli_query($conn, "UPDATE `reservations` SET `status`='approved' WHERE `id`='$id'");
mysqli_query($conn, "UPDATE `room` SET `status`='available' WHERE `id`='$room_id'");

?>