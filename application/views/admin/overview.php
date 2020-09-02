<!DOCTYPE HTML>
<html>

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="page-wrapper">

            <center>
                <h1>Selamat Datang di Halaman Admin</h1>
            </center>


            <?php $this->load->view("admin/_partials/cal.php") ?>
        </div>

    </div>
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>