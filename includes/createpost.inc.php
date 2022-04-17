<?php
  session_start();

  if(isset($_POST['post-submit']) && isset($_SESSION['userId'])){
    // 3. Connect to database
    require 'connect.inc.php';

    // 4. Collect & store POST data
    $title = $_POST['title'];
    $imageURL = $_POST['imageurl'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['userId'];

    // 5. Check if any fields are empty 
    if (empty($title ) || empty($imageURL) || empty($comment) ) {

      header("Location: ../createpost.php?error=emptyfields");
      exit();

    // 6. Save Post to DB using Prepared Statements
    } else {
      // (i) Declare Template SQL with ? Placeholders to save values to table

      $sql = "INSERT INTO posts ( title, imageurl, comments, users_id ) VALUES (?, ?, ?, ?)"; 

      // (ii) Init SQL statement
      $statement = mysqli_stmt_init($conn);

      // (iii) Prepare + send statement to database to check for errors
      if(!mysqli_stmt_prepare($statement, $sql))
      {
        // ERROR: Something wrong when preparing the SQL
        header("Location: ../createpost.php?error=sqlerror"); 
        exit();
      } else {
        // (iv) SUCCESS: Bind our user data with statement + escape strings

        mysqli_stmt_bind_param($statement, "sssi", $title, $imageURL, $comment, $user_id);

        // (v) Execute the SQL Statement with user data
        mysqli_stmt_execute($statement);

        // (vi) SUCCESS
        header("Location: ../posts.php?post=success"); 
        exit();
      }
    }

  } else {
    header("Location: ../index.php");
    exit();
  }
?>
