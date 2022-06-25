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
    .searchresult .searchresulthead{
        font-size: 25px;
        font-weight: 300;
        background-color: rgba(235, 235, 235, 0.562);
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 1px 1px 2px rgba(107, 107, 107, 0.578);
    }
    .searchresult p span{
        font-weight: 400;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: rgb(255, 57, 96);
    }
    .result{
        background-color: rgba(238, 238, 238, 0.562);
        padding: 7px;
        padding-left: 15px;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 1px 1px 2px rgba(107, 107, 107, 0.578);
    }
    .result a{
        text-decoration: none;
        color: rgb(153, 0, 255);
        font-size: 18px;
        font-weight: 350;
        transition: 0.3s;
    }
    .result a:hover{
        color: rgb(212, 0, 255);
    }

    .result .descthread{
        font-size: 12px;
        color: rgb(159, 159, 159);
        margin-left: 10px;
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
    /* 
        redirect to same page after login and signup
    */
    $currpage = $_SERVER['REQUEST_URI'];
    $_SESSION['currpageaddress'] = $currpage;
    ?>


    <div class="container main-con">

        <div class="searchresult my-3">

            <?php 
            $searchtext = $_GET['search'];
            
            $searchtext = htmlentities($searchtext, ENT_QUOTES); 

            if($searchtext != ""){
                echo '<p class="searchresulthead">Search result for - "<span>'.$searchtext.'</span>"</p>';
            }else{
                echo '<p class="searchresulthead">Search cannot be - "<span>empty</span>" Please enter what you want to search in search box</p>';
            }
            ?>
            

<?php
            

            $searchsql = "SELECT * FROM threads WHERE MATCH (thread_subject,thread_description) against ('$searchtext');";

            $searchresult = mysqli_query($conn,$searchsql);
            $num_of_rows_Search = mysqli_num_rows($searchresult);

            if($num_of_rows_Search > 0){

                while($searchdata = mysqli_fetch_assoc($searchresult)){

                    $searchtitle = $searchdata['thread_subject'];
                    $searchdesc = $searchdata['thread_description'];

                    $searchtitle = str_replace("<br>","\n",$searchtitle);

                    $searchdesc = str_replace("<br>","\n",$searchdesc);

                    $searchid = $searchdata['thread_id'];
    
                    echo '<div class="result my-3">
                    <p><a href="/forums/thread.php?thread_id='.$searchid.'">'.$searchtitle.'</a>
                    </p>
                    <p class="descthread">'.substr($searchdesc,0,250).'....readmore</p>
                </div>';
                }

            }else{
                echo '<div class="result my-3">
                    <p class="text-muted lead text-center mt-2">Sorry Found Nothing</p>
                </div>';
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