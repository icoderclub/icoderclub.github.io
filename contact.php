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


    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require 'partials/_dbconnect.php';
        $uname = $_POST['name'];
        $uage = $_POST['age'];
        $uqualification = $_POST['qualification'];
        $umobilenumber = $_POST['mobilenumber'];
        $uaddress = $_POST['address'];
        $user_id = $_SESSION['user_id'];

        $sql = "UPDATE `userdetail` SET `name`='$uname',`age`='$uage',`qualification`='$uqualification',`mobilenumber`='$umobilenumber',`address`='$uaddress' WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql);

        echo $result;

        if($result){
            echo '<script> alert("Your Information Successfully Submitted!") </script>';
        }
        
    }


    ?>

    <h1 class="text-center my-4">Contact</h1>
    <div class="container d-flex justify-content-between" style="min-height:700px">

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
        echo '<div class="row w-50 p-3">
            <form action="contact.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required="">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Your Age</label>
                    <input type="number" class="form-control" id="age" name="age" required="">
                </div>
                <div class="mb-3">
                    <label for="qualification" class="form-label">Your Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" required="">
                </div>
                <div class="mb-3">
                    <label for="mobilenumber" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" required="">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" placeholder="Enter a Address Here" id="address" name="address" required=""
                        style="height: 100px"></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </form>
        </div>';
    }

    else{
        echo '<div class="row w-50 p-3">
                First Login then Fill the Contact Details.
            </div>';
    }
    
    
    
    ?>

        <div class="row w-50 p-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238133.18800965475!2d72.6574831131342!3d21.159120354696864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x240fb832c8513ca9%3A0x7adc4c2576d0df2a!2siCoder%20Infotech!5e0!3m2!1sen!2sin!4v1681389369526!5m2!1sen!2sin"
                width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Require Footer Here  -->
    <?php require 'partials/_footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>