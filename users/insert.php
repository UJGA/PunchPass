<?php


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'Blaker4198';
$DATABASE_NAME = 'punchpass';
// Try and connect using the info above.
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = "INSERT INTO users (fName, lName, phone, email, passType, uses) VALUES ('".$_POST["first_name"]. "', '".$_POST["last_name"]."', '".$_POST["phone"]."', '".$_POST["email"]."', '".$_POST["passType"]."', '".$_POST["uses"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Data Inserted';
}


// $sql = "INSERT INTO users(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
// if(mysqli_query($connect, $sql))  
// {  
//      echo 'Data Inserted';  
// }  
?>