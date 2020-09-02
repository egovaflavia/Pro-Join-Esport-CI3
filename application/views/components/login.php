<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content login-form">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign in to JOINESPORTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                    <div class="form-group row">
                        <label for="Email" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="inputPassword" placeholder="Input your username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">PASSWORD</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Input your password">
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Sign In">
                </form>
                <a href="<?php echo base_url() ?>register" class="btn btn-link btn-block">Create a new account</a>
            </div>
        </div>
    </div>
</div>