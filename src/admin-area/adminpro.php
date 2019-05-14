<?php
    include("../include/db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery-3.4.0.slim.min.js"></script>
    <script src="../bootstrap.js"></script>
    <script src="../popper.min.js"></script>
    <script src="../tooltip.min.js"></script>
    <title>Login</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top container-fluid">
    <div class="container">
        <a class="navbar-brand logo" href="../index.html">
            <img src="../brandImage/ll.png" class="img-fluid " alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-center text-justify">
                <li class="nav-item ">
                    <a class="nav-link" href="../index.html">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
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
                    <h5 class="card-title text-center">Admin Sign In</h5>
                    <h3 class="login-heading mb-4">Welcome back!</h3>
                    <form action="" method="post">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" name="rememberpass" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="submit">Sign in</button>
                    </form>

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
    if(isset($_POST['submit'])){
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $query = "SELECT * FROM Admin where email='$mail' and password= '$password' ";

        $userData = mysqli_query($con,$query);
        $totalrow = mysqli_num_rows($userData); // return the count of row
        if($totalrow == 1){
            $_SESSION['user_mail']=$mail;
            header('location: adminpro.php');
        }else{
            $msg = "Incorrect Email or password ";
            echo "<script type='text/javascript'> alert('$msg');</script>";
        }
    }
?>

</body>
</html>