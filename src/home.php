<?php
    session_start();
    include("include/db.php");
    //    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="./jquery-3.4.0.slim.min.js"></script>
    <script src="./bootstrap.js"></script>
    <script src="./popper.min.js"></script>
    <script src="./tooltip.min.js"></script>

    <title>Home</title>
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
                    <a class="nav-link active " href="home.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="userPro.php" id="navbardrop" data-toggle="dropdown">
                        <?php
                            $userName = $_SESSION['user_mail'];
                            if ($userName == true){
                            }else{
                                header('location: login.php');
                            }
                            $query = "SELECT * FROM User where email='$userName' ";
                            $userData = mysqli_query($con,$query);
                            $result = mysqli_fetch_assoc($userData);  // result in the form of array
                            echo $result['fname']; // fetching the first name
                        ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="userPro.php" >Profile</a>
<!--                        <a class="dropdown-item" href="viewProfile.php">View</a><hr>-->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="about.php">About</a>
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
    <div class="container-fluid tcontainer">
        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid rounded mx-auto " src="brandImage/expense.png">

            </div>

            <div class="col-md-6">
                <h3 class="my-3">Welcome to Count-Penny</h3>
                <p>Budget your finances to know where your money is going. Count-Penny is a complete online money management tool designed
                    to keep track of all your transactions. Get started for free.</p>
                <h3 class="my-3">Services</h3>
                <ul>
                    <li>Track your account</li>
                    <li>Track spending</li>
                    <li>Forecast your ncome.</li>
                    <li>Forcast your Expenditure.</li>
                    <li>Be Creative.</li>
                </ul>
                <pre>                            <a href="signup.php" ><button type="button" class="btn3d btn btn-default btn-lg"><span class="glyphicon glyphicon-download-alt">
                </span>Register</button></a>
            </pre>
            </div>

        </div>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->

<!-- footer -->
<?php
    include("include/footer.php");
?>

</body>
</html>