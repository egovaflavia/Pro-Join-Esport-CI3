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
                <center>Data Sponsor</center>
            </h3> <br>


            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/sponsor/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $sponsor->sponsor_id ?>" />

                        <div class="form-group">
                            <label for="sponsor_nama" class="col-sm-2 control-label">Nama sponsor</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('sponsor_nama') ? 'is-invalid' : '' ?>" type="text" name="sponsor_nama" value="<?php echo $sponsor->sponsor_nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('sponsor_nama') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sponsor_link" class="col-sm-2 control-label">Link sponsor</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('sponsor_link') ? 'is-invalid' : '' ?>" type="text" name="sponsor_link" value="<?php echo $sponsor->sponsor_link ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('sponsor_link') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sponsor_tglmulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('sponsor_tglmulai') ? 'is-invalid' : '' ?>" type="date" name="sponsor_tglmulai" value="<?php echo $sponsor->sponsor_tglmulai ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('sponsor_tglmulai') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sponsor_tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('sponsor_tglselesai') ? 'is-invalid' : '' ?>" type="date" name="sponsor_tglselesai" value="<?php echo $sponsor->sponsor_tglselesai ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('sponsor_tglselesai') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Gambar sponsor</label>
                            <div class="col-sm-9">
                                <input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
                                <input type="hidden" name="old_image" value="<?php echo $sponsor->image ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('image') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
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
</body>

</html>