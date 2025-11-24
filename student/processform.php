<?php 
include("../config/db_config.php");

    echo "form submite";

    $n = $_GET["name"];
    $ro = $_GET["rollno"];

    // validation 
    // we are checking whether the name and roll no 
    // are provided in html form or not from php 
    // user can remove required field 
    
    $isName = isset($_GET["name"]);
    $isrollNo = isset($_GET["rollno"]);

    if(!$isName){
        die("Please provide your name");
    }
    if(!$isrollNo){
        die("Please provide roll no");
    }

 echo "<br/>"  ; 



    
        // INsert stuent in db 
        $sql = "insert into student(name,roll_no) values(?,?)";
       $sqlPrepare =  $conn->prepare($sql);
       $sqlPrepare->bind_param('ss',$n, $ro);
     $sqlPrepare->execute();
     echo "Student records created successfully";

       

    

    



?>