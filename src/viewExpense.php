<?php
    session_start();
    include("include/db.php");

    //    session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/checkbox.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="./jquery-3.4.0.slim.min.js"></script>
    <script src="./bootstrap.js"></script>
    <script src="./popper.min.js"></script>
    <script src="./tooltip.min.js"></script>

    <title>Add Expense</title>
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
                            $queryShowExp = "select * from User u JOIN HasExpense HE on u.userId = HE.userId JOIN Expense E on HE.expenseId = E.expenseId where 
                                                                                    u.userId='$result[userId]'";
                            $exeExp = mysqli_query($con,$queryShowExp);
                            $resultExp = mysqli_fetch_assoc($exeExp);
                        ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="userPro.php" >Profile</a>
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
        <form action="addExpense.php" class="form-signin" method="post">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u> Expense Details</h5></u>
                                <?php
                                    echo "<u>";
                                    echo "Hi ".$result['fname'].",";
                                    echo "</u><hr>";
                                ?>
                                <!--                                <form action="addExpense.php" class="form-signin" method="post">-->
                                <div class="form-label-group">
                                    <input type="text" id="userid"  name="userid" class="form-control" placeholder="User Id" readonly="readonly"  >
                                    <label for="userid">User Id : <?php
                                            echo $result['userId'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="expenseid"  name="expenseid" class="form-control" placeholder="Expense Id" readonly="readonly">
                                    <label for="expenseid">Expense Id : <?php
                                            echo $resultExp['expenseId'];
                                        ?></label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="expensedate" name="expensedate" class="form-control" placeholder="expensedate" readonly="readonly">
                                    <label for="expensedate">Expense Date : <?php
                                            echo $resultExp['expenseDate'];
                                        ?></label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="miscellaneousAmount" name="miscellaneousAmount" class="form-control" placeholder="miscellaneousAmount" readonly="readonly">
                                    <label for="miscellaneousAmount">Miscellaneous Amount : <?php
                                            echo $resultExp['miscelleneous'];
                                        ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u> Fixed Expenses </h5></u>
                                <div class="form-label-group">
                                    <input type="text" id="rent"  name="rent" class="form-control" placeholder="rent" readonly>
                                    <label for="rent">Rent Amount : <?php
                                            $fetchRent = mysqli_query($con,"select * from Expense e JOIN FixedExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and fixedType='rent' ");
                                            $resultRent = mysqli_fetch_assoc($fetchRent);
                                            echo $resultRent['fxAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="bills"  name="bills" class="form-control" placeholder="bills" readonly>
                                    <label for="bills">Bills Amount : <?php
                                            $fetchBill = mysqli_query($con,"select * from Expense e JOIN FixedExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and fixedType='bills' ");
                                            $resultBill = mysqli_fetch_assoc($fetchBill);
                                            echo $resultBill['fxAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="fees"  name="fees" class="form-control" placeholder="fees" readonly>
                                    <label for="fees">Fees Amount : <?php
                                            $fetchFee = mysqli_query($con,"select * from Expense e JOIN FixedExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and fixedType='fees' ");
                                            $resultFee = mysqli_fetch_assoc($fetchFee);
                                            echo $resultFee['fxAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="transport"  name="transport" class="form-control" placeholder="transport" readonly>
                                    <label for="transport">Transport Amount : <?php
                                            $fetchTransport = mysqli_query($con,"select * from Expense e JOIN FixedExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and fixedType='transport' ");
                                            $resultTransport = mysqli_fetch_assoc($fetchTransport);
                                            echo $resultTransport['fxAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="subscription"  name="subscription" class="form-control" placeholder="subscription" readonly>
                                    <label for="subscription">Subscription Amount : <?php
                                            $fetchSubs = mysqli_query($con,"select * from Expense e JOIN FixedExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and fixedType='subscription' ");
                                            $resultSubs = mysqli_fetch_assoc($fetchSubs);
                                            echo $resultSubs['fxAmount'];
                                        ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u>Flexible Expenses</h5></u>
                                <div class="form-label-group">
                                    <input type="text" id="food"  name="food" class="form-control" placeholder="food" readonly>
                                    <label for="food">Food Amount : <?php
                                            $fetchFood = mysqli_query($con,"select * from Expense e JOIN FlexibleExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and flexibleType='food' ");
                                            $resultFood = mysqli_fetch_assoc($fetchFood);
                                            echo $resultFood['flAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="travel"  name="travel" class="form-control" placeholder="travel" readonly>
                                    <label for="travel">Travel Amount : <?php
                                            $fetchTravel = mysqli_query($con,"select * from Expense e JOIN FlexibleExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and flexibleType='travel' ");
                                            $resultTravel = mysqli_fetch_assoc($fetchTravel);
                                            echo $resultTravel['flAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="maintenance"  name="maintenance" class="form-control" placeholder="maintenance" readonly>
                                    <label for="maintenance">Maintenance Amount : <?php
                                            $fetchMaintenance = mysqli_query($con,"select * from Expense e JOIN FlexibleExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and flexibleType='maintenance' ");
                                            $resultMaintenance = mysqli_fetch_assoc($fetchMaintenance);
                                            echo $resultMaintenance['flAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="medical"  name="medical" class="form-control" placeholder="medical" readonly>
                                    <label for="medical">Medical Amount : <?php
                                            $fetchMedical = mysqli_query($con,"select * from Expense e JOIN FlexibleExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and flexibleType='medical' ");
                                            $resultMedical = mysqli_fetch_assoc($fetchMedical);
                                            echo $resultMedical['flAmount'];
                                        ?></label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="clothing"  name="clothing" class="form-control" placeholder="clothing" readonly>
                                    <label for="clothing">Clothing Amount : <?php
                                            $fetchCloth = mysqli_query($con,"select * from Expense e JOIN FlexibleExpense FE on e.expenseId = FE.expenseId 
                                                        where FE.expenseId='$resultExp[expenseId]' and flexibleType='clothing' ");
                                            $resultCloth = mysqli_fetch_assoc($fetchCloth);
                                            echo $resultCloth['flAmount'];
                                        ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-label-group text-center">
                <input type="text" id="clothing"  name="clothing" class="form-control" placeholder="clothing" readonly>
                <label for="clothing"><?php
                        $totalEarning = ($result['netIncome']+$result['otherIncome']);
                        echo "Total Earning : Rs ".$totalEarning;
                        echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";

                        $totalExpense = ($resultExp['miscelleneous'] + $resultRent['fxAmount'] + $resultBill['fxAmount'] + $resultFee['fxAmount'] +
                            $resultTransport['fxAmount'] + $resultSubs['fxAmount'] + $resultFood['flAmount'] + $resultTravel['flAmount'] +
                            $resultMaintenance['flAmount'] + $resultMedical['flAmount'] + $resultCloth['flAmount']);

                        echo "Total Expense : Rs ".$totalExpense;
                        echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
                        echo "Amount available : Rs ".($totalEarning-$totalExpense);
                    ?></label>
            </div>

        </form>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->
<?php
    include("include/footer.php");
?>
<!-- footer -->
</body>
</html>