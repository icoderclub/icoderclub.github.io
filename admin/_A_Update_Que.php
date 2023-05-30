<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require '../partials/_dbconnect.php';

    $q_id = $_GET['que_id'];
    $q_title = $_POST['qtitle'];
    $q_desc = $_POST['qdesc'];

    $q_title = str_replace("<","&lt;",$q_title);
    $q_title = str_replace(">","&gt;",$q_title);

    $q_desc = str_replace("<","&lt;",$q_desc);
    $q_desc = str_replace(">","&gt;",$q_desc);

    $sql = "UPDATE `questions` SET `question_title` = '$q_title', `question_description` = '$q_desc'  WHERE `question_id` = '$q_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '<script> alert("Questions Succesfully Updated!")</script>';
        // header("location: _adminCatQuestion.php");
    }
}

if(isset($_POST['delete'])){
    $q_id = $_GET['que_id'];
            
    $sql = "DELETE FROM `questions` WHERE `question_id` = '$q_id'";
    $updateQuery = mysqli_query($conn, $sql);

    if($updateQuery){
        echo '<script> alert("Question Successfully Deleted!")</script>';
    }
    else{
        echo '<script> alert("Error: Something went Wrong!")</script>';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="_A_Panel.php">iCoder</a>
        </div>
    </nav>

    <div class="container w-50 my-5">
        <h1 class="text-center">iCoder</h1>
        <form action=" <?php echo $_SERVER['REQUEST_URI'] ?> " method="post">
            <div class="mb-3">
                <label for="qtitle" class="form-label">Question Title</label>
                <input type="text" class="form-control" id="qtitle" name="qtitle" required="">
            </div>
            <div class="mb-3">
                <label for="qdesc" class="form-label">Question Description</label>
                <textarea class="form-control" id="qdesc" name="qdesc" rows="3" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-warning w-100">Update</button>
            <button type="submit" class="btn btn-danger my-4 w-100" name="delete">Delete</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>