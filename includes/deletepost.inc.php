<?php
    
    //same usual start session
    session_start();
  if(isset($_SESSION['userId']) && isset($_GET['id'])){
    // 3. Connect to DB
    require 'connect.inc.php';

    // 4. escape string 
    $id = mysqli_real_escape_string($conn, $_GET['id']); 

    $id = intval($id);

    // 6. Delete Post from DB (Prepared Statements)
    $sql = "DELETE FROM posts WHERE id=?"; 

    // (ii) Init SQL statement
    $statement = mysqli_stmt_init($conn);

    // (iii) Prepare and send statement to database to check for errors
    if(!mysqli_stmt_prepare($statement, $sql))
    {

      header("Location: ../posts.php?id=$id&error=sqlerror"); 
      exit();
    } else {
      // (iv) SUCCESS!
      mysqli_stmt_bind_param($statement, "i", $id);

      // (v) Execute the SQL Statement
      mysqli_stmt_execute($statement);
    
      header("Location: ../posts.php?id=$id&delete=success"); 
      exit();
    }

  } else {
    header("Location: ../signup.php");
    exit();
  }
?>