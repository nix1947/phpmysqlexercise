<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registraion Form</title>
</head>
<body>

<!-- Registration form --> 
 <!-- 
    STEP 1: Design registration form

    STEP 2: Write PHP block to get and process form data
            a. Confirm all fields are not empty
            b. password and confirm password must match

    STEP 3: if all form data and password are okay import db connection 
                and register user in database


-->

<?php 

// IF User is already logged in 
// DO not render this page or run this page
// Redirect that user to dashboard
// TO access session variable we must need to start a session

session_start();

if(isset($_SESSION["username"])) {
    header("Location: ../dashboard/dashboard.php");
    exit();
}

?>


<?php 
    // Grab the form data after form is submitted
    // how to check whether the form is submitted or not 

    // Variable to store form data
    $fullname = "";
    $user_name = "";
    $email = "";
    $userPassword="";
    $confirmPassword = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Grab all fields and check for validation
        $fullname = $_POST["fullname"];
        $user_name = $_POST["username"];
        $email = $_POST["email"];
        $userPassword = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        // echo "Your submitted <br/> $fullname, $username, $email, $password, $confirmPassword";

        if(empty($fullname) || empty($user_name) || empty($email) || empty($userPassword) || empty($confirmPassword)) {
            echo "<i>Please fill out all the form fields</i><br/></br>";
        }

        // Validate password and confirm password

       if($userPassword != $confirmPassword) {
            echo "<em>Password does not match please confirm your password </em><br/>";
       }

       // STEP 3: Import db connection an write a query to register this 
       // user in database of table users 
       // import db connnection
       // db connection is inside config/config_db.php 
       include('../config/db_config.php');

       // Lets do echo var_dump to check whether the connection variable is imported
       // or not

        //    echo var_dump($conn);

        // Write a sql query to register the user using values which we get from register form.

       $registerUserSQL = "insert into users(fullname, username, email, password) values(?, ?, ?, ?)";

       // To run his query you must have the columns fullname, username, email, and password
       // in classicmodels user table
       // if columns does not exist add 

       // to add use sql alter table command
       
       // alter table users add column fullname varchar(255) not null 
       // alter table users add column username varchar(25) not null unique
       // alter table users add column email varchar(25) not null unique
       // alter table users add column password varchar(255) not null
       
       $preparedStatement =  $conn->prepare($registerUserSQL);

       // bind form values in SQL prepare statement to populate ?
       //s: string: first s: fullname, second s: username and so on ....
       $preparedStatement->bind_param('ssss',$fullname, $user_name, $email, $confirmPassword);

       // After binding call execute method to run in dbms from php 
      $isSuccess =  $preparedStatement->execute();

      if($isSuccess == TRUE) {

        echo "You account has been created  <br/>
                <a href='./login.php'>Login</a>        
        ";

      }



    }

?>



<form method='POST' action='./register.php'> 
    <fieldset>
            <legend>User Registration Form </legend>

    FullName: <input type='text' name='fullname' value="<?php echo $fullname; ?>" /> <br/>
    username: <input type='text' name='username' value="<?php echo $user_name; ?>"   /> <br/>
    Email:    <input type='email' name='email' value="<?php echo $email; ?>" /> <br/>
    password: <input type='password' name='password' value="<?php echo $confirmPassword; ?>" /> <br/>
    confirm Password: <input type='password' name='confirmPassword' value="<?php echo $confirmPassword; ?>" /> <br/>
    <input type='submit' value='Register' />
</fieldset>

</form>

    
</body>
</html>