<?php
include_once('../database.php');

$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];

$target_dir = "assets/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
print_r($target_file);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$image = $uploadOk ? $target_file : null;
$updated = $database->createdProduct($title, $price, $description, $image,);
$database->close();

if ($updated) {
    header("Location:../user-view.php");
} else {
    echo "product creation failed try again!";
}