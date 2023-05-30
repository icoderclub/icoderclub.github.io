<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbarMedia">
    <div class="container-fluid">
        <a class="navbar-brand" href="/iCoder/index.php">iCoder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbarMedia" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/iCoder/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/iCoder/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Top Category
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql = "SELECT category_id, category_name FROM `categories` LIMIT 3";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<li><a class="dropdown-item" href="/iCoder/topic.php?topicid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/iCoder/contact.php" class="nav-link">Contact</a>
                </li>
                <?php
                    session_start();
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
                    echo '<li class="nav-item">
                            <a href="./user_garage/add_todo.php" class="nav-link">User Garage</a>
                        </li>';
                    }
                ?>
            </ul>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
                echo '<form class="d-flex" role="search" action="search.php" method="get">
                        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <p class="text-light my-0 mx-3" id="loginUsername"> Welcome: <b>'.ucfirst($_SESSION['username']).'</b></p>
                    <a href="partials/_logout.php" class="btn btn-danger mx-3" id="logoutBtn">Logout</a>
                    ';
            }
            else{
                echo '<!-- Login Button trigger modal -->
                    <button type="button" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    
                    <!-- Login Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
            }
            ?>
        </div>
    </div>
</nav>

<?php
require "_login.php";
require "_signup.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){

    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>