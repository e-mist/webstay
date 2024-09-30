<?php
include "../../../database.php";

$id = $_POST['id'];

$searchRoom = mysqli_query($conn, "SELECT * FROM `room` WHERE `id`='$id'");
$searchRoomData = mysqli_fetch_assoc($searchRoom);

echo json_encode(value: $searchRoomData);

?>