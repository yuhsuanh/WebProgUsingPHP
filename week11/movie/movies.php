<?php
session_start();

//Set page title
$page_title = null;
$page_title = "Movies";

//Embed the header
require_once('header.php');

// check if the user entered keywords for searching
$keywords = null;
if (!empty($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
    $search_type = $_GET['search_type'];
}

?>

<h1><span class="nes-texts">Movie Listings</span></h1>

<!--<button type="button" class="add nes-btn">add movie</button>-->
<!--<br><br>-->

<div class="nes-table-responsive">
    <div>
        <form method="get" action="movies.php">
            <label for="keywords" class="nes-text">Enter Keywords to Search:</label>
            <input name="keywords" value="<?php echo $keywords; ?>"/>
            <select name="search_type" class="p-5">
                <option value="OR" <?php echo ("OR" == $search_type) ? 'selected':''; ?>>Any Keyword</option>
                <option value="AND" <?php echo ("AND" == $search_type) ? 'selected':''; ?>>All Keywords</option>
            </select>
            <button type="submit" class="searchBtn">Search</button>
        </form>
    </div>

<?php



try {
//1. Connection to DB
    require('db.php');

//2. Set up the SQL query
    $sql = 'SELECT * FROM movies';

    //2.1 Set up the SQL query if user input the keywords
    $word_list = null;
    if(!empty($keywords)) {
        $sql .= ' WHERE ';
        $word_list = explode(" ", $keywords);

        //2.1.1 Add key word to the query condition
        foreach($word_list as $key => $word) {
            $word_list[$key] = "%" . $word . "%";

            // for the first word OMIT the word OR
            if ($key == 0) {
                $sql .= " title LIKE ?";
            } else {
                $sql .= " $search_type title LIKE ?";
            }
        }
    }

//3. Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute($word_list); // // execute the query and store the results, passing the $word_list array as a parameter list to the execute() function
    $movies = $cmd->fetchAll(); //movies variable is an array

//4. start the grid
    echo '<table class="nes-table is-bordered is-centered sortable">';
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
