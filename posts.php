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
    <h2>Read Post</h2>
    <main class="container " style="width: 80%">
    <?php

      // (i) Connect to Database
      require './includes/connect.inc.php';

      // (ii) create SQL commands
      $sql = "SELECT id, title, imageurl , comments, users_id FROM posts";

      // (iii) Call query & store result in variable
      $result = mysqli_query($conn, $sql);
    ?>

    <?php 
    // show success alert
      if(isset($_GET['post']) == "success"){
        echo '<div class="alert alert-success" role="alert">
          Post created!
        </div>';  
      } else if(isset($_GET['edit']) == "success"){
        echo '<div class="alert alert-success" role="alert">
          Post edited!
        </div>'; 
      }

      // show error alert
      if(isset($_GET['error'])){
        // (i) Internal server error 
        if ($_GET['error'] == "sqlerror") {
          $errorMsg = "An internal server error has occurred ";
        }

        // (ii) Dynamic Error Alert based on Variable Value 
        echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';

      // (iii) Display SUCCESS message for correct login
      } else if (isset($_GET['delete']) == "success"){
        echo '<div class="alert alert-success" role="alert">
          Post successfully deleted!
        </div>';    
      }
    ?>

    <?php

      // (2.i) Success: Display Posts
      if(mysqli_num_rows($result) > 0){

        // 3. loop data card template
        // (3.i) New variable with default state
        $output = "";

        // (3.ii) Take result -> convert to array & then insert into While Loop
        while($row = mysqli_fetch_assoc($result)) {

         $output .= 

          '
            <div class="card border-0 mt-3" id="' . $row['id'] . '">
              <img src="' . $row['imageurl'] . '" class="card-img-top post-image" alt="' . $row['title'] . '">
              <div class="card-body">
                <h5 class="card-title">' . $row['title'] . '</h5>
                <p class="card-text">' . $row['comments'] . '</p> ';
                
                //Restrict Edit/Delete Button only to users who created the post 
                if(isset($_SESSION['userId']) &&  $_SESSION['userId'] == $row['users_id']){

                  $output .= '
                  <div class="admin-btn">
                    <a href="editpost.php?id=' . $row['id'] . '" class="btn btn-secondary mt-2">Edit</a>
                    <a href="includes/deletepost.inc.php?id=' . $row['id'] . '" class="btn btn-danger mt-2">Delete</a>
                  </div>';
                }

            $output .= 
            '
              </div>
            </div>
            ';
        }
        // (3.iii) Echo out the result of the loop
        echo $output;

      } else {
        echo "0 results";
      }
      // (2.iii) Close Connection
      mysqli_close($conn);
    ?>
  </main>

</div>

<!--  footer -->
<?php  require "footer.php" ?>

</body>
</html>