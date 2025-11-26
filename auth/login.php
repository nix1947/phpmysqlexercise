<?php 
 // Start session to store logged in user information 
 // so that the user information is available accross the pages 

 session_start();

 echo var_dump($_SESSION);

 // if user is already logged in redirect him to dashboard
 if(isset($_SESSION["username"])) {

            header("Location: ../dashboard/dashboard.php");
 }


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
  
    $form_username = $_POST["username"]; // username is the name of input field in html name must match
    $form_password = $_POST["password"]; // name defined in password field

    if(empty($form_username) || empty($form_password)) {
        die("Please provide username or password");
    }

   
    // If form fields are not empty start to fetch from db and compare database value 
    // and form value
    
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $form_username, $form_password);

    $stmt->execute();



    $result = $stmt->get_result();


    if($result->num_rows === 1) {
        // username and password exist 
        // login user and reirect it ddashboard 

        echo $result->num_rows;

        $record = $result->fetch_assoc(); // pull record from db into $record variable 
        
        $db_username = $record["username"];
        $db_password = $record["password"];

       

        if($form_username==$db_username && $form_password  == $db_password) {
            // Do Login 
            
            $_SESSION["username"] = $db_username;
            $_SESSION["id"] = $record["id"];

            // session is seted now send this user to dashboard
            header("Location: ../dashboard/dashboard.php");

            

        } else {
            die("Your username or password is mismached");
        }


        
    }








   
    // if ($result->num_rows === 1) {
    // $row = $result->fetch_assoc();

    // // Verify hashed password
    // if (password_verify($password, $row['password'])) {

    //     // Set session variables
    //     $_SESSION["user_id"] = $row["id"];
    //     $_SESSION["username"] = $row["username"];
    //     $_SESSION["logged_in"] = true;

    //     echo "Login successful!";
    //     header("Location: dashboard.php");
    //     exit();
    // } else {
    //     echo "Invalid password";
    // }

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



<h1> Login </h1>
<div id="login-form">
    <form method='POST' action="./login.php">
        Username: <input type="text" name="username" /> <br />
        Password: <input type="text" name="password" /> <br /> <br />
        <input type="submit" value="Login" />

    </form>

</div>