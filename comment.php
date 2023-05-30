<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <!-- Require DB connect Here  -->
    <?php require 'partials/_dbconnect.php';?>
    
    <!-- Require Navbar Here  -->
    <?php require 'partials/_navbar.php';?>


    <?php
    $question_topic_id = $_GET['questionid'];
    
    $sql = "SELECT * FROM `questions` where question_id = $question_topic_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $qtitle = $row['question_title'];
        $qdesc = $row['question_description'];
        $q_user_id = $row['user_id'];
        
        $sql2 = "SELECT user_name from userdetail where user_id = '$q_user_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
    }

    ?>

    <div class="container my-0" style="min-height:1000px">

        <!-- Show user Question here  -->
        <div class="container my-5 w-50">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-person-circle px-1 fa-10x"></i><?php echo $row2['user_name']?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $qtitle ?></h5>
                    <p class="card-text"><?php echo $qdesc ?></p>
                </div>
            </div>
        </div>


        <!-- user post the comment here  -->
        <?php
        $question_topic_id = $_GET['questionid'];
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $comment = $_POST['comment'];

            $comment = str_replace("<","&lt;",$comment);
            $comment = str_replace(">","&gt;",$comment);

            $sno = $_POST['sno'];

            $commentInsert = "INSERT INTO `comments` (`comment_text`, `comment_question_id`, `comment_by`) VALUES ('$comment', '$question_topic_id', '$sno')";
            $result = mysqli_query($conn,$commentInsert);

            if($result){
                echo '<script> Your Comment Posted! </script>';
            }
        }

        ?>

        <?php

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
            echo '<div class="container w-50">
            <h2 class="text-success ">Post a Comment</h2>
            <div class="form-floating">
                <form action="'. $_SERVER['REQUEST_URI']. '" method="post">
                    <textarea class="form-control" placeholder="Leave a comment here" name="comment"
                        id="floatingTextarea2" required="" style="height: 100px"></textarea>
                      <input type="hidden" name="sno" value="'.$_SESSION['user_id'].'">
                    <button type="submit" class="btn btn-success my-4">Post Comment</button>
                </form>
            </div>
            </div>
            ';
        }
        else{
            echo '<div class="alert alert-danger w-50 m-auto my-3" role="alert">
                <h4 class="alert-heading">Post a Comment!</h4>
                <p>You not a logged in. Please login to be able to post a comment.</p>
            </div>';
        }
    ?>



        <!-- user all comment show here  -->
        <?php
            $question_topic_id = $_GET['questionid'];
            
            $showComment = "SELECT * FROM `comments` where comment_question_id = $question_topic_id";
            $result = mysqli_query($conn, $showComment);
            while($row = mysqli_fetch_assoc($result)){
                $comment_text = $row['comment_text'];
                $comment_time = $row['comment_time'];
                $comment_user_id = $row['comment_by'];
        
                $sql2 = "SELECT user_name from userdetail where user_id = '$comment_user_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="d-flex container w-50 my-2">
                        <div class="flex-grow-1 ms-3">
                            <i class="bi bi-person-circle px-1 fa-10x"></i> <b>'.$row2["user_name"].'</b>
                            <p class="d-inline fs-6 text-secondary">at '.$comment_time.'</p>
                            <p class="mx-4 my-0">'.$comment_text.'</p>
                            <hr>
                        </div>
                        <hr>
                    </div>';
            }
        ?>

    </div>




    <!-- Require Footer Here  -->
    <?php require 'partials/_footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>