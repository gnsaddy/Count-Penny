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
            <div class="col-md-7 col-lg-7">
                    <div class="col-md-12">
                        <pre>               <b class="h3"> &nbsp; &nbsp;&nbsp; &nbsp;<u>Account Summary</u></b></pre>
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>Net Income</th>
                                <th><?php echo "Rs ".$result['netIncome']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Other Income</th>
                                <th><?php echo "Rs ".$result['otherIncome']; ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Total Income</th>
                                <th><?php echo "Rs ".($result['netIncome']+$result['otherIncome']); ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Miscellaneous Expense</th>
                                <th><?php
                                        $queryMis ="select e.miscelleneous from Expense e JOIN HasExpense HE on e.expenseId = HE.expenseId 
                                            JOIN User U on HE.userId = U.userId where HE.userId='$result[userId]'";
                                        $dataMis = mysqli_query($con,$queryMis);
                                        $resultMis = mysqli_fetch_assoc($dataMis);
                                        echo "Rs ".$resultMis['miscelleneous'];
                                    ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Fixed Expense</th>
                                <th><?php
                                        $queryFixed = "select * from fixedData where userId='$result[userId]'";
                                        $dataFixed = mysqli_query($con,$queryFixed);
                                        $resultFixed = mysqli_fetch_assoc($dataFixed);
                                        echo "Rs ".$resultFixed['fx'];
                                    ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Flexible Expense</th>
                                <th><?php
                                        $queryFlexible = "select * from flexibleData where userId='$result[userId]'";
                                        $dataFlexible = mysqli_query($con,$queryFlexible);
                                        $resultFlexible = mysqli_fetch_assoc($dataFlexible);
                                        echo "Rs ".$resultFlexible['fl'];
                                    ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Total Expense</th>
                                <th><?php echo "Rs ".($resultMis['miscelleneous']+$resultFlexible['fl']+$resultFixed['fx']); ?> </th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>In Account</th>
                                <th><?php echo "Rs ".(($result['netIncome']+$result['otherIncome'])-($resultMis['miscelleneous']+$resultFlexible['fl']+$resultFixed['fx']));
                                ?> </th>
                            </tr>
                            </thead>
                        </table>


                    </div>
                    <div class="col-md-12">
                                <hr>
                        <hr>
                        <hr>
                        &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <a href="addExpense.php" ><button type="button" class="btn3d btn btn-default btn-lg"><span class="glyphicon glyphicon-download-alt">
                        </span>&nbsp; &nbsp; Add Expense &nbsp;</button></a>

                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

                        <a href="viewExpense.php" ><button type="button" class="btn3d btn btn-default btn-lg"><span class="glyphicon glyphicon-download-alt">
                        </span>&nbsp; View Expense &nbsp;</button></a>
                    </div><hr><hr><hr>

            </div>

            <div class="col-md-5 col-lg-5 text-justify">
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