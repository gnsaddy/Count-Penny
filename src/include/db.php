<?php

    $con = mysqli_connect("localhost","root","","expenseManagement");

    if($con){
    }else{
        die("can not connect to db".mysqli_connect_error());
    }

 ?>