<!-- Start Header -->
<?php
    session_start();
    include('./mainInclude/header.php');
    include_once('./dbconnect.php');
   
?>
<!-- End Header -->

<?php
//validation and checking product stock available or not and adding product to cart
    if(isset($_SESSION['is_login']))
    {   
        $flag=1;
        $cust_mail=$_SESSION['custlogemail'];
        if(isset($_POST['addtocartbtn']))
        {   
            $quan=$_POST['quantity'];
            $pro_id=$_POST['pro_id'];
            
            if($quan>=1)
            {
                $sql="SELECT * FROM `product_details` WHERE `pro_id`='".$pro_id."'";
                $result=$conn->query($sql);
                $n=$result->num_rows;
                $row=$result->fetch_assoc();
                $stock=$row['pro_quan'];

                if($n == 1)    
                {   
                    
                    // echo"<br><br>"."$stock";
                    // echo"$quann";
                    //$nsg ="first";
                    $sql="SELECT * FROM `cart_details` WHERE `pro_id`='".$pro_id."' AND `cust_mail`='".$cust_mail."'";
                    $result=$conn->query($sql);
                    $r=$result->num_rows;
                    
                    if($r == 1)
                    {   
                        $row=$result->fetch_assoc();
                        $tq=$row['quantity'];
                        $cartid=$row['cart_id'];
                        $quan=$quan+$tq;
                        
                        if($stock>=$quan)
                        {
                            $sql = "UPDATE `cart_details` SET `quantity` ='".$quan."' WHERE `cart_details`.`cart_id` ='".$cartid."'";
                            
                            if($conn->query($sql))
                            {
                                $statusmsg='<small style="color:green; font-weight:bold;">Added To Cart</small>';
                            }
                            else
                            {
                                $statusmsg='<small style="color:red; font-weight:bold;">Unable To Cart</small>';
                            }
                        }
                        else
                        {
                            $statusmsg='<small style="color:red; font-weight:bold;">Unable to Add !<br>Quantity is greater than Available quantity</small>';
                        }
                    }
                    else if($r == 0)
                    {
                        if($stock>=$quan)
                        {
                            $sql="INSERT INTO `cart_details` (`cart_id`, `pro_id`, `cust_mail`, `quantity`) VALUES (NULL, '".$pro_id."', '".$cust_mail."', '".$quan."')";
                            //INSERT INTO `cart_details` (`cart_id`, `pro_id`, `cust_id`, `quantity`, `total`) VALUES (NULL, '56', '100', '2', '500') 
                            $res=$conn->query($sql);
                                
                            if($res == TRUE)
                            {
                                $statusmsg='<small style="color:green; font-weight:bold;">Added To Cart</small>';
                            }
                            else
                            {
                                $statusmsg='<small style="color:red; font-weight:bold;">Unable to Add !</small>';
                            }
                        }
                        else
                        {
                            $statusmsg='<small style="color:red; font-weight:bold;">Unable to Add !<br>Quantity is greater than Available quantity</small>';
                        }
                    }
                }
            }
            else
            { 
                $statusmsg='<small style="color:red; font-weight:bold;">Quantity Should be greater than one!<br></small>';
            }
        }
    }
    else
    {
        $statusmsg='<small style="color:red; font-weight:bold;">Login First !</small>';
        $flag=0;
    }
?>
<!-- Start Product Details -->
<div class="small-container product">
    <div class=""><span id="nsg"><?php if(isset($nsg)){echo $nsg;} ?></span></div>
    <?php 
    if(isset($_GET['pro_id']))
    {

        $pro_id=$_GET['pro_id'];
        $sql = "SELECT * FROM `product_details` WHERE pro_id='".$pro_id."'";
        //$sql = "SELECT * FROM `product_details` WHERE pro_id=\"26\"";
        
        $result=$conn->query($sql);
        //echo "hii";
        $row=$result->fetch_assoc();
        $proimg=$row['pro_img'];
        $img= str_replace('..','.',$proimg);
        $protype=$row['pro_type'];
    }
    else if(isset($_POST['pro_id']))
    {
        $pro_id=$_POST['pro_id'];
        $sql = "SELECT * FROM `product_details` WHERE pro_id='".$pro_id."'";
        //$sql = "SELECT * FROM `product_details` WHERE pro_id=\"26\"";
        
        $result=$conn->query($sql);
        //echo "hii";
        $row=$result->fetch_assoc();
        $proimg=$row['pro_img'];
        $img= str_replace('..','.',$proimg);
        $protype=$row['pro_type'];
    }
?>

    <div class="row">
        <div class="col-6" style="margin-top: 0px;">
            <img src="<?php echo $img ?>" width=80% height="80%"
                alt="<?php $sc=strtolower($protype); $sc=ucfirst($sc); echo $sc;?>"
                style="margin-left: 35px; margin-top:30px" />
        </div>
        <div class="col-6" style="margin-top: 25px;">
            <!-- <br><br><br><br> -->
            <form action="" method="POST">
                <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id; ?>">
                <small>Type/<?php $sc=strtolower($protype); $sc=ucfirst($sc); echo $sc;?></small>
                <p class="navbar1-brand"><?php echo $row['pro_name']?></p>
                <h3>MRP:Rs <?php echo $row['pro_price']?></h3>
                <br>
                <script>
                document.title = "<?php echo $row['pro_name'];?>";
                </script>
                <input class="inputc" type="number" value="1" min="1" max="<?php echo $stock;?>" name="quantity">
                <!-- here i have added modal so that when customer is not logged but try to add product to cart login modal will pop-up-->
                <button class="btn btn-outline-warning" name="addtocartbtn">Add to Cart
                    <!-- <a href="#" style="text-decoration:none; color:green;"data-toggle=""data-target=""></a> -->
                </button>
                <br>
                <div style="color:green;">
                    <span id="statusmsg"><?php if(isset($statusmsg)) {echo $statusmsg; }?></span>
                </div>
                <h4 style="margin-left: 5px; font-weight: bold;"><br>Product Details</h4>
                <p style="margin-left: 15px;">Product Name: <?php echo $row['pro_name']?>
                    <br>Description: <?php echo $row['pro_desc']?>
                    <!-- <br>Packing: Poly Pack – 500ml, 5 Ltr * (*in selected cities only) -->
                </p>
            </form>
        </div>
    </div>
</div>

<div class="pro1 text-center-m2" style="margin-top: 0px; margin-bottom:50px;">
    <h2>Related Products</h2>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php 
                    $sql = "SELECT * FROM `product_details` WHERE pro_type='".$protype."' LIMIT 4";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $pid=$row['pro_id'];
                            $pname=$row['pro_name'];
                            $pdesc=$row['pro_desc'];
                            $pprice=$row['pro_price'];
                            $pimg=$row['pro_img'];
                            $piomg= str_replace('..','.',$pimg);
                        
                    ?>

        <div class="col">
            <div class="card" style="width: 18rem;">
                <a href="./productdetails.php?pro_id=<?php echo $pid?>" class="btn"
                    style="text-align:left; padding:0px; margin:0px;">
                    <div class="card" style="border-width: 0px;">
                        <img src="<?php echo $piomg ?>" class="card-img-top" alt="milk" width="200px" height="250px" />
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: Itim, cursive;"><?php echo $pname?></h5>
                            <p><?php echo $pdesc?></p>
                        </div>
                        <div div class="card-footer">
                            <p class="card-text d-inline">Price:
                                <!-- <small><del>&#8377 3000</del></small> -->
                                <span class="font-weight-bolder">&#8377 <?php echo $pprice?></span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </p>
                            <a href="./productdetails.php?pro_id=<?php echo $pid?>"
                                class="btn btn-primary text-white font-weight-bolder float-right"
                                style="font-family: Itim, cursive;">Buy Now</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php   
            }
        }
        ?>
    </div>
</div>
<!-- End Product Details -->
<br><br><br>



<!-- Start Header -->
<?php
    include('./mainInclude/footer.php');
?>
<!-- End Header -->