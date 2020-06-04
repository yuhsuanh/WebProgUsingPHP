<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Movie Listing</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../assets/fontawesome/5.13.0/js/all.js"></script>

    <!-- Customer CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"
</head>

<body>

<h1><i class="fas fa-film"></i> Movie Listings <i class="fas fa-film"></i></h1>

<div class="container">
<?php

//1. Connection to DB
//LAMP
//$conn = new PDO('mysql:host=172.31.22.43;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
//LOCAL
$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

//2. Set up the SQL query
$sql = 'SELECT * FROM movies';

//3. Run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll(); //movies variable is an array

//4. start the grid
echo '<table class="table table-striped table-hover table-bordered">';
echo '<thead class="thead-dark"><th>Title</th><th>Year</th><th>Length</th><th>URL</th></thead><tbody>';

//5. Loop through the query results and display the results
foreach($movies as $movie) {
    echo '<tr><td>' . $movie['title'] . '</td>';
    echo '<td>' . $movie['year'] . '</td>';
    echo '<td>' . $movie['length'] . '</td>';
    echo '<td>' . $movie['url'] . '</td></tr>';
}

//6. close the grid
echo '</tbody></table>';

//5. disconnect DB
$conn = null;

?>
</div>

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>