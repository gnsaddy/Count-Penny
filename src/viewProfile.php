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
                        <a class="dropdown-item" href="updateUserPro.php">Update</a><hr>
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
            <div class="col-md-4 col-lg-4">
                <?php
                    $userName = $_SESSION['user_mail'];
                    if ($userName == true){

                    }else{
                        header('location: login.php');
                    }
                    $query = "SELECT * FROM User where email='$userName' ";
                    $userData = mysqli_query($con,$query);
                    $result = mysqli_fetch_assoc($userData);  // result in the form of array
                    echo "<h2> <pre>   <u>". $result['fname']." "; // fetching the first name
                    echo $result['lname']. "</h2></pre></u>";
                    global $uId;
                    $uId = $result['userId'];
                    //                            echo $uId;
                ?>

            </div>

            <div class="col-md-8 col-lg-8">
                <h3 class="my-3"><pre>          <u> User Information  </pre></h3></u><br>
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>User Id</th>
                                <th><?php echo $result['userId']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th><?php echo $result['fname']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Last Name</th>
                                <th><?php echo $result['lname']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th><?php echo $userName; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Age</th>
                                <th><?php echo $result['age']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Contact</th>
                                <th><?php echo $result['contact']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Address</th>
                                <th><?php echo $result['address']; ?> </th>
                            </tr>
                            </thead>
                            <tr>
                                <th>User Category</th>
                                <th><?php
                                        $queryCat = "select * from User u JOIN UserType UT on u.userId = UT.userId where u.userId='$result[userId]' ";
                                        $userCat = mysqli_query($con,$queryCat);
                                        $getCat = mysqli_fetch_assoc($userCat);
                                        echo $getCat['uType'];
                                    ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Net Income</th>
                                <th><?php echo $result['netIncome']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Other Income</th>
                                <th><?php echo $result['otherIncome']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                        </table>
                    </div>

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

<!-- footer -->
<footer class="  container-fluid py-4 bg-transparent text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; 2019 Count-Penny</small>
    </div>
</footer>
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

        if ($age == null && $contact == null && $address == null && $netIncome == null && $otherIncome == null && $category == null) {
            $msg = "$result[fname] your details is not update!!  fill all details. ";
            echo "<script type='text/javascript'> alert('$msg');</script>";


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