<?php

$user = $_POST["user"];
$pwd = $_POST["pwd"];
$hashed_pwd_md5 = md5($pwd);

include 'dbconx.php';
$sql = "INSERT INTO users (username, pwd) VALUES('$user', '$hashed_pwd_md5')";


if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
  $con->close();
  header('Location:login.php');
  die();

?>