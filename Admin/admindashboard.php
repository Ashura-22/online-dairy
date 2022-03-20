<!-- Header Start -->

<?php
    include('./adminInclude/header.php');

    $sql="SELECT * FROM product_details";
    $result=$conn->query($sql);
    $tpro=$result->num_rows;

    $sql="SELECT * FROM cust_details";
    $result=$conn->query($sql);
    $tcust=$result->num_rows;

    $sql="SELECT * FROM order_details";
    $result=$conn->query($sql);
    $to=$result->num_rows;
?>

<!-- Header End -->
<div class="container" style="margin-top: 89px;">
    <div class="row">
        <h1 class="navbar-brand" style="text-align: center; color:black; background:grey; margin-top:10px">Welcome To
            Dashboard
        </h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="row mx-5 text-center">
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem; ">
                        <div class="card-header">
                            Products
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $tpro;?>
                            </h4>
                            <a class="btn text-white" href="./manageproduct.php">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            Customer
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $tcust?>
                            </h4>
                            <a class="btn text-white" href="./managecust.php">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            Orders
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $to;?>
                            </h4>
                            <a class="btn text-white" href="./manageorder.php">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center">
        <!-- Table -->
        <p class="bg-dark text-white p-2" style="font-weight: bold; font-size: 25px;">Order Details</p>
        <?php 
        $sql = "SELECT * FROM `order_details`";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Customer Mail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            while($row = $result->fetch_assoc())
            {
                echo '<tr>';
                echo'<th scope="row">'.$row['order_id'].'</th>';
                echo'<td>'.$row['cust_mail'].'</td>';
                if(strcmp($row['status'],"TXN_SUCCESS")==0){
                    $str="PAID";
                }
                else
                {
                    $str="UNPAID";
                }
                echo'<td>'.$str.'</td>';
                echo'<td>'.$row['amount'].'</td>';
                echo'<td>'.$row['delivery_status'].'</td>';
                echo'<td>'.$row['order_date'].'</td>';
                echo'<td>
                <form action="./vieworder.php" method="POST" class="d-inline">
                <input type="hidden" name="viewid" value='.$row["po_id"].'>
                    <button type="submit" class="btn btn-success mr-3" name="view" id="view" value="View">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </form>
                <form action="./editorder.php" method="POST" class="d-inline">
                <input type="hidden" name="editid" value='.$row["po_id"].'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" id="edit" value="Edit">
                        <i class="fas fa-pen"></i>
                    </button>
                </form>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["po_id"].'>
                    <button type="submit" class="btn btn-danger" name="delete" value="Delete" onclick="return checkdelete()">
                        <i class="far fa-trash-alt"></i>
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
            $sql="DELETE FROM `order_details` WHERE `po_id`={$_REQUEST['id']}";
            
            if($conn->query($sql) == TRUE)
            {
                echo'<script>alert("Successfully deleted order !")</script>';
                echo '<meta http-equiv="refresh" content="0;manageorder.php?deleted"/>';
            }
            else
            {
                echo "Unable To Delete Data";
            }
         }
    ?>
    </div>
</div>

<!-- script function Start -->

<script>
function checkdelete() {
    return window.confirm('Are you want to delete this order ?');
}
</script>

<!-- script function End -->

<!-- Footer Start -->

<?php
    include('./adminInclude/footer.php');
?>

<!-- Footer End -->