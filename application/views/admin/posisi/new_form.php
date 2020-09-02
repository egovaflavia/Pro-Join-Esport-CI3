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
                <center>Data Posisi</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/posisi/') ?>">Back</a>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/posisi/add') ?>" method="post">

                                <div class="form-group">
                                    <label for="posisi_timid" class="col-sm-2 control-label">Nama Tim</label>
                                    <div class="col-sm-8">
                                        <select name="posisi_timid" class="form-control1">
                                            <option value="">-- Nama Tim --</option>
                                            <?php foreach ($tim as $posisi) : ?>
                                                <option value="<?php echo $posisi->tim_id ?>"><?php echo $posisi->tim_nama ?></option>

                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posisi_playerid" class="col-sm-2 control-label">Nama Player</label>
                                    <div class="col-sm-8">
                                        <select name="posisi_playerid" class="form-control1">
                                            <option value="">-- Nama Player --</option>
                                            <?php foreach ($player as $posisi) : ?>
                                                <option value="<?php echo $posisi->player_id ?>"><?php echo $posisi->player_nickname ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posisi_nama" class="col-sm-2 control-label">Posisi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('posisi_nama') ? 'is-invalid' : '' ?>" type="text" name="posisi_nama" placeholder="Posisi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('posisi_nama') ?>
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