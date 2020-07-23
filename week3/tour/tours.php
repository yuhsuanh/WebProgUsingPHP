<!DOCUMENT HTML>
<html lang="en-ca">
<head>
    <meta content="text/html; charset=ytf-8" http-equiv="content-type">
    <title>Tourism Listing</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../assets/fontawesome/5.13.0/js/all.js"></script>

    <!-- Customer CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"
</head>

<body>

<h1> Tourism Listings </h1>

<div class="container">

    <button id="add_tour" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Add a New Tour</button>

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

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $("button").click(function(){
        $(location).attr('href', '../../week2/save-tour/tourism.php')
    });
</script>

</body>
</html>