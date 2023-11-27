<?php

include_once('database.php');
$id = $_GET['deletedId'];
$deleted = $database->deleteRecord($id);
// print_r($id);

if ($deleted) {
    header("Location:user-view.php");
} else {
    echo "Product delete failed try again!";
}
