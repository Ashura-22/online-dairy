<!-- Header Start -->
<?php 
    include('./custinclude/header.php');

    $sql ="SELECT * FROM `cust_details` WHERE cust_mail='".$cust_mail."'";
    $result= $conn->query($sql);
    if($result->num_rows == 1)
    {
        $row=$result->fetch_assoc();
        $cust_id=$row["cust_id"];
        $cust_name=$row["cust_name"];
        $cust_addr=$row["cust_addr"];
        $cust_img=$row["cust_img"];
        $cust_mob=$row["cust_mob"];
    }
    if(isset($_REQUEST['custupdatebtn']))
    {
        $cusname=$_REQUEST["Custname"];
        $cusaddr=$_REQUEST["Custaddr"];
        $cusmob=$_REQUEST["custmob"];

        $p_img=$_FILES['Custimg']['name'];
        $p_img_temp=$_FILES['Custimg']['tmp_name'];
        $img_folder ='../image/customer/'.$p_img;
        move_uploaded_file($p_img_temp,$img_folder);

        $sql="SELECT * FROM `cust_details` WHERE `cust_mob`='$cusmob'";
        $er=$conn->query($sql);
        if($err=$er->num_rows == 0){       
        $sql="UPDATE `cust_details` SET `cust_name` = '".$cusname."',`cust_addr` = '".$cusaddr."',`cust_img` = '$img_folder',`cust_mob` = '$cusmob' WHERE `cust_details`.`cust_id` = '".$cust_id."'";

            if($conn->query($sql) == TRUE)
            {
            $msg="< class='alert alert-success'>Successfully Updated !</    small>";
            }
            else
            {
                $msg="<small class='alert alert-danger'>Can't Update !</small>";
            }
        }
        else
        {
            $msg="<small class='alert alert-danger'>Mobile number already exists!</small>";
        }
    }
?>
<p><br><br></p>

<!-- Header Start -->
<div class="container">
    <script>
    document.title = "<?php echo "My Profile";?>";
    </script>
    <div class="col mt-5">
        <center>
            <img src="<?php echo $cust_img?>" alt="" height="400px" width="450px"
                class="img-thumbnail rounded-circle text-center" style="margin-right: 8px;">
        </center>
        <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="custname">Name</label>
                <input type="text" name="Custname" id="Custname" class="form-control" value="<?php echo $cust_name?>">
            </div>
            <div class="form-group">
                <label for="custemail">Email</label>
                <input type="text" name="Custmail" id="Custmail" class="form-control" value="<?php echo $cust_mail?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="custmob">Mobile Number</label>
                <input type="text" name="custmob" id="custmob" class="form-control" value="<?php echo $cust_mob?>">
            </div>
            <div class="form-group">
                <label for="custaddr">Address</label>
                <input type="text" name="Custaddr" id="Custaddr" class="form-control" value="<?php echo $cust_addr?>">
            </div>
            <div class="form-group">
                <label for="custimg">Upload Image</label>
                <input type="file" name="Custimg" id="Custimg" class="form-control">
            </div>
            <p><br></p>
            <div>
                <p align="right"><button type="submit" class="btn btn-danger" name="custupdatebtn">Update</button></p>
            </div>
            <span id="statusmsg"><?php if(isset($msg)){echo $msg;}?></span>
        </form>
    </div>
</div>

<br><br>
<!-- Header Start -->
<?php 
    include('../mainInclude/footer.php');
?>
<!-- Header Start -->