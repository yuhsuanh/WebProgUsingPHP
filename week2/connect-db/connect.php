<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Database Connection</title>
</head>
<body>
<?php
    $conn = null;
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    if(!$conn) {
        die('Could not connect:');
    } else {
        echo 'connected to the database';
    }
?>
</body>
</html>