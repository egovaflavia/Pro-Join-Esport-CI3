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
                <center>Data Tim</center>
            </h3> <br>


            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/tim/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $tim->tim_id ?>" />

                        <div class="form-group">
                            <label for="tim_jenis" class="col-sm-2 control-label">Jenis tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_jenis') ? 'is-invalid' : '' ?>" type="text" name="tim_jenis" readonly placeholder="tim_jenis" value="<?php echo $tim->tim_jenis ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_jenis') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tim_about" class="col-sm-2 control-label">About Tim</label>
                            <div class="col-sm-9">
                                <textarea class="form-control1 texteditor <?php echo form_error('tim_about') ? 'is-invalid' : '' ?>" name="tim_about" placeholder="ABout Tim"><?php echo $tim->tim_about ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_about') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tim_nama" class="col-sm-2 control-label">Nama tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" placeholder="tim_nama" value="<?php echo $tim->tim_nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tim_lokasi" class="col-sm-2 control-label">lokasi tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_lokasi') ? 'is-invalid' : '' ?>" type="text" name="tim_lokasi" readonly placeholder="tim_lokasi" value="<?php echo $tim->tim_lokasi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_lokasi') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tim_cek" class="col-sm-2 control-label">Verify</label>
                            <div class="col-sm-8">
                                <div class="radio block">
                                    <label> <input type='radio' name='tim_cek' value='yes' />Yes</label>
                                </div>
                                <div class="radio block">
                                    <label> <input type='radio' name='tim_cek' value='no' />No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tim_tahunmasuk" class="col-sm-2 control-label">Tahun Masuk tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_tahunmasuk') ? 'is-invalid' : '' ?>" type="date" name="tim_tahunmasuk" placeholder="tim_tahunmasuk" value="<?php echo $tim->tim_tahunmasuk ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_tahunmasuk') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tim_fb" class="col-sm-2 control-label">Fb tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_fb') ? 'is-invalid' : '' ?>" type="text" name="tim_fb" placeholder="tim_fb" value="<?php echo $tim->tim_fb ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_fb') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tim_yt" class="col-sm-2 control-label">Youtube tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_yt') ? 'is-invalid' : '' ?>" type="text" name="tim_yt" placeholder="tim_yt" value="<?php echo $tim->tim_yt ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_yt') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tim_ig" class="col-sm-2 control-label">Ig tim</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tim_ig') ? 'is-invalid' : '' ?>" type="text" name="tim_ig" placeholder="tim_ig" value="<?php echo $tim->tim_ig ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_ig') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Gambar tim</label>
                            <div class="col-sm-9">
                                <input class="form-control-file <?php echo form_error('tim_image') ? 'is-invalid' : '' ?>" type="file" name="tim_image" />
                                <input type="hidden" name="old_image" value="<?php echo $tim->tim_image ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tim_image') ?>
                                </div>
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