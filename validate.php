<?php
   $link = mysqli_connect("localhost", "root", "", "farmer");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password = $_POST['password'];
      $type=$_POST['type']; 
      $password=hash('sha1','$password',FALSE);
      if ($type=='farmer') {
         $sql = "SELECT id FROM user WHERE username = '$username' and password = '$password'";
         $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         //session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: db.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
       elseif($type=='buyer') {
         $sql = "SELECT buyerid FROM buyer WHERE username = '$username' and password = '$password'";
         $result = mysqli_query($link,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
         $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
         if($count == 1) {
         //session_register("username");
            $_SESSION['login_user'] = $username;
         
            header("location: bdb.php");
         }else {
            $error = "Your Login Name or Password is invalid";
            echo $error;
         }
      }elseif($type=='transport') {
         $sql = "SELECT transportid FROM transport WHERE username = '$username' and password = '$password'";
         $result = mysqli_query($link,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
         $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
         if($count == 1) {
         //session_register("username");
            $_SESSION['login_user'] = $username;
         
            header("location: tdb.php");
         }else {
            $error = "Your Login Name or Password is invalid";
            echo $error;
         }
      }
   }
      

?>