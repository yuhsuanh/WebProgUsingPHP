<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>
-->

<?php
//Set page title
$page_title = null;
$page_title = "Log In";

//Embed the header
require_once('header.php');
?>

<h1>Log In</h1>

<form method="post" action="validate.php">
    <fieldset>
        <div class="nes-field">
            <label for="username">Email: </label>
            <input id="username" name="username" class="nes-input" type="email" required>
        </div>
        <div class="nes-field">
            <label for="password">Password: </label>
            <input id="password" name="password" class="nes-input" type="password" required>
        </div>

        <button class="nes-btn is-success fill-btn">Log in</button>
        <!--
        <div class="text_right">
            <a class="nes-btn is-error" href="register.php">Sign up</a>
        </div>
        -->
    </fieldset>
</form>

<?php
//Embed the footer
require_once('footer.php');
?>

<!--
</body>
</html>
-->