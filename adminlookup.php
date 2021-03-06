<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lookup Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="adminhome.html">Punch Pass Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="adminhome.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminregister.html">Register User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminlookup.html">Lookup User<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            
          </ul>
        </div>
      </nav>

      <div class="login">

    <div class="lookup">
        <h1>Lookup Pass</h1>
        <h3>Please enter an email</h3>
        <form action="adminlookup.php" method="post">
            <!-- <label for="lastName">
                <h5>Last Name</h5>
            </label>
            <input type="text" name="Last Name" placeholder="Last Name" id="lastName">
            <br><br> -->
            <br>
            <label for="email">
                <h5>Email</h5>
            </label>
            <input type="text" name="email" placeholder="Email" id="email">
            <br><br>
            
            <input type="submit" value="Submit">
        </form>
        </div>
        </div>  

        <h1>List of Users</h1>
        <?php 
        require_once "db.php";
          $res = mysql_query("SELECT * FROM users");

          while($row = mysql_fetch_array($res))
            echo "$row[id]. $row[fName] <a href='edit.php?edit=$row[id]'> edit</a><br />";
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        

</body>
</html>