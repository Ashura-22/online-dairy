<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');

//adding product to db

if(isset($_REQUEST['productSubmitbtn']))
{
    // echo "nehal";

    $pro_name = $_REQUEST['product_name'];
    $pro_desc = $_REQUEST['product_desc'];
    $pro_type = $_REQUEST['product_type'];
    $pro_quan = $_REQUEST['product_quan'];
    $pro_price = $_REQUEST['product_price'];
    
    $p_img=$_FILES['product_img']['name'];
    $p_img_temp=$_FILES['product_img']['tmp_name'];
    $img_folder ='../image/product/'.$p_img;
    

    move_uploaded_file($p_img_temp,$img_folder);
    
   
    // echo $pro_name.'<br>';
    // echo $pro_desc.'<br>';
    // echo $pro_type.'<br>';
    // echo $pro_quan.'<br>';
    // echo $pro_price.'<br>';
    // echo $img_folder.'<br>';
    
    // if (move_uploaded_file($p_img_temp,$img_folder)) {
    //     echo "Uploaded";
    // } else {
    //    echo "File not uploaded";
    // }
    
    $sql = "INSERT INTO `product_details` (`pro_id`, `pro_name`, `pro_desc`, `pro_type`, `pro_quan`, `pro_price`, `pro_img`)
     VALUES (NULL, '$pro_name', '$pro_desc', '$pro_type', '$pro_quan', '$pro_price', '$img_folder')";
    // INSERT INTO `product_details` (`pro_id`, `pro_name`, `pro_desc`, `pro_type`, `pro_quan`, `pro_price`, `pro_img`) VALUES (NULL, '', '', '', '', '', '')

    if($conn->query($sql) == TRUE)
    {
        $msg="<small class='alert alert-success'>Successfully Added !</small>";
    }
    else
    {
        $msg="<small class='alert alert-danger'>Unable to Add !</small>";
    }
}
?>
<!-- Header End -->

<script>
document.title = "<?php echo "Add Product";?>";
</script>

<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Add New Product</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Description</label>
                <textarea rows="2" class="form-control" id="product_desc" name="product_desc" required></textarea>
            </div>
            <div class="form-group">
                <label for="product_name">Product Type</label>
                <input type="text" class="form-control" id="product_type" name="product_type" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Quantity</label>
                <input type="text" class="form-control" id="product_quan" name="product_quan" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <br>
                <label for="product_name">Product image</label>
                <input type="file" class="form-control-file" id="product_img" name="product_img" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="productSubmitbtn"
                    name="productSubmitbtn">Submit</button>
                <a href="./manageproduct.php" class="btn btn-secondary">Close</a>
            </div>
            <span id="statusmsg">
                <?php 
                if(isset($msg))
                {
                    echo $msg;
                }
            ?>
            </span>
        </form>
    </div>
</div>
<h1><br><br><br><br></h1>

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->