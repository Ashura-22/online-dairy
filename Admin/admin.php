<?php
//starting session if not started
if(!isset($_SESSION))
 {
     session_start();
 }
include_once('../dbconnect.php');

if(isset($_POST['admincheck']) && isset($_POST['adminlogmail']) && isset($_POST['adminlogpass']))
{
    $adminmail =$_POST['adminlogmail'];
    $adminpass =$_POST['adminlogpass'];

    $sql = "SELECT admin_mail,admin_pass FROM admin_details where admin_mail='".$adminmail."' AND admin_pass='".$adminpass."'";
    $result = $conn->query($sql); $row= $result->num_rows;
    
    if($row == 1) { 
        $_SESSION['is_admin_login']=true;
        $_SESSION['adminlogemail']=$adminmail;
        echo json_encode($row);
    } else if($row == 0) { 
        echo json_encode($row); 
    } 
} 
?>