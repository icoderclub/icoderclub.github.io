<?php
$showAlert = false;
$showError = false;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // require '_A_DB_Connect.php';
    require '../partials/_dbconnect.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  $showUser = "SELECT * FROM `adminlogin` where admin_username = '$username'";
  $runShowUser = mysqli_query($conn, $showUser);
  $cal_showUser = mysqli_num_rows($runShowUser);

  if($cal_showUser == 1){
    while($row=mysqli_fetch_assoc($runShowUser)){
        if (password_verify($password, $row['admin_password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            header("Location: _A_Panel.php");
        } 
  }
}
else{
    $showError = true;
}
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCoder-Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>


    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <?php
                          if($showError){
                            echo'<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong>Error!</strong> Username does not Exist.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                          }
                    ?>
                        <h1 class="text-center pt-5">iCoder - Admin</h1>

                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-4">Login</p>

                                    <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['REQUEST_URI'] ?>"
                                        method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    name="username" required="">
                                                <label class="form-label" for="form3Example1c">Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control"
                                                    name="password" required="">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-success btn-lg">Login</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a
                                                href="index2.php" class="fw-bold text-body"><u>Sign up</u></a></p>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="images/loginimg.jpg" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>