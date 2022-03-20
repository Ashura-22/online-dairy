<?php
    session_start();
    include('./mainInclude/header.php');
    include_once('./dbconnect.php');

    if(!isset($_SESSION['is_login']))
    {
        echo "<script>location.href='../index.php';</script>";
    }
    else{
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    $cust_mail=$_SESSION['custlogemail'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet" />

    <!-- Custon CSS -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="container" style="margin-top: 180px;">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron" style="background-color: lightgrey;">
                <h3 class="mb-5 text-center">Welcome to Online Dairy Payment Page</h3>
                <form method="post" action="./PaytmKit/pgRedirect.php">
                    <input type="hidden" class="form-control" name="mail" value="<?php echo $cust_mail;?>">
                    <input type="hidden" class="form-control" name="proids" value="<?php echo $_POST['proids'];?>">
                    <input type="hidden" class="form-control" name="proquans" value="<?php echo $_POST['proquans'];?>">
                    <div class="form-group row" style="margin-bottom: 10px;">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
                                name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 10px;">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Customer Mail</label>
                        <div class="col-sm-8">
                            <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12"
                                name="CUST_ID" autocomplete="off"
                                value="<?php if(isset($cust_mail)){echo $cust_mail;}?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                            <input title="TXN_AMOUNT" type="text" class="form-control" name="TXN_AMOUNT"
                                autocomplete="off" value="<?php if(isset($_POST['total'])){echo $_POST['total'];}?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY TYPE ID</label> -->
                        <div class="col-sm-8">
                            <br>
                            <input type="hidden" class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12"
                                size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="CHANNEL_ID" class="col-sm-4 col-form-label">CHANNEL ID</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="4" maxlength="12"
                                size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 10px;">
                        <input type="submit" value="Checkout" class="btn btn-primary" onclick="">
                        <a href="./cart.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
                <small class="form-text text-muted">Note: Complete payment by Clicking Checkout Button</small>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    }
?>