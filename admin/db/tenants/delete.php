<?php
include "../../../includes/database.php";

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM `tenants` WHERE `id`='$id'");
?>