<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Book Listing</title>

    <link href="https://unpkg.com/papercss@1.6.1/dist/paper.css" rel="stylesheet">
    <style>
        body {
            margin: 2rem 5rem;
        }
    </style>
</head>

<body>

<h1>Book Listings</h1>
<div class="container">
<button>Add a new book</button><br>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $("button").click(function(){
        $(location).attr('href', 'book.php')
    });
</script>
</body>
</html>