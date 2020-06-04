<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Show email</title>
</head>
<body>

<?php
    //Create and fill a local variable from the form input
    $email = $_POST['email'];

    //Display a message that includes the email address entered on the last page
    echo 'Your email is: ' . $email;

    //New line
    echo '<br>';

    //Show a message using double quotes instead
    echo "Your email is: $email";
?>

</body>
</html>