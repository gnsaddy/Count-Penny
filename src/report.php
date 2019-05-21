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

    <title>Profile</title>
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
                    <a class="nav-link " href="home.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
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
                        <a class="dropdown-item" href="viewProfile.php">View</a>
                        <a class="dropdown-item" href="updateUserPro.php">Update</a><hr>
                        <a class="dropdown-item" href="report.php">Report</a><hr>
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
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h3 class="login-heading mb-4 text-center"><u>Date-wise expense report</h3></u><hr>
                    <form role="form" method="post" action="reportDetail.php" name="formReport">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" class="form-control" id="fromdate" name="fromdate" required="true">
                        </div>
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" class="form-control" id="todate" name="todate" required="true">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="submit">Submit</button>
                    </form>


                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->
<?php
    include("include/footer.php");
?>

</body>
</html>