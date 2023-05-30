<?php
// Require DB connect Here 

require '../partials/_dbconnect.php';

$question_result = false;

if(isset($_POST['editquestion'])){
    $question_id = $_GET['qid'];
    $question_title = $_POST['question_title'];
    $question_desc = $_POST['question_desc'];
    
    $question_title = str_replace("<","&lt;",$question_title);
    $question_title = str_replace(">","&gt;",$question_title);

    $question_desc = str_replace("<","&lt;",$question_desc);
    $question_desc = str_replace(">","&gt;",$question_desc);

    $sql = "UPDATE `questions` SET `question_title` = '$question_title', `question_description` = '$question_desc'  WHERE `questions`.`question_id` = $question_id";

    $result = mysqli_query($conn, $sql);
    if($result){
        $question_result = true;
    }
}

if(isset($_POST['deletetodo'])){
    $todo_name = $_POST['todoname'];
    $todo_desc = $_POST['tododesc'];
    

    $sql = "UPDATE `todos` SET `todo_name` = '$todo_name', `todo_desc` = '$todo_desc'  WHERE `todos`.`todo_id` = 1";

    $result2 = mysqli_query($conn, $sql);
    if($result2){
        $todo_result = true;
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <!-- Require Navbar Here  -->
    <?php require '../partials/_navbar.php'; ?>

    <?php
    if($question_result){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucessfully!</strong> Your Question Updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>

    <div class="container w-50" style="height: 610px">
        <h1 class="text-center my-3">User Garage</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="show_questions.php" class="text-decoration-none">View Questions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Question</li>
            </ol>
        </nav>
        <hr>


        <form action=" <?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Question Title</label>
                <input type="text" class="form-control" id="title" name="question_title" required="">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Question Description</label>
                <input type="text" class="form-control" id="desc" name="question_desc" required="">
            </div>
            <button type="submit" class="btn btn-primary" name="editquestion">Edit Question</button>
        </form>



    </div>

    <!-- Require Footer Here  -->
    <?php require '../partials/_footer.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>