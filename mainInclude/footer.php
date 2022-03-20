        <!-- Start Customer lOGIN Modal -->
        <!-- Start Customer lOGIN form -->
        <div class="modal fade" id="custlogin" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="custloginLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title navbar1-brand" id="custloginLabel" style="margin-left: 125px;">Customer
                            Login</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
                    </div>
                    <div class="modal-body">
                        <form id="custlogform">
                            <div class="form-group">
                                <label for="custemail">Email address</label>
                                <input type="email" class="form-control" id="custemail" aria-describedby="emailHelp"
                                    value="@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="custpass">Password</label>
                                <input type="password" class="form-control" id="custpass">
                            </div>
                        </form>
                        <!-- End Customer lOGIN form -->
                    </div>
                    <div class="modal-footer">
                        <small id="loginMsg"></small>
                        <button type="submit" class="btn btn-primary" id="custloginbtn"
                            onclick="checkcustlogin()">Login</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="clearCustlogField()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Customer lOGIN Modal -->



        <!-- Start Admin lOGIN Modal -->
        <!-- Start Admin lOGIN form -->
        <div class="modal fade" id="adminlogin" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="adminlogin" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title navbar1-brand" id="adminlogin" style="margin-left: 143px;">Admin Login
                        </h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
                    </div>
                    <div class="modal-body">
                        <form id="admlogform">
                            <div class="form-group">
                                <label for="adminemail">Email address</label>
                                <!-- <small id="statusadminMsg1"></small> -->
                                <input type="email" class="form-control" id="adminemail" name="adminemail"
                                    aria-describedby="emailHelp" value="@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="adminpass">Password</label>
                                <!-- <small id="statusadminMsg2"></small> -->
                                <input type="password" class="form-control" id="adminpass" name="adminpass">
                            </div>
                        </form>
                        <!-- End Admin lOGIN form -->
                    </div>
                    <div class="modal-footer">
                        <span id="successadminMsg"></span>
                        <button type="submit" class="btn btn-primary" onclick="checkadminlogin()">Login</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="clearAdmlogField()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Admin lOGIN Modal -->


        <!-- Start Customer Registeration Modal -->
        <?php 
            include('./custregister.php');
        ?>
        <!-- End Customer Registration Modal -->



        <footer class="page-footer font-small elegant-color foot1 d-print-none">
            <!-- Footer Links -->
            <div class="container text-center text-md-left pt-4 pt-md-5">

                <!-- Grid row -->
                <div class="row mt-1 mt-md-0 mb-4 mb-md-0">

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

                        <!-- Links -->
                        <h5 style="font-family: Itim, cursive !important; font-weight: bold !important;">About me</h5>
                        <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                        <p class="foot-desc mb-0">Welcome To Online Dairy<br>Online platform for buying fresh milk
                            Products.<br>We have diverse products in all categories.<br>Happy Shopping</p>

                    </div>

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">

                        <!-- Links -->
                        <h5 style="font-family: Itim, cursive !important; font-weight: bold !important;">Contacts</h5>
                        <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                        <ul class="fa-ul foot-desc ml-4">
                            <li class="mb-2"><span class="fa-li"><i class="far fa-map"></i></span>Pimple Gurav, 60 Feet
                                Road</li>
                            <li class="mb-2"><span class="fa-li"><i class="fas fa-phone-alt"></i></span>020 876 836 908
                            </li>
                            <li class="mb-2"><span class="fa-li"><i
                                        class="far fa-envelope"></i></span>OnlineDairy@gmail.com</li>
                            <li><span class="fa-li"><i class="far fa-clock"></i></span>Monday - Friday: 10 am-6 pm</li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->
        </footer>
        <!-- Footer -->
        <!-- Start Footer -->
        <footer class="container-fluid bg-dark text-center p-2 d-print-none">
            <small class="text-white">Copyright &copy; 2021 ||
                Designed By Rishi & Siddharth || <a href="#" style=" text-decoration:none;" data-toggle="modal"
                    data-target="#adminlogin">Admin
                    Login</a></small>
        </footer>
        <!-- End Footer -->

        <!-- End Footer -->

        <!--Jquery and bootstrap-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
        </script>
        <!--Font Awesome-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/all.min.js"></script>

        <!-- Customer Login Call Start -->
        <script type="text/javascript" src="js/ajaxcustrequest.js"></script>
        <!-- Customer Login Call End -->

        <!-- Admin Login Call Start -->
        <script type="text/javascript" src="js/ajaxadminrequest.js"></script>
        <!-- Admin Login Call End -->

        </body>

        </html>