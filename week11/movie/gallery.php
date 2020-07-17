<?php
require_once('auth.php');
//session_start();

//Set page title
$page_title = null;
$page_title = "Gallery";

//Embed the header
require_once('header.php');

//Get movies from database
require ('db.php');
$sql = 'SELECT movie_id, title, photo FROM movies WHERE photo IS NOT NULL';
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll();

?>

<h1>Movie Posters</h1>
<main id="posters" class="container text_center">
    <?php
        foreach ($movies as $movie) {
            echo '<div>';
            echo '<a href="movie.php?movie_id=' . $movie['movie_id'] . '"  title="Movie Title">';
            echo '<img class="moviePoster" src="images/' . $movie['photo'] . '" title="' . $movie['title'] . '">';
            echo '</a>';
            echo '</div>';
        }
    ?>
</main>


<?php
//Embed the footer
require_once('footer.php');
?>