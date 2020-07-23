<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>
</head>
<body>
<?php
    // Get POST data
    $title = $_POST['title'];
    $year = $_POST['year'];
    $length = $_POST['length'];
    $url = $_POST['url'];

    // Connect to Database
    // Local DB
    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    if(!$conn) {
        die('Could not connect:');
    } else {
        // Set up the SQL INSERT command
        $sqlCommand = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";

        // Create a command object and fill the parameters with the form values
        $cmd = $conn->prepare($sqlCommand);

        //Bind parameters
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $cmd->bindParam(':year', $year, PDO::PARAM_INT);
        $cmd->bindParam(':length', $length, PDO::PARAM_INT);
        $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);

        // Execute sql command
        $cmd->execute();

        //Disconnect DB
        $conn = null;

        //Display message
        echo "Movie Saved";
    }
?>
</body>
</html>