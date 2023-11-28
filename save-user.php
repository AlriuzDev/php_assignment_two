<?php
include_once('database.php');
include_once('./includes/validate.php');
$valid = new validate();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$validation = false;

// validation
$check_first_name = $valid->isEmpty($first_name) ? '<p>First name required</p>' : null;
$check_last_name = $valid->isEmpty($last_name) ? '<p>Last name required</p>' : null;
$check_username = $valid->isEmpty($username) ? '<p>username required</p>' : null;
$check_password = $valid->isEmpty($username) ? '<p>Invalid passwords</p>' : null;
// $check_password = ($valid->isEmpty($username) || ($password != $confirm)) ? '<p>Invalid passwords</p>' : null;

$validation = !$check_first_name && !$check_last_name && !$check_username && !$check_password;

$msg = null;
$res = null;

$target_dir = "assets/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
print_r($target_file);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$avatar = $uploadOk ? $target_file : null;

if ($validation) {
    $password = hash('sha512', $password);
    $res = $database->create($first_name, $last_name, $username, $password, $avatar);
    
    header("Location: index.php");
}
$database->close();

$msg = $res ? 'Successfully inserted data' : 'Failed to insert data';
