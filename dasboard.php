<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
<?php
$title =$_POST["title"];
$accountnumber = $_POST["account"]; 
$IFSCcode = $_POST["code"];
$amount =$_POST["amo"];
$date =$_POST["date"];
$description = $_POST["description"];

$servername = "localhost";
$tiltledb = "root";
$accountnumberdb = "";
$dbname = "unstoppable";



//Here we want to give the variable used for the database above line--6,7,8,9.....
//by using new keyword we created thge oject for DB and the object is  "$conn"....
$conn = new mysqli($servername,$titledb,$accountnumberdb,$dbname);


if($conn->connect_error){
     die("Registration failed:".$conn->connect_error);
}
else{
    echo"Registred Sucessfully!!!";
}


// Here we want to give as per in the database table...
$stmt = $conn->prepare("INSERT INTO unstoppable.dashboard(title,accountnumber,IFSCcode,amount,date,description) VALUES(?,?,?,?,?,?)");


// Here we want to give trhe variable name as per in the above POST Method....
$stmt->bind_param("sssiis",$title,$accountnumber,$IFSCcode,$amount,$date,$description);

if($stmt->execute() ==TRUE){
    echo"DB Updated Sucessfuly!";
    header("Location: dashboard.php");
    exit();
    
   
}
else{
    echo"FAILED".$stmt->error;
}


?></center>
</body>
</html>