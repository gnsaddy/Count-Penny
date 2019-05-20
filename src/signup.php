<?php
    include("include/db.php");
//    error_reporting(0);
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
    <title>Login</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top container-fluid">
    <div class="container">
        <a class="navbar-brand logo" href="index.html">
            <img src="brandImage/ll.png" class="img-fluid " alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-center text-justify">
                <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <form action="signup.php" class="form-signin" method="post">
                        <div class="form-label-group">
                            <input type="text" id="inputUserame"  name="userid" class="form-control" placeholder="UserId" required autofocus>
                            <label for="inputUserame">User Id</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required autofocus>
                            <label for="fname">First Name</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required autofocus>
                            <label for="lname">Last Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="userCategory" name="userCategory" class="form-control" placeholdflAmounter="salaried/unsalaried" required autofocus>
                            <label for="userCategory">salaried/unsalaried</label>
                        </div>


                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <hr>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autofocus>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputConfirmPassword" name="confirmpass" class="form-control" placeholder="Password" required autofocus>
                            <label for="inputConfirmPassword">Confirm password</label>
                        </div>
                        <hr>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Register</button>
                        <hr>
                        <div class="text-center">
                            Already have account? <a class="small" href="login.php">Login</a></div>

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<footer class="  container-fluid py-4 bg-transparent text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; 2019 Count-Penny</small>
    </div>
</footer>

<?php
    if(isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mail = $_POST['mail'];
        $userCategory = $_POST['userCategory'];
        $pass = $_POST['password'];
        $conpass = $_POST['confirmpass'];


        $query = "INSERT INTO User(userId, fname, lname, email, password)
                values('$userid','$fname','$lname','$mail','$pass')";

        $queryCategory = "INSERT INTO UserType(userId, uType) VALUES ('$userid','$userCategory')";


        $queryCheckId = mysqli_query($con, "select userId from User where userId = '$userid' ");
        $queryCheckMail = mysqli_query($con, "select email from User where email = '$mail' ");

        if (mysqli_num_rows($queryCheckId) >= 1) {
            $msg = "$userid is already existed, Try for new user id";
            echo "<script type='text/javascript'> alert('$msg');</script>";
        } elseif (mysqli_num_rows($queryCheckMail) >= 1) {
            $msg = "$mail is already existed, Try for new email id";
            echo "<script type='text/javascript'> alert('$msg');</script>";
        } elseif ($pass == $conpass) {

            $data = mysqli_query($con, $query);
            $dataCategory= mysqli_query($con,$queryCategory);
            echo '<script language="javascript">';
            echo "alert('$fname is successfully registered')";
            echo '</script>';
        } else {
            $msg = "Password not match";
            echo "<script type='text/javascript'> alert('$msg');</script>";
        }


    }



?>


</body>
</html>
