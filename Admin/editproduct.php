<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');


    //update button onclick validation
    if(isset($_REQUEST['productupdatebtn']))
    {   
        $msg="<small class='alert alert-danger'>No bri!</small>";
        //checking for empty fields
        if((isset($_REQUEST['product_name']) == "") || (isset($_REQUEST['product_desc']) == "") 
        || (isset($_REQUEST['product_type']) == "")|| (isset($_REQUEST['product_quan']) == "") 
        || (isset($_REQUEST['product_price']) == ""))
        {
            $msg="<small class='alert alert-danger'>Please Fill All Details !</small>";
        }
        else
        {   
            $pro_id = $_REQUEST['product_id'];
            $pro_name = $_REQUEST['product_name'];
            $pro_desc = $_REQUEST['product_desc'];
            $pro_type = $_REQUEST['product_type'];
            $pro_quan = $_REQUEST['product_quan'];
            $pro_price = $_REQUEST['product_price'];

            $p_img=$_FILES['product_img']['name'];
            $p_img_temp=$_FILES['product_img']['tmp_name'];
            $img_folder ='../image/product/'.$p_img;
            move_uploaded_file($p_img_temp,$img_folder);
            
            // echo"<br><br><br>";
            // echo $pro_id."<br>";
            // echo $pro_name."<br>";
            // echo $pro_desc."<br>";
            // echo $pro_type."<br>";
            // echo $pro_quan."<br>";
            // echo $pro_price."<br>";
            // echo $img_folder."<br>";
            $sql="UPDATE `product_details` SET `pro_name` = '".$pro_name."', `pro_desc` = '".$pro_desc."',
             `pro_type` = '".$pro_type."', `pro_quan` = '".$pro_quan."', `pro_price` = '".$pro_price."',
              `pro_img` = '".$img_folder."' WHERE `product_details`.`pro_id` = '".$pro_id."'";
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
document.title = "<?php echo "Edit Product";?>";
</script>
<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Edit Product</h3>
        <?php
            if(isset($_REQUEST['edit']))
            {
                $sql="SELECT * FROM `product_details` WHERE `pro_id`={$_REQUEST['editid']}";
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
                <label for="product_id">Product Id</label>
                <input type="text" class="form-control" name="product_id"
                    value="<?php if(isset($row['pro_id'])){echo $row['pro_id'];}?>" readonly>
            </div>
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="<?php if(isset($row['pro_name'])){echo $row['pro_name'];}?>
                " required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Description</label>
                <textarea rows="2" class="form-control" name="product_desc"
                    required><?php if(isset($row['pro_desc'])){echo $row['pro_desc'];}?></textarea>
            </div>
            <div class="form-group">
                <label for="product_name">Product Type</label>
                <input type="text" class="form-control" name="product_type"
                    value="<?php if(isset($row['pro_type'])){echo $row['pro_type'];}?>" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Quantity</label>
                <input type="text" class="form-control" name="product_quan" value="<?php if(isset($row['pro_quan'])){echo $row['pro_quan'];}?>
                " required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Price</label>
                <input type="text" class="form-control" name="product_price"
                    value="<?php if(isset($row['pro_price'])){echo $row['pro_price'];}?>" required>
            </div>
            <div class="form-group">
                <br>
                <label for="product_name">Product image</label>
                <img src="<?php if(isset($row['pro_img'])){echo $row['pro_img'];}?>" class="img-thumbnail"
                    height="200px" width="200px">
                <input type="file" class="form-control-file" name="product_img" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" name="productupdatebtn">Update</button>
                <a href="./manageproduct.php" class="btn btn-secondary">Close</a>
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