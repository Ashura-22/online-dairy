<!-- Header Start -->
<?php
    include('./custinclude/header.php');
    
    if(isset($_REQUEST['custupdatepassbtn']))
    {
        $sql = "SELECT * FROM cust_details where cust_mail='".$cust_mail."'";
        //echo "<br><br><br><br><br><br>hiii";
        $result = $conn->query($sql); 
        $row= $result->num_rows;
        //echo "<br><br><br><br><br><br>".$row;
        //$msg="<small class='alert alert-success'>'".$row."'</small>";
        if($row == 1)
        {
            $cust_pass=$_REQUEST['custpass'];
            //echo $admin_pass."<br>";
            // $adminmail=$_REQUEST['adminmail'];
            // echo $admin_mail."<br>";
            $sql ="UPDATE `cust_details` SET `cust_pass` = '".$cust_pass."' WHERE `cust_details`.`cust_mail` = '".$cust_mail."'";
            
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

<!-- Change Password Start -->
<div class="col-sm-9 mt-5">
    <script>
    document.title = "<?php echo "Change Password";?>";
    </script>
    <div class="row">
        <div class="col-sm-6">
            <div class="mt-5 mx-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cust_mail">Email</label>
                        <input type="text" class="form-control" value="<?php {echo $cust_mail;}?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="newcustpass">Password</label>
                        <input type="text" class="form-control" name="custpass" id="ipnewpass"
                            placeholder="New Password" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger" name="custupdatepassbtn">Update</button>
                    <a href="./custmyprofile.php" class="btn btn-secondary">Close</a>
                </form>
            </div><br>
            <span id="statusmsg" style="margin-left: 20px;">
                <?php if(isset($msg)){echo "<br>".$msg."<br>";}?>
            </span>
        </div>
        <br><br>
    </div>
</div>
<!-- Change Password End -->

<!-- Footer Start -->
<?php
    include('../mainInclude/footer.php');
?>
<!-- Footer End -->