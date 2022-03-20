<?php
    session_start();
    include('./mainInclude/header.php');
    include_once('./dbconnect.php');

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['id'];
        $mail=$_REQUEST['mail'];
        echo "<br>".$id."  ".$mail."<br>";
        $sql="DELETE FROM `cart_details` WHERE `cust_mail`='".$mail."' AND `pro_id`='".$id."'";
                               
        if($conn->query($sql) == TRUE)
        {
            $statusmsg="Succesfully Deleted Data";
            echo '<meta http-equiv="refresh" content="0;cart.php?deleted"/>';
        }
        else
        {
            $statusmsg="Unable To Delete Data";
        }
    }

    if(isset($_SESSION['is_login']))
    {
        
        $cnt=0;
        $total=0;
        $cust_mail=$_SESSION['custlogemail'];
        $sql="SELECT * FROM `cart_details` WHERE `cust_mail`='".$cust_mail."'";
        $result=$conn->query($sql);
        //echo $cust_mail;
        if($result->num_rows>0)
        {
            //echo "hiii";
            
            

          ?>

<!--Section: Block Content-->
<section style="margin-bottom: 50px;">
    <div class="container" style="margin-top: 100px;">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8">

                <!-- Card -->
                <div class="mb-3 d-print-none">
                    <div class="pt-4 wish-list">
                        <!-- <h5 class="mb-4">Cart (<span><?php echo $cnt;?></span> items)</h5> -->

                        <?php     
                while($row=$result->fetch_assoc())
                {
                //echo "noooo";
                $pro_id=$row['pro_id'];
                $cartid=$row['cart_id'];
                $quann=$row['quantity'];
                //echo "$pro_id";
                $cnt++;
                $sql="SELECT * FROM `product_details` WHERE `pro_id`='".$pro_id."'";
                if($rr=$conn->query($sql))
                {
                    //echo "tes";
                    $rew=$rr->fetch_assoc();
                    $proid=$rew['pro_id'];
                    $proname=$rew['pro_name'];
                    $prodesc=$rew['pro_desc'];
                    $proprice=$rew['pro_price'];
                    $proimg=$rew['pro_img'];
                    $proquan=$rew['pro_quan'];
                    $img= str_replace('..','.',$proimg);
                    
                    $total=$total+$quann*$proprice;
                    // echo "<br>".$proid." ";
                    // echo " ".$proname." ";
                    // echo " ".$prodesc." ";
                    // echo " ".$proprice." ";
                    // echo " ".$img."<br>";
                    
                    ?>


                        <div class="row mb-4" style="margin-right: 5px;">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <a href="productdetails.php?pro_id=<?php echo $pro_id;?>"><img
                                            class="img-fluid w-100" src="<?php echo $img;?>" alt="Sample"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><?php echo $proname;?></h5>
                                            <!-- <p class="mb-3 text-muted text-uppercase small"></p> -->
                                            <!-- <p class="mb-2 text-muted text-uppercase small">Color: blue</p>
                                            <p class="mb-3 text-muted text-uppercase small">Size: M</p> -->
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100"
                                                style="margin-left: 8px;">
                                                <p style="font-weight: bold;">Requested quantity: <?php echo $quann;?>
                                                </p>
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted mb-0 w-100"
                                                style="margin-left: 45px !important;">
                                                Available quantity:<?php echo $proquan;?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center"
                                        style="margin-right: 5px !important;">
                                        <div>
                                            <input type="hidden" name="mail" value="<?php echo $cust_mail?>">
                                            <input type="hidden" name="id" value="<?php echo $pro_id?>">

                                            <form action="" method="POST" class="d-inline">
                                                <input type="hidden" name="mail" value="<?php echo $cust_mail?>">
                                                <input type="hidden" name="id" value="<?php echo $pro_id?>">
                                                <button type="submit" class="btn btn-secondary" name="delete">
                                                    <i class="fas fa-trash-alt mr-1"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <p class="mb-0">
                                            <span>
                                                <strong id="summary">Price:Rs.<?php echo $proprice;?></strong>
                                            </span>
                                        </p class="mb-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">


                        <?php 
                }
            }
                    ?>


                        <p class="text-primary mb-0" style="margin-top: 20px;"><i class="fas fa-info-circle mr-1"></i>
                            Do not delay the purchase,
                            adding
                            items to your cart does not mean booking them.</p>

                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="mb-3 d-print-none">
                    <div class="pt-4">

                        <h5 class="mb-4">We accept

                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                alt="Visa">
                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                alt="American Express">
                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                alt="Mastercard">
                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                                alt="PayPal acceptance mark">
                        </h5>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">
                <script>
                document.title = "<?php echo"Cart(".$cnt.")";?>";
                </script>
                <!-- Card -->
                <div class="mb-3" style="margin-left: 20px;">
                    <div class="pt-4">

                        <h5 class="mb-3 text-center d-print-none" style="font-weight: bold;">Cart Summary</h5>
                        <h5 class="mb-3 text-center" style="font-weight: bold;">Receipt</h5>
                        <ul class="list-group list-group-flush">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $sql="SELECT * FROM `cart_details` WHERE `cust_mail`='".$cust_mail."'";
                            $result=$conn->query($sql);
                            //echo $cust_mail;
                            if($result->num_rows>0)
                            {
                                $i=0;
                                while($row=$result->fetch_assoc())
                                {
                                    //echo "noooo";
                                    $pro_id=$row['pro_id'];
                                    $cartid=$row['cart_id'];
                                    $quann=$row['quantity'];
                                    //echo "$pro_id";
                                    $cnt++;

                                    $sql="SELECT * FROM `product_details` WHERE `pro_id`='".$pro_id."'";
                                    if($rr=$conn->query($sql))
                                    {
                                        //echo "tes";
                                        $rew=$rr->fetch_assoc();
                                        $proid=$rew['pro_id'];
                                        $proname=$rew['pro_name'];
                                        $proprice=$rew['pro_price'];
                            ?>
                                    <tr>
                                        <td><?php echo $proname;?></td>
                                        <td class="text-center"><?php echo $quann;?></td>
                                        <td class="text-center"><?php echo $proprice;?></td>
                                        <?php 
                                    }
                                }
                            }
                                ?>

                                </tbody>
                            </table>
                            <hr>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                <strong>Product total amount</strong>
                                <span>Rs. <?php echo $total;?></span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <strong>Shipping</strong>
                                <span>Rs.
                                    <?php if($total>500) { $f=0;echo "0";} else { $f=1; echo "50";}?></span>

                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">

                                <div>
                                    <strong>Total Amount</strong>
                                    <strong>
                                        <p class="mb-0">(including GST)</p>
                                    </strong>
                                </div>
                                <span><strong>Rs.
                                        <?php if($f=1 && $total < 500){$total=$total+50;echo $total;} else{echo $total;}?></strong></span>
                            </li>
                        </ul>
                        <!-- <span id="statusmsg"><?php if(isset($statusmsg)) {echo $statusmsg; }?></span> -->
                        <!-- <form action="" class="d-print-none">
                            <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()"
                                style="margin-left:160px">
                        </form> -->
                        <br><br>

                        <form action="./checkout.php" method="POST" class="d-print-none">
                            <!-- this below php code is for taking product id and quantity into string and passing values to response page -->
                            <?php 
                            $sql="SELECT * FROM `cart_details` WHERE `cust_mail`='".$cust_mail."'";
                            $result=$conn->query($sql);
                            
                            if($result->num_rows>0)
                            {
                                $i=0;
                                while($row=$result->fetch_assoc())
                                {
                                    $pid=$row['pro_id'];
                                    $pq=$row['quantity'];
                                    if($i<$cnt)
                                    {   
                                        if($i==0)
                                        {
                                            $id=$id."".$pid;
                                            $qu=$qu."".$pq;
                                        }
                                        else
                                        {
                                            $id=$id.",".$pid;
                                            $qu=$qu.",".$pq;
                                        }
                                    }
                                    $i++;
                                }
                            }
                            //echo $id."<br>".$qu;
                        ?>

                            <input type="hidden" name="total" value="<?php echo $total;?>">
                            <!-- <a href="./checkout.php"> -->
                            <input type="hidden" name="proids" value="<?php echo $id;?>">
                            <input type="hidden" name="proquans" value="<?php echo $qu;?>">
                            <button type="submit" class="btn btn-danger btn-block" name="checkoutbtn" id="checkoutbtn"
                                style="margin-left: 143px;">Checkout</button>
                            <!-- </a> -->
                        </form>
                    </div>
                </div>

                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!-- Grid row -->
    </div>
</section>
<!--Section: Block Content-->
<?php  
        }
        else
        {
            echo'<div class="container text-center navbar1-brand" style="margin-top:150px;margin-bottom:150px">
<h1>No Product Added To Cart</h1>
<a href="./product.php" style="text-decoration: none;">Add Some Product : )</a>
            </div>';
        }
    }
    else
    {   
        echo "<script>location.href='../index.php';</script>";
    }
?>





<!-- Start Footer -->
<?php
    include('./mainInclude/footer.php');
?>
<!-- End Footer -->