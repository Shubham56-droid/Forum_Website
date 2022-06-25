<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Let's Discuss</title>

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
    .contactform{
        width:70%;
        margin:auto;
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
    <h1 class="text-center my-3 text-muted">Contact Us</h1>
    <form action="" method="post" class="contactform">
        <div class="mb-3">
        <label for="yourname" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="yourname" placeholder="Name" name="yourname">
        </div>


        <div class="mb-3">
        <label for="youremail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="youremail" placeholder="Name@example.com" name="youremail">
        </div>

        <div class="mb-3">
        <label for="yourphonenumber" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="yourphonenumber" placeholder="Phone number" name="yourphonenumber">
        </div>

        <div class="mb-3">
        <label for="yourmessage" class="form-label">Message</label>
        <textarea class="form-control" id="yourmessage" rows="3" name="yourmessage"
        placeholder="Write your message here...."></textarea>
        </div>

        <div class="mb-3 ">
            <button type="button" class="btn btn-success">
                Send message
            </button>
        </div>


    </form>

</div>




<!--------footer--------->
<?php
    include './partials/_footer.php';
?>

<!--------- Bootstrap JS ------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>