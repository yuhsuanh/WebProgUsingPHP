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
-->
<?php 
$page_title = "Menu";
require ('header.php');
?>

<div class="register_background">

    <div class="card_container">
        <div class="card_content">
            <form id="register_form" method="post" action="save-registration.php">
                <span class="form_title">Create account</span>

                <div class="form-group login_form_div">
                    <!-- <label class="control-label col-sm-4" for="username">Email: </label>
                    <div class="col-sm-8"> -->
                        <input id="username" class="form_input" name="username" type="email" placeholder="Email" required>
                    <!-- </div> -->
                </div>
                <div class="form-group login_form_div">
                    <!-- <label class="control-label col-sm-4" for="password">Password: </label>
                    <div class="col-sm-8"> -->
                        <input id="password" class="form_input" name="password" type="password" placeholder="Password" required>
                    <!-- </div> -->
                </div>
                <div class="form-group login_form_div">
                    <!-- <label class="control-label col-sm-4" for="confirm_password">Confirm password: </label>
                    <div class="col-sm-8"> -->
                        <input id="confirm_password" class="form_input" name="confirm_password" type="password" placeholder="Confirm password" required>
                    <!-- </div> -->
                </div>

                <button class="btn btn-success btn-block">Sign up</button>
            </form>
            <?php 
                $invalid = $_GET['invalid'];
                if(!empty($invalid)) {
                    if($invalid == 'required') {
                        echo '<p class="text_center color_red m-t-10">Please enter the correct email and password!</p>';
                    }
                    if($invalid == 'confirm-error') {
                        echo '<p class="text_center color_red m-t-10">Please make sure your passwords match!</p>';
                    }
                    if($invalid == 'duplicate') {
                        echo '<p class="text_center color_red m-t-10">This email already exists!</p>';   
                    }
                }
            ?>

            <p class="text_center m-t-70">Have already an account ? <a class="link" href="login.php">Login here</a></p>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>