<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Let's Discuss - Coding Forum</title>

    <!--------- Bootstrap CSS ------------->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./css/index.css" />
  </head>

  <body>
    <?php
    /*
                Connecting Database
        */
        include './partials/_dbconnect.php';
    /*
            Navbar 
    */
    include './partials/_header.php';
    // redirect to same page after login and signup
    $currpage = $_SERVER['REQUEST_URI'];
    $_SESSION['currpageaddress'] = $currpage;
    ?>

    <?php
        
        /*
                Carsousel for website
        */
        include './partials/_carsousel.php';

    ?>

    <div class="container main-con">
      <div class="heading my-3">
        <h2 class="text-center text-muted">
          Let's Discuss - <span style="color: green">Categories</span>
        </h2>
      </div>
      <div class="container">
        <div class="row">
          <?php

            $sqlfetch = "SELECT * FROM `categories`";
            $ressqlfetch = mysqli_query($conn,$sqlfetch);
            $nrow = mysqli_num_rows($ressqlfetch);
            if($nrow >
          0){ while($row = mysqli_fetch_assoc($ressqlfetch)){ $id =
          $row['category_id']; $catname = $row['category_name']; $catdesc =
          $row['category_description']; echo '
          <div class="col-md-4 my-4">
            <div class="card" style="width: 20rem">
              <img
                class="card-img-top"
                src="./images/'.$catname.'.jpg"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title text-capitalize">
                  <a href="/forums/threadlist.php?catid='.$id.'"
                    >'.$catname.'</a
                  >
                </h5>
                <p class="card-text">'.substr($catdesc,0,90).'....</p>
                <a
                  href="/forums/threadlist.php?catid='.$id.'"
                  class="btn btn-outline-success"
                  >View Threads</a
                >
              </div>
            </div>
          </div>
          '; } } ?>
        </div>
      </div>
    </div>

    <!--------footer--------->
    <?php
    include './partials/_footer.php';
?>

    <!--------------  Jquery CDN  ----------------->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <!-- ------- Bootstrap JS ----------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/index.js"></script>
  </body>
</html>
