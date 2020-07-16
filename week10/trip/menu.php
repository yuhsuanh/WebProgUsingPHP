<?php 
//require_once ('auth.php');
// access the current session
session_start();

$page_title = "Menu";
require ('header.php');
?>

<!-- content -->
<div class="container">
	<div id="menu_img">
		<div class="carousel-caption d-sm-block">

      <p class="menu_quote font-size-2">"Live__With__No__Excuses__And__Travel__With__Np__Regrets"</p>
      <p class="menu_quote font-size-3">OSCAR WILDE</p>
    </div>
	</div>
</div>


<?php
require_once ('footer.php');
ob_flush();
?>