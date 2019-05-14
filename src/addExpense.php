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
        <form action="addExpense.php" class="form-signin" method="post">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u>Input Expense Details</h5></u>
                                <?php
                                    echo "<u>";
                                    echo "Hi ".$result['fname'].",";
                                    echo "</u><hr>";
                                ?>
<!--                                <form action="addExpense.php" class="form-signin" method="post">-->
                                    <div class="form-label-group">
                                        <input type="text" id="userid"  name="userid" class="form-control" placeholder="User Id" readonly="readonly"  >
                                        <label for="userid"><?php
                                                echo $result['userId'];
                                            ?></label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="expenseid"  name="expenseid" class="form-control" placeholder="Expense Id" required autofocus>
                                        <label for="expenseid">Expense Id</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="date" id="expensedate" name="expensedate" class="form-control" placeholder="expensedate" required autofocus>
                                        <label for="expensedate">Expense Date</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="text" id="miscellaneousAmount" name="miscellaneousAmount" class="form-control" placeholder="miscellaneousAmount" required autofocus>
                                        <label for="miscellaneousAmount">Miscellaneous Amount</label>
                                    </div>
<!--                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submitMis" type="submit">Add Expense Details</button>-->
<!--                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u>Input Fixed Expense</h5></u>
<!--                                <form action="addExpense.php" class="form-signin" method="post">-->
                                    <div class="form-label-group">
                                        <input type="text" id="rent"  name="rent" class="form-control" placeholder="rent">
                                        <label for="rent">Rent Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="bills"  name="bills" class="form-control" placeholder="bills">
                                        <label for="bills">Bills Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="fees"  name="fees" class="form-control" placeholder="fees">
                                        <label for="fees">Fees Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="transport"  name="transport" class="form-control" placeholder="transport">
                                        <label for="transport">Transport Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="subscription"  name="subscription" class="form-control" placeholder="subscription">
                                        <label for="subscription">Subscription Amount</label>
                                    </div>
<!--                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submitFixed" type="submit">Add Fixed Expense</button>-->
<!--                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u>Input Flexible Expense</h5></u>
<!--                                <form action="addExpense.php" class="form-signin" method="post">-->
                                    <div class="form-label-group">
                                        <input type="text" id="food"  name="food" class="form-control" placeholder="food">
                                        <label for="food">Food Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="travel"  name="travel" class="form-control" placeholder="travel">
                                        <label for="travel">Travel Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="maintenance"  name="maintenance" class="form-control" placeholder="maintenance">
                                        <label for="maintenance">Maintenance Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="medical"  name="medical" class="form-control" placeholder="medical">
                                        <label for="medical">Medical Amount</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="clothing"  name="clothing" class="form-control" placeholder="clothing">
                                        <label for="clothing">Clothing Amount</label>
                                    </div>
<!--                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submitFlexible" type="submit">Add Flexible Expense</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Add Expense Details</button>
        </form>
    </div>
</section>
<!-- /.row -->
<!-- /.container -->
<!-- database connectivity -->
<?php

    if(isset($_POST['submit'])){

//        $userid = $_POST['userid'];
        $expenseid = $_POST['expenseid'];
        $expensedate = $_POST['expensedate'];
        $miscellaneousAmount = $_POST['miscellaneousAmount'];

        $rent = $_POST['rent'];
        $bills = $_POST['bills'];
        $fees = $_POST['fees'];
        $transport = $_POST['transport'];
        $subscription = $_POST['subscription'];

        $food = $_POST['food'];
        $travel = $_POST['travel'];
        $maintenance = $_POST['maintenance'];
        $medical = $_POST['medical'];
        $clothing = $_POST['clothing'];

        $queryUpdateExpMis = "insert into Expense(expenseId, expenseDate, miscelleneous) values ('$expenseid','$expensedate',$miscellaneousAmount)";
        $hasExp = "insert into HasExpense(userId, expenseId) VALUES ('$result[userId]','$expenseid')";

        $queryUpdateExpRent = "insert into FixedExpense(expenseId, fixedType, fxAmount) VALUES 
                                        ('$expenseid','rent',$rent)";

        $queryUpdateExpBill = "insert into FixedExpense(expenseId, fixedType, fxAmount) VALUES 
                                        ('$expenseid','bills',$bills)";

        $queryUpdateExpFee = "insert into FixedExpense(expenseId, fixedType, fxAmount) VALUES 
                                        ('$expenseid','fees',$fees)";

        $queryUpdateExpTransport = "insert into FixedExpense(expenseId, fixedType, fxAmount) VALUES 
                                        ('$expenseid','transport',$transport)";

        $queryUpdateExpSubs = "insert into FixedExpense(expenseId, fixedType, fxAmount) VALUES 
                                        ('$expenseid','subscription',$subscription)";

        //        insert into flexible

        $queryUpdateExpFood = "insert into FlexibleExpense(expenseId, flexibleType, flAmount) VALUES 
                                        ('$expenseid','food',$food)";

        $queryUpdateExpTravel = "insert into FlexibleExpense(expenseId, flexibleType, flAmount) VALUES 
                                        ('$expenseid','travel',$travel)";

        $queryUpdateExpMaintenance = "insert into FlexibleExpense(expenseId, flexibleType, flAmount) VALUES 
                                        ('$expenseid','maintenance',$maintenance)";

        $queryUpdateExpMedical = "insert into FlexibleExpense(expenseId, flexibleType, flAmount) VALUES 
                                        ('$expenseid','medical',$medical)";

        $queryUpdateExpCloth = "insert into FlexibleExpense(expenseId, flexibleType, flAmount) VALUES 
                                        ('$expenseid','clothing',$clothing)";


        echo $result["userId"];

            $executeMi = mysqli_query($con,$queryUpdateExpMis);
            $hasExc = mysqli_query($con,$hasExp);



                $exeRent = mysqli_query($con,$queryUpdateExpRent);
                $exeBills = mysqli_query($con,$queryUpdateExpBill);
                $exeFee = mysqli_query($con,$queryUpdateExpFee);
                $exeTransport = mysqli_query($con,$queryUpdateExpTransport);
                $exeSub = mysqli_query($con,$queryUpdateExpSubs);


                $exeFood = mysqli_query($con,$queryUpdateExpFood);
                $exeTravel = mysqli_query($con,$queryUpdateExpTravel);
                $exeMaintenance = mysqli_query($con,$queryUpdateExpMaintenance);
                $exeMedical = mysqli_query($con,$queryUpdateExpMedical);
                $exeCloth = mysqli_query($con,$queryUpdateExpCloth);

        $msg = "your details is successfully added";
        echo "<script type='text/javascript'> alert(' $result[fname] $msg');</script>";


    }

?>


<?php
include("include/footer.php");
?>
<!-- footer -->
</body>
</html>