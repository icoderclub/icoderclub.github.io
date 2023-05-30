<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="mediaStyle.css"> -->
</head>

<body class="body">

    <!-- Require DB connect Here  -->
    <?php require 'partials/_dbconnect.php';?>

    <!-- Require Navbar Here  -->
    <?php require 'partials/_navbar.php';?>


    <!-- Slider Start Here  -->

    <div class="p-5 mb-4 bg-body-tertiary rounded-3 d-flex" id="left">
        <div class="container-fluid py-5" id="headerleftcontainer">
            <h1 class="display-5 fw-bold d-inline">Welcome to <h1 class="text-primary display-5 fw-bold d-inline">iCoder
                </h1>
            </h1>
            <p class="col-md-8 fs-4">Learn <span id="element" class="text-primary"></span></p>
            <p style="width:500px">Browse the Multiple Categories Available for the learning Programming. | Improve your Programming Skills.</p>
            <button class="btn btn-success btn-lg" type="button"> <a href="#startlearning" class="text-light text-decoration-none d-block">Start Learning</a></button>
        </div>
        <div class="w-50" id="headerrightcontainer">
            <img src="Images/headerimg.png" alt="" width="500px">
        </div>
    </div>


    <div class="container" style="min-height:1000px" id="startlearning">
        <h1 class="text-center my-3">Browse Categories</h1>
        <div class="row">
            <?php 
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $cat_id = $row['category_id'];
                    $cat_name = $row['category_name'];
                    $cat_desc = $row['category_description'];

                    echo '<div class="card mx-3 my-4" style="width: 18rem;">
                            <img src="Images/card-'.$cat_id.'.jpg" height="180px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/iCoder/topic.php?topicid='.$cat_id.'">'.$cat_name.'</a></h5>
                            <p class="card-text">'.substr($cat_desc,0,40).'...</p>
                            <a href="/iCoder/topic.php?topicid='.$cat_id.'" class="btn btn-primary">View All</a>
                        </div>
                        </div>';
                }
            ?>
        </div>
    </div>

    <!-- Require Footer Here  -->
    <?php require 'partials/_footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- Load library from the CDN -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <!-- Setup and start animation! -->
    <script>
        var typed = new Typed('#element', {
            strings: ['Python', 'JavaScript', 'Django', 'PHP', 'CSS'],
            typeSpeed: 100,
        });
    </script>
</body>

</html>