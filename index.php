<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Discuss - Coding Forum</title>

    <!--------- Bootstrap CSS ------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
    .footer {
        position: relative;
        margin-bottom: -20px;
    }

    .main-con {
        min-height: 85vh;
    }

    .instruction {
        font-size: 12px;
    }

    .link {
        color: blueviolet;
        cursor: pointer;
    }
    .card{
        box-shadow: 1px 1px 10px rgba(183, 183, 183, 0.58);
    }
    .card img{
        height: 240px;
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
            Log In modal
    */
    include './partials/_loginmodal.php';
    /*
            Sign Up modal
    */
    include './partials/_signupmodal.php';
    /*
            Connecting Database
    */
    include './partials/_dbconnect.php';
    /*
            Carsousel for website
    */
    include './partials/_carsousel.php';
?>


    <div class="container main-con">
        <div class="heading my-3">
            <h2 class="text-center text-muted">Let's Discuss - <span style="color:green;">Categories</span></h2>
        </div>
        <div class="container">
            <div class="row">

        <?php

            $sqlfetch = "SELECT * FROM `categories`";
            $ressqlfetch = mysqli_query($conn,$sqlfetch);
            $nrow = mysqli_num_rows($ressqlfetch);
            if($nrow > 0){
                while($row = mysqli_fetch_assoc($ressqlfetch)){

                    echo '<div class="col-md-4 my-4">
                    <div class="card" style="width:22rem; ">

                   
                    <img class="card-img-top" src="./images/'.$row['category_name'].'.jpg" alt="Card image cap">
                    <div class="card-body">
                       <h5 class="card-title text-capitalize">'.$row['category_name'].'</h5>
                        <p class="card-text">'.substr($row['category_description'],0,90).'....</p>
                        <a href="#" class="btn btn-outline-success">View Threads</a>
                    </div>
                    </div>
                </div>';

                }
            }
        
        ?>



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