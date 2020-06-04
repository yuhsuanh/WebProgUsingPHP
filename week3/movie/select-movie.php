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

<h1><i class="fas fa-film"></i> Select a Movie <i class="fas fa-film"></i></h1>

<div class="container">
<form id="display_movie" class="form" method="post" action="display-movie.php">
    <div class="form-group">
        <label for="title">Movie Title: </label>
        <select id="title" name="title" class="form-control">
            <?php
            //Get Movie titles and fill the dropdown list
            //Connect DB
            $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
            $sql = 'SELECT title FROM movies ORDER BY title';
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $movies = $cmd->fetchAll();
            //Fill options
            foreach($movies as $movie) {
                echo '<option>' . $movie['title'] . '</option>';
            }
            //Disconnect DB
            $conn = null;
            ?>
        </select>
    </div>
    <button class="btn btn-primary btn-sm btn-block">Go</button>
</form>
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