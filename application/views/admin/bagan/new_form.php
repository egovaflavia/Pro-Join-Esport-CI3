<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <?php $this->load->view("admin/_partials/head.php");
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');
    ?>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="page-wrapper">
            <br>
            <h3>
                <center>Tambah Data bagan</center>
            </h3> <br>

            <div class="container-fluid">

                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/bagan/') ?>">Back</a>

                    <div class="card-body">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/bagan/add') ?>" method="post">

                                <div class="form-group">
                                    <label for="player_alamat" class="col-sm-2 control-label">Tournament</label>

                                    <div class="col-sm-9">
                                        <select name="bagan_tournamentid" id="bagan_tournament" class="form-control1">
                                            <option value="">-PILIH TOURNAMENT-</option>
                                            <?php foreach ($tournament as $data) : ?>
                                                <option value="<?= $data->tournament_id ?>"><?= $data->tournament_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Tim A</label>

                                    <div class="col-sm-9">
                                        <select id="teamAll" name="bagan_tima" class="form-control1"></select>
                                    </div>

                                    <label class="col-sm-2 control-label">Tim B</label>

                                    <div class="col-sm-9">
                                        <select id="teamAll2" name="bagan_timb" class="form-control1"></select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="bagan_waktu" class="col-sm-2 control-label">Tanggal Pertandingan</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('bagan_waktu') ? 'is-invalid' : '' ?>" type="date" name="bagan_waktu" placeholder="Keterangan" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('bagan_waktu') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bagan_waktu" class="col-sm-2 control-label">Jam Pertandingan</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('bagan_waktu') ? 'is-invalid' : '' ?>" type="time" name="bagan_jam" placeholder="Keterangan" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('bagan_waktu') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Babak</label>
                                    <div class="col-sm-9">
                                        <select class="form-control1 <?php echo form_error('bagan_babak') ? 'is-invalid' : '' ?>" type="text" name="bagan_babak" placeholder="Jenis Babak">
                                            <option value="">-- Pilih Babak--</option>
                                            <option value="penyisihan">Penyisihan</option>
                                            <option value="20 besar">20 Besar</option>
                                            <option value="26 besar">16 Besar</option>
                                            <option value="8 besar">8 Besar</option>
                                            <option value="semi final">Semi Final</option>
                                            <option value="final">Final</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bagan_keterangan" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('bagan_keterangan') ? 'is-invalid' : '' ?>" type="text" name="bagan_keterangan" placeholder="Keterangan" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('bagan_keterangan') ?>
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
            $('#bagan_tournament').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/bagan/ApiTim') ?>",
                    type: 'POST',
                    data: {
                        'tournamentid': id
                    },
                    success: function(data) {
                        $('#teamAll').html(data);
                    }
                })
            })
            $('#bagan_tournament').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/bagan/ApiTim') ?>",
                    type: 'POST',
                    data: {
                        'tournamentid': id
                    },
                    success: function(data) {
                        $('#teamAll2').html(data);
                    }
                })
            })

            $('#bagan_tournament').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/bagan/ApiTim') ?>",
                    type: 'POST',
                    data: {
                        'tournamentid': id
                    },
                    success: function(data) {
                        $('#teamAll3').html(data);
                    }
                })
            })

            // $('#teamAll').change(function() {
            //     var id = $(this).val();
            //     $.ajax({
            //         url: "<?= base_url('admin/bagan/ApiPlayer') ?>",
            //         type: 'POST',
            //         data: {
            //             'player_id': id
            //         },
            //         datatype: 'JSON',
            //         success: function(data) {
            //             console.log(id);
            //             $('#bagan_playernama').html(data);
            //         }
            //     })
            // })
        })
    </script>

</body>

</html>