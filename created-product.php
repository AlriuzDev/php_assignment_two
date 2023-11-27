<?php
include_once('database.php');
include_once('validate.php');
$valid = new validate();

$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$image1 = $_POST['image1'];

$updated = $database->createdProduct($title, $price, $description, $image1,);
$database->close();
if ($updated) {
    header("Location:user-view.php");
} else {
    echo "product creation failed try again!";
}