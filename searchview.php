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
    <div class="container">
      <h1 class="mt-4 text-center">Search results</h1>
      <p class="text-center">
        <a class='btn btn-primary' href='index.php'>Search again</a>
      </p>
    </div>

    <div class="container">
      <div class="row justify-content-md-center">
    
     <?php
      
      $recordID = $_GET['id'];
      
      // connect to the database
      include('dbconx.php');

      if(isset($recordID) || !empty($recordID)){
        $sql = "SELECT * FROM items WHERE id = '$recordID'";
        $result = $con->query($sql);
      if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {

        echo "<div class='card mb-3' style='max-width: 540px;'>";
        echo "<div class='row g-0'>";
        echo "<div class='col-md-4'>";
        echo "<img class='card-img-top' style='max-height: 16vh; object-fit: contain' src=".'"'.$row['product_img'].'"'.">";
        echo "</div>";
        echo "<div class='col-md-8'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['product_type'] . "</h5>";
        echo "<p class='card-text'>" . "Brand: " . $row['product_brand'] . "</p>";
        echo "<p class='card-text'>" . "Age: " . $row['product_age'] . "</p>";
        echo "<p class='card-text'>" . "Condition: " . $row['product_condition'] . "</p>";
        echo "<p class='card-text'>" . "Description: " . $row['product_desc'] . "</p>";
        echo "<p class='card-text'>" . "Cost: " . $row['product_cost'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
	    }
      }
      }
      ?>
      </div>
    </div>

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
