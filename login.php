<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Review</title>
    <!-- Bootstrap 5.0 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body >

<!-- navbar -->
<?php  require "header.php" ?>


<!-- image body -->
<div class="container">


  <div>
    <form action="includes/login.inc.php" method="POST">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" aria-describedby="username" name="mailuid" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="pwd" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary" name="login-submit">Log in</button>    

    </form>

  </div>

</div>

  <!-- Error Message -->
  <div class="container">
    <h3>system message</h3>
    <!-- 2. Error Messages during Login Process! -->
    <?php
        if(isset($_GET['loginerror'])){
        // (i) Empty fields in Login 
        if($_GET['loginerror'] == "emptyfields"){
          $errorMsg = "Please fill in all fields";

        // (ii) SQL Error
        } else if ($_GET['loginerror'] == "sqlerror"){
          $errorMsg = "Internal server error ";

        // (iii) Password does NOT match DB 
        } else if ($_GET['loginerror'] == "wrongpwd"){
          $errorMsg = "password do not match";
          
        // (iv) uidUsers / emailUsers do not match
        } else if ($_GET['loginerror'] == "nouser"){
          $errorMsg = "The user does not exist";
        }
        // Display alert
        echo '<div class="alert alert-danger" role="alert">'
          .$errorMsg.
        '</div>';

      // Display SUCCESS message!
      } else if (isset($_GET['login']) == "success"){
        echo '<div class="alert alert-success" role="alert">
          You have successfully logged in.
        </div>';    
      }
    ?>
  </div>






<!--  footer -->
<footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-1">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-md text-dark m-2"
        href="#"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-md text-dark m-2"
        href="#"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>


      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-md text-dark m-2"
        href="#"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>


    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 All Rights Reserved:
    <a class="text-dark" href="#">carReview.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>