<?php


  // 1. Check if user clicked submit button 
  if(isset($_POST['login-submit'])){

    // 2. Connect to database
    require 'connect.inc.php';

    // 3. Store the POST username and password in variables
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    // 4. Check fields are not blank
    if(empty($mailuid) || empty($password)){
      // Send emptyfields error
      header("Location: ../login.php?loginerror=emptyfields"); 
      exit(); 
    
    // 5. Check if User Exists in Database
    } else {
      // (i) Declare SQL for finding the user in the database
      $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?"; 

      // (ii) Init SQL statement
      $statement = mysqli_stmt_init($conn);

      // (iii) Prepare and send statement to database to check for errors
      if(!mysqli_stmt_prepare($statement, $sql)) {
        // ERROR: Something wrong when preparing the SQL - exit
        header("Location: ../login.php?loginerror=sqlerror"); 
        exit(); 
      } else {
        // (iv) SUCCESS: Bind our user data with statement & run SQL statement 
        
        mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);

        // (v) Execute the SQL Statement with user data
        mysqli_stmt_execute($statement);

        // (vi) Return result & store in variable
        $result = mysqli_stmt_get_result($statement);       

        // 6. Check $result to see if a user EXISTS in DB
        
        if($row = mysqli_fetch_assoc($result)){
          // This compares password passed in by user VS encrypted password in DB
          $pwdCheck = password_verify($password, $row['pwdUsers']);

          // (i) User exists - BUT Password is NOT a match using bcrypt
          if($pwdCheck == false){
            header("Location: ../login.php?loginerror=wrongpwd");
            exit(); 

          // (ii) User exists - Password match & init session
          } else if ($pwdCheck == true) {
            // Start session
            session_start();
            // Adds data 
            $_SESSION['userId'] = $row['idUsers']; 
            
            $_SESSION['userUid'] = $row['uidUsers']; 
            
            header("Location: ../login.php?login=success");
            exit(); 
          
          // (iii). Catch all for unexpected error 
          } else {
            header("Location: ../login.php?loginerror=wrongpwd");
            exit(); 
          }
        
        // (iv). Error if no user was found in DB
        } else {
          header("Location: ../login.php?loginerror=nouser");
          exit(); 
        }
      }
    }
  
  } else {
    // If users try to access this file via url, redirect user
    header("Location: ../login.php");
    exit();
  }

?>