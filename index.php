<?php session_start(); ?>
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
    ::-webkit-scrollbar
    {
        background: #000;
        cursor: pointer;
        width: 12px;
    }
    ::-webkit-scrollbar-thumb
    {
        background-color: rgb(110, 110, 110);
        border-radius: 25px;
    }

    .alertmess{
        position: absolute;
        width:100%;
        z-index:10;
    }

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

    .card-title a{
        text-decoration: none;
        color: rgb(244, 67, 103);
        cursor: pointer;
    }
    
    .card img{
        height: 210px;
        width: auto;
    }

    .carousel-item img{
        height: 25em;
    }

    @media only screen and (max-width: 1000px){
        .carousel-item img{
            height: 22em;
        }

        .card img{
        height: 210px;
    }
    }

    @media only screen and (max-width: 900px){
        .carousel-item img{
            height: 19em;
        }
        .card img{
        height: 205px;
        }
    }

    @media only screen and (max-width: 800px){
        .carousel-item img{
            height: 17em;
        }
        .card img{
        height: 205px;
        }
    }

    @media only screen and (max-width: 700px){
        .carousel-item img{
            height: 16em;
        }
        .card img{
        height: 200px;
        }
    }

    @media only screen and (max-width: 600px){
        .carousel-item img{
            height: 15em;
        }
        .card img{
            height: 195px;
        }
    }

    @media only screen and (max-width: 500px){
        .carousel-item img{
            height: 10em;
        }
        .card img{
            height: 195px;
        }
    }

    @media only screen and (max-width: 400px){
        .carousel-item img{
            height: 9em;
        }
        .card img{
            height: 195px;
        }
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
    </style>
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

                    $id = $row['category_id'];
                    $catname = $row['category_name'];
                    $catdesc = $row['category_description'];


                    echo '<div class="col-md-4 my-4">
                    <div class="card"style="width:20rem;">

                    <img class="card-img-top" src="./images/'.$catname.'.jpg" alt="Card image cap">
                    <div class="card-body">
                       <h5 class="card-title text-capitalize"><a href="/forums/threadlist.php?catid='.$id.'">'.$catname.'</a></h5>
                        <p class="card-text">'.substr($catdesc,0,90).'....</p>
                        <a href="/forums/threadlist.php?catid='.$id.'" class="btn btn-outline-success">View Threads</a>
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

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
    </script>

    
    <!-- ------- Bootstrap JS ----------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            
    

    <script>
        let createone = document.getElementById('createone');
        createone.addEventListener('click',()=>{
            $('#loginmodal').modal('hide');
            $('#signupmodal').modal('show');
        })
    </script>

    
</body>

</html>