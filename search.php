<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="userSearch.html">Punch Pass Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="usearSearch.php">Home</a>
            </li>
            
          </ul>
        </div>
      </nav>
      <br><br>
</html>

<?php

require_once "db.php";

if ($con->connect_error){
	die("Connection failed: ". $con->connect_error);
}

$email = $_POST['search'];

$sql = "select fName, lName, email, passType, uses from users where email like '%$email%'";


$result = $con->query($sql);
$output = '';  

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    // echo $row["fName"]."  ".$row["lName"]."  ".$row["email"]." ".$row["passType"]." ".$row["uses"]."<br>";
    
    $output .= '  
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div style="background-color:white; text-align:center;" >
<br>
    <h1>Hello '.$row["fName"].' your information is below:</h1>
    <br>
</div>
      <div class="table-responsive">  
           <table class="table table-bordered" style="background-color:white;">  
                <tr>  
                     <th width="20%">First Name</th>  
                     <th width="20%">Last Name</th> 
                     <th width="20%">Email</th>  
                     <th width="20%">Pass Type</th> 
                     <th width="20%">Uses</th> 
                </tr>'.
                
                '  
                <tr>  
                     
                     <td class="first_name">'.$row["fName"].'</td>  
                     <td class="last_name">'.$row["lName"].'</td>
                     <td class="email" >'.$row["email"].'</td>
                     <td class="passType">'.$row["passType"].'</td>
                     <td class="uses">'.$row["uses"].'</td> 
                     
                </tr>  
           '
           .
           
      '</table>  


      </div>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
      
      '

                
                
                ;  
 
 echo $output; 



}
} else {
    
    
    $output .= '  

    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>


<div style="background-color:white; text-align:center;" >
<br>
    <h1>User not found - Try again!</h1>
    <br>
</div>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
      
      '

                
                
                ; 

                echo $output;


    
}

$con->close();

?>

