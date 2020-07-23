<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Display a Movie</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../assets/fontawesome/5.13.0/js/all.js"></script>

    <!-- Customer CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"
</head>

<body>

<h1><i class="fas fa-film"></i> Display the Movie <i class="fas fa-film"></i></h1>
<div class="container">
<?php

$title = $_POST['title'];
//var_dump, which will print out data structure and data, use to debug
//var_dump($title);

//Connection to DB
//LOCAL
$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

//Set up the SQL query
$sql = 'SELECT * FROM movies WHERE title = :title';

//Run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
$cmd->execute();
$movie = $cmd->fetch();

//echo 'Title: ' . $movie['title'] . '<br>';
//echo 'Year: ' . $movie['year'] . '<br>';
//echo 'Length: ' . $movie['length'] . ' minutes<br>';
//echo 'URL: <a href="' . $movie['url'] . '">' . $movie['url'] . '</a><br>';

echo <<<EOT
<table class="table table-bordered table-hover">
    <tr>
        <th scope="row">Title:</th>
        <td>$movie[title]</td>
    </tr>
    <tr>
        <th scope="row">Year:</th>
        <td>$movie[year]</td>
    </tr>
    <tr>
        <th scope="row">Length(mins):</th>
        <td>$movie[length]</td>
    </tr>
    <tr>
    <th scope="row">URL:</th>
    <td><a href="$movie[url]">$movie[url]</a></td>
</tr>
</table>
EOT;


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