<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About - Let's Discuss</title>

    <!--------- Bootstrap CSS ------------->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./css/about.css" />
  </head>
  <body>
    <!--------header--------->
    <?php
    include './partials/_dbconnect.php';
    include './partials/_header.php'; 
?>

    <div class="main-con container">
      <h1 class="text-center my-3 text-muted">About Us</h1>
      <p class="my-3 aboutdesc rounded-2">
        <span>Let's Discuss</span> is a online forum website which helps
        programmer all over the world to make community and connect at same
        platfrom so that they can discuss their issue and helps each other
        solving the issues. Here threads are divided into diffrent categories
        according to the programming language and issue are been posted. Users
        can login to comment on these issues and helps other to solve their
        issues.
      </p>
    </div>

    <!--------footer--------->
    <?php
    include './partials/_footer.php';
?>

    <!--------- Bootstrap JS ------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
