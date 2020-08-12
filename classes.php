<?php
     include("database.php");

  
      
         
     
/////////////////////////////////////////////////////////////////////////////////
  class register {
    
     protected  $servername = "";
     protected $Username = "";
     protected  $Password = "";
     protected $dbname = "";
     var $username;
     var $email;
     var $password;
     var $retype;
     public $match;
     public $emailErr;
   

   //create and return connection

    protected function connect()
    {

       $this->servername = "localhost";
       $this->Username = "root";
       $this->Password = "";
       $this->dbname = "adoption";

        $conn = new mysqli($this->servername, $this->Username, $this->Password,$this->dbname);
        
       
        
        return $conn;
    }
   
    function match()
    {
         if($this->password !== $this->retype)
         {

           $this->match = 0;

         }else{

            $this->match = 1;
         }


      return $this->match;
        

    }
    
     function validateEmail()
     {
       // $this->email = test_input($_POST["email"]);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
          $this->emailErr = 0;
        }else
        {
            $this->emailErr = 1;

        }
         return   $this->emailErr;
     }
     
   public function checkUser()
   {
    include("database.php");
        $sql = "SELECT username From register WHERE username = '".$this->username."';";
        $result = $this->connect()->query($sql);

         

         $num_rows = $result->num_rows;
          if($num_rows>0)
          {

            return true;
            

          }
         return false;
   }

   public function checkEmail()
   {
    $sql = "SELECT email From register WHERE email = '".$this->email."';";
    $result = $this->connect()->query($sql);


    $num_rows = $result->num_rows;
    if($num_rows > 0)
    {

      return true;
      

    }
   return false;
    
   }
   public function checkEmpty(){

    if(empty($this->username) || empty($this->email) ||empty($this->password) ||empty($this->retype))
     {

        return true;


    }

     return false;

   }



  }
   /********************************************************************************************* */
  class login extends register
  {
      
     public  function checkfield()
    {
       if( empty ($this->username)|| empty($this->password))
       {

          return true;

       }
      
        return false;


     }
    


    function processLogin(){

    $sql = "SELECT * FROM  register WHERE username = '".$this->username."' AND password = '".$this->password."'; ";
    $result = $this->connect()->query($sql);
    $row =  $result->fetch_assoc();

    if( $row['username'] == $this->username && $row['password'] == $this->password )
    {
      $_SESSION['userid'] = $row['Id'];
      $_SESSION['username'] = $row['username'];
        return true;
           

    }
    else {

     
      return false;

    }

    
    
   }


   
















  }

  
















?>