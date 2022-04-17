<?php 
  // 1. Check if submit button is clicked
  if(isset($_POST['signup-submit'])){

    // 2. Connect to database
    require 'connect.inc.php';

    // 3. Collect & store the POST information in variables
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    
    // 4. peform validations
    // (i) Check if any fields are empty
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {

      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    
    // (ii) Check for both invalid email AND password syntax 

    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      
      header("Location: ../signup.php?error=invalidmailuid");
      exit(); 

    // (iii) Checks if the email is invalid only
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit(); 

    // (iv) Checks if the username is invalid only
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      exit();

    // (v) Checks if password has NOT been confirmed 
    } else if($password !== $passwordRepeat){
      
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();  


  
    } else {


      //(i)prepare sql statement
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";

      // (ii) Initialise prepared statement
      $statement = mysqli_stmt_init($conn);

      // (iii) Prepare and send statement to database to check for errors
      if(!mysqli_stmt_prepare($statement, $sql))
      {
        // ERROR: Something wrong when preparing the SQL - exit
        header("Location: ../signup.php?error=sqlerror"); 
        exit();
      } else {
        // (iv) SUCCESS: Bind user data with statement  and run SQL statement 
        mysqli_stmt_bind_param($statement, "s", $username);

        // (v) Execute the SQL Statement with user data
        mysqli_stmt_execute($statement);

        // (vi) store inside the $statement
        mysqli_stmt_store_result($statement);

        // (vii) Check how many rows of results were returned
        $resultCheck = mysqli_stmt_num_rows($statement);
        // ERROR: If User already exists - Send error message via GET
        if($resultCheck > 0){
          header("Location: ../signup.php?error=usertaken&mail".$email); 
          exit(); 

        // 6. SUCCESS - proceed to save users
        } else {
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
          // Init statement
          $statement = mysqli_stmt_init($conn);
          // ERROR: Check for error in saving
          if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit(); 

          // if successfuly, hash password, save data and direct to success page!
          
          } else {
    
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            // Bind data to statement & execute
            mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPwd);
            mysqli_stmt_execute($statement);

            header("Location: ../signup.php?signup=success"); 
            exit();
          }
        }
      }
    }
    
    mysqli_stmt_close($statement); //Closes the statement
    mysqli_close($conn); //Closes the connection to database

  } else {

    header("Location: ../signup.php");
    exit(); 
  }
?>