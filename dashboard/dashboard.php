<?php  
// check for user login 
// only allow this page if user is logged in 
// logged in user is check using the logic inside ../helper/check_login.php
// to use this code , we need to inclue here using include function

include('../helper/check_login.php');

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