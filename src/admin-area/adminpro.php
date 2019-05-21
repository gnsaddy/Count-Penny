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
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h3 class="login-heading mb-4 text-center"><u>Query Analysis</h3></u>
                    <table class="table">
                        <tr>
                            <td><label>1.Display faculty name and email who counsels Rajesh</label></td>

                            <td><a href="q1.php"><button type="button" class="rounded-bottom" >Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>2.Display students name who are under Rudra</label></td>
                            <td><a href="q2.php"><button type="button" class="rounded-bottom">Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>3.Display faculty details who has joined after 2015</label></td>
                            <td><a href="q3.php"><button type="button" class="rounded-bottom">Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>4.List the faculty name and the number of students counselled by him/her</label></td>
                            <td><a href="q4.php"><button type="button" class="rounded-bottom">Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>5.List the details of flexibleExpense for salaried user</label></td>
                            <td><a href="query5.php"><button type="button" class="rounded-bottom">Check</button></a></td></tr>
                        </tr>

                        <tr>
                            <td><label>6.List the details of expense spend on food for all users.</label></td>
                            <td><a href="query6.php"><button type="button" class="rounded-bottom">Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>7.List the details of medical expense for unsalaried user.</label></td>
                            <td><a href="query7.php"><button type="button" class="rounded-bottom">Check</button></a></td>
                        </tr>

                        <tr>
                            <td><label>8.List the student name,parent name,parent contact number of the students who did not attend meeting held by Dr.Ramya on Jan-13-2019</label></td>
                            <td><button type="button" class="rounded-bottom">Check</button></td>
                        </tr>

                        <tr>
                            <td><label>9.List the faculty name and meeting details which were conducted on 2018-02-16</label></td>
                            <td><button type="button" class="rounded-bottom">Check</button></td>
                        </tr>

                        <tr>
                            <td><label>10.List the details of meeting conducted by Dr.Chandana</label></td>
                            <td><button type="button" class="rounded-bottom">Check</button></td>
                        </tr>
                    </table>


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


</body>
</html>