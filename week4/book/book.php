<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Book</title>

    <link href="https://unpkg.com/papercss@1.6.1/dist/paper.css" rel="stylesheet">
    <style>
        body {
            margin: 2rem 5rem;
        }
    </style>
</head>
<body>
    <h1>Add A New Book</h1>
    <div class="container">
    <button id="show">Show books</button><br>
    <form method="post" action="save-book.php">
        <fieldset>
            <legend>Book</legend>
            <div>
                <label for="title">Title: </label>
                <input id="title" name="title" required>
            </div>
            <div>
                <label for=""year>Year: </label>
                <input id="year" name="year" type="number" required>
            </div>
            <div>
                <label for="author">Author: </label>
                <input id="author" name="author" required>
            </div>
            <button>save book</button>
        </fieldset>
    </form>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $("#show").click(function(){
            $(location).attr('href', 'books.php')
        });
    </script>
</body>
</html>