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
                <center>Data Player</center>
            </h3> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>


                <div class="card mb-3" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/players/') ?>">Back</a>
                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/players/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="player_id" class="col-sm-2 control-label">ID player</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('player_id') ? 'is-invalid' : '' ?>" type="text" name="player_id" placeholder="player_id" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_id') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="player_jenis" class="col-sm-2 control-label">Jenis Player</label>
                                    <div class="col-sm-9">
                                        <select name="player_jenis" class="form-control1">
                                            <option value="">-- Jenis Player --</option>
                                            <option value="pubg">PUBG</option>
                                            <option value="ml">Mobile Legend</option>
                                            <option value="pb">Point Blank</option>
                                            <option value="dota">DOTA</option>
                                            <option value="ff">Free Fire</option>
                                            <option value="pubgmobile">PUBG Mobile</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_jenis') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="player_registrasi" class="col-sm-2 control-label">ID Registrasi</label>
                                    <div class="col-sm-8">
                                        <select name="player_registrasi" class="form-control1">
                                            <option value="">-- ID Registrasi --</option>
                                            <?php foreach ($registrasi1 as $player) : ?>
                                                <option value="<?php echo $player->registrasi_id ?>"><?php echo $player->registrasi_id ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_registrasi') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="player_nickname" class="col-sm-2 control-label">Nickname</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('player_nickname') ? 'is-invalid' : '' ?>" type="text" name="player_nickname" placeholder="nickname player" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_nickname') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="player_tglmasuk" class="col-sm-2 control-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <?php
                                        $tgl = date('yy-m-d');
                                        ?>
                                        <input class="form-control1 <?php echo form_error('player_tglmasuk') ? 'is-invalid' : '' ?>" type="date" name="player_tglmasuk" placeholder="Tanggal Masuk player" value="<?php echo $tgl; ?>" readonly />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('player_tglmasuk') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="player_cek" class="col-sm-2 control-label">Verify</label>
                                    <div class="col-sm-8">
                                        <div class="radio block">
                                            <label> <input type='radio' name='player_cek' value='yes' />Yes</label>
                                        </div>
                                        <div class="radio block">
                                            <label> <input type='radio' name='player_cek' value='no' />No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px; margin-top: 10px">
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
            $('#combo_pulau').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Players/ApiPulau') ?>",
                    type: 'POST',
                    data: {
                        'pulau_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        // kota();
                        $('#combo_provinsi').html(data);
                    }
                })
            })

            $('#combo_provinsi').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Players/ApiKota') ?>",
                    type: 'POST',
                    data: {
                        'kota_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#combo_kota').html(data);
                    }
                })
            })
        })
    </script>

</body>

</html>