<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register your account here</title>
</head>
<body>

<?php
// Only run this php block if and only the form has been submitted by user. 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form has been submitted
    // Start to grab the fields

    $fullname = $_POST["fullname"]; // fullname is a name defined in html tag
    $email = $_POST["email"]; 
    $password = $_POST["password"];
    $password1 = $_POST["password1"];
    $username = $_POST["username"];

    // none of the field should be empty if empty reply user 
    if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($password1)) {
        echo "<p>Full name, username, email, password and password1 must not be blank";
    }

    // password and password1 must match if not reply user with password not match
    if($password != $password1) {
        echo "<p>Password not matched</p>";
    }

    // Now all good 
    // Let's insert the user into database to create a new user
    $sql =  "insert into users(username, password, fullname, email) values (?, ?, ?, ?)";

    // TO populae ?, ? with form value in $sql variable we need to use a prepare statement 
    // provided by database.  So as to prepare a prepare statement
    //  import $conn variable defined in config/db_config.php 

    include('../config/db_config.php');
    // if the import of db_config.php is successfull we must have the availability of 
    // $conn variable let's confirm it using echo var_dump($conn); 
    // echo var_dump($conn);

    $preparedStatement = $conn->prepare($sql);

    // After prepare bind the data received from register form to sql statement 
    // to make ready in the database 
    // username, password, fullname, email all are string so bind with `s`
    $preparedStatement->bind_param('ssss',$username, $password, $fullname, $email);

    // Now SQL is fully prepared now run it from php to insert the data 
    // received from Register form 
    $success = $preparedStatement->execute();

    if($success == TRUE) {
        echo "<p>
        Your account has 
        been created successfully please 
        <a href='../auth/login.php'> Login  </a>
        </p>";
    }


}

?>

<h1>Create a new account </h1>
<p>It’s quick and easy.   </p>


<form method="POST" action="./register.php"> 
    <fieldset>
    
    <legend> User registraion Form </legend>
    Full Name: <input type="text" name="fullname" />
    <br/>
    Username: <input type="text" name="username" />
    <br/>
    Your Email:  <input type="email" name="email" />
    <br/>
   Password: <input type="password" name="password" />
    <br/>
   Confirm Password: <input type="password" name="password1" />
    </br>
    <input type="submit" value="Register" />

</fielset>
</form>

</body>
</html>