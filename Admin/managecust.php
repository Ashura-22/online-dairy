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
        
    }else
    {
        echo "<script> location.href='../index.php';</script>";
    }
?>
<!-- Header End -->
<p><br><br><br><br></p>

<!-- Product Start -->
<div class="mx-5 mt-8 text-center">
    <!-- Table -->
    <p class="bg-dark text-white p-2" style="font-weight: bold; font-size: 25px;">List of Customers</p>
    <?php 
        $sql = "SELECT * FROM `cust_details`";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Customer Id</th>
                <th scope="col">Name</th>
                <th scope="col">Mail Id</th>
                <th scope="col">Password</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <script>
            document.title = "<?php echo "Manage Customer";?>";
            </script>
            <?php
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo'<th scope="row">'.$row['cust_id'].'</th>';
            echo'<td>'.$row['cust_name'].'</td>';
            echo'<td>'.$row['cust_mail'].'</td>';
            echo'<td>'.$row['cust_pass'].'</td>';
            echo'<td>'.$row['cust_addr'].'</td>';
            echo'<td>
                <form action="./editcust.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["cust_id"].'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" id="edit" value="Edit">
                        <i class="fas fa-pen"></i>
                    </button>
                </form>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["cust_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete" onclick="return checkdelete()">
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
            $sql="DELETE FROM `cust_details` WHERE `cust_id`={$_REQUEST['id']}";
            
            if($conn->query($sql) == TRUE)
            {
                echo'<script>alert("Successfully deleted customer !")</script>';
                echo '<meta http-equiv="refresh" content="0;managecust.php?deleted"/>';
            }
            else
            {
                echo "Unable To Delete Data";
            }
         }
    ?>
    <div>
        <a class="btn btn-danger box" href="./addcust.php">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>
<!-- Product End -->

<!-- script function Start -->

<script>
function checkdelete() {
    return window.confirm('Are you want to delete this customer ?');
}
</script>

<!-- script function End -->

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->