<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session;

      	
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "farmer");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	$sql="SELECT id FROM user WHERE username = '$login_session'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	print_r($result);
	print_r($row);


       ?></h1> 

      <h2><a href = "logout.php">Sign Out</a></h2>

  <a href="index.php"><button>Insert</button></a>
   </body>
   
</html>