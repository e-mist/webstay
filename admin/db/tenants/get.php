<?php
include "../../../includes/database.php";

$allTenants = mysqli_query($conn, "SELECT * FROM `tenants` ORDER BY `id` DESC");
$allTenantsData = mysqli_fetch_all($allTenants);

echo json_encode(value: $allTenantsData);


?>