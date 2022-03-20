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
    <p class="bg-dark text-white p-2" style="font-weight: bold; font-size: 25px;">List of Customer Feedback</p>
    <?php 
        $sql = "SELECT * FROM `feedback_details`";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
    ?>
    <script>
    document.title = "<?php echo "Manage Feedback";?>";
    </script>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback Id</th>
                <th scope="col">Customer Mail</th>
                <th scope="col">Feedback</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
        while($row = $result->fetch_assoc()){
            $sql="SELECT `cust_mail` FROM `cust_details` WHERE cust_id='".$row['cust_id']."'";
            $res=$conn->query($sql);
            $r=$res->fetch_assoc();
            echo '<tr>';
            echo'<th scope="row">'.$row['f_id'].'</th>';
            echo'<td>'.$r['cust_mail'].'</td>';
            echo'<td>'.$row['f_content'].'</td>';
            echo'<td>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["f_id"].'>
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
            $sql="DELETE FROM `feedback_details` WHERE `f_id`={$_REQUEST['id']}";
            
            if($conn->query($sql) == TRUE)
            {
                echo'<script>alert("Successfully deleted feedback !")</script>';
                echo '<meta http-equiv="refresh" content="0;managefb.php?deleted"/>';
            }
            else
            {
                echo "Unable To Delete Data";
            }
         }
    ?>
    <!-- <div>
        <a class="btn btn-danger box" href="./addcust.php">
            <i class="fas fa-plus"></i>
        </a>
    </div> -->
</div>
<!-- Product End -->

<!-- script function Start -->

<script>
function checkdelete() {
    return window.confirm('Are you want to delete this feedback ?');
}
</script>

<!-- script function End -->

<!-- Footer Start -->
<?php
    include('./adminInclude/footer.php');
?>
<!-- Footer End -->