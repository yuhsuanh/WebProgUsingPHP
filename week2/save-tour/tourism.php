<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Tourism</title>

    <!-- water css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">
</head>
<body>

<button id="view_tours" style="background-color:#30a64a;color: white">View Tours</button>
<form method="post" action="save-tourism.php">
    <fieldset>
        <legend>Add a New Tour</legend>
        <div>
            <label for="country">Country: </label>
            <input id="country" name="country">
        </div>
        <div>
            <label for="city">City: </label>
            <input id="city" name="city">
        </div>
        <div>
            <label for="travelType">Travel type: </label>
            <select id="travelType" name="travelType">
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
                <!--
                <option value="Backpacking">Backpacking</option>
                <option value="Solo travel">Solo travel</option>
                <option value="Package trip">Package trip</option>
                <option value="Weekend break">Weekend break</option>
                <option value="Honeymoon">Honeymoon</option>
                -->
            </select>
        </div>
        <div>
            <label for="hotel">Hotel: </label>
            <select id="hotel" name="hotel">
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
                <!--
                <option value="Marriott International">Marriott International</option>
                <option value="Hilton Worldwide">Hilton Worldwide</option>
                <option value="InterContinental Hotels Group">InterContinental Hotels Group</option>
                <option value="Wyndham Hotel Group">Wyndham Hotel Group</option>
                -->
            </select>
        </div>
        <div>
            <label for="days">Days: </label>
            <input id="days" name="days" type="number">
        </div>
        <div>
            <label for="fee">Fee(0-9999.99): </label>
            <input id="fee" name="fee" type="number" step="0.01" min="0" max="9999.99">
        </div>
        <button>add tour</button>
    </fieldset>
</form>
<script type="text/javascript">
    let demo = document.getElementById("view_tours");
    demo.onclick = function() {
        window.location.href = "../../week3/tour/tours.php";
    }
</script>
</body>
</html>