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
    <?php require 'partials/_dbconnect.php';?>
    
    <!-- Require Navbar Here  -->
    <?php require 'partials/_navbar.php';?>

    <div class="container w-50 my-3" style="min-height: 1000px;">
        <h1>Search Result for <em>"<?php echo $_GET['query']?>"</em></h1>

        <?php
        $noResult = true;
        $query = $_GET['query'];
        $sql = "select * from questions where match(question_title, question_description) against ('.$query.')";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $q_id = $row['question_id'];
            $q_title = $row['question_title'];
            $q_desc = $row['question_description'];
            $url = "/iCoder/comment.php?questionid=".$q_id;
            $noResult = false;


            echo '<div class="row">
                    <h3> <a href="'.$url.'" class="text-dark text-decoration-none">'.$q_title.'</a></h3>
                    <p>'.$q_desc.'</p>
                </div>';
        }
        if($noResult){
            echo '<div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No Result Found!</h4>
                    <ul><p>Suggestions:</p>
                    <li><p>Make sure that all words are spelled correctly.</p></li>
                    <li><p>Try different keywords.</p></li>
                    <li><p></p>Try more general keywords.</li>
                    </ul>
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