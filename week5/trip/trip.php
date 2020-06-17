<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Add a Trip</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../week3/assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../../week3/assets/fontawesome/5.13.0/js/all.js"></script>
</head>
<body>

<div class="container">
    <h1> Add a New Trip <i class="fas fa-plane"></i></h1>
    <form class="form-horizontal mt-5 mb-5" method="post" action="save-trip.php">
        <div class="form-group row">
            <label class="control-label col-sm-4" for="country">Country: </label>
            <div class="col-sm-8">
                <input id="country" class="form-control" name="country" required>
            </div>
        </div>
        <div class="form-group  row">
            <label class="control-label col-sm-4" for="city">City: </label>
            <div class="col-sm-8">
                <input id="city" class="form-control" name="city" required>
            </div>
        </div>
        <div class="form-group  row">
            <label class="control-label col-sm-4" for="travelType">Travel type: </label>
            <div class="col-sm-8">
                <select id="travelType" class="form-control" name="travelType" required>
                    <?php
                    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
                    $sql = 'SELECT * FROM travel_type ORDER BY type_name';
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $travelTypes = $cmd->fetchAll();

                    foreach ($travelTypes as $travelType) {
                    ?>
                    <option value="<?php echo $travelType['type_name'] ?>"><?php echo $travelType['type_name'] ?></option>
                    <?php }
                    $conn = null;
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-4" for="hotel">Hotel: </label>
            <div class="col-sm-8">
                <select id="hotel" class="form-control" name="hotel" required>
                    <?php
                    $conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
                    $sql = 'SELECT * FROM hotel ORDER BY hotel_name';
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $travelTypes = $cmd->fetchAll();

                    foreach ($travelTypes as $travelType) {
                        ?>
                        <option value="<?php echo $travelType['hotel_name'] ?>"><?php echo $travelType['hotel_name'] ?></option>
                    <?php }
                    $conn = null;
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-4" for="days">Days: </label>
            <div class="col-sm-8">
                <input id="days" class="form-control" name="days" type="number" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-4" for="fee">Fee(0-9999.99): </label>
            <div class="col-sm-8">
                <input id="fee" class="form-control" name="fee" type="number" step="0.01" min="0" max="9999.99" required>
            </div>
        </div>
        <div class="form-group row float-right">
            <button id="view_trips" type="button" class="btn btn-success float-right">View Trips</button>
            <button type="submit" class="btn btn-primary float-right">Add trip</button>
        </div>
    </form>
</div>

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../../week3/assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../week3/assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../../week3/assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    let demo = document.getElementById("view_trips");
    demo.onclick = function() {
        window.location.href = "trips.php";
    }
</script>
</body>
</html>