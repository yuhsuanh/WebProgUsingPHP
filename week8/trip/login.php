<!--
<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Add a Trip</title>

    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <script defer src="../../assets/fontawesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
-->

<?php 
$page_title = "Menu";
require ('header.php');
?>


<div class="container container_log">
	<div class="wrap_container">
		<!-- Form image -->
		<div id="form_img"></div>
		
		<form id="login_form" method="post" action="validate.php">
			<span class="form_title">
				Account Login
			</span>
			
			<div class="login_form_div">
				<input class="form_input" type="email" name="username" placeholder="Email" required>
			</div>
			<div class="login_form_div">
				<input class="form_input" type="password" name="password" placeholder="Password" required>
			</div>
			
			<div class="login_form_button_div">
				<div class="login_form_button_L">
					<!-- <button class="btn btn-block btn-light">Sign up</button> -->
					<a class="btn btn-block btn-light" href="register.php">Sign up</a>
				</div>
				<div class="login_form_button_R">
					<button class="btn btn-block btn-success">Sign in</button>
				</div>
			</div>

			<?php
				$invalid = $_GET['invalid'];
				if(!empty($invalid)) {
					echo '<p class="color_red m-t-20">Please enter the correct email and password!</p>';
				}
			?>
		</form>

	</div>
</div>

<?php
require_once('footer.php');
?>