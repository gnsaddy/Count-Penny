<?php
    session_start();
    include("include/db.php");
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
                        <a class="dropdown-item " href="userPro.php" >Profile</a>
                        <a class="dropdown-item" href="viewProfile.php">View</a><hr>
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
            <div class="col-md-7 col-lg-7">
                        <?php
                            $userName = $_SESSION['user_mail'];
                            if ($userName == true){

                            }else{
                                header('location: login.php');
                            }
                            $query = "SELECT * FROM User where email='$userName' ";
                            $userData = mysqli_query($con,$query);
                            $result = mysqli_fetch_assoc($userData);  // result in the form of array
                            echo "<h2> <pre>               <u>". $result['fname']." "; // fetching the first name
                            echo $result['lname']. "</h2></pre></u>";
                            global $uId;
                            $uId = $result['userId'];
//                            echo $uId;
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th><?php echo $result['userId']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th><?php echo $result['fname']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th><?php echo $result['lname']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th><?php echo $userName; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Age</th>
                                    <th><?php echo $result['age']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Contact</th>
                                    <th><?php echo $result['contact']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Address</th>
                                    <th><?php echo $result['address']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <tr>
                                    <th>User Category</th>
                                    <th><?php
                                            $queryCat = "select * from User u JOIN UserType UT on u.userId = UT.userId where u.userId='$result[userId]' ";
                                            $userCat = mysqli_query($con,$queryCat);
                                           //$totalCat = mysqli_num_rows($userCat);
                                            //echo $totalCat;
                                            $getCat = mysqli_fetch_assoc($userCat);
                                            echo $getCat['uType'];
                                        ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Net Income</th>
                                    <th><?php echo $result['netIncome']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th>Other Income</th>
                                    <th><?php echo $result['otherIncome']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                                <thead>
                                <tr>
                                    <th>Total Income</th>
                                    <th><?php echo $result['otherIncome']+$result['netIncome']; ?> &nbsp; &nbsp; <a href="#">edit</a></th>
                                </tr>
                                </thead>
                                <thead>
                            </table>
                        </div>
            </div>

            <div class="col-md-5 col-lg-5">
                <h3 class="my-3"> <u> <pre>       Add necessary details      </pre></h3></u><br>
                <div class="container-fluid">
                    <form action="updateUserPro.php" class="form-control-sm " method="post">
                        <div class="form-label-group">
                            <input type="text" id="age"  name="age" class="form-control " placeholder="Age" required autofocus >
                            <label for="age">Age<label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" required autofocus>
                            <label for="contact">Contact</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required autofocus>
                            <label for="address">Address</label>
                        </div>
                        <hr>
                        <div class="form-label-group">
                            <input type="text" id="category" name="category" class="form-control" placeholder="salaried/unsalaried" required autofocus>
                            <label for="category">salaried/unsalaried</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="netIncome" name="netIncome" class="form-control" placeholder="Net Income" required autofocus>
                            <label for="netIncome">Net Income</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="otherIncome" name="otherIncome" class="form-control" placeholder="Other Income" required autofocus>
                            <label for="otherIncome">Other Income</label>
                        </div>
                        <hr>

                        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block text-uppercase"  >Update Details</button>
                        <hr>
                    </form>
                </div>



            </div>

        </div>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php
    if(isset($_POST['submit'])) {
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $category = $_POST['category'];
        $netIncome = $_POST['netIncome'];
        $otherIncome = $_POST['otherIncome'];

        $queryUpdate = "UPDATE User set age=$age, contact=$contact, address='$address', netIncome=$netIncome,
                    otherIncome=$otherIncome where userId='$uId' ";

        $queryUpdateCat = "update UserType set uType='$category' where userId='$uId' ";

        if ($age == "" && $contact == "" && $address == "" && $netIncome == "" && $otherIncome == "" ) {
            if($category == "") {
                $msg = "$result[fname] your details is not update!!  fill all details. ";
                echo "<script type='text/javascript'> alert('$msg');</script>";
            }

        } else {
            $dataUpdate = mysqli_query($con, $queryUpdate);
            $dataUpdateCat = mysqli_query($con,$queryUpdateCat);
            $msg = "Successfully updated $result[fname] details ";
            echo "<script type='text/javascript'> alert('$msg');</script>";
        }
    }
?>
<?php
    include("include/footer.php");
?>

</body>
</html>