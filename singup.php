<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>InveTkr</title>
</head>

<body>
    <header>
        <?php
        include('./includes/global-nav.php');
        ?>
    </header>
    <main class="index">
        <section class="section-form">
            <h2>Don't have an account, then sign up below!</h2>
            <form method="post" action="save-user.php">
                <div class="row g-3">
                    <div class="col">
                        <p><input class="form-control" name="first_name" type="text" placeholder="First Name" required /></p>
                    </div>
                    <div class="col">
                        <p><input class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
                    </div>
                </div>
                <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                <p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
                <div class="input-group mb-3">
                    <input type="file" class="form-control"  name="avatar" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Register" />
            </form>
        </section>
    </main>

    <footer>
        <?php
        include('./includes/footer-nav.php');
        ?>
    </footer>

</body>

</html>