<!DOCTYPE html>
<html lang="en">
<?php 
  // B. Declare general variables initial states 
  $directory = "uploads";
  $uploadOk = 1;
  $the_message = '';

  // F. Set PHP upload errors using superglobal error array within $_FILES


  $phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
  ); 

  // C. Save upload data to variables (using $_FILES superglobal)
  if(isset($_POST['submit'])){
    // (1) store file name on the server
    $temp_name = $_FILES['fileToUpload']['tmp_name'];
    // (2) Name of the uploaded file
    $target_file = $_FILES['fileToUpload']['name'];
    // (3) Name of file type extension 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // (4) store image upload url path
    $my_url = $directory . DIRECTORY_SEPARATOR . $target_file;

    $the_message_ext = '';

    // F.(2) additional error handling
    $the_error = $_FILES['fileToUpload']['error'];
    if($_FILES['fileToUpload']['error'] != 0){
      $the_message_ext = $phpFileUploadErrors[$the_error];
      $uploadOk = 0;
    }

    
    // D. Set custom error handlers
    // (1) File Already Exists
    if($the_message_ext == "" && file_exists($my_url)){
      $the_message_ext = "The file already exists.";
      $uploadOk = 0;
    }

    // (2) Incorrect File Extension
    if($the_message_ext == "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
      $the_message_ext = "File type is not allowed, please choose a jpg, png, jpeg or gif file";
      $uploadOk = 0;
    }

    // E. Set our main error capture & successful upload case 
if($uploadOk == 0) {
      $the_message = "<p>Sorry, your file was not uploaded.</p>" . "<strong>Error: </strong>" . $the_message_ext;
    } else {
      // (2) If all ok (remains value of 1) - try to upload file to permanent location
      if(move_uploaded_file($temp_name, $directory . "/" . $target_file)){
        $the_message = "File Uploaded Successfully. " . 'You Can Preview it: <a href="' . $my_url . '" target="_blank">' . $my_url . '</a>';
      }
    }
  }
?>


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
<div class="row justify-content-center">
      <div class="col-8">

        <!-- A. File Upload Form: START -->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <p class="lead">Please select an image to upload:</p>

          <div class="input-group mb-3">     
            <!-- File Input -->
            <input type="file" class="form-control" id="inputGroupFile" name="fileToUpload">
            <!-- Submit Button -->
            <input type="submit" value="Upload" name="submit" class="btn btn-primary "></input>
          </div>

        </form>


        <!-- Alert Message -->
        <?php 
          // F. Create Feedback to user in event of nothing, error or success
          if($the_message == ""){
            echo null;
          } else if($uploadOk == 0){
            echo '<div class="alert alert-danger" role="alert">' . $the_message . '</div>';
          } else {
            echo '<div class="alert alert-success" role="alert">' . $the_message . '</div>';
          }
        ?>
      </div>
    </div>
</div>

<!--  footer -->
<?php  require "footer.php" ?>

</body>
</html>