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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>

<body>

    <!-- Add the partials/dbconnect.php here  -->
    <?php require '../partials/_dbconnect.php'; ?>


    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="_A_Panel.php">iCoder</a>
        </div>
    </nav>

    <div class="container">
        <?php 
            $cat_id = $_GET['cat_id'];
            $cat_name = "SELECT * FROM `categories` where category_id = '$cat_id'";
            $showCat = mysqli_query($conn, $cat_name);
            while($fetch_cat = mysqli_fetch_assoc($showCat)){
                $categoryName = $fetch_cat['category_name'];
                echo '<h1 class="text-center my-4">Questions For "'. $categoryName .'"</h1>';
            }
        ?>
        <div class="container m-4">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Question</th>
                        <th>Description</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Manage the Question form -->
                    <?php
                    $cat_id = $_GET['cat_id'];
                    $fetchQuestions = "SELECT * FROM `questions` where question_topic_id = $cat_id";
                    $showQuestions = mysqli_query($conn,$fetchQuestions);

                    while($row = mysqli_fetch_assoc($showQuestions)){
                        $q_id = $row['question_id'];
                        $q_title = $row['question_title'];
                        $q_desc = $row['question_description'];
                        $q_user_id = $row['user_id'];
                        $timestamp = $row['timestamp'];

                        $sql2 = "SELECT user_name from userdetail where user_id = '$q_user_id'";
                        $result2 = mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_assoc($result2);


                        echo'<tr>
                                <td><i class="bi bi-person-circle px-1 fa-10x"></i>'.$row2['user_name'].'</td>
                                <td><a href="_A_Update_Que.php?que_id='.$q_id.'" class=" text-dark fw-bold text-decoration-none">'.$q_title.'</a></td>
                                <td>'.$q_desc.'</td>
                                <td>'.$timestamp.'</td>
                            </tr>';

                        }
                ?>

                </tbody>
            </table>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
</html>