<?php
// Start the session
session_start();

// include 'includes/errors.php';
$user = $_POST["user"];
$pwd = md5($_POST["pwd"]);

include 'dbconx.php';

$sql = "SELECT username, pwd FROM users WHERE username = '$user' AND pwd = '$pwd'";

$result = $con->query($sql);

if ($result->num_rows === 1) {
//create a session
  $_SESSION["userLogged"] = $user;
 	header('location:admin.php?username='.$user);
   die();

}

else{

  echo "error";
}

$con->close();
?>