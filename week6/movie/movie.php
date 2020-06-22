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
    if (!empty($_GET['movie_id'])) {
        $movie_id = $_GET['movie_id'];

        // connect
        $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

        // write the sql query
        $sql = "SELECT * FROM movies WHERE movie_id = :movie_id";

        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
        $cmd->execute();
        $movie = $cmd->fetch();

        // populate the fields for the selected movie from the query result
        $title = $movie['title'];
        $length = $movie['length'];
        $year = $movie['year'];
        $url = $movie['url'];

        // disconnect
        $conn = null;
    }
    ?>

    <form method="post" action="save-movie.php">
        <fieldset>
            <legend><span class="nes-text is-primary">Movie</span></legend>
            <div class="nes-field">
                <label for="title">Title: </label>
                <input id="title" name="title" class="nes-input" required value="<?php echo $title ?? ''; ?>">
            </div>
            <div>
                <label for=""year>Year: </label>
                <input id="year" name="year" class="nes-input" type="number" required value="<?php echo $year ?? ''; ?>">
            </div>
            <div>
                <label for="length">Length: </label>
                <input id="length" name="length" class="nes-input" type="number" required value="<?php echo $length ?? ''; ?>">
            </div>
            <div>
                <label for="url">URL: </label>
                <input id="url" name="url" class="nes-input" type="url" required value="<?php echo $url ?? ''; ?>">
            </div>
            <br>
            <input name="movie_id" type="hidden" value="<?php echo $movie_id ?? ''; ?>" />

            <button type="submit" class="nes-btn">save movie</button>
        </fieldset>
    </form>

</body>
</html>