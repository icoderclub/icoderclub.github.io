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
    <div class="o-container d-flex">

        <!-- This is Left Div  -->
        <div class="o-left">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:100%;">

                <h2 class="text-center">
                    <a href="_A_Panel.php" class="text-decoration-none text-light">iCoder</a>
                </h2>

                <hr>
                <div class="btn-group nav nav-pills flex-column mb-auto">   
                    <button type="button" class="btn btn-danger my-2"><a class="text-decoration-none text-light" href="_A_Cat_Question.php?cat_id=<?php echo $get_cat_id = $_GET['cat_id']; ?>">Questions</a></button>
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
            <?php
                $get_cat_id = $_GET['cat_id'];
                $display_category = "SELECT * FROM `categories` where category_id =  $get_cat_id";
                $execute_query = mysqli_query($conn, $display_category);
                while($fetch_cat = mysqli_fetch_assoc($execute_query)){
                    $cat_name = $fetch_cat['category_name'];
                    $cat_description = $fetch_cat['category_description'];
                }
            ?>

            <!-- As a heading -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <h1 class="navbar-brand mb-0 h1 mx-auto">Category: <?php echo $cat_name ?></h1>
                </div>
            </nav>

            <div class="jumbotron m-5">
                <h1 class="display-4"> <?php echo $cat_name ?> </h1>
                <p class="lead"> <?php echo $cat_description ?> </p>
                <hr class="my-4">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Update and Delete your Query</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="catname" name="catname"
                                placeholder="Category Name" required="">
                        </div>
                        <textarea class="form-control" id="catdescription" name="catdescription" rows="3"
                            placeholder="Category Description" required=""></textarea>
                    </div>
                    <p class="lead mb-3">
                        <button type="submit" class="btn btn-warning" name="update">Update</button>
                        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    </p>
                </form>
            </div>

        </div>

    </div>

    </div>

    <?php
        if(isset($_POST['update'])){
            $u_cat_name = $_POST['catname'];
            $u_cat_description = $_POST['catdescription'];

            $u_cat_name = str_replace("<","&lt;",$u_cat_name);
            $u_cat_name = str_replace(">","&gt;",$u_cat_name);
            
            $u_cat_description = str_replace("<","&lt;",$u_cat_description);
            $u_cat_description = str_replace(">","&gt;",$u_cat_description);

            $sql = "UPDATE `categories` SET `category_name` = '$u_cat_name', `category_description` = '$u_cat_description'  WHERE `category_id` = '$get_cat_id'";
            $updateQuery = mysqli_query($conn, $sql);

            if($updateQuery){
                echo '<script> alert("Category Successfully Updated!")</script>';
            }
            else{
                echo '<script> alert("Error: Something went Wrong!")</script>';
            }
        }

        if(isset($_POST['delete'])){
            
            $sql = "DELETE FROM `categories` WHERE `category_id` = '$get_cat_id'";
            $updateQuery = mysqli_query($conn, $sql);

            if($updateQuery){
                echo '<script> alert("Category Successfully Deleted!")</script>';
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