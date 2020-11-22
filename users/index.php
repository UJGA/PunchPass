<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/PunchPass/adminhome.php">Punch Pass Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/PunchPass/adminhome.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/PunchPass/adminregister.html">Register User</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Lookup Users<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/PunchPass/logout.php">Logout</a>
              </li>
            
          </ul>
        </div>
      </nav>
      <br>
      <h3 class="heading">To Edit click on any field</h3>
      <br>

      <div id="live_data"></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


<script>
$(document).ready(function(){
    function fetch_data()
    {
        $.ajax({
            url:"select.php",
            method:"POST",
            success:function(data){
                $('#live_data').html(data);
            }
        });
    }
    fetch_data();
    $(document).on('click', '#btn_add', function(){
        var first_name = $('#first_name').text();  
           var last_name = $('#last_name').text(); 
           var phone = $('#phone').text(); 
           var email = $('#email').text(); 
           var passType = $('#passType').text(); 
           var uses = $('#uses').text(); 
           if(first_name == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(last_name == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           }  

           if(phone == '')  
           {  
                alert("Enter Phone");  
                return false;  
           } 
           if(email == '')  
           {  
                alert("Enter Email");  
                return false;  
           } 
           if(passType == '')  
           {  
                alert("Enter Pass Type");  
                return false;  
           } 
           if(uses == '')  
           {  
                alert("Enter Uses");  
                return false;  
           } 

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{first_name:first_name, last_name:last_name, phone:phone, email:email, passType:passType, uses:uses},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           }) 
    });

    function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "fName");  
      });
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id, last_name, "lName");  
      });
      $(document).on('blur', '.phone', function(){  
           var id = $(this).data("id3");  
           var phone = $(this).text();  
           edit_data(id, phone, "phone");  
      });
      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id4");  
           var email = $(this).text();  
           edit_data(id, email, "email");  
      });
      $(document).on('blur', '.passType', function(){  
           var id = $(this).data("id5");  
           var passType = $(this).text();  
           edit_data(id, passType, "passType");  
      });
      $(document).on('blur', '.uses', function(){  
           var id = $(this).data("id6");  
           var uses = $(this).text();  
           edit_data(id, uses, "uses");  
      });
      

    
});

</script>