<!-- Header Start -->
<?php 
    include('./custinclude/header.php');

    $sql ="SELECT * FROM `cust_details` WHERE cust_mail='".$cust_mail."'";
    $result= $conn->query($sql);
    if($result->num_rows == 1)
    {
        $row=$result->fetch_assoc();
        $cust_id=$row["cust_id"];
    }
    if(isset($_REQUEST['cpsubmitbtn']))
    {
        $ccontent=$_REQUEST["c_content"];
        
        $sql="INSERT INTO `complaint_details` (`c_id`, `c_content`, `cust_id`,`c_status`) VALUES (NULL, '".$ccontent."', '".$cust_id."','UNSOLVED') ";

        if($conn->query($sql) == TRUE)
        {
            $msg="<small class='alert alert-success'>Our Customer Care will Contact You As Soon As Possible!</small>";
        }
        else
        {
            $msg="<small class='alert alert-danger'>Unable To Send!</small>";
        }
    }
?>
<p><br><br><br></p>
<div class="container mt-5">
    <script>
    document.title = "<?php echo "Complaint";?>";
    </script>
    <h2>Complaint</h2>
    <p>
        Please provide your complaint below:
    </p>
    <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="custid">Customer Mail</label>
            <input type="text" width="100px" name="custmail" id="custmail" class="form-control"
                value="<?php echo $cust_mail?>" readonly>
            <input type="hidden" name="custid" id="custid" class="form-control" value="<?php echo $cust_id?>">
        </div>
        <div class="form-group">
            <label for="custname">Write Complaint</label><br>
            <textarea name="c_content" id="c_content" rows="2" cols="110" required></textarea>
        </div>
        <p><br></p>
        <div style="align-content: right;">
            <button type="submit" class="btn btn-danger" name="cpsubmitbtn">File Complaint</button>
        </div><br>
        <span id="statusmsg"><?php if(isset($msg)){echo $msg;}?></span>
    </form>
</div>
<br><br>
<!-- Header Start -->
<?php 
    include('../mainInclude/footer.php');
?>
<!-- Header Start -->