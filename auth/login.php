<?php 
 //1 . Import $conn 
include("../config/db_config.php");
    
// echo var_dump($conn); // just checking $conn availe or not 

// Step 1: Provide login form (completed)

//STEP: 2 Read all the data provided from login form and validate
// form has used POST method, on form submission all the data 
// input by the user are available in $_POST PHP variable 

    
// We need this if block to confirm the user has submitted 
// the login form and then we will start to fetch 
// the data from login form
if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = $_POST["username"]; // username is the name of input field in html name must match
    $password = $_POST["password"]; // name defined in password field

    
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    echo var_dump($result);




}

//STEP 3: Check whether the username and password are correct or not
   

    //2. Query having this username and password 
    // $query_to_check_username_and_password = "select username, password from users where username=? and password=?";
    // $prepareQuery = $conn->prepare($query_to_check_username_and_password);
    // $prepareQuery->bind_param('ss', $username, $password);
    // $prepareQuery->execute();



    // if query success there will be one or more rows let's check using if
    // condition, $result object has num_rows attr which will have value of count 
    // of total users in user table 
   

    //3. select username, password from user where username=username and pass=pass;
    

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