<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder - Admin Panel</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <!-- Add the partials/dbconnect.php here  -->
    <?php   require '../partials/_dbconnect.php'; ?>

    <!-- Main Container Start here  -->
    <div class="o-container d-flex ">

        <!-- This is Left Div  -->
        <div class="o-left">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:900px;">
                <h2 class="text-center">
                    <a href="_A_Panel.php" class="text-decoration-none text-light">iCoder</a>
                </h2>
                <hr>
                <div class="btn-group nav nav-pills flex-column mb-auto">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                            $sql = "SELECT * FROM `categories`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $cat_id = $row['category_id'];
                                $cat_name = $row['category_name'];
                                echo '<li><a class="dropdown-item" href="_A_Cat_Topic.php?cat_id='.$cat_id.'">'.$cat_name.'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle px-1 fa-10x"></i>
                        <strong><?php echo ucfirst($_SESSION['username'])?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="_A_Logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- This is Right Div  -->
        <div class="o-right">
            <!-- As a heading -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <h1 class="navbar-brand mb-0 h1 mx-auto">Admin Panel</h1>
                </div>
            </nav>

            <div class="jumbotron m-5">
                <h1 class="display-4 my-4">Welcome to iCoder <b><?php echo ucfirst($_SESSION['username'])?></b></h1>

                <?php
                    $total_cat = "SELECT * FROM `categories`";
                    $result1 = mysqli_query($conn, $total_cat);
                    $cat_row = mysqli_num_rows($result1);

                    $total_user = "SELECT * FROM `userdetail`";
                    $result2 = mysqli_query($conn, $total_user);
                    $user_row = mysqli_num_rows($result2);

                    $total_question = "SELECT * FROM `questions`";
                    $result3 = mysqli_query($conn, $total_question);
                    $question_row = mysqli_num_rows($result3);

                    $total_comment = "SELECT * FROM `comments`";
                    $result4 = mysqli_query($conn, $total_comment);
                    $comment_row = mysqli_num_rows($result4);
                ?>

                <div class="row">
                    <div class="card text-bg-primary mb-3 mx-2" style="max-width: 18rem;">
                        <div class="card-header fw-bold text-center fs-4">Categories</div>
                        <div class="card-body">
                            <h6 class="card-title text-center">Total Categories: <?php echo $cat_row ?></h6>
                        </div>
                    </div>
                    <div class="card text-bg-success mb-3 mx-2" style="max-width: 18rem;">
                        <div class="card-header fw-bold text-center fs-4">Users</div>
                        <div class="card-body">
                            <h6 class="card-title text-center">Total User: <?php echo $user_row ?></h6>
                        </div>
                    </div>
                    <div class="card text-bg-danger mb-3 mx-2" style="max-width: 18rem;">
                        <div class="card-header fw-bold text-center fs-4">Questions</div>
                        <div class="card-body">
                            <h6 class="card-title text-center">Total Question: <?php echo $question_row ?></h6>
                        </div>
                    </div>
                    <div class="card text-bg-warning mb-3 mx-2" style="max-width: 18rem;">
                        <div class="card-header fw-bold text-white text-center fs-4">Comments</div>
                        <div class="card-body">
                            <h6 class="card-title text-white text-center">Total Comment: <?php echo $comment_row ?></h6>
                        </div>
                    </div>
                </div>


                <hr class="my-4">

                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mb-3">
                        <h2 class="text-center my-4">Add New Category</h2>
                        <div class="my-4">
                            <input type="text" class="form-control" id="catname" name="catname" required=""
                                placeholder="Category Name" required="">
                        </div>
                        <textarea class="form-control" id="catdescription" name="catdescription" rows="3" required=""
                            placeholder="Category Description" required=""></textarea>
                    </div>
                    <p class="lead my-4">
                        <button type="submit" class="btn btn-success w-100" name="insertquery">Add Category</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php
        if(isset($_POST['insertquery'])){
            $cat_name = $_POST['catname'];
            $cat_description = $_POST['catdescription'];

            $cat_name = str_replace("<","&lt;",$cat_name);
            $cat_name = str_replace(">","&gt;",$cat_name);
            
            $cat_description = str_replace("<","&lt;",$cat_description);
            $cat_description = str_replace(">","&gt;",$cat_description);

            $sql = "INSERT INTO `categories` (`category_name`, `category_description`) VALUES ('$cat_name', '$cat_description')";
            $insertQuery = mysqli_query($conn, $sql);

            if($insertQuery){
                echo '<script> alert("Category Successfully Added!")</script>';
            }
            else{
                echo '<script> alert("Error: Something went Wrong!")</script>';
            }
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>