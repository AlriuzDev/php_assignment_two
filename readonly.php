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

<body class="body-product-info">
    <header>
        <?php require './includes/global-nav.php'; ?>
    </header>
    <?php

    // Include database file
    include_once('database.php');
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
        $pCreated = $value['createdAt'];
        $pUpdated = $value['updatedAt'];
    }
    ?>
    <main class="main-product-info">
        <section class="container">
            <div class="main-dark-background" >
                <h4 class="text-white">Update Records</h4>
                <form method="POST" >

                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $pTitle ?>" required style="background-color: #212529; color: #fbfbfb;" disabled>
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $pPrice ?>" required="" style="background-color: #212529; color: #fbfbfb;" disabled>
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="description">Description:</label>
                        <textarea type="text" class="form-control" name="description" required="" style="background-color: #212529; color: #fbfbfb;" disabled><?php echo $pDescription ?></textarea>
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="images">images:</label>
                        <img src="<?= $pImages1 ?>" alt="img1" class="img-fluid" style="background-color: #212529; color: #fbfbfb;" disabled>
                    </div>

                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="createdAt">Created:</label>
                        <input type="text" name="created" value="<?php echo $pCreated ?>" style="background-color: #212529; color: #fbfbfb;"  disabled>
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label for="updatedAt">Updated:</label>
                        <input type="text" name="updated" value="<?php echo $pUpdated ?>" style="background-color: #212529; color: #fbfbfb;" disabled>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="productID" value="<?php echo $pID ?>">
                        <a href="user-view.php" class="btn btn-primary" style="float:right;">
                            Return
                        </a>
                    </div>

                </form>

            </div>
        </section>

    </main>

</body>

</html>