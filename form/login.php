<div class="row">
    <div class="col-lg-12">
        &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        &nbsp;
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-user"></i> Login</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        &nbsp;
                    </div> 
                    <div class="col-md-8" style="text-align: center;"> 
                        <form action="system/login_service.php" method="post" name="sentMessage" id="contactForm" novalidate>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Username:</label>
                                    <input name="email"  type="text" class="form-control"  required data-validation-required-message="Masukan email kamu donk !    ">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Password:</label>
                                    <input  name="password" type="password" class="form-control"  required data-validation-required-message="Masukan password kamu donk !    ">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div><a href="#">Lupa Password Kamu ?</a></div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <button type="submit" name="btn_login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>