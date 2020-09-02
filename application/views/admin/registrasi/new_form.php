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
                <center>Selamat Datang di Halaman registrasi</center>
            </h1> <br>

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>


                <div class="card mb-3">
                    <div class="card-header">
                        <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/registrasi/') ?>">Back</a>
                    </div>

                    <div class="card-body">

                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="<?php echo site_url('admin/registrasi/add') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="registrasi_nama" class="col-sm-2 control-label">Nama </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_nama') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nama" placeholder="nama registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_nohp" class="col-sm-2 control-label">nohp </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_nohp') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nohp" placeholder="nohp registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_nohp') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_email" class="col-sm-2 control-label">email </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_email') ? 'is-invalid' : '' ?>" type="email" name="registrasi_email" placeholder="email registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_email') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="registrasi_tgllahir" class="col-sm-2 control-label">Tanggal Lahir </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_tgllhhir') ? 'is-invalid' : '' ?>" type="date" name="registrasi_tgllahir" placeholder="Tanggal Lahir registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_tgllahir') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="registrasi_alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <select name="combo_pulau" id="combo_pulau" class="form-control1">
                                            <option value="">-PILIH PULAU-</option>
                                            <?php foreach ($pulau as $data) : ?>
                                                <option value="<?= $data->pulau_id ?>"><?= $data->pulau_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label for="registrasi_alamat" class="col-sm-2 control-label">Provinsi</label>

                                    <div class="col-sm-9">
                                        <select name="combo_provinsi" id="combo_provinsi" class="form-control1">
                                            <option value="">-PILIH PROVINSI-</option>
                                        </select>
                                    </div>
                                    <label for="registrasi_alamat" class="col-sm-2 control-label">Kota</label>

                                    <div class="col-sm-9">
                                        <select name="registrasi_alamat" id="registrasi_alamat" class="form-control1">
                                            <option value="">-PILIH KOTA-</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_fb" class="col-sm-2 control-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_fb') ? 'is-invalid' : '' ?>" type="text" name="registrasi_fb" placeholder="Facebook " />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_fb') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_yt" class="col-sm-2 control-label">Youtube</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_yt') ? 'is-invalid' : '' ?>" type="text" name="registrasi_yt" placeholder="Youtube " />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_yt') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_ig" class="col-sm-2 control-label">Instagram</label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_ig') ? 'is-invalid' : '' ?>" type="text" name="registrasi_ig" placeholder="Instagram " />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_ig') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_username" class="col-sm-2 control-label">username </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_username') ? 'is-invalid' : '' ?>" type="text" name="registrasi_username" placeholder="username registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_username') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registrasi_password" class="col-sm-2 control-label">password </label>
                                    <div class="col-sm-9">
                                        <input class="form-control1 <?php echo form_error('registrasi_password') ? 'is-invalid' : '' ?>" type="text" name="registrasi_password" placeholder="password registrasi" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_password') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control-file <?php echo form_error('registrasi_image') ? 'is-invalid' : '' ?>" type="file" name="registrasi_image" />
                                        <div class="invalid-feedback">
                                        </div>
                                        <?php echo form_error('registrasi_image') ?>
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
                    url: "<?= base_url('admin/Registrasi/ApiPulau') ?>",
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
                    url: "<?= base_url('admin/Registrasi/ApiKota') ?>",
                    type: 'POST',
                    data: {
                        'kota_id': id
                    },
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(id);
                        $('#registrasi_alamat').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>