<?php
include "../../../database.php";

$id = $_POST['id'];
$room_id = $_POST['room_id'];

mysqli_query($conn, "DELETE FROM `reservations` WHERE `id`='$id'");
mysqli_query($conn, "UPDATE `room` SET `status`='available' WHERE `id`='$room_id'");

?>