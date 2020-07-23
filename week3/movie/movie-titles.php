<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Select a Movie</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../assets/fontawesome/5.13.0/js/all.js"></script>

    <!-- Customer CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"
</head>

<body>

<?php
//1. Connection to DB
//LOCAL
$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

//2. Set up the SQL query
$sql = 'SELECT title FROM movies';

//3. Run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll(); //movies variable is an array

//4. Loop through the query results and display each record on our page
foreach($movies as $movie) {
    echo $movie['title'] . '<br>';
}

//5. disconnect DB
$conn = null;

?>

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>