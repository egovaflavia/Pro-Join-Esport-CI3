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
                <center>Selamat Datang di Halaman Berita</center>
            </h1> <br>

            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header" style="margin-left: 30px">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/berita/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $berita->berita_id ?>" />

                        <div class="form-group">
                            <label for="berita_judul" class="col-sm-2 control-label">Judul Berita</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('berita_judul') ? 'is-invalid' : '' ?>" type="text" name="berita_judul" placeholder="berita_judul" value="<?php echo $berita->berita_judul ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('berita_judul') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="berita_post" class="col-sm-2 control-label">Tanggal Post Berita</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('berita_post') ? 'is-invalid' : '' ?>" type="date" name="berita_post" placeholder="berita_post" value="<?php echo $berita->berita_post ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('berita_post') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berita_isi" class="col-sm-2 control-label">Isi Berita</label>
                            <div class="col-sm-9">
                                <textarea class="form-control1 texteditor <?php echo form_error('berita_isi') ? 'is-invalid' : '' ?>" name="berita_isi" placeholder="Isi Berita"><?php echo $berita->berita_isi ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('berita_isi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Gambar Berita</label>
                            <div class="col-sm-9">
                                <input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
                                <input type="hidden" name="old_image" value="<?php echo $berita->image ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('image') ?>
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