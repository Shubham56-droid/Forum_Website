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
    <link rel="stylesheet" href="./css/search.css">
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
                    <p class="text-muted lead text-center mt-2 fs-4">Sorry No Results Found</p>
                    <p class="text-muted lead mt-2">Suggestions :</p>
                    <ul class="fw-light fst-italic">
                        <li>Make sure that all words are spelled correctly</li>
                        <li>Try diffrent keywords</li>
                        <li>Try more general keywords</li>
                    </ul>
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

    <!--------------  Jquery CDN  ----------------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- ------- Bootstrap JS ----------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/search.js"></script>


    
</body>

</html>