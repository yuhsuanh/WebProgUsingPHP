<?php
//Set page title
$page_title = null;
$page_title = "User Registration";

//Embed the header
require_once('header.php');
?>

<h1>User Registration</h1>

<form method="post" action="save-registration.php">
    <fieldset>
        <legend><span class="nes-text is-primary">User</span></legend>
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
                    <input id="show_password" type="checkbox" class="nes-checkbox" aria-label="Show password as plain text. Warning: this will display your password on the screen." />
                    <span>Show password</span>
                </label>
            </label>
            <!-- Use name="new-password" when the user enters a new password -->
            <!-- Help save users from accidentally missing input fields -->
            <input id="password" name="new-password" class="nes-input password-constraint" type="password" aria-describedby="password-constraints" required>
<!--            <div id="password-constraints" class="nes-text is-error">Eight or more characters with a mix of letters, numbers and symbols.</div>-->
        </div>
        <div class="nes-field">
            <!-- Label every input with a <label>. -->
            <label for="confirm">Confirm password:
                <label>
                    <input id="show_confirm_password" type="checkbox" class="nes-checkbox" />
                    <span>Show confirm password</span>
                </label>
            </label>
            <!-- Help save users from accidentally missing input fields -->
            <input id="confirm" name="confirm-password" class="nes-input password-constraint" type="password" aria-describedby="confirm_password-constraints" required>
<!--            <div id="confirm_password-constraints" class="nes-text is-error">Eight or more characters with a mix of letters, numbers and symbols.</div>-->
        </div>
        <br>

        <!-- Using <button> for buttons -->
        <button class="nes-btn is-success fill-btn">Register</button>
    </fieldset>
</form>

<?php
//Embed the footer
require_once('footer.php');
?>
