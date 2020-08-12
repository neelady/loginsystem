<?php
   
   include("classes.php");

   $hostname = "localhost";
   $db = "practice";
   $Username = "root";
   $Password = "";
    
   
   
   $conn = mysqli_connect($hostname,$Username,$Password,$db) Or DIE ("unable to connect database");

   $login = new login();

   if(isset($_POST['submit']))
   {


      $login->username = $_POST['user'];
      $login->password = $_POST['pasword'];
        
     if ($login->checkfield() == true)
     {

       echo "all fleids are required to process your login ";


     }elseif($login->validateEmail() == 1)
     {

         echo "wrong email format";

     }
     
     elseif($login->processlogin() == true)
     {  
        if(isset($_SESSION['username'] ) && isset($_SESSION['userid'] ) ) {

          session_start(); 
          header("Location: index.php");
       }
       

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

  
    <form method= "post" action = "login.php" class ="login_form">
    <div class = "header">
    <h4 id = "second"> Login <h4>
    </div>
       <label> username </label>
       <input type = "text" name = "user" />

       <label> password </label>
       <input type = "password" name ="pasword" />
      
       <div>
       <button type = "submit" name = "submit" class = "btn" > Submit </button>
       
       </div>
       

    </form>
  
  </body>
  </html>