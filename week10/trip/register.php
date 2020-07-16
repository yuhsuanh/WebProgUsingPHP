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

                <div class="login_form_div">
                    <input class="form-control form_input" type="email" name="username" placeholder="Email" required>
                </div>
                <div class="input-group login_form_div" id="show_password">
                    <input class="form-control form_input" type="password" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="input-group login_form_div" id="show_confirm_password">
                    <input class="form-control form_input" type="password" name="confirm_password" placeholder="Confirm password" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash" aria-hidden="true"></i></button>
                    </div>
                </div>

                <input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
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

<!-- recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6Ld2Y7EZAAAAAJGYZGh5YwlaUE6wFY_bifPZ5FN2"></script>
<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ld2Y7EZAAAAAJGYZGh5YwlaUE6wFY_bifPZ5FN2', {action: 'register'}).then(function(token) {
                // Add your logic to submit to your backend server here.
                var recaptchaResonse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;

                
            });
        });
    }
</script>

<?php
require_once('footer.php');
?>