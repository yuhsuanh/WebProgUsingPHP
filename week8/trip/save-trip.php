<?php
require_once ('auth.php');

$page_title = "Save the Trip";
require_once ('header.php');
?>

<div class="container">
    <h1> Save the Trip <i class="fas fa-plane"></i></h1>
    <h3>Message: </h3>
    <hr>

    <?php
        // Get POST data
        $trip_id = $_POST['trip_id'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $travel_type = $_POST['travel_type'];
        $hotel = $_POST['hotel'];
        $days = $_POST['days'];
        $fee = $_POST['fee'];

        $ok = true;
        // country validation
        if(empty($country)) {
            echo '<p><span class="text-danger">Country is require</span></p>';
            $ok = false;
        }
        // city validation
        if(empty($city)) {
            echo '<p><span class="text-danger">City is require</span></p>';
            $ok = false;
        }
        // travel type validation
        if(empty($travel_type)) {
            echo '<p><span class="text-danger">Travel type is require</span></p>';
            $ok = false;
        }
        // hotel validation
        if(empty($hotel)) {
            echo '<p><span class="text-danger">Hotel is require</span></p>';
            $ok = false;
        }
        // days validation
        if(empty($days)) {
            echo '<p><span class="text-danger">Days is require</span></p>';
            $ok = false;
        } else if (is_numeric($days) == false){
            echo '<p><span class="text-danger">Days is invalid</span></p>';
            $ok = false;
        }
        // fee validation
        if(empty($fee)) {
            echo '<p><span class="text-danger">Fee is require</span></p>';
            $ok = false;
        } else if (is_numeric($fee) == false){
            echo '<p><span class="text-danger">Fee is invalid</span></p>';
            $ok = false;
        }

        if ($ok) {
            try {
                // Connect to Database
                require ('db.php');

                if(empty($trip_id)) {
                    // Set up the SQL INSERT command
                    $sqlCommand = "INSERT INTO trips (country, city, travel_type, hotel, days, fee) VALUES (:country, :city, :travel_type, :hotel, :days, :fee)";
                } else {
                    // Set up the SQL UPDATE command
                    $sqlCommand = "UPDATE trips SET country = :country, city = :city, travel_type = :travel_type, hotel = :hotel, days = :days, fee = :fee WHERE trip_id = :trip_id";
                }

                // Create a command object and fill the parameters with the form values
                $cmd = $conn->prepare($sqlCommand);

                //Bind parameters
                $cmd->bindParam(':country', $country, PDO::PARAM_STR, 100);
                $cmd->bindParam(':city', $city, PDO::PARAM_STR, 100);
                $cmd->bindParam(':travel_type', $travel_type, PDO::PARAM_STR, 20);
                $cmd->bindParam(':hotel', $hotel, PDO::PARAM_STR, 30);
                $cmd->bindParam(':days', $days, PDO::PARAM_INT);
                $cmd->bindParam(':fee', $fee, PDO::PARAM_STR);
                if(!empty($trip_id)) {
                    $cmd->bindParam(':trip_id', $trip_id, PDO::PARAM_INT);
                }

                // Execute sql command
                $cmd->execute();

                //Disconnect DB
                $conn = null;

                //Display message
                //echo '<p class="text-success">Trip Saved Successfully</p>';

                header('location:trips.php');
            } catch (PDOException $e) {
                die("Could not connect!: " . $e->getMessage());
            }
        }
    ?>
</div>


<?php
require_once ('footer.php');
?>