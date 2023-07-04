<?php
// Start the session
session_start();
if(!isset( $_SESSION["userLogged"]))
{
header('Location:login.php');  
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
     <?php
        require ('dbconx.php');   // connect to database  
         $sql = mysqli_query ($con, "SELECT * FROM items");  // create variable to store sql statement
    ?> 
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand " href="index.php">
          eRevive
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php?state=false">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    
    <?php
      
      $recordID = $_GET['id'];
      
      // connect to the database
      include('dbconx.php');

      if(isset($recordID) || !empty($recordID)){
        $sql = "SELECT * FROM items WHERE id = '$recordID'";
        $result = $con->query($sql);
      if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {?>

       
      
      <div class="container">
        <div class="row mx-auto mt-2 mb-2" style="width: 800px;">
          <?php echo "Logged in as: ". $_SESSION['userLogged'] ?>
        </div>
      </div>
  
      <div class="container mx-auto mt-2 mb-5 needs-validation" style="width: 800px;" novalidate>
        <form enctype="multipart/form-data" action="update-proc.php" method="post" name="updateForm">
          <input type="hidden" name="recordID" value="<?php echo $row['id']?>">
          <label for= "product_type" class="form-label">Product Type</label>
          <input class="form-control" name="product_type" type="text" id="product_type" value="<?php echo $row['product_type']?>"><br>
          <label for= "product_brand" class="form-label">Product Brand</label>
          <input class="form-control" name="product_brand" type="text" id="product_brand" value="<?php echo $row['product_brand']?>"><br>
          <label for= "product_cost" class="form-label">Product Cost</label>
          <input class="form-control" name="product_cost" type="text" id="product_cost" value="<?php echo $row['product_cost']?>"><br>
          <label for= "product_condition" class="form-label">Product Condition</label>
          <input class="form-control" name="product_condition" type="text" id="product_condition" value="<?php echo $row['product_condition']?>"><br>
          <label for= "product_age" class="form-label">Product Age</label>
          <input class="form-control" name="product_age" type="text" id="product_age" value="<?php echo $row['product_age']?>"><br>
          <label for= "product_desc" class="form-label">Product Description</label>
          <textarea class="form-control" name="product_desc" type="text" id="product_desc" ><?php echo $row['product_desc']?></textarea><br>
          <img class="mb-3" style="width: 400px;" src="<?php echo $row['product_img']?>" alt="">
          <input class="form-control" name="uploaded" type="file" id="uploaded"><br>
          <input class='btn btn-primary form-control' type="submit" name="submit" id="submit">
        </form> 
      </div>
    <?php
	    }
      }
      }
    ?>

    <footer class="text-center text-lg-start bg-light text-muted">
      <!-- Copyright -->
      <div
        class="text-center p-4"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="index.php"
          >eRevive.com</a
        >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- SCRIPTS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
