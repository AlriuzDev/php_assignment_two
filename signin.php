<?php

include_once('database.php');
include_once('validate.php');
$valid = new validate();

$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

$userId;
$first_name;
$last_name;
$userName;
$role;
$avatar;
$res = $database->validUser($username, $password);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        // Display or use the data as needed
        $userId = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $userName = $row['username'];
        $role = $row['role'];
        $avatar = $row['avatar'];
        print_r($row);
    }
    session_start();
    $_SESSION['timeout'] = time() + 30000; //seconds
    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = $role;
    $fname = $first_name;
    $lname = $last_name;
    // Set cookie
    setcookie('firstname', $fname, time() + 1 * 6000, '/'); //seconds
    setcookie('lastname', $lname, time() + 2 * 6000, '/');
    setcookie('username', $userName, time() + 2 * 6000, '/');
    setcookie('role', $role, time() + 2 * 6000, '/');
    setcookie('avatar', $avatar, time() + 2 * 6000, '/');

    // redirect the user
    header('Location: user-view.php');
} else {

    echo 'Invalid user login';
    // echo 'Query failed: ' . mysqli_error($this->connection);
}
$database->close();
