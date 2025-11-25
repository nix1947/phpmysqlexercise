<?php 

// Step 1: Provide login form (completed)

//STEP: 2 Read all the data provided from login form and validate
// form has used POST method, on form submission all the data 
// input by the user are available in $_POST PHP variable 

    

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = $_POST["username"]; // username is the name of input field in html name must match
    $password = $_POST["password"];
}




// Check whether the username and password are correct or not
// if incorrect reply no username or password match 
// if user provide the correct username and password
// authenticate it and redirect to dashboard



?>



<h1> Login  </h1>
<div id="login-form"> 
<form method='POST' action="./login.php"> 
    Username: <input type="text" name="username" /> <br/>
    Password: <input type="text" name="password" /> <br/> <br/>
    <input type="submit" value="Login" />

</form>

</div>