<?php
// access the current session
session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
    // if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="back_color">
            <div class="text_center">
                <a class="nes-btn" href="menu.php">Home</a>
                <a class="nes-btn" href="movies.php">Movies</a>
                <a class="nes-btn" href="movie.php">Add movie</a>
                <a class="nes-btn is-error" href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <h1><span class="nes-text">Add Movie</span></h1>

    <?php
    if (!empty($_GET['movie_id'])) {
        $movie_id = $_GET['movie_id'];

        // connect
        $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

        // write the sql query
        $sql = "SELECT * FROM movies WHERE movie_id = :movie_id";

        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
        $cmd->execute();
        $movie = $cmd->fetch();

        // populate the fields for the selected movie from the query result
        $title = $movie['title'];
        $length = $movie['length'];
        $year = $movie['year'];
        $url = $movie['url'];

        // disconnect
        $conn = null;
    }
    ?>

    <form method="post" action="save-movie.php">
        <fieldset>
            <legend><span class="nes-text is-primary">Movie</span></legend>
            <div class="nes-field">
                <label for="title">Title: </label>
                <input id="title" name="title" class="nes-input" required value="<?php echo $title ?? ''; ?>">
            </div>
            <div>
                <label for=""year>Year: </label>
                <input id="year" name="year" class="nes-input" type="number" required value="<?php echo $year ?? ''; ?>">
            </div>
            <div>
                <label for="length">Length: </label>
                <input id="length" name="length" class="nes-input" type="number" required value="<?php echo $length ?? ''; ?>">
            </div>
            <div>
                <label for="url">URL: </label>
                <input id="url" name="url" class="nes-input" type="url" required value="<?php echo $url ?? ''; ?>">
            </div>
            <br>
            <input name="movie_id" type="hidden" value="<?php echo $movie_id ?? ''; ?>" />

            <button type="submit" class="nes-btn">save movie</button>
        </fieldset>
    </form>
</body>
</html>