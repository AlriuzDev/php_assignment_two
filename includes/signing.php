<?php

include_once('../database.php');

$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

$userId;
$first_name;
$last_name;
$userName;
$role;
$avatar;
$res = $database->validUser($username, $password);
print_r($res);
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
    session_regenerate_id(true);
    $_SESSION['timeout'] = time() + 300; //seconds
    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = $role;
    $_SESSION['avatar'] = $avatar;
    $fname = $first_name;
    $lname = $last_name;
    $fullName = $fname . " " . $lname;
    $_SESSION['fullName'] = $fullName;
    // Set cookie
    setcookie('firstname', $fname, time() + 1 * 60, '/'); //seconds
    setcookie('lastname', $lname, time() + 2 * 60, '/');
    setcookie('username', $userName, time() + 2 * 60, '/');
    setcookie('role', $role, time() + 2 * 60, '/');
    setcookie('avatar', $avatar, time() + 2 * 60, '/');

    // redirect the user
    if (isset($_SESSION['user_id'])) {
        header('Location: ../user-view.php');
    } else {
        header('Location: ../index.php?msg=deleted"');
    }
} else {
    error_log('Invalid user login');
    echo 'Invalid user login';
    // echo 'Invalid user login';
    // echo 'Query failed: ' . mysqli_error($this->connection);
}
$database->close();
