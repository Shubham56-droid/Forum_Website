<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    <!--------- Bootstrap CSS ------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
        
        ::-webkit-scrollbar{
            background: #000;
            cursor: pointer;
            width: 12px;
            
        }
        ::-webkit-scrollbar-thumb{
            background-color: rgb(110, 110, 110);
            border-radius: 25px;
        }
    
        .footer 
        {
            position: relative;
            margin-bottom: -20px;
        }

        .main-con 
        {
            min-height: 85vh;
        }

        
        .instruction {
            font-size: 12px;
        }

        .link {
            color: blueviolet;
            cursor: pointer;
        }

        .jumbotron{
            background:rgba(222, 222, 222, 0.274);
        }

        .forumName{
            color: rgb(239, 54, 91);
            font-weight: 600;
        }


        .media img{
            height: 100px;
            width: 100px;
        }

        .rules{
            font-size: 16px;
            font-weight: 200;
            color: rgb(78, 78, 78);
        }
        
        .rules-heading{
            color: rgb(0, 192, 0);
            font-weight: 400;
            font-size: 22px;
        }

        .catdesc{
            margin-left: 20px;
            width:90%;
            color: rgb(218, 0, 87);
            font-weight: 350;
        }


    </style>
</head>

<body>
    <?php
    /*
            Navbar 
    */
    include './partials/_header.php';
    /*
            Connecting Database
    */
    include './partials/_dbconnect.php';
    /*
            Log In modal
    */
    include './partials/_loginmodal.php';
    /*
            Sign Up modal
    */
    include './partials/_signupmodal.php';
?>


<div class="container main-con">

<?php
    // get request from url
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $catname = $row['category_name'];
        $catdesc = $row['category_description'];

    }

?>



    <div class="jumbotron mt-3 p-3 rounded-3">
    <h1 class="display-4 text-muted text-capitalize"><span class="forumName">
        <?php
         echo "$catname";
        ?>
    </span> Forums</h1>
    <p class="lead catdesc">
        <?php
         echo "$catdesc";
        ?>
    </p>
    <hr class="my-4">

    <p class="rules-heading">Forum Rules</p>
    <ol class="rules">
    <li>
        No Spam / Advertising / Self-promote in  the forums.
    </li> 
    <li>
        Do not post copyright-infringing material.
        providing or asking for information on how to illegally obtain copyrighted materials is forbidden.
    </li>
    <li>
        Do not post “offensive” posts, links or images
    </li>
    <li>
        Do not cross post questions.
    </li>  
    <li>
        Do not send private messages to any users asking for help.
    </li>
    <li>
        Remain respectful of other members at all times.
    </li>
    </ol>


    <p class="lead ">
        <a class="btn text-muted btn-warning btn-lg" href="#" role="button">Learn more</a>
    </p>
    </div>


    <div class="container my-3">
        <h2 class="text-muted mb-4">Browse Question</h2>




        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>


        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>


        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>



        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>


        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>


        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>


        <div class="media d-flex align-items-center my-3">
            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
            <div class="media-body p-2">
              <h5 class="mt-0">Unable to install py-audio in windows</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>




    </div>





</div>



<!--------footer--------->
<?php
    include './partials/_footer.php';
?>
    <!--------- Bootstrap JS ------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>