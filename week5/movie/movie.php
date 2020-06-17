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

    <form method="post" action="save-movie.php">
        <fieldset>
            <legend><span class="nes-text is-primary">Movie</span></legend>
            <div class="nes-field">
                <label for="title">Title: </label>
                <input id="title" name="title" class="nes-input" required>
            </div>
            <div>
                <label for=""year>Year: </label>
                <input id="year" name="year" class="nes-input" type="number" required>
            </div>
            <div>
                <label for="length">Length: </label>
                <input id="length" name="length" class="nes-input" type="number" required>
            </div>
            <div>
                <label for="url">URL: </label>
                <input id="url" name="url" class="nes-input" type="url" required>
            </div>
            <br>
            <button type="submit" class="nes-btn">save movie</button>
        </fieldset>
    </form>

</body>
</html>