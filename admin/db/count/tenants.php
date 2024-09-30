<?php
include "../../../includes/database.php";

$query = mysqli_query($conn, "SELECT COUNT(*) as tenantsCount FROM `tenants`");
$tenantsCount = mysqli_fetch_assoc($query);

echo json_encode($tenantsCount);


?>