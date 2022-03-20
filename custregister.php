<!-- Start Customer Registeration form -->
<div class="modal fade" id="custreg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="custreg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title navbar1-brand" style="margin-left: 25px;">Customer Registration Form</h5>
            </div>
            <div class="modal-body">
                <form id="custRegForm">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="custregname">Name</label>
                            <small id="statusMsg1"></small>
                            <input type="text" class="form-control" id="custregname">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="custregemail">Email</label>
                            <small id="statusMsg2"></small>
                            <input type="email" class="form-control" id="custregemail">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="custregmob">Mobile number</label>
                            <small id="statusMsg5"></small>
                            <input type="tel" class="form-control" id="custregmob" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="custregpass">Password</label>
                            <small id="statusMsg3"></small>
                            <input type="password" class="form-control" id="custregpass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="custregaddr">Address</label>
                        <small id="statusMsg4"></small>
                        <input type="text" class="form-control" id="custregaddr">
                    </div>
                </form>
                <!-- End Customer Registration form -->
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" onclick="addCust()" id="signup">Sign Up</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="clearCustRegFeild()">Close</button>
            </div>
        </div>
    </div>
</div>