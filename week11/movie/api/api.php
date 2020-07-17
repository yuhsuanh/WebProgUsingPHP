<?php

//Creating a Movies API

header("Access-Control-Allow-Origin: *");

// Connect to the db
require_once ('../db.php');


// Get data from database
$sql = "SELECT * FROM movies";

if(!empty($_GET['title'])) {
    //Get the single movie
    $sql .= ' WHERE title = :title';
    $cmd = $conn->prepare($sql);

    $title = $_GET['title'];
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
} else {
    //Get all movies
    $cmd = $conn->prepare($sql);
}


$cmd->execute();
$movies = $cmd->fetchAll(PDO::FETCH_ASSOC);

// Convert the movies data to a json object
$json_obj = json_encode($movies);

// Print json format
echo $json_obj;

// Disconnect db
$conn = null;

