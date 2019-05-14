<?php
    session_start();
    include("include/db.php");
    //    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./jquery-3.4.0.slim.min.js"></script>
    <script src="./bootstrap.js"></script>
    <script src="./popper.min.js"></script>
    <script src="./tooltip.min.js"></script>

    <title>About</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top container-fluid">
    <div class="container">
        <a class="navbar-brand logo" href="home.php">
            <img src="brandImage/ll.png" class="img-fluid " alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-center text-justify">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userPro.php">
                        <?php
                            $userName = $_SESSION['user_mail'];
                            $query = "SELECT * FROM User where email='$userName' ";
                            $userData = mysqli_query($con,$query);
                            $result = mysqli_fetch_assoc($userData);  // result in the form of array
                            echo $result['fname']; // fetching the first name
                        ?>
                    </a>
                </li>
                    <a class="nav-link active" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<section class="py-5">
    <div class="container-fluid ">
        <div class="row">

            <div class="col-md-4">
                <h1><u><b>ABOUT US</b></u></h1>
                <h1 class="container-fluid ">OUR MISSION</h1>
            </div>

            <div class="col-md-8">
                <h3 class="my-3">Project Description</h3>
                <p>Our mission is to help people make better spending decisions.</p>
                <p>
                    We believe there is no one-size-fits-all solution when it comes to managing money.
                    We also believe a good money manager doesn't simply mean automatically generating pretty charts.
                    A good money manager adapts to a user's needs, gives them control and flexibility to customize it as needed,
                    and delivers insightful, actionable advise to help plan for the future.
                </p>
                <h3 class="my-3">At Count-Penny, our product development philosophy is guided by these principles:</h3>
                <ul>
                    <li>Be flexible, yet easy to use.</li>
                    <li>Provide powerful analytics and deep insights into money habits.</li>

                </ul>
            </div>

        </div>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->
<!-- Header -->
<header class="bg-transparent text-center py-5 mb-4">
    <div class="container-fluid">
        <h1 class="font-weight-light text-white">Meet the Team</h1>
    </div>
</header>

<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Team Member 1 -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-0 shadow">
                <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">Team Member</h5>
                    <div class="card-text text-black-50">Web Developer</div>
                </div>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-0 shadow">
                <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">Team Member</h5>
                    <div class="card-text text-black-50">Web Developer</div>
                </div>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-0 shadow">
                <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">Team Member</h5>
                    <div class="card-text text-black-50">Web Developer</div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- footer -->
<?php
    include("include/footer.php");
?>
</body>
</html>