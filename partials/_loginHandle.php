<?php

$showError = false;
$showAlert = false;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    require "_dbconnect.php";

    $username = $_POST['loginUsername'];
    $userpassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM `userdetail` WHERE user_name = '$username'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($userpassword, $row['user_password'])){ 
                $showAlert = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $username;
                header("Location: /iCoder/index.php");
            } 
            else{
                $showError = true;
            }
        }
    }
    header("Location: /iCoder/index.php");
}


?>