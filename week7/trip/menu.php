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
		        <a class="nav-link active" href="menu.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="trips.php">Trips Listing</a>
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
	<div id="menu_img">
		<div class="carousel-caption d-sm-block">

      <p class="menu_quote font-size-2">"Live__With__No__Excuses__And__Travel__With__Np__Regrets"</p>
      <p class="menu_quote font-size-3">OSCAR WILDE</p>
    </div>
	</div>
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