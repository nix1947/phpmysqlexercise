<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page </title>

    <?php   include("./config/db_config.php");             ?>


</head>
<body>

<?php 

$sql = "select * from book";

$result = $conn->query($sql);

$bookCount = $result->num_rows;

if($bookCount>0) {
    // Start to fetch the book from table   
    while($row = $result->fetch_assoc()){
    
            echo "<h1>".$row["title"]."</h1>"."By ".$row["publisher"];
            echo "<br/>";
    }
}


?>

    
</body>
</html>