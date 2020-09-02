<!DOCTYPE HTML>
<html>

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="login">
    <div class="login-logo">
        <img src="<?php echo base_url('assets/images/qwerty.png') ?>" alt="" style="width: 100px; margin-top: 20px" />
    </div>
    <h2 class="form-heading" style="margin-top: 0px">login</h2>
    <div class="app-cam">
        <form action="<?= base_url('admin/login/aksi_login') ?>" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" class="form-control1" name="username" placeholder="Username" required />

                <label for="password">Password</label>
                <input type="password" class="form-control1" name="password" placeholder="Password" required />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success w-100" value="Login" />
            </div>

        </form>
    </div>

</body>

</html>