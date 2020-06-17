<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Trips Listings</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../week3/assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../../week3/assets/fontawesome/5.13.0/js/all.js"></script>

    <style>
        #listing, #listing th, #listing td {
            border: 1px solid #99a1ad;
        }
    </style>
</head>

<body>

<div class="container">
    <h1> Trips Listings <i class="fas fa-plane"></i></h1>

    <button id="add_trip" class="btn btn-success">Add a New Trip</button>

    <?php

    //Connection to DB
    //LAMP
    //$conn = new PDO('mysql:host=172.31.22.43;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
    //LOCAL
    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    //Set up the SQL query
    $sql = 'SELECT * FROM trips';

    //Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $trips = $cmd->fetchAll(); //movies variable is an array
    ?>

    <table id="listing" class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
        <th>Country</th>
        <th>City</th>
        <th>Travel Type</th>
        <th>Hotel</th>
        <th>Days</th>
        <th>Fee</th>
        <th>Delete</th>
        </thead>
        <tbody>
        <?php foreach($trips as $trip) { ?>
            <tr>
                <td><?php echo $trip['country']; ?></td>
                <td><?php echo $trip['city']; ?></td>
                <td><?php echo $trip['travel_type']; ?></td>
                <td><?php echo $trip['hotel']; ?></td>
                <td><?php echo $trip['days']; ?></td>
                <td><?php echo $trip['fee']; ?></td>
                <td><a class="delete_trip btn btn-danger" href="delete-trip.php?id=<?php echo $trip['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    //disconnect DB
    $conn = null;
    ?>
</div>

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../../week3/assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../week3/assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../../week3/assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    let demo = document.getElementById("add_trip");
    demo.onclick = function() {
        window.location.href = "trip.php";
    }

    $("a").click(function(){
        return confirm('Are you sure you want to delete this trip?');
    })
</script>

</body>
</html>