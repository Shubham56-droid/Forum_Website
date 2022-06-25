<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include './_dbconnect.php';

    $username = $_POST['signupusername'];
    $username = htmlentities($username, ENT_QUOTES);

    $email = $_POST['signupemail'];

    $userpass = $_POST['signuppassword'];

    $institution = $_POST['institution_college'];

    
    $existsql = "SELECT * FROM `users` WHERE `useremail` = '$email'";
    $resexist = mysqli_query($conn,$existsql);
    $numrow = mysqli_num_rows($resexist);
    if($numrow > 0){

        $message = "Email already is use";
        header("Location: /forums/index.php?error=true&message=$message");

    }else{
        $hash = password_hash($userpass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`username`,`useremail`,`userpass`,`userinstitude`) VALUES ('$username','$email','$hash','$institution')";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
        $message = "Your account is successfully created";
        header("Location: /forums/index.php?error=false&message=$message");
        exit();
            
        }else
        {
            $message = "Account not created due to some technical issue, Please try after some time";
            header("Location: /forums/index.php?error=true&message=$message");
        }
    }
    
}

?>

