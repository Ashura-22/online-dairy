<!-- Header Start -->
<?php
    include('./adminInclude/header.php');
    include_once('../dbconnect.php');

//adding product to db

if(isset($_REQUEST['customerSubmitbtn']))
{
    // echo "nehal";

    $cust_name = $_REQUEST['Customer_name'];
    $cust_mail = $_REQUEST['Customer_id'];
    $cust_pass = $_REQUEST['Customer_pass'];
    $cust_addr = $_REQUEST['Customer_addr'];
    
    $p_img=$_FILES['Customer_img']['name'];
    $p_img_temp=$_FILES['Customer_img']['tmp_name'];
    $img_folder ='../image/customer/'.$p_img;
    

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
    
    $sql = "INSERT INTO `cust_details` (`cust_id`, `cust_name`, `cust_mail`, `cust_pass`, `cust_addr`, `cust_img`)
    VALUES (NULL,'$cust_name', '$cust_mail', '$cust_pass', '$cust_addr','$img_folder')";
     //VALUES (NULL, '$pro_name', '$pro_desc', '$pro_type', '$pro_quan', '$pro_price', '')";
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
document.title = "<?php echo "Add Customer";?>";
</script>

<div class="container" style="margin-top: 99px; margin-bottom: 40px;">
    <div class="row">
        <!-- <div class="col-8"> -->
        <h3 class="text-center">Add Customer Details</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="customer_name">Name</label>
                <input type="text" class="form-control" id="Customer_name" name="Customer_name" required>
            </div>
            <div class="form-group">
                <label for="Customer_id">Email Id</label>
                <input type="text" class="form-control" id="Customer_id" name="Customer_id" required>
            </div>
            <div class="form-group">
                <label for="Customer_pass">Password</label>
                <input type="text" class="form-control" id="Customer_pass" name="Customer_pass" required>
            </div>
            <div class="form-group">
                <label for="Customer_addr">Address</label>
                <input type="text" class="form-control" id="Customer_addr" name="Customer_addr" required>
            </div>
            <div class="form-group">
                <br>
                <label for="Customer_img">image</label>
                <input type="file" class="form-control-file" id="Customer_img" name="Customer_img" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="customerSubmitbtn"
                    name="customerSubmitbtn">Submit</button>
                <a href="./managecust.php" class="btn btn-secondary">Close</a>
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