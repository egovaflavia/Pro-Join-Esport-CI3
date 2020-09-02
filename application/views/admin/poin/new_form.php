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
                <center>Tambah Data Poin</center>
            </h3> <br>

            <div class="container-fluid">

                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/poin/') ?>">Back</a>

                    <div class="card-body">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/poin/add') ?>" method="post">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tournament</label>

                                    <div class="col-sm-9">
                                        <select name="poin_tournament" id="poin_tournament" class="form-control1">
                                            <option value="">-PILIH TOURNAMENT-</option>
                                            <?php foreach ($tournament as $data) : ?>
                                                <option value="<?= $data->tournament_id ?>"><?= $data->tournament_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Tim</label>

                                    <div class="col-sm-9">
                                        <select id="teamAll" name="poin_playertim" class="form-control1"></select>
                                    </div>
                                    <label for="player_alamat" class="col-sm-2 control-label">Player</label>

                                    <div class="col-sm-9" style="margin-left: 178px">
                                        <select name="poin_playernama" id="poin_playernama" class="form-control1">
                                            <option value="">-PILIH PLAYER-</option>
                                        </select>

                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="poin_playernama" class="col-sm-2 control-label">Nama Player</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('poin_playernama') ? 'is-invalid' : '' ?>" type="text" name="poin_playernama" placeholder="Nama Player" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('poin_playernama') ?>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="poin_jumlah" class="col-sm-2 control-label">Jumlah Poin</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('poin_jumlah') ? 'is-invalid' : '' ?>" type="text" name="poin_jumlah" placeholder="Jumlah Poin" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('poin_jumlah') ?>
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
            $('#poin_tournament').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Poin/ApiTim') ?>",
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
                    url: "<?= base_url('admin/Poin/ApiPlayer') ?>",
                    type: 'POST',
                    data: {
                        'player_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#poin_playernama').html(data);
                    }
                })
            })
        })
    </script>

</body>

</html>