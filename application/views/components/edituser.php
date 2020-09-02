<?php
$regis = $_SESSION['akun'];
// $ambilll = $regis->fetch_object();
echo $regis['nama'];
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='$player_jenis/player';
  </script>");
}
//var_dump($_SESSION['akun']);

?>

<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">EDIT USER JOINESPORTS.</h3>
        </div>
        <?php
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;

        ?>
    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="<?php echo base_url('overview/edituser/' . $id) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $registrasi->registrasi_id ?>" />
            <div class="form-group">
                <label for="registrasi_nama">Nama</label>
                <input class="form-control <?php echo form_error('registrasi_nama') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nama" value="<?php echo $registrasi->registrasi_nama ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('registrasi_nama') ?>
            </div>
            <div class="form-group">
                <label for="registrasi_nohp">No HP</label>
                <input class="form-control <?php echo form_error('registrasi_nohp') ? 'is-invalid' : '' ?>" type="text" name="registrasi_nohp" value="<?php echo $registrasi->registrasi_nohp ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('registrasi_nohp') ?>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email </label>
                <input class="form-control <?php echo form_error('registrasi_email') ? 'is-invalid' : '' ?>" type="email" name="registrasi_email" value="<?php echo $registrasi->registrasi_email ?>" />
                <div class=" invalid-feedback">
                </div>
                <?php echo form_error('registrasi_email') ?>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal lahir</label>
                <input class="form-control " <?php echo form_error('registrasi_tgllahir') ? 'is-invalid' : '' ?> type="date" name="registrasi_tgllahir" value="<?php echo $registrasi->registrasi_tgllahir ?>">
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
                    <option value="<?php echo $registrasi->registrasi_alamat ?>"></option>
                </select>

            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input class="form-control <?php echo form_error('registrasi_fb') ? 'is-invalid' : '' ?>" type="text" name="registrasi_fb" value="<?php echo $registrasi->registrasi_fb ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('registrasi_fb') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Youtube</label>
                <input class="form-control <?php echo form_error('registrasi_yt') ? 'is-invalid' : '' ?>" type="text" name="registrasi_yt" value="<?php echo $registrasi->registrasi_yt ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('registrasi_yt') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input class="form-control <?php echo form_error('registrasi_ig') ? 'is-invalid' : '' ?>" type="text" name="registrasi_ig" value="<?php echo $registrasi->registrasi_ig ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('registrasi_ig') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input class="form-control <?php echo form_error('registrasi_username') ? 'is-invalid' : '' ?>" type="text" name="registrasi_username" value="<?php echo $registrasi->registrasi_username ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('registrasi_username') ?>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input class="form-control <?php echo form_error('registrasi_password') ? 'is-invalid' : '' ?>" type="password" name="registrasi_password" />

                <div class=" invalid-feedback">
                </div>
                <?php echo form_error('registrasi_password') ?>
            </div>
            <div class="form-group">
                <label>Foto registrasi <i>(Ukuran persegi)</i></label>
                <input class="form-control-file <?php echo form_error('registrasi_image') ? 'is-invalid' : '' ?>" type="file" name="registrasi_image" />
                <input type="hidden" name="old_image" value="<?php echo $registrasi->registrasi_image ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('registrasi_image') ?>
            </div>
    </div>

    <button class="btn btn-primary btn-block" value="Save" name="btn" type="submit">edit</button>
    </form>
    <br>
</div>
</div>