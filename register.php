<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
</body>
</html>
<?php
// Change this to your connection info.
require_once "db.php";

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['fName'], $_POST['lName'], $_POST['phone'], $_POST['email'], $_POST['passType'], $_POST['uses'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['passType']) || empty($_POST['uses'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id FROM users WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Email already exists
		echo "<script>
    alert('Email exists, please choose another!');
    window.location.href='adminregister.html';
    </script>";
		
	} else {
        
        
            // Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO users (fName, lName, phone, email, passType, uses) VALUES (?, ?, ?, ?, ?, ?)')) {
	$stmt->bind_param('sssssi', $_POST['fName'], $_POST['lName'], $_POST['phone'], $_POST['email'], $_POST['passType'], $_POST['uses']);
	$stmt->execute();
    echo "<script>
    alert('Registration successfull, click OK to continue to the home page.');
    window.location.href='adminhome.php';
    </script>";
} else {
	echo 'Could not prepare statement!';
}





	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statemedsfsdfsdnt!';
}
$con->close();
?>