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
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>

<!--------header--------->
<?php
    include './partials/_dbconnect.php';
    include './partials/_header.php';
?>


<div class="main-con container">
    <h1 class="text-center my-3 text-muted">Contact Us</h1>
    <form action="contact.php" method="post" class="contactform">
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
            <button type="submit" class="btn btn-success">
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