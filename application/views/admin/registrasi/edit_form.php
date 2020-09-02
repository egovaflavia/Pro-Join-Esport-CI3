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
                <center>Data Registrasi</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card-header" style="margin-left: 30px">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/registrasi/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $registrasi->registrasi_id ?>" />

                        <div class="form-group">
                            <label for="registrasi_nama" class="col-sm-2 control-label">Nama </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_nama') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nama" value="<?php echo $registrasi->registrasi_nama ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_nama') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_nohp" class="col-sm-2 control-label">nohp </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_nohp') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nohp" value="<?php echo $registrasi->registrasi_nohp ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_nohp') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_email" class="col-sm-2 control-label">email </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_email') ? 'is-invalid' : '' ?>" type="email" name="registrasi_email" value="<?php echo $registrasi->registrasi_email ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="registrasi_tgllahir" class="col-sm-2 control-label">Tanggal Lahir </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_tgllhhir') ? 'is-invalid' : '' ?>" type="date" name="registrasi_tgllahir" value="<?php echo $registrasi->registrasi_tgllahir ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_tgllahir') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="registrasi_alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_alamat') ? 'is-invalid' : '' ?>" type="text" name="registrasi_alamat" value="<?php echo $registrasi->registrasi_alamat ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_alamat') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_fb" class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_fb') ? 'is-invalid' : '' ?>" type="text" name="registrasi_fb" value="<?php echo $registrasi->registrasi_fb ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_fb') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_yt" class="col-sm-2 control-label">Youtube</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_yt') ? 'is-invalid' : '' ?>" type="text" name="registrasi_yt" value="<?php echo $registrasi->registrasi_yt ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_yt') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_ig" class="col-sm-2 control-label">Instagram</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_ig') ? 'is-invalid' : '' ?>" type="text" name="registrasi_ig" value="<?php echo $registrasi->registrasi_ig ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_ig') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_username" class="col-sm-2 control-label">username </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_username') ? 'is-invalid' : '' ?>" type="text" name="registrasi_username" value="<?php echo $registrasi->registrasi_username ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_username') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="registrasi_password" class="col-sm-2 control-label">password </label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('registrasi_password') ? 'is-invalid' : '' ?>" type="text" name="registrasi_password" value="<?php echo $registrasi->registrasi_password ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_password') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-9">
                                <input class="form-control-file <?php echo form_error('registrasi_image') ? 'is-invalid' : '' ?>" type="file" name="registrasi_image" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('registrasi_image') ?>
                            </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px; margin-top: 10px">
                            <button class="btn-info btn" type="submit" name="btn" value="Save">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
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