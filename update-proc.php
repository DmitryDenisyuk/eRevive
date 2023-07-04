<?php
$recordID = $_POST['recordID'];
$product_type = $_POST['product_type'];
$product_brand = $_POST['product_brand'];
$product_age = $_POST['product_age'];
$product_condition = $_POST['product_condition'];
$product_desc = $_POST['product_desc'];
$product_cost = $_POST['product_cost'];



echo $recordID;


include('dbconx.php');




if ($_FILES['uploaded']['size'] == 0 ){
  $sql = "UPDATE items SET product_type='$product_type', product_brand='$product_brand', product_age = '$product_age', product_condition = '$product_condition', product_desc = '$product_desc', product_cost = '$product_cost' WHERE id='$recordID'";
} else {

 
$target_dir = "images/"; //target directory for images

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

  $sql = "UPDATE items SET product_type='$product_type', product_brand='$product_brand', product_age = '$product_age', product_condition = '$product_condition', product_desc = '$product_desc', product_cost = '$product_cost', product_img = '$target_file' WHERE id='$recordID'";
}



if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
    header('Location:admin.php');
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
  
  mysqli_close($con);
?>