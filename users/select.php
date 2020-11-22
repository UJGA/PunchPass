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

$output = '';  
 $sql = "SELECT * FROM users

ORDER BY email ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="background-color:white;">  
                <tr>  
                     <th width="5%">Id</th> 
                     <th width="10%">Email</th>  
                     <th width="10%">First Name</th>  
                     <th width="10%">Last Name</th> 
                     <th width="10%">Phone</th>
                     <th width="10%">Pass Type</th> 
                     <th width="10%">Uses</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = 

mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.

$row["id"].'</td>  
<td class="email" data-id4="'.$row["id"].'" contenteditable>'.$row["email"].'</td>
                     <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["fName"].'</td>  
                     <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["lName"].'</td>
                     <td class="phone" data-id3="'.$row["id"].'" contenteditable>'.$row["phone"].'</td>
                     <td class="passType" data-id5="'.$row["id"].'" contenteditable>'.$row["passType"].'</td>
                     <td class="uses" data-id6="'.$row["id"].'" contenteditable>'.$row["uses"].'</td> 
                     
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td> 
                <td id="phone" contenteditable></td>  
                <td id="last_name" contenteditable></td> 
                <td id="first_name" contenteditable></td>  
                <td id="email" contenteditable></td> 
                <td id="passType" contenteditable></td> 
                <td id="uses" contenteditable></td>  

      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
?>