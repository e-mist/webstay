<?php
include "../../../database.php";

$dir = "../../uploads/";

$id = $_POST['id'];
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
        $query = "UPDATE `room` SET `room_no` = '$room_no', `details` = '$details', `room_type` = '$type', `apartment` = '$apartment', `price` = '$price', `bedrooms` = '$bedrooms', `image_dir` = '$dir_json' WHERE `id` = $id";
}
}
mysqli_query($conn, $query);




?>