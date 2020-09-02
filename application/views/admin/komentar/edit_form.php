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
                <center>Selamat Datang di Halaman Komentar</center>
            </h1> <br>

            <div class="container-fluid">

                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/komentar/') ?>">Back</a>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $komentar->komentar_id ?>" />


                                <div class="form-group">
                                    <label for="komentar_idtournament" class="col-sm-2 control-label">Nama Tournament</label>
                                    <div class="col-sm-8">
                                        <select name="komentar_idtournament" class="form-control1">
                                            <?php foreach ($komentar1 as $komentar3) : ?>
                                                <option value="<?php echo $komentar3->tournament_id ?>"><?php echo $komentar3->tournament_nama ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="komentar_nama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('komentar_nama') ? 'is-invalid' : '' ?>" type="text" name="komentar_nama" value="<?php echo $komentar->komentar_nama ?>" />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('komentar_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="komentar_isi" class="col-sm-2 control-label">Isi komentar</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control1 texteditor <?php echo form_error('komentar_isi') ? 'is-invalid' : '' ?>" name="komentar_isi" value="<?php echo $komentar->komentar_isi ?>"></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('komentar_isi') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="komentar_waktu" class="col-sm-2 control-label">Tanggal komentar</label>
                                    <div class="col-sm-9">
                                        <?php
                                        $tgl = date('yy-m-d');
                                        ?>
                                        <input class="form-control1 <?php echo form_error('komentar_waktu') ? 'is-invalid' : '' ?>" type="date" name="komentar_waktu" value="<?php echo $tgl; ?>" readonly />
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('komentar_waktu') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="komentar_status" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('komentar_status') ? 'is-invalid' : '' ?>" type="text" name="komentar_status" value="<?php echo $komentar->komentar_status ?>" />
                                    </div>
                                    <div class=" invalid-feedback">
                                        <?php echo form_error('komentar_status') ?>
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