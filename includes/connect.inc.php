<?php 

// 1. Save database config to variables
$servername = "localhost";
$username = "root";
$password= "";
$dbname= "carreview";

//2. Create connection variable with database passing in the configs
//$conn = new mysql($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
//3. Check if connection is successful

if ($conn->connect_error) {
    die('<div class="alert alert-warning mt-5" role="alert"><h4>Connection Failed<h4>' . $conn->connect_error . '</div>');
  } else {
    echo('<div class="alert alert-success mt-5" role="alert">Connection Successful</div>');
  }


?>