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
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h3 class="login-heading mb-4 text-center"><u>Date-wise expense report</h3></u><hr>

                            <div class="row">
                                <ol class="breadcrumb">
                                    <li><a href="#">
                                            <em class="fa fa-home"></em>
                                        </a></li>
                                    <li class="active">Expense Report</li>
                                </ol>
                            </div><!--/.row-->
                            <div class="row">
                                <div class="col-lg-12">



                                    <div class="panel panel-default">
                                        <div class="panel-heading">Expense Report</div>
                                        <div class="panel-body">

                                            <div class="col-md-12">

                                                <?php
                                                    $fdate=$_POST['fromdate'];
                                                    $tdate=$_POST['todate'];
//                                                    $rtype=$_POST['requesttype'];
                                                ?>
                                                <h5 align="center" style="color:blue">Expense Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                                                <hr />
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Date</th>
                                                        <th>Expense Amount</th>
                                                    </tr>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                        $userName = $_SESSION['user_mail'];
                                                        $ret=mysqli_query($con,"SELECT expenseDate,SUM(miscelleneous) FROM Expense,User u  where (expenseDate BETWEEN '$fdate' and '$tdate') && (u.userId='$userName') group by expenseDate");
                                                        $cnt=1;
                                                        while ($row=mysqli_fetch_array($ret)) {

                                                            ?>

                                                            <tr>
                                                                <td><?php echo $cnt;?></td>

                                                                <td><?php  echo $row['expenseDate'];?></td>
                                                                <td><?php  echo $ttlsl = $row['miscelleneous'];
                                                                ?></td>


                                                            </tr>
                                                            <?php

//                                                            $totalsexp = $ttlsl;
//                                                            $cnt=$cnt+1;
                                                        }?>

<!--                                                    <tr>-->
<!--                                                        <th colspan="2" style="text-align:center">Grand Total</th>-->
<!--                                                        <td>--><?php //echo $totalsexp;?><!--</td>-->
<!--                                                    </tr>-->

                                                </table>




                                            </div>
                                        </div>
                                    </div><!-- /.panel-->
                                </div><!-- /.col-->


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