<?php
require_once ('auth.php');

$page_title = "Delete the Trip";
require_once ('header.php');
?>


<div class="container">
    <?php
    $trip_id = $_GET['trip_id'];

    try {
        //1. Connection to DB
        require ('db.php');

        //2. Set up the SQL delete statement
        $sql = "DELETE FROM trips WHERE trip_id = :trip_id";

        //3. Create a command object and fill the parameters with the form values
        $cmd = $conn->prepare($sql);

        //4. Bind parameters
        $cmd->bindParam(':trip_id', $trip_id, PDO::PARAM_INT);

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

<?php
require_once('footer.php');
?>