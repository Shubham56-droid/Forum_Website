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
    <link rel="stylesheet" href="./css/thread.css">
</head>

<body>
    <?php
include './partials/_dbconnect.php';
include './partials/_header.php';
?>

    <?php
        $currpagethreadid = $_GET['thread_id'];
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $userComment = $_POST['usercomment'];

            // // protection from attack
            // $userComment = str_replace("<","&lt;",$userComment);
            // $userComment = str_replace(">","&gt;",$userComment);

            
            // convert all html entities to string inside single quote and double quotes
            $userComment = htmlentities($userComment, ENT_QUOTES);
            
            
            
            // how to use enter in next line in code
            $userComment = str_replace("\n","<br>",$userComment);



            $comment_user_id = $_SESSION['userid'];

            if($userComment != ""){

                $sqlins = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`, `comment_user_id`) VALUES ('$userComment', '$currpagethreadid', current_timestamp(), '$comment_user_id')";

                $resins = mysqli_query($conn,$sqlins);

                if($resins){
                        $error = false;
                        $message = "Your comment is added successfully";
                        alertdisplay($message,$error);
                }else{
                    $error = true;
                    $message = "Your comment is not added due to some technical issue.";
                    alertdisplay($message,$error);
                }
                
            }else{
                $error = true;
                $message = "Comment box cannot be posted empty";
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


<div class="container main-con">

    <?php
    // get request from url
    $threadid = $_GET['thread_id'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $threadid";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $threadsub = $row['thread_subject'];
        $threaddesc = $row['thread_description'];
        $threadtime = $row['thread_time'];
        $threaduserid = $row['thread_user_id'];


        $usql = "SELECT * FROM `users` WHERE `user_id` = '$threaduserid'";
        $ures = mysqli_query($conn,$usql);

        while($userdata = mysqli_fetch_assoc($ures))
        {
            $usernametag = $userdata['username'];
        }

    }

?>

        <div class="jumbotron mt-3 p-3 rounded-3">

            <p class="display-5 text-capitalize forumName">
                <?php
                echo "$threadsub";
            ?>
            </p>

            <hr class="my-4">

            <p class="catdesc">
                <?php
                    echo "$threaddesc";
            ?>
            </p>

            <p class="py-3 text-muted postedby">
                <?php
                echo 'Posted by : <span>'.$usernametag.'</span> on'.date("l jS \of F Y - h:i:s A",strtotime($threadtime));
            ?>
            </p>

            <div class="container answerquestion">
                <?php

                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                    echo'<button type="button" class="btn btn-success" id="postbtn">Comment</button>';

                    }else
                    { 
                        echo '<a type="btn" class="btn btn-success" id="logintocomment">Login To Comment</a>';

                        // redirect to same page after login and signup
                        $currpage = $_SERVER['REQUEST_URI'];
                        $_SESSION['currpageaddress'] = $currpage;
                    }
                ?>
            </div>
        </div>






        <!---------------------------------------
                    Comment On the Question
        ---------------------------------------->
        <div class="postcomment" id="commentbox">

            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                <p class="form-heading">
                    Post Comment
                </p>
                <div class="mb-3">
                    <textarea class="form-control" id="usercomment" name="usercomment" rows="3"
                        placeholder="Write your comment here..."></textarea>
                </div>
                <button class="btn btn-success" type="submit">Post Comment</button>
            </form>
        </div>





        <div class="container my-3">
            <h2 class="text-muted dis-heading">Discussion</h2>
            <?php
            $threadID = $_GET['thread_id'];
            $sqldis = "SELECT * FROM `comments` WHERE `thread_id` = '$threadID' ORDER BY `comment_id` DESC";

            $resdisplay = mysqli_query($conn,$sqldis);

            $numRow = mysqli_num_rows($resdisplay);
            if($numRow > 0){
                while($rowcomment = mysqli_fetch_assoc($resdisplay)){
                    $commentid = $rowcomment['comment_id'];
                    $commentcontent = $rowcomment['comment_content'];
                    $commenttime  = $rowcomment['comment_time'];
                    $comment_id_user = $rowcomment['comment_user_id'];

                    $usernamesql = "SELECT * FROM `users` WHERE `user_id` = '$comment_id_user'";

                    $resusername = mysqli_query($conn,$usernamesql);

                    while($usernamedata = mysqli_fetch_assoc($resusername)){
                        echo '
                        <div class="media   my-3">
                        <div class="userblock d-flex align-items-center">
                            <img class="mr-3" src="images/user_default_img.png" alt="Generic placeholder image">

                            <div class="userstat">
                            <p class="username_comment"><a>'.$usernamedata['username'].'</a></p>
                            <p class="time">Commented on : '.date("l jS \of F Y - h:i:s A",strtotime($commenttime)).'</p>
                            </div>
                        </div>
                        
                        <div class="media-body">
                          
                          <p class="commentdesc">
                          '.$commentcontent.'
                          </p>
                          
                        </div>
                    </div>';
                    }

                }
            }else{
                echo '<div class="container no-message">
                         <p>No one has commented to this problem yet. Be the first person to answer the problem.</p>
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


    <script>
    let createone = document.getElementById('createone');
    createone.addEventListener('click', () => {
        $('#loginmodal').modal('hide');
        $('#signupmodal').modal('show');
    })
    </script>

    <script>
    let postbtn = document.getElementById('postbtn');
    let commentbox = document.getElementById('commentbox');

    postbtn.addEventListener('click', () => {
        postbtn.classList.toggle('active');
        commentbox.classList.toggle('active');

        if (postbtn.className == 'btn btn-success active') {
            postbtn.innerText = "Cancel Post";
            postbtn.classList.remove('btn-success');
            postbtn.classList.add('btn-danger');
        } else {
            postbtn.innerText = "Comment";
            postbtn.classList.remove('btn-danger');
            postbtn.classList.add('btn-success');
        }
    })


    </script>

    <script>
       let logcombtn = document.getElementById("logintocomment");
       logcombtn.addEventListener("click",()=>{
            $('#loginmodal').modal('show');
       })
    </script>

</body>

</html>