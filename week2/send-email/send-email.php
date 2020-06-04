<!DOCTYPE HTML>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <title>Database Connection</title>
</head>
<body>
    <?php
        //Get Form data
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        //Send email
        mail($email, $title,$content);

        //Display message
        echo 'Email sent';
    ?>
</body>
</html>