<?php
//Set page title
$page_title = null;
$page_title = "Log In";

//Embed the header
require_once('header.php');
?>

<h1>Log In</h1>

<form method="post" action="validate.php">
    <fieldset>
        <div class="nes-field">
            <!-- Label every input with a <label>. -->
            <label for="username">Email: </label>
            <!-- Help save users from accidentally missing input fields -->
            <input id="username" name="username" class="nes-input" type="email" required>
        </div>
        <div class="nes-field">
            <!-- Label every input with a <label>. -->
            <label for="password">Password:
                <label>
                    <input id="show_password" type="checkbox" class="nes-checkbox" />
                    <span>Show password</span>
                </label>
            </label>
            <!-- Use name="current-password" when the user enters an existing password -->
            <!-- Enable the browser to suggest a strong password -->
            <!-- Help save users from accidentally missing input fields -->
            <input id="password" name="current-password" class="nes-input" type="password" autocomplete="current-password" required>
        </div>

        <!-- Using <button> for buttons -->
        <button class="nes-btn is-success fill-btn">Log in</button>
    </fieldset>
</form>

<?php
//Embed the footer
require_once('footer.php');
?>
