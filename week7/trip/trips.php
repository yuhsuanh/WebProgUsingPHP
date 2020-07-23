<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Trips Listings</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../../assets/fontawesome/5.13.0/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<!-- navigations -->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="menu.php">
            <img src="icon.png" height="45" class="d-inline-block align-top" alt="icon">
          </a>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="trips.php">Trips Listing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="trip.php">Add Trip</a>
              </li>
            </ul>
          </div>

          <div class="mx-auto">
            <a class="btn btn-danger" href="logout.php" onclick="return confirm('Are you sure you want to log out?');">Logout <i class="fas fa-sign-out-alt"></i></a>
          </div>
        </nav>
    </div>
</header>

<!-- content -->
<div class="container">
    <h1 class="text_center m-t-40 m-b-20"> Trips Listings <i class="fas fa-plane"></i></h1>

    <!-- <button id="add_trip" class="btn btn-success">Add a New Trip</button> -->

    <?php

    //Connection to DB
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
        <th>Edit</th>
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
                <td><a class="btn btn-info" href="trip.php?trip_id=<?php echo $trip['trip_id']; ?>">Edit <i class="fas fa-edit"></i></a></td>
                <td><a class="delete_trip btn btn-warning" href="delete-trip.php?trip_id=<?php echo $trip['trip_id']; ?>" onclick="return confirm('Are you sure you want to delete this trip?');">Delete <i class="fas fa-trash-alt"></i></a></td>
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
<script type="text/javascript" src="../../assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../../assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>