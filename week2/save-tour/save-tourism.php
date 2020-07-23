<
!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>

    <!-- water css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">
</head>
<body>
<?php
    // Get POST data
    $country = $_POST['country'];
    $city = $_POST['city'];
    $travelType = $_POST['travelType'];
    $hotel = $_POST['hotel'];
    $days = $_POST['days'];
    $fee = $_POST['fee'];


    try {
        // Connect to Database
        // Local DB
        $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

        // Set up the SQL INSERT command
        $sqlCommand = "INSERT INTO tourism (country, city, travel_type, hotel, days, fee) VALUES (:country, :city, :travelType, :hotel, :days, :fee)";

        // Create a command object and fill the parameters with the form values
        $cmd = $conn->prepare($sqlCommand);

        //Bind parameters
        $cmd->bindParam(':country', $country, PDO::PARAM_STR, 100);
        $cmd->bindParam(':city', $city, PDO::PARAM_STR, 100);
        $cmd->bindParam(':travelType', $travelType, PDO::PARAM_STR, 20);
        $cmd->bindParam(':hotel', $hotel, PDO::PARAM_STR, 30);
        $cmd->bindParam(':days', $days, PDO::PARAM_INT);
        $cmd->bindParam(':fee', $fee, PDO::PARAM_STR);

        // Execute sql command
        $cmd->execute();

        //Disconnect DB
        $conn = null;

        //Display message
        echo "<h1>Tour Saved Successfully</h1>";

    } catch (PDOException $e) {
        die("Could not connect!: " . $e->getMessage());
    }
?>
<br>
<button id="view_tours" style="background-color:#30a64a;color: white">View Tours</button>

<script type="text/javascript">
    let demo = document.getElementById("view_tours");
    demo.onclick = function() {
        window.location.href = "../../week3/tour/tours.php";
    }
</script>
</body>
</html>