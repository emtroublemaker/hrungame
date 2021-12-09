<?php

//Connecting to Database
$host = "localhost";
$user = "root";
$pass = "";
$db = "hrungame";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

//Check Connection
if($conn->connect_error){
    die("Connection Failed!! ".$conn->connect_error);
    }
    else{
        echo "Connection Successful!!  ";
    }

$score= [];
$score = mysqli_real_escape_string($conn, $_POST['score']);
//echo "<script>console.log($score)</script>";
$sql = "INSERT INTO htable VALUES ('$score')";
//$tmp = "<script>".$score."</script>";
    //echo $tmp;
$fetch = "SELECT * FROM htable ORDER BY score DESC LIMIT 3"; 
$result = $conn->query($fetch);

$leader = [];
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        //$leader = $row;
        //echo $leader["score"]." "." ";'

        echo $row["score"]." "." ";
        
    }
}else{
    echo "0 results";
}

if($conn->query($sql)==TRUE){
    echo '';
}
    else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
/*
$jsonurl = "./game.js";
$json = file_get_contents($jsonurl)
var_dump(($json));
*/
$conn->close();


?>