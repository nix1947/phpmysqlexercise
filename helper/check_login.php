<?php 
session_start();

// If user is not logged in 
// means tthere is not username value in $_SESSION variable
// we are checking this 

// if user le login garako cha vane $isUserLoggedIn ma username hunu parcha
// if user le login garako chaina vane hunu hudina 

$isUserLoggedIn = isset($_SESSION["username"]);

// Admin user ho vane chai true returen garcha else false
$isAdmin = isset($_SESSION['is_admin']);


// if user logged in chaina vane 
// Login page ma pathaidene
// ! le chai opposite value dincha true cha vane false and false cha vane true
if( !$isUserLoggedIn) {
     header("Location: ../auth/login.php");
     exit(); // exit this page and go to login.php

} 

?>