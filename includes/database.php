<?php
error_reporting(0);
//echo $_SERVER['REQUEST_URI'];
$host = "localhost";
$user = "root";
$dbpass = "";
$dbname = "webstay_db";
global $conn; 
$conn = mysqli_connect($host,$user,$dbpass) or die('Failed to connect to Database Server');
$db = mysqli_select_db($conn,$dbname);

mysqli_query($conn,"SET CHARACTER SET 'utf8'");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

function GetValue($sql_query) {error_reporting(0);
	global $conn;
	$result = mysqli_query($conn,$sql_query);
	$row = mysqli_fetch_array($result);
	return $row[0];
}

?>