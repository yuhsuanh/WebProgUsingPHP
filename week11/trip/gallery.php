<?php 
require_once ('auth.php');

$page_title = "Menu";
require ('header.php');

//Get movies from database
require ('db.php');
$sql = "SELECT trip_id, CONCAT(country, ',', city) as place, photo FROM trips WHERE photo IS NOT NULL";
$cmd = $conn->prepare($sql);
$cmd->execute();
$trips = $cmd->fetchAll();

?>

<!-- content -->
<div class="container text_center">
	<h1  class="text_center m-t-40 m-b-20"> Gallery <i class="fas fa-plane"></i></h1>

	<div class="row row-cols-4">
		<?php
	    foreach ($trips as $trip) {
	        echo '<div class="mt-1 mb-1">';
	        echo '<a href="trip.php?trip_id=' . $trip['trip_id'] . '"  title="Trip Title">';
	        echo '<img class="wd-200" src="images/' . $trip['photo'] . '" title="' . $trip['place'] . '">';
	        echo '</a>';
	        echo '</div>';
	    }
	  ?>
	</div>
</div>


<?php
require_once ('footer.php');
?>