<?php 
session_start();

// If user is not logged in 
// means tthere is not username value in $_SESSION variable
// we are checking this 

// if user le login garako cha vane $isUserLoggedIn ma username hunu parcha
// if user le login garako chaina vane hunu hudina 

$isUserLoggedIn = isset($_SESSION["username"]);

// if user logged in chaina vane 
// Login page ma pathaidene
// ! le chai opposite value dincha true cha vane false and false cha vane true
if( !$isUserLoggedIn) {
     header("Location: ../auth/login.php");
     exit(); // exit this page and go to login.php

} 

?>

<H1>hwELCOME </H1>

1. LOGIN completed
2. LOGOUT completed
3. page protection completed
4. New record addition using html form completed 
5. query data and display result in html page also completed 

<h1>Click here to logout</h1>
<form method="POST" action="../auth/logout.php">
    <input type="submit" value="logout">

</form>