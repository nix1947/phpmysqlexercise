<?php  
// check for user login 
// only allow this page if user is logged in 
// logged in user is check using the logic inside ../helper/check_login.php
// to use this code , we need to inclue here using include function
// helper vitrako check_login.php ko code le check garcha user logged in cha ke 
// chaina, if logged in cha vane yo page lai run garcha, chaina vane 
// chai login.php ma redirect garcha using header function 
include('../helper/check_login.php');

?>



<?php 
// $_SERVER["username"] ra $_SERVER["is_admin"] ko value
// login garne belama set huncha ra available automatically
// available huncha in all pages using $_SESSION SUPER GLOBAL PHP VARIABLE 

$username = $_SESSION["username"];

$isAdmin = $_SESSION["is_admin"];


?>

<H1>hwELCOME  <?php  echo $username   ?>     </H1>

<?php   

 if($isAdmin == "1") {
    echo "<h1>WOw you are ADMIIN </h1>";

    echo '<input type="button" value="Add books" />';
    

 } else {
    echo "<h1> OOPS you are normal user </h1>";
 }





?>






<h1>Click here to logout</h1>
<form method="POST" action="../auth/logout.php">
    <input type="submit" value="logout">

</form>