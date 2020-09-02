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
                <center>Selamat Datang di Halaman Klaim</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/klaim/') ?>">Back</a>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/klaim/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="klaim_registrasiid" class="col-sm-2 control-label">ID Registrasi</label>
                                    <div class="col-sm-9">
                                        <select name="klaim_registrasiid" class="form-control1">
                                            <option value="">--ID Registrasi --</option>
                                            <?php foreach ($regis as $klaim) : ?>
                                                <option value="<?php echo $klaim->registrasi_id ?>"><?php echo $klaim->registrasi_id ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_jenis') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="klaim_poin" class="col-sm-2 control-label">Poin</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('klaim_poin') ? 'is-invalid' : '' ?>" type="text" name="klaim_poin" placeholder="Poin" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('klaim_poin') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="klaim_tgl" class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('klaim_tgl') ? 'is-invalid' : '' ?>" type="date" name="klaim_tgl" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('klaim_tgl') ?>
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
    <!-- panggil ckeditor.js -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <!-- panggil adapter jquery ckeditor -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/adapters/jquery.js') ?>"></script>
    <!-- setup selector -->
    <script type="text/javascript">
        $('textarea.texteditor').ckeditor();
    </script>

</body>

</html>