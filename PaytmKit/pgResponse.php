<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

include('../dbconnect.php');
session_start();

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//echo $_POST['mailid'];
		echo "<br>";
		// $pid=$_POST['proids'];
		// $pquan=$_POST['proquans'];
		// echo $pid." ".$pquan;
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT']))
		{
			$order_id=$_POST['ORDERID'];
			$cust_mail=$_GET['mail'];
			// echo "<br>";
			$pid=$_GET['pid'];
			$pquan=$_GET['pquan'];
			// echo $pid." || ".$pquan;
			// echo "<br>";
			$status=$_POST['STATUS'];
			$amt=$_POST['TXNAMOUNT'];
			$date=$_POST['TXNDATE'];
			$delivery_stat="TRANSIT";

			//fetching product ids of product through string 
			preg_match_all('!\d+!', $pid, $matches);
			$n=strlen($pid);
			$id=$matches;
			// echo"<br>";
			// for($i=0;$i<$n;$i++)
			// {
			// 	echo $id[0][$i].' ';
			// }
			//fetching quantities of product through string
			preg_match_all('!\d+!', $pquan, $matches);
			$n=strlen($pquan);
			$qu=$matches;
			// echo"<br>";
			// for($i=0;$i<$n;$i++)
			// {
			// 	echo $qu[0][$i].' ';
			// }

			if($status=="TXN_SUCCESS")
			{
				$sql="DELETE FROM `cart_details` WHERE `cust_mail`='".$cust_mail."'";
				$conn->query($sql);

				for($i=0;$i<$n;$i++)
				{	
					$sql="SELECT `pro_quan` FROM `product_details` WHERE `pro_id` ='".$id[0][$i]."' ";
					$res=$conn->query($sql);
					$row=$res->fetch_assoc();
					$nq=$row['pro_quan']-$qu[0][$i];
					$sql="UPDATE `product_details` SET `pro_quan` = '".$nq."' WHERE `product_details`.`pro_id` ='".$id[0][$i]."'";
					$conn->query($sql);
				}

				$sql="INSERT INTO `order_details` (`po_id`, `order_id`, `cust_mail`,`proids`,`proquans`, `status`, `amount`, `delivery_status`, `order_date`)
				VALUES (NULL, '$order_id', '$cust_mail', '$pid', '$pquan', '$status', '$amt', '$delivery_stat', '$date')";
			
				if($conn->query($sql)== TRUE)
				{
					echo "Redirecting to My Orders...";
					echo "<script> setTimeout(() => {
						window.location.href='../Customer/myorder.php';
					}, 1000); </script>";
				}
			}
			else{echo "issue";}
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		echo "Redirecting to My Cart...";
		echo "<script> setTimeout(() => {
			window.location.href='../cart.php';
			}, 1000); </script>";
		}

	if (isset($_POST) && count($_POST)>0 )
	{
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}


?>