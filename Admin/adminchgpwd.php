<!-- Header Start -->
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');

    if(isset($_SESSION['is_admin_login']))
    {
        $admin_mail=$_SESSION['adminlogemail'];
        
    }else
    {
        echo "<script> location.href='../index.php';</script>";
    }
    
    $admin_mail=$_SESSION['adminlogemail'];
    if(isset($_REQUEST['admupdatepassbtn']))
    {
        $sql = "SELECT * FROM admin_details where admin_mail='".$admin_mail."'";
        //echo "<br><br><br><br><br><br>hiii";
        $result = $conn->query($sql); 
        $row= $result->num_rows;
        //echo "<br><br><br><br><br><br>".$row;
        //$msg="<small class='alert alert-success'>'".$row."'</small>";
        if($row == 1)
        {
            $admin_pass=$_REQUEST['adminpass'];
            //echo $admin_pass."<br>";
            // $adminmail=$_REQUEST['adminmail'];
            // echo $admin_mail."<br>";
            $sql ="UPDATE `admin_details` SET `admin_pass` = '".$admin_pass."' WHERE `admin_details`.`admin_mail` = '".$admin_mail."'";
            
            if($conn->query($sql))
            {
                $msg="<small class='alert alert-success'>Successfully Updated !</small>";
            }
            else
            {
                $msg="<small class='alert alert-danger'>Unable to Update !</small>";
            }
        }
    }
    // else
    // {
    //     echo "<br><br><br><br><br><br>nooooo";
    // }
?>
<!-- Header End -->
<script>
document.title = "<?php echo"Change Password";?>";
</script>
<!-- Change Password Start -->
<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="mt-5 mx-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="admin_mail">Email</label>
                        <input type="text" class="form-control" value="<?php {echo $admin_mail;}?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="newadminpass">Password</label>
                        <input type="text" class="form-control" name="adminpass" id="ipnewpass"
                            placeholder="New Password" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger" name="admupdatepassbtn">Update</button>
                    <a href="./admindashboard.php" class="btn btn-secondary">Close</a>
                </form>
            </div><br>
            <span id="statusmsg" style="margin-left: 20px;">
                <?php if(isset($msg)){echo $msg;}?>
            </span>
        </div>

    </div>
</div>
<!-- Change Password End -->

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->