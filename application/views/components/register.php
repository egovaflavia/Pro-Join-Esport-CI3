<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">Sign up to JOINESPORTS.</h3>
        </div>
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" action="<?php echo site_url('register') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="registrasi_nama">Nama Lengkap</label>
                    <input class="form-control <?php echo form_error('registrasi_nama') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nama" />
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_nama') ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Username</label>
                    <input class="form-control <?php echo form_error('registrasi_username') ? 'is-invalid' : '' ?>" type="text" name="registrasi_username" />
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_username') ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input class="form-control <?php echo form_error('registrasi_password') ? 'is-invalid' : '' ?>" type="password" name="registrasi_password" />
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_password') ?>
                </div>
                <div class="form-group">
                    <label for="registrasi_nohp">No HP</label>
                    <input class="form-control <?php echo form_error('registrasi_nohp') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nohp" />
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_nohp') ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email </label>
                    <input class="form-control <?php echo form_error('registrasi_email') ? 'is-invalid' : '' ?>" type="email" name="registrasi_email" />
                    <div class=" invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_email') ?>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal lahir</label>
                    <input class="form-control " <?php echo form_error('registrasi_tgllahir') ? 'is-invalid' : '' ?> type="date" name="registrasi_tgllahir">
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_tgllahir') ?>
                </div>
                <div class="form-group">
                    <label>Pulau</label>

                    <select name="combo_pulau" id="combo_pulau" class="form-control">
                        <option value=""> -- Pilih Pulau -- </option>
                        <?php foreach ($pulau as $data) : ?>
                            <option value="<?= $data->pulau_id ?>"><?= $data->pulau_nama ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Provinsi</label>
                    <select name="combo_provinsi" id="Provinsi" class="form-control"></select>
                    <label>Kota</label>
                    <select name="registrasi_alamat" id="registrasi_alamat" class="form-control">
                    </select>

                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input class="form-control <?php echo form_error('registrasi_fb') ? 'is-invalid' : '' ?>" type="text" name="registrasi_fb" />
                    <div class="invalid-feedback">
                        <?php echo form_error('registrasi_fb') ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label>Youtube</label>
                    <input class="form-control <?php echo form_error('registrasi_yt') ? 'is-invalid' : '' ?>" type="text" name="registrasi_yt" />
                    <div class="invalid-feedback">
                        <?php echo form_error('registrasi_yt') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input class="form-control <?php echo form_error('registrasi_ig') ? 'is-invalid' : '' ?>" type="text" name="registrasi_ig" />
                    <div class="invalid-feedback">
                        <?php echo form_error('registrasi_ig') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto registrasi <i>(Ukuran persegi)</i></label>
                    <input class="form-control-file <?php echo form_error('registrasi_image') ? 'is-invalid' : '' ?>" type="file" name="registrasi_image" />
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('registrasi_image') ?>
                </div>
        </div>

        <button class="btn btn-primary btn-block" value="Save" name="btn" type="submit">Register</button>
        </form>
        <br>
    </div>

    <br>
</div>
<script>
    $('document').ready(function() {
        $('#combo_pulau').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= base_url('Register/ApiPulau') ?>",
                type: 'POST',
                data: {
                    'pulau_id': id
                },
                datatype: 'JSON',
                success: function(data) {
                    console.log(id);
                    // kota();
                    $('#Provinsi').html(data);
                }
            })
        })

        $('#Provinsi').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= base_url('Register/ApiKota') ?>",
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