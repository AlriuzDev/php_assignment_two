<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>InveTkr</title>
</head>

<body class="body-index">
    <main class="index main-index">
        <section class="section-index-fig">
        </section>
        <section class="section-form">
            <h1>Sign in</h1>
            <form method="post" action="./includes/signing.php">
                <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                <input class="btn btn-primary" type="submit" name="submit" value="Login" />
            </form>
            <?php
            if (isset($_GET['msg']) == "error") {
                echo "<div class='alert alert-danger alert-dismissible' style='margin-top: 1rem' >
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        Invalid user login
                        </div>";
                $_GET['msg'] = '';
            }
            ?>
            <div class="sign-index">
                <p>Don't have an account? <a href="./signup.php">Create an account</a></p>
            </div>
        </section>
    </main>
</body>

</html>