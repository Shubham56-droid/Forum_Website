<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include './_dbconnect.php';
    $email = $_POST['loginemail'];
    $password = $_POST['loginpassword'];

    $sql = "SELECT * FROM `users` WHERE `useremail` = '$email'";
    $result = mysqli_query($conn,$sql);
    $numRow = mysqli_num_rows($result);
    if($numRow == 1){
        while($row = mysqli_fetch_assoc($result)){
            $hashpass = $row['userpass'];
            $username = $row['username'];
            

            $userid = $row['user_id'];
            $checkpass = password_verify($password,$hashpass);
            if($checkpass == true){

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $userid;

                header("Location: ".$_SESSION['currpageaddress']);
                exit();
            }else{
                $message = "Incorrect password please enter correct password to login";

                header("Location: /forums/index.php?error=true&message=$message");
            }
        }
    }
    else
    {
        $message = "No such email address exist please signup to create account.";
        header("Location: /forums/index.php?error=true&message=$message");
    }

}
?>