<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>

  <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

  <link rel="stylesheet" href="mediaStyle.css">
  
</head>

<body>

    <!-- Require DB connect Here  -->
    <?php require 'partials/_dbconnect.php';?>

    <!-- Require Navbar Here  -->
    <?php require 'partials/_navbar.php';?>


    <!-- container start here -->
    <div class="container" style="min-height: 1000px;">
        <?php
      $topic_id = $_GET['topicid'];
      $sql = "SELECT * FROM `categories` where category_id = $topic_id";
      $result = mysqli_query($conn,$sql);
      $rowcount=mysqli_num_rows($result);

      if($rowcount>=1){
            while($row = mysqli_fetch_assoc($result)){
              $cat_id = $row['category_id'];
              $cat_name = $row['category_name'];
              $cat_desc = $row['category_description'];
          }
          echo '<div class="container"  id="topicContainer">
                  <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                    <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">'.$cat_name.'</h1>
                    <p class="col fs-5">'.$cat_desc.'</p>
                    <hr>
                    <p>Posted by: <span class="badge rounded-pill text-bg-success"><a href="/iCoder/index.php" class="text-light text-decoration-none">iCoder</a></span></p>
                    </div>
                  </div>
                </div>';
        }
        ?>
        <!-- container end here -->

        <!-- question ask start here -->
        <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
        $topic_id = $_GET['topicid'];
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
          $qtitle = $_POST['qtitle'];
          $qdescription = $_POST['qdescription'];
          $sno = $_POST['sno'];

          $qtitle = str_replace("<","&lt;",$qtitle);
          $qtitle = str_replace(">","&gt;",$qtitle);

          $qdescription = str_replace("<","&lt;",$qdescription);
          $qdescription = str_replace(">","&gt;",$qdescription);

          $sql = "INSERT INTO `questions` (`question_title`, `question_description`, `question_topic_id`, `user_id`) VALUES ('$qtitle', '$qdescription', '$topic_id', '$sno')";
          $executequery = mysqli_query($conn,$sql);
                
          if($executequery){
                echo '<script> alert("Your Query Succesfully Added")</script>';
              }
          }
      if($rowcount>=1){
        echo '<div class="w-50 mx-2">
                <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
                  <p>
                    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Ask a Questions</button>
                  </p>
                  <div class="collapse collapse-horizontal my-5" id="collapseWidthExample">
                    <div class="card card-body">
                      <div class="mb-3">
                        <label for="question" class="form-label">Question Title</label>
                        <input type="text" class="form-control" id="question" name="qtitle" required="" >
                        <input type="hidden" name="sno" value="'.$_SESSION['user_id'].'">
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" placeholder="Question in Brief" id="floatingTextarea2" name="qdescription" required="" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Question in Brief</label>
                      </div>
                      <button type="submit" class="btn btn-success my-4" id="liveToastBtn">Submit</button>
                    </div>
                  </div>
                </form>
              </div>';
      }
  } 
  else{
    echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Ask a Questions!</h4>
            <p>You not a logged in. Please login to be able to ask a question.</p>
          </div>';
  }
?>
        <!-- question ask end here -->



        <!-- Else Topic Content is not here then Exicuted this. -->
        <?php
      if($rowcount<1){
        echo '<div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Comming Soon!</h4>
                <p>Notes are Pending...</p>
                <hr>
                <p>Posted by: <span class="badge rounded-pill text-bg-success"><a href="/iCoder/index.php" class="text-light text-decoration-none">iCoder</a></span></p>
              </div>';
        }
    ?>



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
      $topic_id = $_GET['topicid'];
      $fetchQuestions = "SELECT * FROM `questions` where question_topic_id = $topic_id";
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
            <td><a href="/iCoder/comment.php?questionid='.$q_id.'" class=" text-dark fw-bold text-decoration-none">'.$q_title.'</a></td>
            <td>'.$q_desc.'</td>
            <td>'.$timestamp.'</td>
        </tr>';

      }
    ?>

</tbody>
</table>

    </div>

    <script>
    
    $(document).ready(function () {
        $('#example').DataTable();
    });
    
    </script>



    <!-- Require Footer Here  -->
    <?php require 'partials/_footer.php';?>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>