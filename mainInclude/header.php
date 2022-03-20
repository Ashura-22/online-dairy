<?php
//starting session if not started
if(!isset($_SESSION))
 {
     session_start();
    //  echo "start";
 }
include_once('../dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--font Awesome css-->
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <!-- Custon CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Online Dairy</title>
</head>

<body>

    <!--Start Navigation  -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p1-5 fixed-top d-print-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                Online Dairy</a>
            <!-- <span class="navbar-text">Fresh and Tasty</span> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse custom-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Types
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item custom-nav-item" href="./producttype.php?pro_type=MILK">Milk</a>
                            </li>
                            <li><a class="dropdown-item custom-nav-item"
                                    href="./producttype.php?pro_type=YOGHURT">Yoghurt</a></li>
                            <li><a class="dropdown-item custom-nav-item"
                                    href="./producttype.php?pro_type=CHEESE">Cheese</a></li>
                            <li><a class="dropdown-item custom-nav-item"
                                    href="./producttype.php?pro_type=BUTTER">Butter</a></li>
                            <li><a class="dropdown-item custom-nav-item"
                                    href="./producttype.php?pro_type=CUSTARD">Custard</a></li>
                            <li><a class="dropdown-item custom-nav-item" href="./producttype.php?pro_type=ICECREAM">Ice
                                    Cream</a></li>
                            <!-- <li><hr class="dropdown-divider"></li> -->
                            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>

                    <!-- <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
                </ul>
                <form class="d-flex p-2" action="./productsearch.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" width="75px"
                        name="searchbar" id="searchbar">
                    <button class="btn btn-outline-success" type="submit" name="searchbtn">Search</button>
                </form>
                <ul class="navbar-nav custom-nav">

                    <?php
                if(isset($_SESSION['is_login'])== true)
                {
                  echo'<li class="nav-item custom-nav-item"><a href="Customer/custmyprofile.php" class="nav-link">My Profile</a></li>
                  <li class="nav-item custom-nav-item"><a href="./Customer/myorder.php" class="nav-link">My Orders</a></li>
                  <li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">logout</a></li>
                  <li><a class="navbar-brand nav-item custom-nav-item" href="./cart.php" ><i class="fas fa-shopping-cart mr-3"></i></a></li>';
                }
                else{
                  echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#custlogin">Login</a></li>
                  <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#custreg">Sign Up</a></li>
                  <li class="nav-item custom-nav-item"><a href="./contactus.php" class="nav-link">Contact Us</a></li>';
                }
              ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->