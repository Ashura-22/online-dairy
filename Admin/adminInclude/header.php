<?php
//starting session if not started
if (!isset($_SESSION)) {
    session_start();
    //  echo "start";
}
include_once "../dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <!--font Awesome css-->
    <!-- <link rel="stylesheet" href="../css/all.min.css" /> -->

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet" />

    <!-- Custon CSS -->
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>


    <!--Start Navigation  -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 fixed-top d-print-none">
        <div class="container-fluid">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./admindashboard.php">Online Dairy<p
                    class="d-inline-block text-truncate" style="font-size: 20px; color:cadetblue">Admin</p></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav custom-nav" style="font-weight: bold;">
                <li class="nav-item custom-nav-item"><a href="./admindashboard.php" class="nav-link">Dashboard</a></li>
                <li class="nav-item custom-nav-item"><a href="./manageproduct.php" class="nav-link">Products</a>
                </li>
                <li class="nav-item custom-nav-item"><a href="./managecust.php" class="nav-link">Customer</a></li>
                <li class="nav-item custom-nav-item"><a href="./manageorder.php" class="nav-link">Orders</a></li>
                <li class="nav-item custom-nav-item"><a href="./sellreport.php" class="nav-link">Sell Report</a></li>
                <li class="nav-item custom-nav-item"><a href="./managecp.php" class="nav-link">Complaints</a></li>
                <li class="nav-item custom-nav-item"><a href="./managefb.php" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="./adminchgpwd.php" class="nav-link">Change
                        Password</a>
                </li>
                <li class="nav-item custom-nav-item"><a href="../logout.php" class="nav-link">logout</a></li>
            </ul>
        </div>
    </nav>
    <!--End Navigation  -->