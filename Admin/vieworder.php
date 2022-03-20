<!-- Start Header -->
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
?>
<!-- End Header -->


<!-- Start View product -->
<div class="container" style="margin-top: 100px; margin-bottom: 30px;">
    <h1 class="text-center navbar1-brand">Order Details</h1>
    <script>
    document.title = "<?php echo "Order Details";?>";
    </script>
    <?php
        $poid=$_POST['viewid'];
        // echo $poid;
        // echo "yes";

        $sql="SELECT * FROM `order_details` WHERE `po_id`='".$poid."'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        $pids=$row['proids'];
        $pquans=$row['proquans'];

        //echo $pids.' '.$pquans;

        //fetching product ids of product through string 
		preg_match_all('!\d+!', $pids, $matches);
		// $n=strlen($pids);
        // echo $n;
		$id=$matches;
		// echo"<br>";
		// for($i=0;$i<$n;$i++)
		// {
		// 	echo $id[0][$i].' ';
		// }
		//fetching quantities of product through string
        preg_match_all('!\d+!', $pquans, $matches);
		//$n=strlen($pquans);
        //echo "bb".$n;
		$qu=$matches;
		//echo"<br>";
        
		// for($i=0;$i<$n;$i++)
		// {
		// 	if($qu[0][$i]>0);
        //         {$cnt++;}
		// }
        
        $cnt=sizeof($qu[0]);
        $a=1;
        //echo 'kjkm'.$cnt;
        for($i=0;$i<$cnt;$i++)
		{
            $sql="SELECT * FROM `product_details` WHERE `pro_id`='".$id[0][$i]."'";

            $res=$conn->query($sql);

            $r=$res->fetch_assoc();
            $pro_id=$r['pro_id'];
            $pro_name=$r['pro_name'];
            $pro_price=$r['pro_price'];
            $req_q=$qu[0][$i];
            $pro_img=$r['pro_img'];
            $img= str_replace('..','..',$pro_img);
            $pro_type=$r['pro_type'];
		?>
    <br>
    <?php if($a==1){?>
    <div class="row" style="margin-top: 0px;">
        <p style="margin-left: 5px; font-weight: bold">Order Id: <?php echo $row['order_id']?><br>Customer mail:
            <?php echo $row['cust_mail']?><br>Total Amount:
            Rs.<?php echo $row['amount']?><br>No. of Products in Order: <?php echo $cnt;?><br>Status:
            <?php if(strcmp($row['status'],"TXN_SUCCESS")==0){echo"Paid";} else{echo "Unpaid";}?><br>
            Delivery Status: <?php echo $row['delivery_status']?>
            <br>Order Date: <?php echo $row['order_date']?>
        </p>
        <h3 class="text-center navbar1-brand" style="margin-bottom: 50px;">List Of Products</h3>
    </div>
    <?php $a=0;}?>
    <div class="row">
        <div class="col-4">
            <div class="row">
                <a href="productdetails.php?pro_id=<?php echo $pro_id;?>">
                    <img class="" src="<?php echo $img?>" alt="Sample" width="320px" height="250px">
                </a>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <p style="margin-left: 5px; font-weight: bold">Product Name:<?php echo $pro_name?><br>Requested
                    Quantity:<?php echo $req_q?><br>Product
                    Price:<?php echo $pro_price?><br></p>
            </div>
        </div>
    </div>

    <?php 
        }
        ?>
    <div class="text-center">
        <a href="./manageorder.php" class="btn btn-danger">Back</a>
    </div>
</div>

<!-- End View product -->
<?php
    }
?>

<!-- Start Footer -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- End Footer -->