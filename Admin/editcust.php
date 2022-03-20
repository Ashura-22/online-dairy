<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');


    //update button onclick validation
    if(isset($_REQUEST['custupdatebtn']))
    {
        //checking for empty fields
        if((isset($_REQUEST['cust_name']) == "") || (isset($_REQUEST['cust_mail']) == "") 
        || (isset($_REQUEST['cust_pass']) == "")|| (isset($_REQUEST['cust_addr']) == "") )
        {
            $msg="<small class='alert alert-danger'>Please Fill All Details !</small>";
        }
        else
        {   
            $cust_id = $_REQUEST['cust_id'];
            $cust_name = $_REQUEST['cust_name'];
            $cust_mail = $_REQUEST['cust_mail'];
            $cust_pass = $_REQUEST['cust_pass'];
            $cust_addr = $_REQUEST['cust_addr'];

            $p_img=$_FILES['cust_img']['name'];
            $p_img_temp=$_FILES['cust_img']['tmp_name'];
            $img_folder ='../image/customer/'.$p_img;
            move_uploaded_file($p_img_temp,$img_folder);
            
            // echo"<br><br><br>";
            // echo $cust_id."<br>";
            // echo $cust_name."<br>";
            // echo $cust_mail."<br>";
            // echo $cust_pass."<br>";
            // echo $cust_addr."<br>";
            // echo $img_folder."<br>";

            $sql="UPDATE `cust_details` SET `cust_name` = '".$cust_name."', `cust_mail` = '".$cust_mail."',
             `cust_addr` = '".$cust_addr."',`cust_img` = '$img_folder' WHERE `cust_details`.`cust_id` = '".$cust_id."'";

            if($conn->query($sql) == TRUE)
            {
                $msg="<small class='alert alert-success'>Successfully Updated !</small>";
            }
            else
            {
                $msg="<small class='alert alert-danger'>Can't Update !</small>";
            }
        }
    }   
?>
<!-- Header End -->
<script>
document.title = "<?php echo "Edit Customer";?>";
</script>
<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Edit Customer Details</h3>
        <?php
            if(isset($_REQUEST['edit']))
            {
                $sql="SELECT * FROM `cust_details` WHERE `cust_id`={$_REQUEST['id']}";
                $result=$conn->query($sql);  
                $row = $result->fetch_assoc();
                //echo"yes bro";
                
            }           
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cust_id">Customer Id</label>
                <input type="text" class="form-control" name="cust_id"
                    value="<?php if(isset($row['cust_id'])){echo $row['cust_id'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="cust_name">Name</label>
                <input type="text" class="form-control" name="cust_name"
                    value="<?php if(isset($row['cust_name'])){echo $row['cust_name'];}?>" required>
            </div>
            <div class="form-group">
                <label for="cust_mail">Email</label>
                <input type="text" class="form-control" name="cust_mail"
                    value="<?php if(isset($row['cust_mail'])){echo $row['cust_mail'];}?>" required>
            </div>
            <div class="form-group">
                <label for="cust_pass">Password</label>
                <input type="text" class="form-control" name="cust_pass"
                    value="<?php if(isset($row['cust_pass'])){echo $row['cust_pass'];}?>" required>
            </div>
            <div class="form-group">
                <label for="cust_addr">Address</label>
                <input type="text" class="form-control" name="cust_addr"
                    value="<?php if(isset($row['cust_addr'])){echo $row['cust_addr'];}?>" required>
            </div>
            <div class="form-group">
                <br>
                <label for="cust_img">image</label>
                <img src="<?php if(isset($row['cust_img'])){echo $row['cust_img'];}?>" class="img-thumbnail"
                    width="200px" height="200px">
                <input type="file" class="form-control-file" name="cust_img" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" name="custupdatebtn">Update</button>
                <a href="./managecust.php" class="btn btn-secondary">Close</a>
            </div>
            <span id="statusmsg">
                <?php if(isset($msg)){echo $msg;}?>
            </span>
        </form>
    </div>
</div>

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->