<!-- Header Start -->
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
    }
    else
    {
        echo "<script> location.href='../index.php';</script>";
    }
?>
<!-- Header End -->


<!-- Report Start -->
<script>
document.title = "<?php echo "Sell Report";?>";
</script>
<div class="container" style="margin-top: 120px;">
    <div class="col">
        <form action="" method="POST" class="d-print-none">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="date" class="form-control" id="startdate" name="startdate">
                </div>
                <span> to </span>
                <div class="form-group col-md-3">
                    <input type="date" class="form-control" id="enddate" name="enddate">
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
                </div>
            </div>
        </form>

        <?php
    
    if(isset($_REQUEST['searchsubmit']))
    {
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];

        $sql="SELECT * FROM order_details WHERE order_date BETWEEN '$startdate' AND '$enddate'";

        $result=$conn->query($sql);
        if($result->num_rows > 0)
        {
            echo'
            <p class="bg-dark text-white p-2 mt-4 text-center navbar1-brand">Order Details</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Cust_mail</th>
            <th scope="col">Status</th>
            <th scope="col">Amount</th>
            <th scope="col">Delivery Status</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        ';

            while($row=$result->fetch_assoc())
            {
                echo'
                <tr>
                    <th scope="row">'.$row['order_id'].'</th>
                    <td>'.$row['cust_mail'].'</td>
                    <td>'.$row['status'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['delivery_status'].'</td>
                    <td>'.$row['order_date'].'</td>
                </tr>';
            }
            echo '
                </tbody> 
            </table>
            <div class="text-center">
                <form action="" class="d-print-none" style="">
                    <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()" style="margin-left:60px">
                </form>
            </div>
            </div>
            ';
        }
        else
        {
            echo '<div class="alert alert-warning col-sm-6 m1-5 mt-2" role="alert"> No Records Found</div>';
        }
    }

    ?>
    </div>
</div>




<!-- Report End -->


<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->