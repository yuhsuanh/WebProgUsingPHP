<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>

<header>
    <div class="back_color">
        <div class="text_center">
            <a href="menu.php" class="icon_title">COMP1006 Application</a>
            <a class="nes-btn" href="movies.php">Movies</a>

            <?php if (!empty($_SESSION['user_id'])) { ?>
                <!-- <a class="nes-btn" href="menu.php">Home</a> -->
                <a class="nes-btn" href="gallery.php">Gallery</a>
                <a class="nes-btn" href="movie.php">Add movie</a>
                <a class="nes-btn is-error" href="logout.php">Logout</a>
            <?php }else { ?>
                <a class="nes-btn" href="register.php">Register</a>
                <a class="nes-btn" href="login.php">Login</a>
            <?php } ?>
        </div>
    </div>
</header>
