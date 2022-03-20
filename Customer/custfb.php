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
    if(isset($_REQUEST['fbsubmitbtn']))
    {
        if(!empty($_REQUEST['experience']))
        {
            $fcontent=$_REQUEST["f_content"];
            $exp=$_REQUEST['experience'];
            $fb=$exp.','.$fcontent;
            echo $fb;
            $sql="INSERT INTO `feedback_details` (`f_id`, `f_content`, `cust_id`) VALUES (NULL, '". $fb."', '".$cust_id."') ";

            if($conn->query($sql) == TRUE)
            {
                $msg="<small class='alert alert-success'>Thank you for your Valuable Feedback !</small>";
            }
            else
            {
                $msg="<small class='alert alert-danger'>Unable To Send!</small>";
            }
        }
        else
        {
            $msg="<small class='alert alert-danger'>Please Select overall experience !</small>";
        }
    }   
?>
<p><br><br><br></p>
<script>
document.title = "<?php echo "Feedback";?>";
</script>
<div class="mt-5">
    <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="custid" id="custid" class="form-control" value="<?php echo $cust_id?>">
        </div>
        <div class="container form-group">
            <h2>Feedback</h2>
            <p>
                Please provide your feedback below:
            </p>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>How do you rate your overall experience?</label>
                    <p>
                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="bad">
                            Bad
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="average">
                            Average
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="good">
                            Good
                        </label>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label for="custname">Any Suggestions</label><br>
                <textarea name="f_content" id="f_content" rows="2" cols="60" required></textarea>
            </div>
            <p><br></p>
            <div style="align-content: right;">
                <button type="submit" class="btn btn-danger" name="fbsubmitbtn">Submit</button>
            </div><br>
            <span id="statusmsg"><?php if(isset($msg)){echo $msg;}?></span>
        </div>
    </form>
</div>
<br><br>
<!-- Header Start -->
<?php 
    include('../mainInclude/footer.php');
?>
<!-- Header Start -->