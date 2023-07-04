<?php
$recordID = $_GET['id'];

include('dbconx.php');

$sql = "DELETE FROM items  WHERE id='$recordID'";




if ($con->query($sql) === TRUE) {
    header('Location:admin.php');
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  $con->close();

?>