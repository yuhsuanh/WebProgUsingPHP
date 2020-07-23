<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Tourism Listing</title>

</head>

<body>

<h1> Tourism Listings </h1>

<div class="container">

    <button id="add_tour" style="background-color:#30a64a;color: white">Add a New Tour</button>

    <?php

    //Connection to DB
    //LOCAL
    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');

    //Set up the SQL query
    $sql = 'SELECT * FROM tourism';

    //Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $tours = $cmd->fetchAll(); //movies variable is an array
    ?>

    <table id="tour_listing" class="table table-striped table-hover table-bordered">
        <thead class="thead-Success">
        <th>Country</th>
        <th>City</th>
        <th>Travel Type</th>
        <th>Hotel</th>
        <th>Days</th>
        <th>Fee</th>
        </thead>
        <tbody>
        <?php foreach($tours as $tour) { ?>
            <tr>
                <td><?php echo $tour['country']; ?></td>
                <td><?php echo $tour['city']; ?></td>
                <td><?php echo $tour['travel_type']; ?></td>
                <td><?php echo $tour['hotel']; ?></td>
                <td><?php echo $tour['days']; ?></td>
                <td><?php echo $tour['fee']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    //disconnect DB
    $conn = null;
    ?>
</div>

<!-- water css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">

<script type="text/javascript">
    let demo = document.getElementById("add_tour");
    demo.onclick = function() {
        window.location.href = "tour.php";
    }
</script>

</body>
</html>