<?php

// Include database file
include_once('database.php');

// $productTitle;

//Edit customer record
if (!empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $product = $database->displayProductById($editId);
    foreach ($product as $value)
        $pID = $value['productID'];
    $pTitle = $value['title'];
    $pPrice = $value['price'];
    $pDescription = $value['description'];
    $pImages1 = $value['image1'];
    $pImage2 = $value['image2'];
    $pImage3 = $value['image3'];
    $pCreated = $value['createdAt'];
    $pUpdated = $value['updatedAt'];
}
?>



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

<body>
    <header>

        <h1> Edit</h1>
    </header>
    <!-- <?php print_r($product); ?> -->
    <section class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Update Records</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="user-view.php">

                            <div class="form-group">
                                <label for="name">Title:</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $pTitle ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $pPrice ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" name="description" value="<?php echo $pDescription ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="images">images:</label>
                                <img src="<?= $pImages1 ?>" alt="img1" class="img-fluid">
                                <img src="<?= $pImages2 ?>" alt="img2" class="img-fluid">
                                <img src="<?= $pImages3 ?>" alt="img3" class="img-fluid">
                            </div>

                            <div class="form-group">
                                <label for="createdAt">Created:</label>
                                <input type="text" name="created" value="<?php echo $pCreated ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="updatedAt">Updated:</label>
                                <input type="text" name="updated" value="<?php echo $pUpdated ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="productID" value="<?php echo $customer['productID']; ?>">
                                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                            </div>

                        </form>
                        <?php
                        // Update Record in customer table
                        if (!empty($_POST)) {
                            $id = $_POST['productID'];
                            $title = $_POST['title'];
                            $price = $_POST['price'];
                            $usalary = $_POST['description'];
                            // $customerObj->updateRecord($uname, $uemail, $usalary, $id);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>