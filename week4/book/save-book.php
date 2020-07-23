<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>

    <link href="https://unpkg.com/papercss@1.6.1/dist/paper.css" rel="stylesheet">
    <style>
        body {
            margin: 2rem 5rem;
        }
    </style>
</head>
<body>
<h1>Save A New Book</h1>
<div class="container">
<button>Show books</button><br>
<?php
    // Get POST data
    $title = $_POST['title'];
    $year = $_POST['year'];
    $author = $_POST['author'];

    $ok = true;
    // title validation
    if(empty($title)) {
        echo "Title is required<br>";
        $ok = false;
    }
    // year validation
    if(empty($year)) {
        echo "Year is required<br>";
        $ok = false;
    } else if (is_numeric($year) == false) {
        echo "Year is invalid<br>";
        $ok = false;
    }
    // author validation
    if(empty($author)) {
        echo "Author is required<br>";
        $ok = false;
    }

    if($ok) {
        // Connect to Database
        // Local DB
        $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

        if (!$conn) {
            die('Could not connect:');
        } else {
            // Set up the SQL INSERT command
            $sqlCommand = "INSERT INTO books (title, year, author) VALUES (:title, :year, :author)";

            // Create a command object and fill the parameters with the form values
            $cmd = $conn->prepare($sqlCommand);

            //Bind parameters
            $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
            $cmd->bindParam(':year', $year, PDO::PARAM_INT);
            $cmd->bindParam(':author', $author, PDO::PARAM_STR, 100);

            // Execute sql command
            $cmd->execute();

            //Disconnect DB
            $conn = null;

            //Display message
            echo "Book Saved";
        }
    }
?>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $("button").click(function(){
        $(location).attr('href', 'books.php')
    });
</script>
</body>
</html>