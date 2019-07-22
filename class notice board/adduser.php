<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
     $Server="localhost";
     $username="root";
     $psrd="blissmemphis";
     $dbname = "noticeboard";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     $uname=$_POST['Name'];
     $Pass=$_POST['password'];
    
       $query="select Name password from announcements where Name='$uname' and password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['Name']==$uname &&$Rows['password']==$Pass)
    {
        session_start();
        $_SESSION['Name'] = $uname;
        $_SESSION['password'] = $Pass;
        header("Location:noticeboard.php");
         exit();
     
    }
    else
    {
      
      echo "<script>window.alert('Wrong User Name Or Password Try Again');</script>";
    }
    
      mysqli_close($connection);                     
   }
   ?>
