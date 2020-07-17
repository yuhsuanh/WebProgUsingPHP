<?php
//require_once ('auth.php');
// access the current session
session_start();

$page_title = "Trips";
require_once ('header.php');

$keywords = null;
if (!empty($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
    $field = $_GET['field'];
}
?>

<!-- content -->
<div class="container">
    <h1 class="text_center m-t-40 m-b-20"> Trips Listings <i class="fas fa-plane"></i></h1>

    <!-- <button id="add_trip" class="btn btn-success">Add a New Trip</button> -->

    <?php
    try {
    //Connection to DB
    require ('db.php');

    //Set up the SQL query
    $sql = 'SELECT * FROM trips';

    //Get keyword data
    $word_list = null;
    if(!empty($keywords)) {
        $sql .= ' WHERE ';
        $word_list = explode(" ", $keywords);

        //2.1.1 Add key word to the query condition
        foreach($word_list as $key => $word) {
            $word_list[$key] = "%" . $word . "%";

            // for the first word OMIT the word OR
            if ($key == 0) {
                $sql .= " $field LIKE ?";
            } else {
                $sql .= " OR $field LIKE ?";
            }
        }
    }

    //Run the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->execute($word_list);
    $trips = $cmd->fetchAll(); //movies variable is an array
    ?>

    <div class="float-right mb-1">
        <form for="get" action="trips.php">
            <label for="keywords">Enter Keywords to Search: </label>
            <input name="keywords" value="<?php echo $keywords; ?>"/>
            <select name="field">
                <option value="country" <?php echo ("country" == $field) ? 'selected':''; ?>>Country</option>
                <option value="city" <?php echo ("city" == $field) ? 'selected':''; ?>>City</option>
                <option value="travel_type"<?php echo ("travel_type" == $field) ? 'selected':''; ?>>Travel type</option>
                <option value="hotel" <?php echo ("hotel" == $field) ? 'selected':''; ?>>Hotel</option>
            </select>
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>
    <table id="listing" class="table table-striped table-hover table-bordered sortable">
        <thead class="thead-dark">
        <th>Country</th>
        <th>City</th>
        <th>Travel Type</th>
        <th>Hotel</th>
        <th>Days</th>
        <th>Fee</th>
        <?php if (!empty($_SESSION['user_id'])) { ?>
            <th>Edit</th>
            <th>Delete</th>
        <?php } ?>
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
                <?php if (!empty($_SESSION['user_id'])) { ?>
                    <td><a class="btn btn-info" href="trip.php?trip_id=<?php echo $trip['trip_id']; ?>">Edit <i class="fas fa-edit"></i></a></td>
                    <td><a class="delete_trip btn btn-warning" href="delete-trip.php?trip_id=<?php echo $trip['trip_id']; ?>" onclick="return confirm('Are you sure you want to delete this trip?');">Delete <i class="fas fa-trash-alt"></i></a></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php
    //disconnect DB
    $conn = null;

    } catch(Exception $e) {
        header('location:error.php');
    }
    ?>
</div>

<?php
require_once ('footer.php');
?>