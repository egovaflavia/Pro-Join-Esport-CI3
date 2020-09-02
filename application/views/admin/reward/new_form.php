<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
            <br>
            <h1>
                <center>Data Reward</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/reward/') ?>">Back</a>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/reward/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Reward</label>
                                    <div class="col-sm-9">
                                        <select name="reward_jenis" class="form-control1">
                                            <option value="">-- Jenis Reward --</option>
                                            <option value="hardware">Hardware</option>
                                            <option value="voucher">Voucher</option>
                                            <option value="merch">Merch</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_jenis') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('reward_nama') ? 'is-invalid' : '' ?>" type="text" name="reward_nama" placeholder="Reward nama" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('reward_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Stok</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('reward_stok') ? 'is-invalid' : '' ?>" type="text" name="reward_stok" placeholder="Reward Stok" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('reward_stok') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Koin</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('reward_koin') ? 'is-invalid' : '' ?>" type="text" name="reward_koin" placeholder="Reward Koin" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('reward_koin') ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Gambar </label>
                                    <div class="col-sm-9">
                                        <input class="form-control-file <?php echo form_error('reward_image') ? 'is-invalid' : '' ?>" type="file" name="reward_image" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('reward_image') ?>
                                    </div>
                                </div>

                                <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px; margin-top: 10px">
                                    <button class="btn btn-primary" type="submit" name="btn" value="Save">Simpan</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js') ?>"></script>

</body>

</html>