<?php 
session_start();

echo "Welcome".$_SESSION["username"];



?>

<h1>Click here to logout</h1>
<form method="POST" action="../auth/logout.php">
    <input type="submit" value="logout">

</form>