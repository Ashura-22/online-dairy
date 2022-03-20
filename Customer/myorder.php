<!-- Start Header -->
<?php
    session_start();
    include('../Customer/custinclude/header.php');
    include_once('./dbconnect.php');
    if(!isset($_SESSION['is_login']))
    {
        echo "<script>location.href='../index.php';</script>";
    }
    else
    {
        $mail=$_SESSION['custlogemail'];
?>

<div class="mx-5 mt-8 text-center" style="margin-top: 120px;">
    <!-- Table -->
    <p class="bg-dark text-white p-2" style="font-weight: bold; font-size: 25px; background: #000;">List of Orders</p>
    <?php 
        $sql = "SELECT * FROM `order_details` WHERE `cust_mail`='".$mail."'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
    ?>
    <script>
    document.title = "<?php echo "My Orders"?>";
    </script>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Customer Mail</th>
                <th scope="col">Status</th>
                <th scope="col">Amount</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Order Date</th>
                <th scope="col" class="d-print-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
        while($row = $result->fetch_assoc()){
            $stat=$row['delivery_status'];
            echo '<tr>';
            echo'<th scope="row">'.$row['order_id'].'</th>';
            echo'<td>'.$row['cust_mail'].'</td>';
            echo'<td>'.$row['status'].'</td>';
            echo'<td>'.$row['amount'].'</td>';
            echo'<td>'.$row['delivery_status'].'</td>';
            echo'<td>'.$row['order_date'].'</td>';
            echo'<td>
                <form action="./vieworder.php" method="POST" class="d-inline">
                    <input type="hidden" name="viewid" value='.$row["po_id"].'>
                        <button type="submit" class="btn btn-success d-print-none mr-3" name="view" id="view" value="View">
                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View
                        </button>
                </form>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["po_id"].'>
                    <input type="hidden" name="status" value='.$row["delivery_status"].'>
                    <button type="submit" class="btn btn-danger d-print-none" name="delete" value="Delete" onclick="return checkdelete()">
                        <i class="far fa-trash-alt"></i>&nbsp;Cancel
                    </button>
                </form>
                </td>';
            echo'</tr>';
             }
             ?>
        </tbody>
    </table>
    <?php
         }
         else
         {
             echo "No data Found";
         }

         if(isset($_REQUEST['delete']))
         {
            //echo $_REQUEST['status'];
            if(strcmp($_REQUEST['status'],"DELIVERED")!== 0)
            {
                //echo"yess";
                $sql="DELETE FROM `order_details` WHERE `po_id`={$_REQUEST['id']}";
                if($conn->query($sql) == TRUE)
                {
                    echo'<script>alert("Successfully cancelled order !")</script>';
                    echo '<meta http-equiv="refresh" content="0;myorder.php?deleted"/>';
                }
                else
                {
                    echo "Unable To Delete Data";
                }
            }
            else
            {
                echo "<span class='d-print-none' style='color:red;'>Unable to Cancel as Product is Delivered<span><br><br>";
            }
         }
    ?>
    <button type="button" class="btn btn-primary d-print-none" onclick="javascript:window.print();">Print</button>
</div>
<!-- Product End -->

<?php  
    }
?>
<!-- End Header -->

<!-- script function Start -->

<script>
function checkdelete() {
    return window.confirm('Are you want to cancel this order ?');
}
</script>

<!-- script function End -->

<!-- Start Footer -->
<?php
    include('../Customer/custinclude/footer.php');
?>
<!-- End Footer -->