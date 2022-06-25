<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Let's Discuss</title>

    <!--------- Bootstrap CSS ------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        .footer{
            position: relative;
            margin-bottom: -20px;
        }

        .main-con{
            min-height: 85vh;
        }

              
    /*  login status display */
    .username{
       position: relative;
       display: inline-block;
       background-color: rgba(244, 244, 244, 0.274);
       color: #fff;
       margin-right: 10px;
       padding-left: 10px;
       padding-right: 10px;
       padding-top: 5px;
       border-radius: 15px;
       height: 45px;
       width: auto;
    }

    .username span{
        color: rgb(220, 0, 95);
        font-weight: 500;
        margin-top: 15px;
    }
    .username p{
        font-weight: 350;
        font-size: 15px;
    }

    .username .useremail{
        font-size: 12px;
        color: rgb(210, 210, 210);
        margin-left: 15px;
        margin-top: -20px;
    }
    .aboutdesc{
        background-color: rgb(226, 226, 226);
        padding:10px;
    }
    .aboutdesc span{
        color: rgb(220, 0, 95);
        font-weight: 400;
        font-size: 25px;
        margin: 5px;
    }
    </style>
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
        <span>Let's Discuss</span> is a online forum website which helps programmer all over the world to make community and connect at same platfrom so that they can discuss their issue and helps each other solving the issues. Here threads are divided into diffrent categories according to the programming language and issue are been posted. Users can login to comment on these issues and helps other to solve their issues.
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