<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Saving your Registration...</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />
</head>
<body>
-->
<?php ob_start();

//header
$page_title = null;
$page_title = "Saving your Registration";
require_once('header.php');

?>

<h1>Saving your Registration...</h1>

<p class="title">Messages: </p>
<div class="nes-container with-title">
    <?php
    //Get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];
    $ok = true;

    //validate the inputs
    if(empty($username)) {
        echo '<p><span class="nes-text is-error">Username is required</span></p>';
        $ok = false;
    }

    if(empty($password)) {
        echo '<p><span class="nes-text is-error">Password is required</span></p>';
        $ok = false;
    }

    if($password != $confirm_password) {
        echo '<p><span class="nes-text is-error">Password do not match</span></p>';
        $ok = false;
    }

    if($ok) {
        //hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //set up and execute the insert
        //$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
        require('db.php');

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
        $cmd->execute();
        $movie = $cmd->fetch();

        //disconnect
        $conn = null;

        //show a message to the user
        echo '<p><span class="nes-text is-success">User Saved</span></p>';
    }
    ?>
</div>
<br>
<a class="nes-btn" href="register.php">Back to register page</a>
<a class="nes-btn is-success" href="login.php">Login page</a>

<?php
require_once('footer.php');
ob_flush();
?>