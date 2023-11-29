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
    <main class="main-product-info">
        <!-- <h1> New Product</h1> -->
        <section class="container">
            <div class="main-dark-background">
                <h4 class="text-white">Add Product</h4>
                <form method="POST" action="./includes/created-product.php" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" required></input>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" required=""></input>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea type="text" class="form-control" name="description" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">images:</label>
                        <div class="input-group mb-3">
                            <input type="file" name="image" id="image" accept="image/*" class="form-control" id="inputGroupFile01">
                            <!-- <input type="file" class="form-control" name="image"> -->
                        </div>
                    </div>
                    <div class="form-group btn-group-prod">
                        <input type="reset" name="reset" class="btn btn-danger" style="float:right;" value="Reset">
                        <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Create">
                    </div>
                </form>
            </div>
        </section>

    </main>

</body>

</html>