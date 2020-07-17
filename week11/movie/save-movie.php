<?php ob_start();
//auth check
require_once('auth.php');

//header
$page_title = null;
$page_title = "Save Movie";
require_once('header.php');
?>

<h1>Saving the Movie...</h1>

<div class="nes-container with-title">
    <p class="title">Messages: </p>
    <?php
        // Get POST data
        $movie_id = $_POST['movie_id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $length = $_POST['length'];
        $url = $_POST['url'];

        $ok = true;

        // Process photo upload if have
        if(!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];

            // photo validation
            if($_FILES['photo']['type'] != 'image/jpeg') {
                echo '<p><span class="nes-text is-error">Invalid photo</span></p>';
                $ok = false;
            } else {
                session_start();
                //unique file name
                //$final_name = session_id() . $photo;
                $final_name = session_id() . '_' . $photo;
                $path = getcwd() . "/images/$final_name";
                $tmp_name = $_FILES['photo']['tmp_name'];

                move_uploaded_file($tmp_name, $path);
            }
        }


        // title validation
        if(empty($title)) {
           echo '<p><span class="nes-text is-error">Title is required</span></p>';
            $ok = false;
        }
        // year validation
        if(empty($year)) {
            echo '<p><span class="nes-text is-error">Year is required</span></p>';
            $ok = false;
        } else if(is_numeric($year) == false) {
            echo '<p><span class="nes-text is-error">Year is invalid</span></p>>';
            $ok = false;
        }
        // length validation
        if(empty($length)) {
            echo '<p><span class="nes-text is-error">Length is required</span></p>';
            $ok = false;
        } else if(is_numeric($length) == false) {
            echo '<p><span class="nes-text is-error">Length is invalid</span></p>>';
            $ok = false;
        }
        // url validation
        if (empty($url)) {
            echo '<p><span class="nes-text is-error">URL is required</span></p>';
            $ok = false;
        }


        if ($ok == true) {

            try {
                // Connect to Database
                //$conn = new PDO('mysql:host=127.0.0.1;dbname=Yu200443723', 'Yu200443723', '0KBPSTzFsH');
                require('db.php');

                // Set up the SQL command
                if (empty($movie_id)) {
                    // Set up the SQL INSERT command
                    $sqlCommand = "INSERT INTO movies (title, year, length, url, photo) VALUES (:title, :year, :length, :url, :photo)";
                }
                else if(empty($final_name)) {
                    // Set up the SQL UPDATE command to modify the existing movie
                    $sqlCommand = "UPDATE movies SET title = :title, year = :year, length = :length, url = :url WHERE movie_id = :movie_id";
                } else {
                    // Set up the SQL UPDATE command to modify the existing movie
                    $sqlCommand = "UPDATE movies SET title = :title, year = :year, length = :length, url = :url, photo = :photo WHERE movie_id = :movie_id";
                }

                // Create a command object and fill the parameters with the form values
                $cmd = $conn->prepare($sqlCommand);

                //Bind parameters
                $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
                $cmd->bindParam(':year', $year, PDO::PARAM_INT);
                $cmd->bindParam(':length', $length, PDO::PARAM_INT);
                $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);
                if(!empty($final_name)) {
                    $cmd->bindParam(':photo', $final_name, PDO::PARAM_STR, 100);
                }
                if (!empty($movie_id)) {
                    $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
                }

                // Execute sql command
                $cmd->execute();

                //Disconnect DB
                $conn = null;

                //Display message
                //echo "<p><span class=\"nes-text is-success\">Movie Saved</span></p>";

                //Executing successfully will redirect to movies.php page
                header('location:movies.php');
            } catch (PDOException $e) {
                    die('Could not connect:' . $e->getMessage());
            }
        }
    ?>
</div>

<?php
require_once('footer.php');
ob_flush();
?>