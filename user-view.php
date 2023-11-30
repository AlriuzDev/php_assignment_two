<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>InveTkr</title>
</head>

<body class="body-user-view">

    <?php
    require './includes/global-nav.php';

    // session_start();
    // check for authentication before we show any data
    if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
        session_unset();     // Unset all session variables
        session_destroy();
        header('location: signing.php');
        exit();
    } else {
        // connect to db
        include_once('database.php');
        $_SESSION['timeout'] = time() + 120; // seconds (2 minutes)
        $userRole = $_SESSION['role'];
        // $isAdmin = $userRole == 'admin' ? true : false;
        $isAdmin = ($userRole == 'admin');
        // set up query
        $products = $database->fetchProducts();
        // print_r($products);
        if ($products) {
            // run the query and store the results
            // print_r($isAdmin);
    ?>
            <section class="section-table-user-view">
                <div class="table-header-view">
                    <h2>Product Inventory</h2>
                    <div>
                        <?php
                        if ($isAdmin) {
                        ?><a href="add-product.php" style="float:right;"><button class="btn btn-success btn-custom-inv"><i class='bx bx-plus-circle'></i></button></a>
                        <?php
                        } ?>
                    </div>
                </div>
                <?php
                if (isset($_GET['msg1']) == "updated") {
                    echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        Product Updated
                        </div>";
                    unset($_GET['msg1']);
                }
                if (isset($_GET['msg2']) == "deleted") {
                    echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        Product successfully deleted
                        </div>";
                    unset($_GET['msg2']);
                }
                if (isset($_GET['msg3']) == "created") {
                    echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        Product created successfully
                        </div>";
                    unset($_GET['msg3']);
                }

                ?>
                <div class="container">

                </div>
                <table class="table table-hover table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <!-- <th>Image</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 
                        if ($products != null) {
                            foreach ($products as $product) {
                                //  
                        ?>
                                <tr>
                                    <td><?php echo $product['productID'] ?></td>
                                    <td><?php echo $product['title'] ?></td>
                                    <td><?php echo $product['price'] ?></td>
                                    <td><?php echo $product['description'] ?></td>
                                    <!-- <td><img src="<?= $product['image1'] ?>" alt="img1" class="img-fluid rounded mx-auto d-block"></td> -->
                                    <?php
                                    if ($isAdmin) {
                                    ?>
                                        <td class="td-action">
                                            <div class="action-btn">
                                                <a href="edit-product.php?editId=<?php echo $product['productID'] ?>" class="btn btn-danger btn-custom-inv">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a href="./includes/deleted-product.php?deletedId=<?php echo $product['productID'] ?>" class="btn btn-danger btn-custom-inv" onclick="return confirm('Are you sure?'); return false;">
                                                    <i class='bx bx-trash-alt'></i>
                                                </a>

                                            </div>

                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>

                                            <a href="readonly.php?editId=<?php echo $product['productID'] ?>" class="btn btn-danger">
                                                <i class='bx bx-search-alt'></i>
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </section>
    <?php
        }

        // disconnect
        $database->close();
        // require './includes/footer.php';
    } ?>
</body>