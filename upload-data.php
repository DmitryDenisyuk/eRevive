<?php
session_start();
include 'dbconx.php';









$product_type = ucfirst($_POST["product_type"]);
$product_brand = $_POST["product_brand"];
$product_cost = $_POST["product_cost"];
$product_condition = $_POST["product_condition"];
$product_age= $_POST["product_age"];
$product_desc = $_POST["product_desc"];

$username = $_SESSION['userLogged'];




$target_dir = "images/"; 

$target_file = $target_dir . basename($_FILES["uploaded"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["uploaded"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 

	else {
        echo "File is not an image.";
        $uploadOk = 0;
        exit();
    }
}

if (file_exists($target_file)) {
    echo "File already exists.";
    $uploadOk = 0;
    exit();
}

if ($_FILES["uploaded"]["size"] > 100000) {
    echo "The file exceeds 100Kb. Please upload a smaller filesize.";
    $uploadOk = 0;
    exit();
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    exit();
}

if ($uploadOk == 0) {
    echo " <p>Your file was not uploaded.</p>";
    exit();

} else {
    if (move_uploaded_file($_FILES["uploaded"]["tmp_name"], $target_file)) {

        $target_file; 
       
          
    } 

	else {
        echo "There was an error uploading your file.";
        exit();
    }
}

$sql = "INSERT INTO items (product_type, product_brand, product_cost,product_condition, product_age, product_desc, product_img, username )VALUES ('$product_type','$product_brand','$product_cost','$product_condition', '$product_age', '$product_desc','$target_file','$username')";
if ($con->query($sql) === TRUE) {
    header('Location:admin.php');
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  $con->close();
?>

