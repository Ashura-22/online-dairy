<?php
//starting session if not started
if(!isset($_SESSION))
 {
     session_start();
    //  echo "start";
 }
include_once('../dbconnect.php');

//Checking Email Already Exists
if(isset($_POST['checkemail']) && isset($_POST['cust_mail']))
{
    $cust_mail = $_POST['cust_mail'];
    //echo json_encode($cust_mail);
    $sql = "SELECT cust_mail FROM `cust_details` WHERE cust_mail ='".$cust_mail."'";
    // SELECT cust_mail FROM `cust_details` WHERE cust_mail = "rishi@gmail.com"

   $result=$conn->query($sql);

   $row=$result->num_rows;
   echo json_encode($row);
}

//Checking Mob Already Exists
if(isset($_POST['checkmob']) && isset($_POST['cust_mob']))
{
    $cust_mob = $_POST['cust_mob'];
    //echo json_encode($cust_mail);
    $sql = "SELECT cust_mob FROM `cust_details` WHERE cust_mob ='".$cust_mob."'";
    // SELECT cust_mail FROM `cust_details` WHERE cust_mail = "rishi@gmail.com"

   $result=$conn->query($sql);

   $row=$result->num_rows;
   echo json_encode($row);
}

// Insert Customer
if(isset($_POST['ctreg']) && isset($_POST['ctname']) && isset($_POST['ctmail']) && isset($_POST['ctpass']) && isset($_POST['ctaddr']) && isset($_POST['ctmob']))
{
    // echo "nehal";

    $cust_name = $_POST['ctname'];
    $cust_mail = $_POST['ctmail'];
    $cust_pass = $_POST['ctpass'];
    $cust_addr = $_POST['ctaddr'];
    $cust_mob =  $_POST['ctmob'];
    // echo $cust_name;
    // echo $cust_mail;
    // echo $cust_pass;
    // echo $cust_addr;
    $sql = "INSERT INTO `cust_details` (`cust_id`, `cust_name`, `cust_mail`, `cust_pass`, `cust_addr`, `cust_img`,`cust_mob`)VALUES (NULL,'$cust_name', '$cust_mail', '$cust_pass', '$cust_addr','','$cust_mob')";
    // INSERT INTO `cust_details` (`cust_id`, `cust_name`, `cust_mail`, `cust_pass`, `cust_addr`, `cust_img`) VALUES (NULL, 'rishi', 'rishi@gmail.com', 'rishi123', 'pimple gurav', '');

    if($conn->query($sql) == TRUE)
    {
        echo json_encode("OK");
    }
    else
    {
        echo json_encode("Failed");
    }
}
// else
// {
//     echo "nehal";
// }


//customer login verification   
//  if(!isset($_SESSION['is_login']))
//  {
//      echo ("hiii");

        if(isset($_POST['custcheck']) && isset($_POST['custlogmail']) && isset($_POST['custlogpass']))
        {
            $custmail =$_POST['custlogmail'];
            $custpass =$_POST['custlogpass'];
            
            //echo ("ok");

            $sql = "SELECT cust_mail,cust_pass FROM cust_details where cust_mail='".$custmail."' AND cust_pass='".$custpass."'";
            $result = $conn->query($sql);

            $row= $result->num_rows;
            //echo ("okk");

            if($row == 1)
            {
                $_SESSION['is_login']=true;
                $_SESSION['custlogemail']=$custmail;
                // echo $_SESSION['custlogemail'];
                echo json_encode($row);
            }
            else if($row == 0)
            {  
                echo json_encode($row);
            }
        }
//   }
//  else
//  {
//      echo json_encode("no log000");
//      echo json_encode($_POST['custlogmail']);
//      echo json_encode($_POST['custlogpass']);
//  }
?>