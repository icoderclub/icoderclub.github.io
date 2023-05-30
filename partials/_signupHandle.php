<?php

$showError = false;
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '_dbconnect.php';
    $username = $_POST['signupUsername'];
    $useremail = $_POST['signupEmail'];
    $userpassword = $_POST['signupPassword'];
    $cuserpassword = $_POST['signupCPassword'];

    $sql = "SELECT * FROM `userdetail` WHERE user_name = '$username'";
    $result = mysqli_query($conn, $sql);
    $rowExit = mysqli_num_rows($result);

    if($rowExit>0){
        $showError = "Username is Already Exists";
    }
    else{
        if(($userpassword == $cuserpassword)){
            $hash = password_hash($userpassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `userdetail` (`user_name`, `user_email`, `user_password`) VALUES ('$username', '$useremail', '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /iCoder/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Password Do Not Match!";
        }
    } 

    header("Location: /iCoder/index.php?signupsuccess=false&error=$showError");
}


?>