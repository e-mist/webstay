<?php
include "../../../database.php";

$allApartments = mysqli_query($conn, "SELECT * FROM `apartments` ");
$allApartmentsData = mysqli_fetch_all($allApartments);

echo json_encode(value: $allApartmentsData);


?>