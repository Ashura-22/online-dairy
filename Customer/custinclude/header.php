<?php
//starting session if not started
if (!isset($_SESSION)) {
    session_start();
    //  echo "start";
}
if(isset($_SESSION['is_login']))
    {
        $cust_mail=$_SESSION['custlogemail'];
        
    }else
    {
        echo "<script> location.href='../index.php';</script>";
    }
include_once "../dbconnect.php";

if(isset($cust_mail))
{
    $sql ="SELECT cust_img FROM `cust_details` WHERE cust_mail='".$cust_mail."'";
    $result= $conn->query($sql);
    $row=$result->fetch_assoc();
    $cust_img=$row['cust_img'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

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
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Online Dairy<p
                    class="d-inline-block text-truncate" style="font-size: 20px; color:cadetblue">My Profile</p></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item"><img src="<?php echo $cust_img ?>" alt="customerimage"
                        class="img-thumbnail rounded-circle" width="80px" height="80x" style="border: 0px;"></li>
                <li class="nav-item custom-nav-item"><a href="./custmyprofile.php" class="nav-link">My Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="./myorder.php" class="nav-link">My Orders</a></li>
                <li class="nav-item custom-nav-item"><a href="./custfb.php" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="./custcomp.php" class="nav-link">Complaint</a></li>
                <li class="nav-item custom-nav-item"><a href="./custchgpwd.php" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item custom-nav-item"><a href="../logout.php" class="nav-link">logout</a></li>
                <li>
                    <a class="navbar-brand nav-item custom-nav-item" href="../cart.php">
                        <i class="fas fa-shopping-cart mr-3"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--End Navigation  -->