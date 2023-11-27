<?php
session_start();
// require './includes/header.php';

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
    $res = $database->fetchProducts();
    if ($res) {
        // run the query and store the results
        while ($row = mysqli_fetch_assoc($res)) {
            // Display or use the data as needed
            print_r($row);
            // $userId = $row['user_id'];
            // $first_name = $row['first_name'];
            // $last_name = $row['last_name'];
            // $userName = $row['username'];
            // $role = $row['role'];
            // $avatar = $row['avatar'];
        }

?>
        <section>
            <h2>View Records
                <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
            </h2>
            <table class="table table-hover table-dark table-striped">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // 

                    $customers = $customerObj->displayData();
                    if ($customers != null) {
                        foreach ($customers as $customer) {
                            //  
                    ?>
                            <tr>

                                <td><?php echo $customer['name'] ?></td>
                                <td><?php echo $customer['email'] ?></td>
                                <td><?php echo $customer['salary'] ?></td>
                                <td>
                                    <button class="btn btn-danger"><a href="edit.php?editId=<?php echo $customer['id'] ?>">
                                            <i class="fa fa-pencil text-white"></i></a></button>
                                    <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="return confirm('Are you sure?'); return false;">
                                            <i class="fa fa-trash text-white"></i>
                                        </a></button>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </section>
<?php
    }



    // start our table
    // echo '<section class="person-row">';
    // echo '<table class="table table-striped">
    //               <tr>
    //                   <th>First Name</th>
    //                   <th>Last Name</th>
    //                   <th>Email</th>
    //                   <th>Phone Number</th>
    //               </tr>';

    // foreach ($result as $row) {
    //     echo '<tr>
    //                   <td>' . $row['fname']  . '</td>
    //                   <td>' . $row['lname']  . '</td>
    //                   <td>' . $row['email']  . '</td>
    //                   <td>' . $row['telNumber']  . '</td>
    //           </tr>';
    // }

    // // close the table
    // echo '</table>';

    // // Display the username from the session variable if available
    // if (isset($_SESSION['user_id'])) {
    //     $fname = htmlspecialchars($_COOKIE['firstname']);
    //     $lname = htmlspecialchars($_COOKIE['lastname']);
    //     echo '<p>Welcome back, ' . $fname . ' ' . $lname . '!</p>';
    // }

    // echo '<a class="btn btn-warning" href="logout.php">Logout</a>';
    // echo '</section>';

    // disconnect
    $database->close();
}

// require './includes/footer.php';
