<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    <!--------- Bootstrap CSS ------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/threadlist.css">
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
?>


    <?php
    


    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST')
    {
        

        // Insert thread into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        // convert all html entities to string inside single quote and double quotes
        $th_desc = htmlentities($th_desc, ENT_QUOTES); 
        $th_title = htmlentities($th_title, ENT_QUOTES);



        // // protection from attack
        // $th_desc = str_replace("<","&lt;",$th_desc);
        // $th_desc = str_replace(">","&gt;",$th_desc);





        // how to use enter in next line in code
        $th_desc = str_replace("\n","<br>",$th_desc);
        $th_title = str_replace("\n","<br>",$th_title);




        $id = $_GET['catid'];
        $userid = $_SESSION['userid'];

        if($th_desc != "" || $th_desc != "")
        {
            $sql = "INSERT INTO `threads`(`thread_subject`,`thread_description`,`thread_cat_id`,`thread_user_id`,`thread_time`) VALUES ('$th_title','$th_desc','$id','$userid',current_timestamp())";
    
            $result = mysqli_query($conn,$sql);
                        
            if($result){
                $error = false;
                $message = "Your question is been addesuccesssfully into forum.";
                alertdisplay($message,$error);
            }
            else
            {
                $error = true;
                $message = "Your question is not added to forubecause of some technical issue.";
                alertdisplay($message,$error);
            }
        }else
        {
            $error = true;
            $message = "Please fill both title and descriptioof your question into the form.";
            alertdisplay($message,$error);
        }
               
    }
  
?>

    <?php
        // Alert message
        function alertdisplay($message,$error){
            if($error){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Failed! </strong>'.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                ';
            }else{
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Successfull! </strong> '.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                ';
            }
        }
        
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





        <!-------------------------------------------
                    Discussion form                 
        -------------------------------------------->

        <div class="container my-3 discussionform">
            <p class="disformheading text-center">Start a Discussion</p>
            <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){


                    echo '<form action=" '.$_SERVER['REQUEST_URI'] . '" method="post">

                    <div class="mb-3">
                        <label for="problemtitle" class="form-label">Problem Title</label>
                        <input type="text" class="form-control" id="problemtitle" name="title"
                            placeholder="what do you want to ask ?">
                    </div>
    
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Problem Description</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Describe your problem in detail."></textarea>
                    </div>
    
                    <button type="submit" class="btn btn-success">Ask Question</button>
    
                </form>';


                }else{
                    echo '<div class="loginmessage text-center">
                        <p>You are not logged in. Please <span id="loginmodalopen">login</span> to start the disscussion and post your query</p>
                    </div>';
                    // redirect to same page after login and signup
                    $currpage = $_SERVER['REQUEST_URI'];
                    $_SESSION['currpageaddress'] = $currpage;
                }
            ?>
            
            

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

                    $threadSub = str_replace("<br>","\n",$threadSub);

                    $threadDesc = str_replace("<br>","\n",$threadDesc);

                    $threadtime = $rowdata['thread_time'];
                    $userid = $rowdata['thread_user_id'];

                    $usersql = "SELECT * FROM `users` WHERE `user_id` = '$userid'";
                    $userres = mysqli_query($conn,$usersql);

                    while($userdata = mysqli_fetch_assoc($userres)){

                    echo '
                    <div class="media d-flex align-items-center  my-3">
                    <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">
                    <div class="media-body">
                    <h5 class="mt-0"><a class="threadhead" href="thread.php?thread_id='.$threadID.'">'.$threadSub.'</a></h5>

                    <p class="threadDesc">'.substr($threadDesc,0,200).'....<a class="readmore" href="thread.php?thread_id='.$threadID.'">readmore</a>
                      </p>

                      <p class="time">Asked by <span class="name">'.$userdata['username'].'</span> on : '.date("l jS \of F Y - h:i:s A",strtotime($threadtime)).'</p>
                    
                    </div>
                </div>';
                    }
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

    <!--------------  Jquery CDN  ----------------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

    <!--------- Bootstrap JS ------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/threadlist.js"></script>
</body>

</html>