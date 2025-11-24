<?php 

// Database credentials 
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "classicmodels";

// connection 

$conn = new mysqli(
    $server,
    $username,
    $password,
    $database,
    
);

$isError = $conn->connect_error;

if($isError) {
    die("Cannot connect to database ");
} else {
}


?>