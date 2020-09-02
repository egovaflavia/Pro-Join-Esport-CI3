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
                <center>Data klaim</center>
            </h3> <br>

            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/klaim/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $klaim->klaim_id ?>" />

                        <div class="form-group">
                            <label for="klaim_registrasiid" class="col-sm-2 control-label">ID Registrasi</label>
                            <div class="col-sm-8">
                                <select name="klaim_registrasiid" class="form-control1">
                                    <?php foreach ($regis as $klaim2) : ?>
                                        <option value="<?php echo $klaim2->registrasi_id ?>"><?php echo $klaim2->registrasi_id ?></option>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('tournament_jenis') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="klaim_poin" class="col-sm-2 control-label">poin</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('klaim_poin') ? 'is-invalid' : '' ?>" type="text" name="klaim_poin" value="<?php echo $klaim->klaim_poin ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('klaim_poin') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="klaim_tgl" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('klaim_tgl') ? 'is-invalid' : '' ?>" type="date" name="klaim_tgl" value="<?php echo $klaim->klaim_tgl ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('klaim_tgl') ?>
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