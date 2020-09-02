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
                <center>Data Tim</center>
            </h3> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>


                <div class="card mb-3">
                    <div class="card-header" style="margin-left: 30px">
                        <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/tim/') ?>">Back</a>
                    </div>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/tim/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="tim_jenis" class="col-sm-2 control-label">Jenis Tim</label>
                                    <div class="col-sm-9">
                                        <select name="tim_jenis" class="form-control1">
                                            <option value="">-- Jenis Tim --</option>
                                            <option value="pubg">PUBG</option>
                                            <option value="ml">Mobile Legend</option>
                                            <option value="pb">Point Blank</option>
                                            <option value="dota">DOTA</option>
                                            <option value="ff">Free Fire</option>
                                            <option value="pubgmobile">PUBG Mobile</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_jenis') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_about" class="col-sm-2 control-label">Tentang Tim</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control1 texteditor <?php echo form_error('tim_about') ? 'is-invalid' : '' ?>" name="tim_about" placeholder=" tim about"></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tim_about') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_nama" class="col-sm-2 control-label">Nama tim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" placeholder="nama tim" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_nama') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_lokasi" class="col-sm-2 control-label">Alamat Player</label>
                                    <div class="col-sm-9">
                                        <select name="combo_pulau" id="combo_pulau" class="form-control1">
                                            <option value="">-PILIH PULAU-</option>
                                            <?php foreach ($pulau as $data) : ?>
                                                <option value="<?= $data->pulau_id ?>"><?= $data->pulau_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label for="tim_lokasi" class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-9">
                                        <select name="combo_provinsi" id="combo_provinsi" class="form-control1">
                                            <option value="">-PILIH PROVINSI-</option>
                                        </select>
                                    </div>
                                    <label for="tim_lokasi" class="col-sm-2 control-label">Kota </label>
                                    <div class="col-sm-9">
                                        <select name="tim_lokasi" id="tim_lokasi" class="form-control1">
                                            <option value="">-PILIH KOTA-</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_cek" class="col-sm-2 control-label">Verify</label>
                                    <div class="col-sm-8">
                                        <div class="radio block">
                                            <label> <input type='radio' name='tim_cek' value='yes' />Yes</label>
                                        </div>
                                        <div class="radio block">
                                            <label> <input type='radio' name='tim_cek' value='no' />No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_tahunmasuk" class="col-sm-2 control-label">Tanggal Masuk tim</label>
                                    <div class="col-sm-9">
                                        <?php
                                        $tgl = date('yy-m-d');
                                        ?>
                                        <input class="form-control1 <?php echo form_error('tim_tahunmasuk') ? 'is-invalid' : '' ?>" type="date" name="tim_tahunmasuk" placeholder="Lokasi Tim" value="<?php echo $tgl; ?>" readonly />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_tahunmasuk') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_fb" class="col-sm-2 control-label">FB tim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tim_fb') ? 'is-invalid' : '' ?>" type="text" name="tim_fb" placeholder="Facebook Tim" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_fb') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tim_yt" class="col-sm-2 control-label">Youtube tim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tim_yt') ? 'is-invalid' : '' ?>" type="text" name="tim_yt" placeholder="Youtube Tim" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_yt') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tim_ig" class="col-sm-2 control-label">Ig tim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('tim_ig') ? 'is-invalid' : '' ?>" type="text" name="tim_ig" placeholder="Instagram Tim" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('tim_ig') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tim_image" class="col-sm-2 control-label">Gambar tim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control-file <?php echo form_error('tim_image') ? 'is-invalid' : '' ?>" type="file" name="tim_image" />
                                        <div class="invalid-feedback">

                                            <p class="help-block">Gambar harus .png</p>
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

    <script>
        $('document').ready(function() {
            $('#combo_pulau').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/Tim/ApiPulau') ?>",
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
                    url: "<?= base_url('admin/Tim/ApiKota') ?>",
                    type: 'POST',
                    data: {
                        'kota_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#tim_lokasi').html(data);
                    }
                })
            })
        })
    </script>

</body>

</html>