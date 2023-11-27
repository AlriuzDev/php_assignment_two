<?php

include_once('database.php');

$id = $_POST['productID'];
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$updated = $database->updatedProductById($id, $title, $price, $description);
if ($updated) {
    header("Location:user-view.php");
} else {
    echo "Registration updated failed try again!";
}