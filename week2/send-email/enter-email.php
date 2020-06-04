<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Database Connection</title>
</head>
<body>

    <form method="post" action="send-email.php">
        <fieldset>
            <legend></legend>
            <div>
                <label for="email">Email:</label>
                <input id="email" name="email">
            </div>
            <div>
                <label for="title">Title:</label>
                <input id="title", name="title">
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content"></textarea>
            </div>
            <button>send email</button>
        </fieldset>
    </form>

</body>
</html>