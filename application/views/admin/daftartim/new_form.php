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
        <!-- Navigation -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="page-wrapper">
            <br>
            <h3>
                <center> data daftartim</center>
            </h3> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/daftartim/') ?>">Back</a>


                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/daftartim/add') ?>" method="post">



                                <div class="form-group">
                                    <label for="daftartim_idplayer" class="col-sm-2 control-label">Nama Player</label>
                                    <div class="col-sm-8">
                                        <select name="daftartim_idplayer" class="form-control1">
                                            <option value="">-- Nama Player --</option>
                                            <?php foreach ($daftartim3 as $daftartim) : ?>
                                                <option value="<?php echo $daftartim->player_id ?>"><?php echo $daftartim->player_nickname ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="daftartim_tgldaftar" class="col-sm-2 control-label">Tanggal Daftar</label>
                                    <div class="col-sm-8">
                                        <input class="form-control1 <?php echo form_error('daftartim_tgldaftar') ? 'is-invalid' : '' ?>" type="date" name="daftartim_tgldaftar" placeholder="tgldaftar daftartim" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('daftartim_tgldaftar') ?>
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
        </div>
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>