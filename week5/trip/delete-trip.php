<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Delete the Trip</title>
</head>

<body>

<div class="container">
    <?php
    $id = $_GET['id'];

    try {
        //1. Connection to DB
        //LAMP
        //$conn = new PDO('mysql:host=172.31.22.43;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
        //LOCAL
        $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

        //2. Set up the SQL delete statement
        $sql = "DELETE FROM trips WHERE id = :id";

        //3. Create a command object and fill the parameters with the form values
        $cmd = $conn->prepare($sql);

        //4. Bind parameters
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);

        //5. Execute sql command
        $cmd->execute();

        //6. Disconnect to DB
        $conn = null;

        //7. Redirecting to movie.php
        header('location:trips.php');

    } catch (PDOException $e) {
        die('Could not connect:');
    }
    ?>
</div>
</body>
</html>