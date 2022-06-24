<?php
// here session is started into first line of each file

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
      </ul>';
      
     
      
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      {

          echo '
          <form class="d-flex my-2 mx-2" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="button">Search</button>
          </form>
  
        <div class="username">
          <p>Welcome <span class="name">'.$_SESSION['username'].'</span></p><p class="useremail">'.$_SESSION['useremail'].'</p>
        </div>';


        echo '<div class="logoutbtn my-2">

        <a href="partials/_logout.php" role="button" class="btn btn-outline-danger text-light ">
          logout
        </a>
        </div>
        ';

      }else{
          echo '
          <form class="d-flex my-2 mx-2" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form>
          
          
         
          <div class="loginsignupbtn">
            <button type="button" class="btn btn-outline-primary text-light " data-bs-toggle="modal" data-bs-target="#loginmodal">
              Log In
            </button>
    
            <button type="button" class="btn btn-outline-primary text-light mx-1" data-bs-toggle="modal" data-bs-target="#signupmodal">
              Sign Up
            </button>
          </div>
          ';
      }
      
echo '

</div>      
</div>
</nav>';
      



// Alert message
function loginsigndisplay($message,$error){
  if($error){
      echo '<div class="alertmess">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Failed! </strong>'.$message.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
      </div>
      ';
  }else{
      echo '<div class="alertmess">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> Successfull! </strong> '.$message.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
      </div>
      ';
  }
}


include './partials/_loginmodal.php';
include './partials/_signupmodal.php';

if(isset($_GET['error']) && $_GET['error'] == "false"){
    
    $errorStatus = false;
    $errorMessage = $_GET['message'];

    loginsigndisplay($errorMessage,$errorStatus);

}else if(isset($_GET['error']) && $_GET['error'] == "true")
{
    $errorStatus = true;
    $errorMessage = $_GET['message'];

    loginsigndisplay($errorMessage,$errorStatus);
}


?>

