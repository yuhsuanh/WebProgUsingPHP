<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>
-->

<?php
//Set page title
$page_title = null;
$page_title = "User Registration";

//Embed the header
require_once('header.php');
?>

<h1>User Registration</h1>

<form method="post" action="save-registration.php">
    <fieldset>
        <legend><span class="nes-text is-primary">User</span></legend>
        <div class="nes-field">
            <label for="username">Email: </label>
            <input id="username" name="username" class="nes-input" type="email" required>
        </div>
        <div class="nes-field">
            <label for="password">Password: </label>
            <input id="password" name="password" class="nes-input" type="password" required>
        </div>
        <div class="nes-field">
            <label for="confirm">Confirm password: </label>
            <input id="confirm" name="confirm" class="nes-input" type="password" required>
        </div>
        <br>

        <button class="nes-btn is-success fill-btn">Register</button>
        <!-- <a class="nes-btn is-error" href="login.php">Login</a> -->
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