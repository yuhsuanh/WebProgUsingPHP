<?php

// name
$name = $_FILES['upload']['name'];
echo "Name $name<br >";

// size
$size = $_FILES['upload']['size'];
echo "Size $size<br />";

// type
$type = $_FILES['upload']['type'];
echo "Type $type<br />";

// get the temp location
$tmp_name = $_FILES['upload']['tmp_name'];
echo "Tmp Name $tmp_name<br />";


print_r($_FILES);

//create save file path
//Method 1 - this works on local but not on remote server
//$path = "uploads/$name";
//Method 2
$path = getcwd() . "/uploads/$name";


// copy file to the uploads folder where it will stay permanently
move_uploaded_file($tmp_name, $path);

?>

<br><br>
<a href="upload.php">back upload page</a>
