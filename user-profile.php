<?php
session_start();
require './includes/header.php';

// check for authentication before we show any data
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset();     // Unset all session variables
    session_destroy();
    header('location: signin.php');
    exit();
} else {
    // connect to db
    include_once('database.php');
    $_SESSION['timeout'] = time() + 120; // seconds (2 minutes)

    // set up query
    $sql = "SELECT * FROM phppeople";

    // run the query and store the results
    $result = $conn->query($sql);

    // start our table
    echo '<section class="person-row">';
    echo '<table class="table table-striped">
                  <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                  </tr>';

    foreach ($result as $row) {
        echo '<tr>
                      <td>' . $row['fname']  . '</td>
                      <td>' . $row['lname']  . '</td>
                      <td>' . $row['email']  . '</td>
                      <td>' . $row['telNumber']  . '</td>
              </tr>';
    }

    // close the table
    echo '</table>';

    // Display the username from the session variable if available
    if (isset($_SESSION['user_id'])) {
        $fname = htmlspecialchars($_COOKIE['firstname']);
        $lname = htmlspecialchars($_COOKIE['lastname']);
        echo '<p>Welcome back, ' . $fname . ' ' . $lname . '!</p>';
    }

    echo '<a class="btn btn-warning" href="logout.php">Logout</a>';
    echo '</section>';

    // disconnect
    $conn = null;
}

require './includes/footer.php';
