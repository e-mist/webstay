<?php
include "../../../database.php";

$rooms = mysqli_query($conn, "SELECT * FROM `room` WHERE `apartment`='jaiden'");
$roomsData = mysqli_fetch_all($rooms);

echo json_encode(value: $roomsData);


?>