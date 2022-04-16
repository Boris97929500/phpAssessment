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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
  </div>
</nav>

<!-- image body -->
<div class="container">
<h2>Create Post</h2>
<!-- enter post information -->
  <form>
    <div class="form-group">
      <label for="exampleTitle">Title</label>
      <input type="email" class="form-control" id="exampleTitle" aria-describedby="username" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="exampleImageURL">Image URL</label>
      <input type="email" class="form-control" id="exampleImageURL" aria-describedby="emailHelp" placeholder="Enter Image URL">
    
    </div>
    <div class="form-group">
      <label for="exampleComment">Comment</label>
      <input type="password" class="form-control" id="exampleComment" placeholder="exampleComment">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


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