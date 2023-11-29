<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<nav class="nav-container">
    <section>
        <!-- <i class='bx bxs-store-alt'></i> -->
    </section>
    <section>
        <h1><a class="navbar-brand" href="#"> Inven<span class="header-span">Tkr</span></a></h1>
    </section>
    <section class="nav-img">

        <?php
        session_start();
        ?>
        <a class="dropdown-item" href="./includes/logout.php"><i class='bx bx-log-out'></i></a>
        <img src="<?php echo $_SESSION['avatar']; ?>" class="img-avatar" alt="...">
    </section>

    <!-- <div class="col text-start">
    </div>
    <div class="col text-center">
        
    </div>

    <div class="col text-end avatar-column">
        
    </div> -->

</nav>