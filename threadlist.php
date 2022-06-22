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
    ::-webkit-scrollbar {
        background: #000;
        cursor: pointer;
        width: 12px;

    }

    ::-webkit-scrollbar-thumb {
        background-color: rgb(110, 110, 110);
        border-radius: 25px;
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

    .jumbotron {
        background: rgba(222, 222, 222, 0.274);
    }

    .forumName {
        color: rgb(239, 54, 91);
        font-weight: 600;
    }


    .media img {
        height: 80px;
        width: 80px;
    }

    .media-body{
        padding: 10px;
        width: 80%;
        /* background-color: #000; */
        height: 25%;
    }

    .media-body h5{
        color: rgb(0, 140, 255);
        cursor: pointer;
    }

    .rules {
        font-size: 16px;
        font-weight: 200;
        color: rgb(78, 78, 78);
    }

    .rules-heading {
        color: rgb(0, 192, 0);
        font-weight: 400;
        font-size: 22px;
    }

    .catdesc {
        margin-left: 20px;
        width: 90%;
        color: rgb(95, 95, 95);
        font-weight: 350;
    }
    .no-message{
        background-color: rgb(241, 241, 241);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        padding: 15px;
        border-radius: 10px;
        border: 2px solid rgb(225, 225, 225);
    }
    .no-message p{
        margin-top: 10px;
        color: rgb(118, 118, 118);
        font-size: 18px;
        font-weight: 350;
    }
    .readmore{
        text-decoration: none;
        color:rgb(0, 123, 255);
        font-weight: 400;
    }
    .quesheading{
        font-weight: 400;
        font-size: 28px;
        color: rgba(128, 128, 128, 0.742);
        margin-top: 40px;
    }

    .discussionform{
        background-color: rgba(211, 211, 211, 0.416);
        padding: 20px;
        border-radius:10px;
        color: rgb(130, 130, 130);
    }

    .disformheading{
        font-weight: 300;
        font-size: 30px;
        color: rgb(83, 83, 83);
    }
    .alertmess{
        width:100%;
        display:flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
    .alert{
        width: 60%;
        margin-top: 10px;
    }

    .time{
        color: #666;
        font-size: 13px;
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
                    No Spam / Advertising / Self-promote in the forums.
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

        <?php
        $method = $_SERVER['REQUEST_METHOD'];
            if($method == 'POST')
            {
                // Insert thread into db
                $th_title = $_POST['title'];
                $th_desc = $_POST['desc'];

                if($th_desc != "" || $th_desc != "")
                {
                    $sql = "INSERT INTO `threads`(`thread_subject`,`thread_description`,`thread_cat_id`,`thread_user_id`,`thread_time`) VALUES('$th_title','$th_desc','$id','1',current_timestamp())";

                    $result = mysqli_query($conn,$sql);
                    
                    if($result){
                        $error = false;
                        $message = "Your question is been added successsfully into forum.";
                        alertdisplay($message,$error);
                    }else{
                        $error = true;
                        $message = "Your question is not added to forum because of some technical issue.";
                        alertdisplay($message,$error);
                    }
                }else{
                    $error = true;
                        $message = "Please fill both title and description of your question into the form.";
                        alertdisplay($message,$error);
                }
                
            }
        ?>

        <?php
        // Alert message
        function alertdisplay($message,$error){
            if($error){
                echo '<div class="alertmess">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Failed! </strong>'.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                </div>
                ';
            }else{
                echo '<div class="alertmess">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Successfull! </strong> '.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                </div>
                ';
            }
        }
        
        ?>


        <div class="container my-3 discussionform">
            <p class="disformheading text-center">Start a Discussion</p>

            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

                <div class="mb-3">
                    <label for="problemtitle" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="problemtitle"
                    name="title" placeholder="what do you want to ask ?">
                  </div>

                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Problem Description</label>
                    <textarea class="form-control" 
                    name = "desc"
                    id="exampleFormControlTextarea1" rows="3" placeholder="Describe your problem in detail."></textarea>
                  </div>

                  <button type="submit" class="btn btn-success">Ask Question</button>

            </form>

        </div>





        <div class="container my-4">
            <p class="quesheading mb-3">Browse Question</p>


            <?php
            $cat_id = $_GET['catid'];
            $sqlques = "SELECT * FROM `threads` WHERE `thread_cat_id` = $cat_id ORDER BY `thread_id` DESC";
            $result = mysqli_query($conn,$sqlques);
            $numRow = mysqli_num_rows($result);

            if($numRow > 0){
                while($rowdata = mysqli_fetch_assoc($result)){

                    $threadID = $rowdata['thread_id'];
                    $threadSub = $rowdata['thread_subject'];
                    $threadDesc = $rowdata['thread_description'];
                    $threadtime = $rowdata['thread_time'];


                    echo '
                    <div class="media d-flex align-items-center  my-3">
                    <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mt-0"><a class="readmore" href="thread.php?thread_id='.$threadID.'">'.$threadSub.'</a></h5>
                      <p class="time">Added on : '.$threadtime.'</p>
                      <p>
                      '.substr($threadDesc,0,200).'....<a class="readmore" href="thread.php?thread_id='.$threadID.'">readmore</a>
                      </p>
                    </div>
                </div>';
                }
            }else{
                echo '<div class="container no-message">
                         <p>No thread found. Be the first person to ask.</p>
                      </div>';
            }
        ?>


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