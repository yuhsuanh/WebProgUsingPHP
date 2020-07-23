<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Book Listing</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../assets/fontawesome/5.13.0/js/all.js"></script>

    <!-- Customer CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"
</head>

<body>

<h1><i class="fas fa-book"></i> Book Listings <i class="fas fa-book"></i></h1>

<div class="container">
    <?php

    //Connection to DB
    //LOCAL
    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    //Set up the SQL query
    $sql = 'SELECT * FROM books';

    //Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $books = $cmd->fetchAll(); //movies variable is an array
    ?>

    <table id="book_listing" class="table table-striped table-hover table-bordered">
        <thead class="thead-Success">
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
        </thead>
        <tbody>
            <?php foreach($books as $book) { ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['year']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    //disconnect DB
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