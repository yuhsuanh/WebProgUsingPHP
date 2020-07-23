<!--
    if you have this error "Cannot redirect, headers already sent", please add these php function
    At the very top of your page, before any html and with no blank lines above (Delete space before first question mark)
    < ?php ob_start(); ?>
    At the very end of our page, after the closing </html> tag
    < ?php ob_flush(); ?>
 -->

<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <style>
        body {
            margin: 1rem 3rem;
        }
    </style>
</head>
<body>
<?php

$movie_id = $_GET['movie_id'];

try {
    //1. Connection to DB
    //LOCAL
    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    //2. Set up the SQL delete statement
    $sql = "DELETE FROM movies WHERE movie_id = :movie_id";

    //3. Create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);

    //4. Bind parameters
    $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);

    //5. Execute sql command
    $cmd->execute();

    //6. Disconnect to DB
    $conn = null;

    //7. Redirecting to movie.php
    header('location:movies.php');

} catch (PDOException $e) {
    die('Could not connect:');
}

?>
</body>
</html>