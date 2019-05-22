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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
<!--                        --><?php
//                            $userName = $_SESSION['user_mail'];
//                            if ($userName == true){
//                            }else{
//                                header('location: login.php');
//                            }
//                            $query = "SELECT * FROM User where email='$userName' ";
//                            $userData = mysqli_query($con,$query);
//                            $result = mysqli_fetch_assoc($userData);  // result in the form of array
//                            echo $result['fname']; // fetching the first name
//                            $queryShowExp = "select * from User u JOIN HasExpense HE on u.userId = HE.userId JOIN Expense E on HE.expenseId = E.expenseId where
//                                                                                    u.userId='$result[userId]'";
//                            $exeExp = mysqli_query($con,$queryShowExp);
//                            $resultExp = mysqli_fetch_assoc($exeExp);
//                        ?>
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
            <div class="row">
                <div class="col-md-12 col-lg-12">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center"><u> Expense Details</h5></u>
                                <div class="container" style="width:900px;">
                                    <h2 align="center">Morris.js chart with PHP & Mysql</h2>
                                    <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>
                                    <br /><br />
                                    <div id="chart"></div>
                                </div>

                            </div>
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
<?php
    $queryChart1 = "SELECT * FROM Expense";
    $queryChart2 = "SELECT * FROM FixedExpense";
    $queryChart3 = "SELECT * FROM FlexibleExpense";
    $resultChart1 = mysqli_query($con, $queryChart1);
    $resultChart2 = mysqli_query($con, $queryChart2);
    $resultChart3 = mysqli_query($con, $queryChart3);
    $chart_data = '';
    while($row = mysqli_fetch_array($resultChart1))
    {
        $chart_data .= "{ miscelleneous:'".$row["miscelleneous"]."} ";
    }
    $chart_data = substr($chart_data, 0, -2);
?>
<script>
    Morris.Bar({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'amount',
        ykeys:['miscelleneous'],
        labels:['miscelleneous'],
        hideHover:'auto',
        stacked:true
    });
</script>

<!-- footer -->
</body>
</html>