<?php
include "../../../database.php";

$dir = "../../uploads/";

$room_no = $_POST['room_no'];
$details = $_POST['details'];
$type = $_POST['type'];
$apartment = $_POST['apartment'];
$price = $_POST['price'];
$bedrooms = $_POST['bedrooms'];

$image_name = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$files_array = array_combine($tmp, $image_name);

$dir_object = [];
$index = 0;

foreach($files_array as $tmp_folder => $name){


    $dir_object[$index] = new stdClass();
    $dir_object[$index]->name = $name;

    $index++;
};
$dir_json = json_encode($dir_object);

foreach($files_array as $tmp_folder => $name){
    
    if(move_uploaded_file($tmp_folder, $dir.$name) ){
    $query = "INSERT INTO `room`(`room_no`, `room_type`, `apartment`, `details`, `bedrooms`, `price`, `image_dir`) VALUES ('$room_no','$type','$apartment','$details','$bedrooms','$price','$dir_json')";
}

};

mysqli_query($conn, $query);

?>