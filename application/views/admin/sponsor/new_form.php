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


                <div class="card mb-3">
                    <div class="card-header">
                        <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/sponsor/') ?>">Back</a>
                    </div>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/sponsor/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="sponsor_nama" class="col-sm-2 control-label">Nama sponsor</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('sponsor_nama') ? 'is-invalid' : '' ?>" type="text" name="sponsor_nama" placeholder="nama sponsor" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('sponsor_nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sponsor_link" class="col-sm-2 control-label">Link sponsor</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('sponsor_link') ? 'is-invalid' : '' ?>" type="text" name="sponsor_link" placeholder="Link sponsor" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('sponsor_link') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sponsor_tglmulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('sponsor_tglmulai') ? 'is-invalid' : '' ?>" type="date" name="sponsor_tglmulai" placeholder="Tanggal mulai sponsor" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('sponsor_tglmulai') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sponsor_tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('sponsor_tglselesai') ? 'is-invalid' : '' ?>" type="date" name="sponsor_tglselesai" placeholder="Tanggal mulai sponsor" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('sponsor_tglselesai') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Gambar Sponsor</label>
                                    <div class="col-sm-9">
                                        <input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('image') ?>
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