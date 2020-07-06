<?php ob_start();
// access the current session
//session_start();

// check if there is a user identity stored in the session object
//if (empty($_SESSION['user_id'])) {
//    // if there is no user_id in the session, redirect the user to the login page
//    header('location:login.php');
//    exit();
//}

require_once('auth.php');

?>


<!--Delete from DOCTYPE to body opening tag, because all of this are duplicated. (Same as header.php)-->
<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Movie Listing</title>
-->


<!--    Replace import css stylesheet from header.php file -->
<!--
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
-->

<!--
</head>
<body>
-->


<!--
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
-->
<?php
//Set page title
$page_title = null;
$page_title = "Movies";

//Embed the header
require_once('header.php');
?>

<h1><span class="nes-texts">Movie Listings</span></h1>

<!--<button type="button" class="add nes-btn">add movie</button>-->
<!--<br><br>-->

<div class="nes-table-responsive">
<?php



//1. Connection to DB
//LAMP
//$conn = new PDO('mysql:host=172.31.22.43;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
//LOCAL
//$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
require('db.php');

//2. Set up the SQL query
$sql = 'SELECT * FROM movies';

//3. Run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll(); //movies variable is an array

//4. start the grid
echo '<table class="nes-table is-bordered is-centered">';
echo '<thead><th>Title</th><th>Year</th><th>Length</th><th>URL</th><th>Edit</th><th>Delete</th></thead><tbody>';

//5. Loop through the query results and display the results
foreach($movies as $movie) {
    echo '<tr><td>' . $movie['title'] . '</td>';
    echo '<td>' . $movie['year'] . '</td>';
    echo '<td>' . $movie['length'] . '</td>';
    echo '<td>' . $movie['url'] . '</td>';
    echo '<td><a href="movie.php?movie_id=' . $movie['movie_id'] . '">Edit</a>';
//    echo '<td><button class="delete">DELETE</button></td></tr>';
    echo '<td><a id="delete" href="delete-movie.php?movie_id='. $movie['movie_id'] .'" onclick="return confirm(\'Are you sure you want to delete this movie ?\');">Delete</a></td></tr>';
}

//6. close the grid
echo '</tbody></table>';

//5. disconnect DB
$conn = null;

?>
</div>

<?php
//Embed the footer
require_once('footer.php');
?>

<!--
</body>
</html>
-->