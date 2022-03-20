<!-- Start Header -->
<?php
    include('./mainInclude/header.php');
    include_once('./dbconnect.php');
?>
<!-- End Header -->




<!-- Products Start-->
<br><br><br><br><br>
<script>
document.title = "All Products";
</script>

<div class="container mt-5">
    <h1 class="text-center navbar1-brand" style="font-size: 50px;">All Products</h1>
    <br><br><br>
    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php 
                    $sql = "SELECT * FROM `product_details`";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $proid=$row['pro_id'];
                            $proname=$row['pro_name'];
                            $prodesc=$row['pro_desc'];
                            $proprice=$row['pro_price'];
                            $proimg=$row['pro_img'];
                            $img= str_replace('..','.',$proimg);
                        
                    ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <a href="./productdetails.php?pro_id=<?php echo $proid?>" class="btn"
                    style="text-align:left; padding:0px; margin:0px;">
                    <div class="card" style="border-width: 0px;">
                        <img src="<?php echo $img ?>" class="card-img-top" alt="milk" width="200px" height="250px" />
                        <div class="card-body">
                            <h5 class="card-title"
                                style="font-family: Itim, cursive !important; font-weight: bold !important;">
                                <?php echo $proname?></h5>
                            <p><?php echo $prodesc?></p>
                        </div>
                        <div div class="card-footer">
                            <p class="card-text d-inline">Price:
                                <!-- <small><del>&#8377 3000</del></small> -->
                                <span class="font-weight-bolder">&#8377 <?php echo $proprice?></span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </p>
                            <a href="./productdetails.php?pro_id=<?php echo $proid?>"
                                class="btn btn-primary text-white font-weight-bolder float-right"
                                style="font-family: Itim, cursive;">Buy Now</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
        }
    ?>
    </div>
</div>
<!-- <div class="text-center m-2"><br>
            <a href="product.php" class="btn btn-danger btn-sm">View All Products</a>
          </div> -->
<!-- Product End-->

<br><br>
<!-- Start Footer -->
<?php
    include('./mainInclude/footer.php');
?>
<!-- Start Footer -->