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
                <center>Data Tournament</center>
            </h3> <br>

            <div class="container-fluid">

                <div class="card mb-3" style="margin-left: 30px">
                    <div class="card-header">
                        <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/tournament/') ?>">Back</a>
                    </div>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/tournament/add') ?>" method="post">

                                <div class="form-group">
                                    <label for="tournament_jenis" class="col-sm-2 control-label">Jenis Tournament</label>
                                    <div class="col-sm-9">
                                        <select class="form-control1 <?php echo form_error('tournament_jenis') ? 'is-invalid' : '' ?>" type="text" name="tournament_jenis" placeholder="Jenis tournament">
                                            <option value="">-- Pilih Jenis Game--</option>
                                            <option value="pubg">PUBG</option>
                                            <option value="ml">Mobile Legend</option>
                                            <option value="dota">DOTA</option>
                                            <option value="ff">FREE FIRE</option>
                                            <option value="pb">PB</option>
                                            <option value="pubgmobile">PUBG Mobile</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="tournament_nama" class="col-sm-2 control-label">Nama tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_nama') ? 'is-invalid' : '' ?>" type="text" name="tournament_nama" placeholder="nama tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_status" class="col-sm-2 control-label">Status Tournament</label>
                                    <div class="col-sm-9">
                                        <select class="form-control1 <?php echo form_error('tournament_status') ? 'is-invalid' : '' ?>" type="text" name="tournament_status" placeholder="Status Tournament" value="<?php echo $tournament->tournament_status ?>">
                                            <option value="segera">Segera</option>
                                            <option value="mulai">Mulai</option>
                                            <option value="selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_tglmulai" class="col-sm-2 control-label">Tanggal Mulai tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_tglmulai') ? 'is-invalid' : '' ?>" type="date" name="tournament_tglmulai" placeholder="tanggal mulai tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_tglmulai') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_tglakhir" class="col-sm-2 control-label">Tanggal Akhir tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_tglakhir') ? 'is-invalid' : '' ?>" type="date" name="tournament_tglakhir" placeholder="tanggal akhir tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_tglakhir') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_participan" class="col-sm-2 control-label">Participan tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_participan') ? 'is-invalid' : '' ?>" type="text" name="tournament_participan" placeholder="participan tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_participan') ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="tournament_mode" class="col-sm-2 control-label">Mode Tournament</label>
                                    <div class="col-sm-9">
                                        <select class="form-control1 <?php echo form_error('tournament_mode') ? 'is-invalid' : '' ?>" type="text" name="tournament_mode" placeholder="Mode tournament">
                                            <option value="">-- Pilih Mode--</option>
                                            <option value="solo">Solo</option>
                                            <option value="duo">Duo</option>
                                            <option value="squad">Squad</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="tournament_lokasi" class="col-sm-2 control-label">Lokasi Tournament</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="lokasi_tournament" id="rad" value="online" class="rad" /> Online <br>
                                        <input type="radio" name="lokasi_tournament" id="rad2" class="rad" /> Offline

                                        <!-- form yang mau ditampilkan
                                        <div id="form1" style="display:none">
                                            <input type="text" name="lokasi_tournament" value="online" readonly />
                                        </div>
                                        <div id="form2" style="display:none">

                                            <div class="col-sm-9">
                                                <select name="combo_pulau" id="combo_pulau" class="form-control1">
                                                    <option value="">-PILIH PULAU-</option>
                                                    <?php foreach ($pulau as $data) : ?>
                                                        <option value="<?= $data->pulau_id ?>"><?= $data->pulau_nama ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-9">
                                                <select name="combo_provinsi" id="combo_provinsi" class="form-control1">
                                                    <option value="">-PILIH PROVINSI-</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-9">
                                                <select name="tournament_lokasi" id="tournament_lokasi" class="form-control1">
                                                    <option value="">-PILIH KOTA-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="tournament_lokasi" class="col-sm-2 control-label">Lokasi Tournament</label>
                                    <div class="col-sm-9">
                                        <select name="combo_pulau" id="combo_pulau" class="form-control1">
                                            <option value="">-PILIH PULAU-</option>
                                            <?php foreach ($pulau as $data) : ?>
                                                <option value="<?= $data->pulau_id ?>"><?= $data->pulau_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-9" style="margin-left: 178px">
                                        <select name="combo_provinsi" id="combo_provinsi" class="form-control1">
                                            <option value="">-PILIH PROVINSI-</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-9" style="margin-left: 178px">
                                        <select name="tournament_lokasi" id="tournament_lokasi" class="form-control1">
                                            <option value="">-PILIH KOTA-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tournament_rules" class="col-sm-2 control-label">Rules Tournament</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control1 texteditor <?php echo form_error('tournament_rules') ? 'is-invalid' : '' ?>" name="tournament_rules" placeholder=" isi tournament_rules"></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tournament_rules') ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="tournament_prize" class="col-sm-2 control-label">Prize Koin tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_prize') ? 'is-invalid' : '' ?>" type="text" name="tournament_prize" placeholder="Prize koin tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_prize') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tournament_prize1" class="col-sm-2 control-label">Prize Uang tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_prize1') ? 'is-invalid' : '' ?>" type="text" name="tournament_prize1" placeholder="Prize uang tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_prize1') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_fee" class="col-sm-2 control-label">Fee tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_fee') ? 'is-invalid' : '' ?>" type="text" name="tournament_fee" placeholder="Fee tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_fee') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tournament_region" class="col-sm-2 control-label">Region tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_region') ? 'is-invalid' : '' ?>" type="text" name="tournament_region" placeholder="Region tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_region') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_format" class="col-sm-2 control-label">Format tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_format') ? 'is-invalid' : '' ?>" type="text" name="tournament_format" placeholder="Format tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_format') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_organizer" class="col-sm-2 control-label">Organizer tournament</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tournament_organizer') ? 'is-invalid' : '' ?>" type="text" name="tournament_organizer" placeholder="Organizer tournament" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tournament_organizer') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tournament_detail" class="col-sm-2 control-label">Detail Tournament</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control1 texteditor <?php echo form_error('tournament_detail') ? 'is-invalid' : '' ?>" name="tournament_detail" placeholder=" isi tournament_detail"></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tournament_detail') ?>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-info btn" type="submit" name="btn" value="Save" style="margin-bottom: 30px; margin-top: 10px">Simpan</button>
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

    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js') ?>"></script>
    <!-- panggil ckeditor.js -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <!-- panggil adapter jquery ckeditor -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/adapters/jquery.js') ?>"></script>
    <!-- setup selector -->
    <script type="text/javascript">
        $('textarea.texteditor').ckeditor();
    </script>

    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->

    <!-- <script type="text/javascript">
        $(function() {
            $(":radio.rad").click(function() {
                $("#form1, #form2").hide()
                if ($(this).val() == "online") {
                    $("#form1").show();
                } else {
                    $("#form2").show();
                }
            });
        });
    </script> -->


    <script>
        $('document').ready(function() {
            $('#combo_pulau').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Tournament/ApiPulau') ?>",
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
                    url: "<?= base_url('admin/Tournament/ApiKota') ?>",
                    type: 'POST',
                    data: {
                        'kota_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#tournament_lokasi').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>