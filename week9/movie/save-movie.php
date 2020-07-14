<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Save Movie</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>
-->

<?php ob_start();
//auth check
require_once('auth.php');

//header
$page_title = null;
$page_title = "Save Movie";
require_once('header.php');
?>

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

<!--<a class="nes-btn" href="movies.php">show movies</a>-->
<!--<br><br>-->

<h1>Saving the Movie...</h1>

<div class="nes-container with-title">
    <p class="title">Messages: </p>
    <?php
        // Get POST data
        $movie_id = $_POST['movie_id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $length = $_POST['length'];
        $url = $_POST['url'];

        $ok = true;

        // title validation
        if(empty($title)) {
           echo '<p><span class="nes-text is-error">Title is required</span></p>';
            $ok = false;
        }
        // year validation
        if(empty($year)) {
            echo '<p><span class="nes-text is-error">Year is required</span></p>';
            $ok = false;
        } else if(is_numeric($year) == false) {
            echo '<p><span class="nes-text is-error">Year is invalid</span></p>>';
            $ok = false;
        }
        // length validation
        if(empty($length)) {
            echo '<p><span class="nes-text is-error">Length is required</span></p>';
            $ok = false;
        } else if(is_numeric($length) == false) {
            echo '<p><span class="nes-text is-error">Length is invalid</span></p>>';
            $ok = false;
        }
        // url validation
        if (empty($url)) {
            echo '<p><span class="nes-text is-error">URL is required</span></p>';
            $ok = false;
        }


        if ($ok == true) {

            try {
                // Connect to Database
                //$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
                require('db.php');

                // Set up the SQL command
                if (empty($movie_id)) {
                    // Set up the SQL INSERT command
                    $sqlCommand = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";
                }
                else {
                    // Set up the SQL UPDATE command to modify the existing movie
                    $sqlCommand = "UPDATE movies SET title = :title, year = :year, length = :length, url = :url WHERE movie_id = :movie_id";
                }

                // Create a command object and fill the parameters with the form values
                $cmd = $conn->prepare($sqlCommand);

                //Bind parameters
                $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
                $cmd->bindParam(':year', $year, PDO::PARAM_INT);
                $cmd->bindParam(':length', $length, PDO::PARAM_INT);
                $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);
                if (!empty($movie_id)) {
                    $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
                }

                // Execute sql command
                $cmd->execute();

                //Disconnect DB
                $conn = null;

                //Display message
                //echo "<p><span class=\"nes-text is-success\">Movie Saved</span></p>";

                //Executing successfully will redirect to movies.php page
                header('location:movies.php');
            } catch (PDOException $e) {
                    die('Could not connect:' . $e->getMessage());
            }
        }
    ?>
</div>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<!--
</body>
</html>
-->
<?php
require_once('footer.php');
ob_flush();
?>