<?php
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="./index.php"><span class="text-light">Let\'s</span> Discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php">Contact</a>
        </li>
      </ul>
      
      <form class="d-flex my-2 mx-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>

      <div>
        <button type="button" class="btn btn-outline-primary text-light " data-bs-toggle="modal" data-bs-target="#loginmodal">
          Log In
        </button>

        <button type="button" class="btn btn-outline-primary text-light mx-1" data-bs-toggle="modal" data-bs-target="#signupmodal">
          Sign Up
        </button>

      </div>      

    </div>
  </div>
</nav>';
?>