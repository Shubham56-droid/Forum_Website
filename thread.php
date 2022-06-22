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
        background: rgba(240, 240, 240, 0.699);
    }

    .forumName {
        color: rgb(87, 87, 87);
        font-weight: 350;
        font-size: 30px;
    }


    .catdesc {
        margin-left: 30px;
        width: 90%;
        color: rgb(61, 61, 61);
        font-weight: 350;
        font-size: 17px;
    }

    .postedby{
        font-weight: 500;
    }

    .dis-heading{
        color: rgb(87, 87, 87);
        font-weight: 350;
        font-size: 30px;
    }

    .answerquestion{
        display:flex;
        justify-content: end;
        align-items: center;

    }

    .postcomment{
        position: absolute;
        width: 100%;
        margin-top: 20px;
        background-color: rgb(243, 243, 243);
        padding: 20px;
        border-radius: 10px;
        transform: scale(0);
    }

    .postcomment.active{
        position: relative;
        display: block;
        transform: scale(1);
        animation: fadeout 0.3s 1 linear;
    }
    @keyframes fadeout 
    {
        0%{
            transform: scale(0);
        }
        100%{
            transform: scale(1);
        }
    }

    .postcomment .form-heading{
        color: #666;
        font-size: 28px;
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
    $threadid = $_GET['thread_id'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $threadid";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $threadsub = $row['thread_subject'];
        $threaddesc = $row['thread_description'];
        $threadtime = $row['thread_time'];

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
                echo "Posted by : Shubham Bawankar $threadtime";
            ?>
            </p>

            <div class="container answerquestion">
                <button type="button" class="btn btn-success" id="postbtn">Post Comment</button>
            </div>
        </div>





        <div class="postcomment" id="commentbox">

            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                <p class="form-heading">
                    Post Comment 
                </p>
                <div class="mb-3">
                    <textarea class="form-control" id="usercomment" name="usercomment"rows="3" placeholder="Write your comment here..."></textarea>
                </div>
                <button class="btn btn-success" type="submit">Comment</button>
            </form>
        </div>





        <div class="container my-3">
            <h2 class="text-muted dis-heading">Discussion</h2>
        </div>

    </div>

    <!--------footer--------->
    <?php
    include './partials/_footer.php';
?>
    <!--------- Bootstrap JS ------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let postbtn = document.getElementById('postbtn');
    let commentbox = document.getElementById('commentbox');

    postbtn.addEventListener('click',()=>{
        postbtn.classList.toggle('active');
        commentbox.classList.toggle('active');

        if(postbtn.className == 'btn btn-success active'){
            postbtn.innerText = "Cancel Post";
            postbtn.classList.remove('btn-success');
            postbtn.classList.add('btn-danger');
        }else{
            postbtn.innerText = "Post Comment";
            postbtn.classList.remove('btn-danger');
            postbtn.classList.add('btn-success');  
        }
    })
</script>
</body>

</html>