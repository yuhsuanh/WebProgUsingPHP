<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Add a Trip</title>

    <!-- Import Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font awesome -->
    <script defer src="../../assets/fontawesome/5.13.0/js/all.js"></script>


    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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

<!-- Import Bootstap JS -->
<!-- Method 2 - From local path -->
<!-- jQuery slim build, which excludes the ajax and effects modules -->
<script type="text/javascript" src="../../assets/jquery/3.5.1/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Download form popper.js website or Maven repository website -->
<script type="text/javascript" src="../../assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    
</script>
</body>
</html>