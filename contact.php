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
        <a class="navbar-brand" href="index.php"> eRevive </a>
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
              <a class="nav-link " aria-current="page" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="well well-sm">
            <form class="form-horizontal" action="" method="post">
              <fieldset>
                <legend class="text-center">Contact us</legend>

                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Name</label>
                  <div class="col-md-9">
                    <input
                      id="name"
                      name="name"
                      type="text"
                      placeholder="Your name"
                      class="form-control"
                    />
                  </div>
                </div>

                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="email"
                    >Your E-mail</label
                  >
                  <div class="col-md-9">
                    <input
                      id="email"
                      name="email"
                      type="text"
                      placeholder="Your email"
                      class="form-control"
                    />
                  </div>
                </div>

                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message"
                    >Your message</label
                  >
                  <div class="col-md-9">
                    <textarea
                      class="form-control"
                      id="message"
                      name="message"
                      placeholder="Please enter your message here..."
                      rows="5"
                    ></textarea>
                  </div>
                </div>

                <!-- Form actions -->
                <div class="form-group mt-2">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary btn-lg">
                      Submit
                    </button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center text-lg-start bg-light text-muted">
      <!-- Copyright -->
      <div
        class="text-center p-4"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="index.php">eRevive.com</a>
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
