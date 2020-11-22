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

 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE users SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>