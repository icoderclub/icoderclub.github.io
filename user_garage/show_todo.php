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

    <!-- Require DB connect Here  -->
    <?php require '../partials/_dbconnect.php'; ?>


    <!-- Require Navbar Here  -->
    <?php require '../partials/_navbar.php'; ?>

    <div class="container w-50" style="height: 610px">
        <h1 class="text-center my-3">User Garage</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="add_todo.php" class="text-decoration-none">Add Todo</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Show Todos</a></li>
                <li class="breadcrumb-item"><a href="show_questions.php" class="text-decoration-none">View Questions</a></li>
                <li class="breadcrumb-item"><a href="show_comments.php" class="text-decoration-none">View Comments</a></li>
                <li class="breadcrumb-item active" aria-current="page" class="text-decoration-none">Data</li>
            </ol>
        </nav>
        <hr>

        <div class="container overflow-y-auto h-75">


            <?php
            $sno = $_SESSION["user_id"];
            $sql = "SELECT * FROM `todos` where todo_user = $sno";
            $result = mysqli_query($conn, $sql);
            $numrow = mysqli_num_rows($result);
            if($numrow == 0){
                echo '<div class="container my-5">
                <div class="p-5 text-center bg-body-tertiary rounded-3">
                  <h1 class="text-body-emphasis">No Todo here</h1>
                  <p class="col-lg-8 mx-auto fs-5 text-muted">Add Your Todos</p>
                </div>
              </div>';
            }
            else{

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $todo_id = $row['todo_id'];
                    $todo_name = $row['todo_name'];
                    $todo_desc = $row['todo_desc'];

                    echo'<div class="row my-3">
                    <h5>'.$todo_name.'</h5>
                    <p>'.$todo_desc.'</p>
            
                    <a href="update_todo.php?todoid='.$todo_id.'" class="btn btn-sm btn-outline-primary mb-2 w-25">Edit</a>
                    <button type="button" class=" mx-3 mb-2 btn w-25 btn-sm btn-outline-danger d-inline">Delete</button>
                    <hr>
                </div>';
                }
            }
        }
        ?>


        </div>
    </div>

    <!-- Require Footer Here  -->
    <?php require '../partials/_footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>