 <!-- Start Header -->
 <?php
    include('./mainInclude/header.php');
    include_once('./dbconnect.php');
?>
 <!-- End Header -->


 <!-- Products Start-->
 <br><br><br><br><br>

 <div class="container mt-5">
     <h1 class="text-center">All <?php 
     $protype=$_GET['pro_type'];
     $ptype=strtolower($protype);
     $p=ucfirst($ptype);
     echo $p;
     ?> Products</h1>
     <br><br><br>
     <script>
     document.title = "<?php echo $p?>";
     </script>
     <div class="row row-cols-1 row-cols-md-4 g-5">
         <?php 
            if(isset($_GET['pro_type']))
            {
                $protype=$_GET['pro_type'];
                $sql = "SELECT * FROM `product_details` WHERE pro_type='".$protype."'";
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
                             <h5 class="card-title"><?php echo $proname?></h5>
                             <p><?php echo $prodesc?></p>
                         </div>
                         <div div class="card-footer">
                             <p class="card-text d-inline">Price:
                                 <!-- <small><del>&#8377 3000</del></small> -->
                                 <span class="font-weight-bolder">&#8377 <?php echo $proprice?></span>
                             </p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <a href="./productdetails.php?pro_id=<?php echo $proid?>"
                                 class="btn btn-primary text-white font-weight-bolder float-right">Buy
                                 Now</a>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
         <?php
            }
          }
        }
    ?>
     </div>
     <!-- Product End-->

     <br><br>
 </div>
 <!-- Start Footer -->
 <?php
    include('./mainInclude/footer.php');
 ?>
 <!-- End Footer -->