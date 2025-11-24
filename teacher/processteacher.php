<?php 
// This program will fetch pull the daa 
// submitted from html form
// because we provide action='processteacher.php'
// in html form which is inside create_teacher.php 

// ALL DATA submitted from form are available 
// in $_GET SUPER PHP VARIABLE 

$name = $_GET["meroname"];
$email = $_GET["email"];
$mobile = $_GET["mobile"];
$salary = $_GET["salary"];

echo "You have submitted form successfuly";
echo "your name is".$name."<br/>";
echo "your email is".$email."<br/>";
echo "your mobile is".$mobile."<br/>";
echo "Your salary is".$salary."<br/>";

// import $conn to connet to db, create sql query with values you get from form
include("../config/db_config.php"); // give access to $conn object 

$sql = "insert into teacher(name, email, mobile, salary) values (?,?,?,?)";

// prepare sql 
$sql = $conn->prepare($sql);

// bind values to sql query
$sql->bind_param("sssd", $name, $email, $mobile, $salary);


// insert to db 
$result = $sql->execute();
// if created show user with echo message teacher added successfully

if($result === TRUE) {
    echo "Teacher added successfully";
}
?>