<?php
    include("../include/db.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h3 class="login-heading mb-4 text-center"><u>List the details of medical expense for unsalaried user</h3></u>
                        <table class="table table-bordered table-responsive">
                            <?php
                                $queryShow = "select u.fname,u.userId,fl.flexibleType as Medical,fl.flAmount as Amount from User u,FlexibleExpense fl,Expense e,HasExpense h,UserType ut where
                                    u.userId=h.userId and e.expenseId=h.expenseId and u.userId=ut.userId and
                                    e.expenseId=fl.expenseId and flexibleType=\"medical\" and ut.uType=\"unsalaried\" ";
                                $resultShow = mysqli_query($con,$queryShow);
                                if($resultShow -> num_rows>0){
                                    echo "<table class='table table-responsive-md table-bordered'><tr><th>fname</th><th>userId</th><th>Medical</th><th>Amount</th></tr>";
                                    while ($row = $resultShow->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>".$row['fname']."</td><td>".$row['userId']."</td><td>".$row['Medical']."</td><td>".$row['Amount'];
                                        echo " </td></tr>";
                                    }
                                    echo "</table";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
</section>
<?php
    include('../include/footer.php');
?>
</body>
</html>

