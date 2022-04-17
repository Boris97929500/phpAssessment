<?php
    session_start();
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload.php">Upload</a>
      </li>
        <?php
        if(isset($_SESSION['userId'])){
            echo '
            <li class="nav-item">
                <a class="nav-link" href="createpost.php">Create Post</a>
            </li>
            <li class="nav-item">
            <form action="includes/logout.inc.php" action="POST">
                <button type="submit" class="btn btn-primary" name="logout-submit">Log out</button>
            </form>
            </li>
            
            ';
        }else{
            echo '
            <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            ';
        }

        ?>
    </ul>
  </div>
</nav>
