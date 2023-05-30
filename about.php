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

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">About Us</h1>
                    <p class="lead text-body-secondary">Enhance your Knowledge, Upgrade your Skills, Ask the Questions and Clearing your doubts.</p>
                </div>
            </div>
        </section>

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">

                <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="Images/card-1.jpg" class="rounded-circle" alt="" height="140" width="140">
                    <h2 class="fw-normal">Python</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is
                        the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>

                <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="Images/card-2.jpg" class="rounded-circle" alt="" height="140" width="140">
                    <h2 class="fw-normal">JavaScript</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the
                        second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>

                <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="Images/card-4.jpg" class="rounded-circle" alt="" height="140" width="140">
                    <h2 class="fw-normal">PHP</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>

            </div>


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span
                            class="text-body-secondary">It’ll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                        prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%"
                            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span
                            class="text-body-secondary">See for yourself.</span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of
                        how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%"
                            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span
                            class="text-body-secondary">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                        really intended to be actually read, simply here to give you a better view of what this would
                        look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%"
                            fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div>

    </main>

    <!-- Require Footer Here  -->
    <?php require 'partials/_footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>