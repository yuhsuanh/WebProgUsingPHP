<?php
session_start();

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
try {
    require('db.php');

//2. Set up the SQL query
    $sql = 'SELECT * FROM movies';

//3. Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $movies = $cmd->fetchAll(); //movies variable is an array

//4. start the grid
    echo '<table class="nes-table is-bordered is-centered">';
    echo '<thead><th>Title</th><th>Year</th><th>Length</th><th>URL</th>';
     if (!empty($_SESSION['user_id'])) {
         echo '<th>Edit</th><th>Delete</th>';
     }
    echo '</thead><tbody>';

//5. Loop through the query results and display the results
    foreach ($movies as $movie) {
        echo '<tr><td>' . $movie['title'] . '</td>';
        echo '<td>' . $movie['year'] . '</td>';
        echo '<td>' . $movie['length'] . '</td>';
        echo '<td>' . $movie['url'] . '</td>';
        if (!empty($_SESSION['user_id'])) {
            echo '<td><a href="movie.php?movie_id=' . $movie['movie_id'] . '">Edit</a>';
            echo '<td><a id="delete" href="delete-movie.php?movie_id=' . $movie['movie_id'] . '" onclick="return confirm(\'Are you sure you want to delete this movie ?\');">Delete</a></td></tr>';
        }
    }

//6. close the grid
    echo '</tbody></table>';

//5. disconnect DB
    $conn = null;
} catch(Exception $e) {
    header('location:error.php');
}

?>
</div>

<?php
//Embed the footer
require_once('footer.php');
?>
