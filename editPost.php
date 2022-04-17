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



<div class="container">
<h2>Edit Post</h2>
<!-- enter post information -->

  <main class="container " style="width: 80%">
    <?php
      // 1. Check User is Logged In + Id passed in via GET
      if(isset($_SESSION['userId']) && isset($_GET['id'])){
        // 3. Connect to DB
        require './includes/connect.inc.php';
        $row;
  
        // 5. Collect, escape string & store POST data
        $id = mysqli_real_escape_string($conn, $_GET['id']); 
        $id = intval($id);
  
        // 6. Declare SQL command to extract data from DB  
        $sql = "SELECT title, imageurl ,comments, users_id FROM posts WHERE id=?";
  
        // (ii) Init SQL statement
        $statement = mysqli_stmt_init($conn);
  
        // (iii) Prepare and send statement to database to check for errors
        if(!mysqli_stmt_prepare($statement, $sql))
        {
          // ERROR
          header("Location: editpost.php?id=$id&error=sqlerror"); 
          exit();
        } else {
          // (iv) SUCCESS: Bind user data with statement
          // binding one integer
          mysqli_stmt_bind_param($statement, "i", $id);
  
          // (v) Execute the SQL Statement (to run in DB)
          mysqli_stmt_execute($statement);
  
          // (vi) SUCCESS: Store result & convert to array
          $result = mysqli_stmt_get_result($statement);
          $row = mysqli_fetch_assoc($result);
  
        }

      } else {
        header("Location: index.php");
        exit();
      }
    ?>

    <?php 
      // 15. DYNAMIC ERROR ALERTS displaying
      if(isset($_GET['error'])){
        // (i) Empty fields validation 
        if($_GET['error'] == "emptyfields"){
          $errorMsg = "Please fill in all fields";

        // (ii) Internal server error 
        } else if ($_GET['error'] == "sqlerror") {
          $errorMsg = "An internal server error has occurred ";
        }

        echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';

      }
    ?>


    <form action="includes/editpost.inc.php?id=<?php echo $id ?>" method="POST">
      <h2>Edit Post</h2>

      <!-- 1. TITLE -->
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $row['title'] ?>">
      </div>  

      <!-- 2. IMAGE URL -->
      <div class="mb-3">
        <label for="imageurl" class="form-label">Image URL</label>
        <input type="text" class="form-control" name="imageurl" placeholder="Image URL" value="<?php echo $row['imageurl'] ?>" >
      </div>

      <!-- 3. COMMENT SECTION -->
      <div class="mb-3">
        <label for="comments" class="form-label">Comment</label>
        <textarea class="form-control" name="comments" rows="3" placeholder="Comment"><?php echo $row['comments'] ?></textarea>
      </div>


      <!-- 5. SUBMIT BUTTON -->
      <button type="submit" name="edit-submit" class="btn btn-primary w-100">Edit</button>
    </form>
  </main>
</div>


<!--  footer -->
<?php  require "footer.php" ?>

</body>
</html>