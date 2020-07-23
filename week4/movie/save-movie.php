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

<button type="button" class="nes-btn">show movies</button>
<br><br>

<div class="nes-container with-title">
    <p class="title">Messages: </p>
    <?php
        // Get POST data
        $title = $_POST['title'];
        $year = $_POST['year'];
        $length = $_POST['length'];
        $url = $_POST['url'];

        $ok = true;

        // title validation
        if(empty($title)) {
           echo '<p><span class="nes-text is-error">Title is required</span></p>';
            $ok = false;
        }
        // year validation
        if(empty($year)) {
            echo '<p><span class="nes-text is-error">Year is required</span></p>';
            $ok = false;
        } else if(is_numeric($year) == false) {
            echo '<p><span class="nes-text is-error">Year is invalid</span></p>>';
            $ok = false;
        }
        // length validation
        if(empty($length)) {
            echo '<p><span class="nes-text is-error">Length is required</span></p>';
            $ok = false;
        } else if(is_numeric($length) == false) {
            echo '<p><span class="nes-text is-error">Length is invalid</span></p>>';
            $ok = false;
        }
        // url validation
        if (empty($url)) {
            echo '<p><span class="nes-text is-error">URL is required</span></p>';
            $ok = false;
        }


        if ($ok == true) {
            // Connect to Database
            // Local DB
            $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

            if (!$conn) {
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
                echo "<p><span class=\"nes-text is-success\">Movie Saved</span></p>";
            }
        }
    ?>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $("button").click(function(){
        $(location).attr('href', 'movies.php')
    });
</script>
</body>
</html>