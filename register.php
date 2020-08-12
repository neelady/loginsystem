<?php 
 include("classes.php");

 $hostname = "localhost";
 $db = "adoption";
 $Username = "root";
 $Password = "";
  
 
 
 $conn = mysqli_connect($hostname,$Username,$Password,$db) Or DIE ("unable to connect database");


 
 $User = new register();
   
 if (isset($_POST['submit']))
 {
    $User->username = $_POST['user'];

    if (isset($_POST['email']))
    { 
        $User->email = $_POST['email'];
      }
   
    $User->password = $_POST['pasword'];
    if (isset($_POST['email'])){

        $User->retype = $_POST['retype'];

    }
    

    if($User->match() == 0)
    {
   
        echo " retype-password does not match password ";


    }

    elseif($User->validateEmail() == 0)
    {

        echo " Invalid email format";

    } elseif($User->checkUser() == true) {


    

       echo "That username already exist";



    }elseif($User->checkEmail() == true){


        echo "That email already exist";


    } elseif($User->checkEmpty() == true)
    {



        echo "every field is required ";


    }
    else{


        $sql = "INSERT INTO register (username, email, password)
        VALUES ('$User->username', '$User->email', '$User->password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
      




    }

 } 





?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content= "width=device-width, initial-scale=1.0 ,shrink-to-fit=no">
  <link  href="styles.css" rel="stylesheet" type = "text/css">


  </head>
  <body>
  <header>
  <h1 id = "title"> Adoption process </h1>
 
   </header>

  
    <form method= "post" action = "register.php" class ="login_form">
    <div class = "header">
    <h4 id = "second"> Register <h4>
    </div>
       <label> username </label>
       <input type = "text" name = "user" />
       <label> Email </label>
       <input type = "text" name = "email" />
       <label> password </label>
       <input type = "password" name ="pasword" />
       <label> Retype-password </label>
       <input type = "password" name ="retype" />
       <div>
       <button type = "submit" name = "submit" class = "btn" > Submit </button>
       
       </div>
       

    </form>
  
  </body>
  </html>