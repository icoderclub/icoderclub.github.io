<?php
// Require DB connect Here 

require '../partials/_dbconnect.php';


$todo_result = false;

if(isset($_POST['edittodo'])){
    $todoid = $_GET['todoid'];
    $todo_name = $_POST['todoname'];
    $todo_desc = $_POST['tododesc'];

    $todo_name = str_replace("<","&lt;",$todo_name);
    $todo_name = str_replace(">","&gt;",$todo_name);

    $todo_desc = str_replace("<","&lt;",$todo_desc);
    $todo_desc = str_replace(">","&gt;",$todo_desc);
    

    $sql = "UPDATE `todos` SET `todo_name` = '$todo_name', `todo_desc` = '$todo_desc'  WHERE `todos`.`todo_id` = $todoid";

    $result2 = mysqli_query($conn, $sql);
    if($result2){
        $todo_result = true;
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
    if($todo_result){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucessfully!</strong> Your Todo Updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>

    <div class="container w-50" style="height: 610px">
        <h1 class="text-center my-3">User Garage</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="show_todo.php" class="text-decoration-none">Show Todos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Todo</li>
            </ol>
        </nav>
        <hr>


        <form action=" <?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Todo Title</label>
                <input type="text" class="form-control" id="title" name="todoname" required="">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Todo Description</label>
                <input type="text" class="form-control" id="desc" name="tododesc" required="">
            </div>
            <button type="submit" class="btn btn-primary" name="edittodo">Edit Todo</button>
        </form>



    </div>

    <!-- Require Footer Here  -->
    <?php require '../partials/_footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>