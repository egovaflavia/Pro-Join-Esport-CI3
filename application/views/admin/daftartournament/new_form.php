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
        <!-- Navigation -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="page-wrapper">
            <br>
            <h3>
                <center>daftartournament</center>
            </h3> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/daftartournament/') ?>">Back</a>

                    <div class="card-body">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/daftartournament/add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tournamentid" class="col-sm-2 control-label">Nama Tournament</label>
                                    <div class="col-sm-8">
                                        <select name="tournamentid" class="form-control1">
                                            <option value="">-- Nama Tournament --</option>
                                            <?php foreach ($daftartournament1 as $daftartournament) : ?>
                                                <option value="<?php echo $daftartournament->tournament_id ?>"><?php echo $daftartournament->tournament_nama ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="daftartournament_idtim" class="col-sm-2 control-label">Nama Tim</label>
                                    <div class="col-sm-8">
                                        <select name="daftartournament_idtim" class="form-control1">
                                            <option value="">-- Tim Tournament --</option>
                                            <?php foreach ($daftartournament2 as $daftartournament) : ?>
                                                <option value="<?php echo $daftartournament->tim_id ?>"><?php echo $daftartournament->tim_nama ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_jenis') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="daftartournament_idplayer" class="col-sm-2 control-label">Nama Player</label>
                                    <div class="col-sm-8">
                                        <select name="daftartournament_idplayer" class="form-control1">
                                            <option value="">-- Nama Player --</option>
                                            <?php foreach ($daftartournament3 as $daftartournament) : ?>
                                                <option value="<?php echo $daftartournament->player_id ?>"><?php echo $daftartournament->player_nickname ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_nama') ?>
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