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
                <center>Data Bracket</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/bracket/') ?>">Back</a>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/bracket/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="bracket_tournamentid" class="col-sm-2 control-label">Nama Tournament</label>
                                    <div class="col-sm-8">
                                        <select name="bracket_tournamentid" class="form-control1">
                                            <option value="">-- Nama Tournament --</option>
                                            <?php foreach ($bracket1 as $bracket) : ?>
                                                <option value="<?php echo $bracket->tournament_id ?>"><?php echo $bracket->tournament_nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Gambar bracket</label>
                                    <div class="col-sm-9">
                                        <input class="form-control-file <?php echo form_error('bracket_gambar') ? 'is-invalid' : '' ?>" type="file" name="bracket_gambar" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('bracket_gambar') ?>
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

</body>

</html>