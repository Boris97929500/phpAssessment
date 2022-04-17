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
<main class="container p-4 bg-light mt-3">
    <!-- signup.inc.php - Will process the data from this form-->
    <form action="includes/signup.inc.php" method="post">
      <h3>Signup Form</h3>

      <?php
        // 1. validations 
        if(isset($_GET['error'])){

          // (i) Empty fields validation 
          if($_GET['error'] == "emptyfields"){
            $errorMsg = "Please fill in all fields";

          // (ii) Invalid Email and Password error
          } else if ($_GET['error'] == "invalidmailuid") {
            $errorMsg = "Invalid email and Password";

          // (iii) Invalid Email error
          } else if ($_GET['error'] == "invalidmail") {
            $errorMsg = "Invalid email";

          // (iv) Invalid Username error
          } else if ($_GET['error'] == "invaliduid") {
            $errorMsg = "Invalid username";

          // (v) Password Confirmation error
          } else if ($_GET['error'] == "passwordcheck") {
            $errorMsg = "Passwords do not match";

          // (vi) Username already exists
          } else if ($_GET['error'] == "usertaken") {
            $errorMsg = "Username already taken";

          // (vii) Internal server error 
          } else if ($_GET['error'] == "sqlerror") {
            $errorMsg = "An internal server error has occurred - please try again later";
          
          }
          echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';
        
        // 2. sucess message
        } else if (isset($_GET['signup']) == "success") {
          echo '<div class="alert alert-success" role="alert">You have successfully signed up!</div>';    
        }

        ?>

      <!-- 1. USERNAME -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="uid" placeholder="Username" value=
          <?php 
          // (i) If an invalid email - echo back the correct username (uid)
            if(isset($_GET['uid'])){ 
              echo($_GET['uid']);
            } else {
              echo null;
            }
          ?> 
        >
      </div>  

      <!-- 2. EMAIL -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="mail" placeholder="Email Address" value=
          <?php 
            // (ii) If an invalid username - echo back the correct email (mail)
            if(isset($_GET['mail'])){ 
              echo($_GET['mail']);
            } else {
              echo null;
            }
          ?> 
        >
      </div>

      <!-- 3. PASSWORD -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
      </div>

      <!-- 4. PASSWORD CONFIRMATION -->
      <div class="mb-3">
        <label for="password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password">
      </div>

      <!-- 5. SUBMIT BUTTON -->
      <button type="submit" name="signup-submit" class="btn btn-primary btn-lg">Signup</button>
    </form>
  </main>











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