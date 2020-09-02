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
            <h3>
                <center>Data achievement</center>
            </h3> <br>

            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/posisi/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post">

                        <input type="hidden" name="id" value="<?php echo $posisi->posisi_id ?>" />


                        <div class="form-group">
                            <label for="posisi_timid" class="col-sm-2 control-label">Posisi</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('posisi_timid') ? 'is-invalid' : '' ?>" type="text" name="posisi_timid" placeholder="posisi_timid" readonly value="<?php echo $posisi->posisi_timid ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('posisi_timid') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="posisi_playerid" class="col-sm-2 control-label">Posisi</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('posisi_playerid') ? 'is-invalid' : '' ?>" readonly type="text" name="posisi_playerid" placeholder="posisi_playerid" value="<?php echo $posisi->posisi_playerid ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('posisi_playerid') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="posisi_nama" class="col-sm-2 control-label">Posisi</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('posisi_nama') ? 'is-invalid' : '' ?>" type="text" name="posisi_nama" placeholder="posisi_nama" value="<?php echo $posisi->posisi_nama ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('posisi_nama') ?>
                            </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-info btn" type="submit" name="btn" value="Save">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>