<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Movie Listing</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <style>
        body {
            margin: 1rem 3rem;
        }
    </style>
</head>

<body>

<h1><span class="nes-text is-primary">Movie Listings</span></h1>

<button type="button" class="add nes-btn">add movie</button>
<br><br>

<div class="nes-table-responsive">
<?php

//1. Connection to DB
//LOCAL
$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

//2. Set up the SQL query
$sql = 'SELECT * FROM movies';

//3. Run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll(); //movies variable is an array

//4. start the grid
echo '<table class="nes-table is-bordered is-centered">';
echo '<thead><th>Title</th><th>Year</th><th>Length</th><th>URL</th><th>Delete</th></thead><tbody>';

//5. Loop through the query results and display the results
foreach($movies as $movie) {
    echo '<tr><td>' . $movie['title'] . '</td>';
    echo '<td>' . $movie['year'] . '</td>';
    echo '<td>' . $movie['length'] . '</td>';
    echo '<td>' . $movie['url'] . '</td>';
//    echo '<td><button class="delete">DELETE</button></td></tr>';
    echo '<td><a href="delete-movie.php?movie_id='. $movie['movie_id'] .'">Delete</a></td></tr>';
}

//6. close the grid
echo '</tbody></table>';

//5. disconnect DB
$conn = null;

?>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(".add").click(function(){
        $(location).attr('href', 'movie.php')
    });

    $("a").click(function(){
        return confirm('Are you sure you want to delete this movie?');
    })

    // $(".delete").click(function(){
    //     $(location).attr('href', 'delete-movie.php')
    // });
</script>
</body>
</html>