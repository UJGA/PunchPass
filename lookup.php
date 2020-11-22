<?php
require_once "db.php";

    // Now we check if the data from the login form was submitted, isset() will check if the data exists.


    //Code HERE
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT email FROM users WHERE email = ? ')) {
// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
$stmt->bind_param('s', $_POST['email']);
$stmt->execute();
// Store the result so we can check if the account exists in the database.
$stmt->store_result();


if ($stmt->num_rows > 0) {
    $stmt->bind_result($email);
    $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    $_SESSION['email'] = $_POST['email'];
//         header('Location: resetpassword.html');
} 
else{
echo "<script>
        alert('Email not found');
        window.location.href='adminlookup.html';
        </script>";
}
}

// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
// $stmt = $con->prepare('UPDATE accounts SET password = ?  WHERE email = ?') ;

// $stmt->bind_param('ss', $password, $_POST['email']);
// $stmt->execute();
// echo "<script>
// alert('Reset successfull, click OK to continue to the login page.');
// window.location.href='login.html';
// </script>";
// $con->close();
// $stmt->close();



?>