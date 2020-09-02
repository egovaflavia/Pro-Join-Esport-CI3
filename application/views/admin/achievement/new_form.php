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
                <center>achievement</center>
            </h3> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>



                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/achievement/') ?>">Back</a>

                    <div class="card-body">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/achievement/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tournament</label>

                                    <div class="col-sm-9">
                                        <select name="achievement_idtournament" id="achievement_idtournament" class="form-control1">
                                            <option value="">-PILIH TOURNAMENT-</option>
                                            <?php foreach ($tournament as $data) : ?>
                                                <option value="<?= $data->tournament_id ?>"><?= $data->tournament_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Tim</label>

                                    <div class="col-sm-9">
                                        <select id="teamAll" name="achievement_idtim" class="form-control1"></select>
                                    </div>
                                    <label for="player_alamat" class="col-sm-2 control-label">Player</label>

                                    <div class="col-sm-9" style="margin-left: 178px">
                                        <select name="achievement_idplayer" id="achievement_idplayer" class="form-control1">
                                            <option value="">-PILIH PLAYER-</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="achievement_peringkat" class="col-sm-2 control-label">peringkat</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('achievement_peringkat') ? 'is-invalid' : '' ?>" type="text" name="achievement_peringkat" placeholder="peringkat achievement" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('achievement_peringkat') ?>
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

    <script>
        $('document').ready(function() {
            $('#achievement_idtournament').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Achievement/ApiTim') ?>",
                    type: 'POST',
                    data: {
                        'tournamentid': id
                    },
                    success: function(data) {
                        $('#teamAll').html(data);
                    }
                })
            })

            $('#teamAll').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Achievement/ApiPlayer') ?>",
                    type: 'POST',
                    data: {
                        'player_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#achievement_idplayer').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>