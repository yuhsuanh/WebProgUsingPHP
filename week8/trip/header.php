<?php
ob_start();
?>
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../../assets/fontawesome/5.13.0/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- navigations -->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="menu.php">
                <img src="icon.png" height="45" class="d-inline-block align-top" alt="icon">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trips.php">Trips Listing</a>
                    </li>
                     <?php if (!empty($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="trip.php">Add Trip</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            
            <div class="mx-auto">
                <?php if (empty($_SESSION['user_id'])) { ?>
                    <a class="btn btn-success" href="login.php">Sign in <i class="fas fa-sign-in-alt"></i></a>
                    <a class="btn btn-primary" href="register.php">Sign up <i class="fas fa-user-plus"></i></a>
                <?php } else { ?>
                    <a class="btn btn-danger" href="logout.php" onclick="return confirm('Are you sure you want to log out?');">Logout <i class="fas fa-sign-out-alt"></i></a>
                <?php } ?>
            </div>
        </nav>
    </div>
</header>