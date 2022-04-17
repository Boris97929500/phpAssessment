<?php
  // 9. Check User Clicked Edit Button 
  session_start();
  if(isset($_POST['edit-submit']) && isset($_SESSION['userId'])){
    // 11. Connect to DB
    require 'connect.inc.php';

    // 12. Collect & store POST data
    
    $id = mysqli_real_escape_string($conn, $_GET['id']); 
    $id = intval($id);
    $title = $_POST['title'];
    $imageURL = $_POST['imageurl'];
    $comments = $_POST['comments'];

    // 13. VALIDATION: Check if any fields are empty 

    if (empty($id) || empty($title) || empty($imageURL) || empty($comments)  ) {
      // ERROR: Redirect + error via GET
      header("Location: ../editpost.php?id=$id&error=emptyfields");
      exit();

    // 14. Save  to DB by using Prepared Statements
    } else {
      
      $sql = "UPDATE posts SET title=?, imageurl=?, comments=? WHERE id=?"; 

      // (ii) Init SQL statement
      $statement = mysqli_stmt_init($conn);

      // (iii) Prepare and send statement to database to check for errors
      if(!mysqli_stmt_prepare($statement, $sql))
      {
        // ERROR: Something wrong when preparing the SQL
        header("Location: ../editpost.php?id=$id&error=sqlerror"); 
        exit();
      } else {
        // (iv) SUCCESS: Bind our user data with statement + escape strings

        mysqli_stmt_bind_param($statement, "sssi", $title, $imageURL, $comments,  $id);

        // (v) Execute the SQL Statement
        mysqli_stmt_execute($statement);

        // (vi) SUCCESS
        header("Location: ../posts.php?id=$id&edit=success"); 
        exit();
      }
    }
  } else {
    header("Location: ../signup.php");
    exit();
  }
?>