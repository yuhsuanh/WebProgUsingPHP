<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>
</head>
<body>

    <form method="post" action="save-movie.php">
        <fieldset>
            <legend>Movie</legend>
            <div>
                <label for="title">Title: </label>
                <input id="title" name="title">
            </div>
            <div>
                <label for=""year>Year: </label>
                <input id="year" name="year">
            </div>
            <div>
                <label for="length">Length: </label>
                <input id="length" name="length">
            </div>
            <div>
                <label for="url">URL: </label>
                <input id="url" name="url">
            </div>
            <button>save movie</button>
        </fieldset>
    </form>

</body>
</html>