
<nav class="container nav-container">
    <div class="row">
        <div class="col text-start">
            <i class='bx bxs-store-alt'></i>
        </div>
        <div class="col text-center">
            <a class="navbar-brand" href="./index.php"> Inven<span class="header-span">Tkr</span></a>
        </div>


        <div class="col text-end avatar-column">
            <?php
            session_start();
            ?>
            <img src="<?php echo $_SESSION['avatar']; ?>" class="rounded-circle w-25 p-3" alt="...">
            <a class="dropdown-item" href="./includes/logout.php"><i class='bx bx-log-out'></i></a>
        </div>


    </div>
</nav>
