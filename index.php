        <!-- Start Header -->
        <?php
        include('./mainInclude/header.php');
        include_once('./dbconnect.php');
        ?>
        <!-- End Header -->

        <!-- Image slider Start-->
        <div class="container" style="width:100%">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-top:124px;">
                <div class="carousel-inner" style="height: 25rem;">
                    <div class="carousel-item active">
                        <img src="image/iot1.png" class="d-block w-100"
                            style="margin-top: 0px; height:25rem !important">
                    </div>
                    <div class="carousel-item">
                        <img src="image/iot2.webp" class="d-block w-100"
                            style="margin-top: 0px; height:25rem !important">
                    </div>
                    <div class="carousel-item">
                        <img src="image/iot3.jpg" class="d-block w-100"
                            style="margin-top: 0px; height:25rem !important">
                    </div>
                    <div class="carousel-item">
                        <img src="image/iot4.jpg" class="d-block w-100"
                            style="margin-top: 0px; height:25rem !important">
                    </div>
                    <div class="carousel-item">
                        <img src="image/iot5.png" class="d-block w-100"
                            style="margin-top: 0px; height:25rem !important">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        </div>

        <!-- Image slider End-->

        <!-- Product start-->
        <div class="container" style="margin-top: 70px;">
            <h1 class="text-center navbar1-brand" style="margin-bottom: 30px; ">Popular Products</h1>

            <div class="row row-cols-1 row-cols-md-4 g-5">
                <?php 
                    $sql = "SELECT * FROM `product_details` LIMIT 8";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $proid=$row['pro_id'];
                            $proname=$row['pro_name'];
                            $prodesc=$row['pro_desc'];
                            $proprice=$row['pro_price'];
                            $protype=$row['pro_type'];
                            $proimg=$row['pro_img'];
                            $img= str_replace('..','.',$proimg);
                        
                    ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <a href="./productdetails.php?pro_id=<?php echo $proid?>" class="btn"
                            style="text-align:left; padding:0px; margin:0px;">
                            <div class="card" style="border-width: 0px;">
                                <img src="<?php echo $img ?>" class="card-img-top" alt="milk" width="200px"
                                    height="250px" />
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
                                        class="btn btn-primary text-white font-weight-bolder"
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
            <div class="text-center" style="margin-top:35px"><br>
                <a href="product.php" class="btn btn-danger btn-sm"
                    style="font-family: Itim, cursive; font-size:20px ;">View All Products</a>
            </div>
        </div>
        <!-- Product End-->

        <!-- Contact Us Start-->
        <?php
             include('./contact.php');
           ?>
        <!-- Contact Us End-->



        <!-- Start Footer -->
        <?php
              include('./mainInclude/footer.php');        
            ?>
        <!-- Start Footer -->