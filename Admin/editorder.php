<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');


    //update button onclick validation
    if(isset($_REQUEST['orderupdatebtn']))
    {   
        //echo "but";
        //$msg="<small class='alert alert-danger'>No bri!</small>";
        //checking for empty fields   
            //$po_id=$_REQUEST['editid'];
            //$o_id = $_REQUEST['order_id'];
            //$mail = $_REQUEST['cust_mail'];
            $po_id= $_REQUEST['po_id'];
            $del_stat = $_REQUEST['del_status'];
            //$date = $_REQUEST['date'];
            
            echo $del_stat;
            echo $po_id;
            $sql="UPDATE `order_details` SET `delivery_status` = '".$del_stat."' WHERE `order_details`.`po_id` ='".$po_id."'";

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
document.title = "<?php echo "Edit Order";?>";
</script>
<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Edit Order</h3>
        <?php
            if(isset($_REQUEST['edit']))
            {
                $sql="SELECT * FROM `order_details` WHERE `po_id`={$_REQUEST['editid']}";
                $po_id=$_REQUEST['editid'];
                //echo $po_id;
                $result=$conn->query($sql);
                $row = $result->fetch_assoc();
                //echo"yes bro";
                
            }
            // else
            // {
            //     echo"No bro";
            // }
            
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="po_id">Product Order Id</label>
                <input type="text" class="form-control" name="po_id"
                    value="<?php if(isset($row['po_id'])){echo $row['po_id'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="order_id">Order Id</label>
                <input type="text" class="form-control" name="order_id"
                    value="<?php if(isset($row['order_id'])){echo $row['order_id'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="cust_mail">Customer mail</label>
                <input type="text" class="form-control" name="cust_mail" value="<?php if(isset($row['cust_mail'])){echo $row['cust_mail'];}?>
                " readonly>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status"
                    value="<?php if(isset($row['status'])){echo $row['status'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" name="amount"
                    value="<?php if(isset($row['amount'])){echo $row['amount'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="del_status">Delivery Status</label>
                <input type="text" class="form-control" name="del_status"
                    value="<?php if(isset($row['delivery_status'])){echo $row['delivery_status'];}?>" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" name="date"
                    value="<?php if(isset($row['order_date'])){echo $row['order_date'];}?>" readonly>
            </div>
            <div class="text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-danger" name="orderupdatebtn">Update</button>
                <a href="./manageorder.php" class="btn btn-secondary">Close</a>
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