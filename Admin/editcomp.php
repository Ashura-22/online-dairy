<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');


    //update button onclick validation
    if(isset($_REQUEST['compupdatebtn']))
    {   
        $c_id= $_REQUEST['c_id'];
        $c_status= $_REQUEST['status'];

        // echo $c_id.' '.$c_status;
        // echo "hii";

            $sql = "UPDATE `complaint_details` SET `c_status` = '$c_status' WHERE `complaint_details`.`c_id` = '$c_id'";
            if($conn->query($sql) == TRUE)
            {
                $msg="<small class='alert alert-success'>Successfully Updated !</small>";
            }
            else
            {
                $msg="<small class='alert alert-danger'>Can't Update !</small>";
            }      
    }       
?>
<!-- Header End -->
<script>
document.title = "<?php echo "Edit Complaint";?>";
</script>
<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Update Complaint Status</h3>
        <?php
            if(isset($_REQUEST['edit']))
            {
                $sql="SELECT * FROM `complaint_details` WHERE `c_id`={$_REQUEST['editid']}";
                $c_id=$_REQUEST['editid'];
                //echo $po_id;
                $result=$conn->query($sql);
                $row = $result->fetch_assoc();
                //echo"yes bro";
                $sql="SELECT `cust_mail` FROM `cust_details` WHERE `cust_id`='".$row['cust_id']."'";
                $res=$conn->query($sql);
                $r=$res->fetch_assoc();
            }
            // else
            // {
            //     echo"No bro";
            // }
            
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="c_id">Complaint Id</label>
                <input type="text" class="form-control" name="c_id"
                    value="<?php if(isset($row['c_id'])){echo $row['c_id'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="cust_mail">Customer mail</label>
                <input type="text" class="form-control" name="cust_mail" value="<?php if(isset($r['cust_mail'])){echo $r['cust_mail'];}?>
                " readonly>
            </div>
            <div class="form-group">
                <label for="c_content">Complaint</label>
                <input type="text" class="form-control" name="c_content" value="<?php if(isset($row['c_content'])){echo $row['c_content'];}?>
                " readonly>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status"
                    value="<?php if(isset($row['c_status'])){echo $row['c_status'];}?>">
            </div>
            <div class="text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-danger" name="compupdatebtn">Update</button>
                <a href="./managecp.php" class="btn btn-secondary">Close</a>
            </div>
            <span id="statusmsg"><?php if(isset($msg)){echo $msg;}
            ?>
            </span>
        </form>
    </div>
</div>

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->