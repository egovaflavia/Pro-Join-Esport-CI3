<?php $player_jenis = $_SESSION['jenis']; ?>

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
            <h3 class="text-center">EDIT PLAYER JOINESPORTS.</h3>
        </div>

    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="<?php echo base_url($tim->tim_jenis . '/editteam') ?>" method="post" enctype="multipart/form-data">
            <?php
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $ambil = $regis['nama'];
            $ambil1 = $koneksi->query("SELECT * FROM tb_registrasi WHERE registrasi_username='$ambil'");
            $pecah = $ambil1->fetch_object()
            ?>
            <input type="hidden" name="tim_id" value="<?php echo $tim->tim_id ?>" />
            <div class="form-group" hidden>
                <label>ID REGIRS</label>
                <input class="form-control <?php echo form_error('tim_registrasi') ? 'is-invalid' : '' ?>" type="text" name="tim_registrasi" value="<?php echo $pecah->registrasi_id  ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('tim_registrasi') ?>
                </div>
            </div>

            <div class="form-group" hidden>
                <label>cek</label>
                <input class="form-control <?php echo form_error('tim_cek') ? 'is-invalid' : '' ?>" type="text" name="tim_cek" value="<?php echo $player->tim_cek ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('tim_cek') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Tim</label>
                <input class="form-control <?php echo form_error('tim_jenis') ? 'is-invalid' : '' ?>" type="text" name="tim_jenis" value="<?php echo $tim->tim_jenis ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('tim_jenis') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Nama tim</label>
                <input class="form-control <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" value="<?php echo $tim->tim_nama ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tim_nama') ?>
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
                <select name="tim_lokasi" id="tim_lokasi" class="form-control">
                    <option value="<?= $tim->tim_lokasi ?>"></option>
                </select>

            </div>
            <div class="form-group">
                <label>About</label>
                <textarea name="tim_about" id="tim_about" class="ckeditor"> <?php echo $tim->tim_about ?> </textarea>
                <!--                     
                    <input class="form-control <?php echo form_error('tim_about') ? 'is-invalid' : '' ?>" type="text" name="tim_about" /> -->
                <div class="invalid-feedback">
                    <?php echo form_error('tim_about') ?>
                </div>
            </div>
            <?php $tg = date('yy-m-d'); ?>
            <div class="form-group">
                <label>Tanggal Masuk </label>
                <input class="form-control <?php echo form_error('tim_tahunmasuk') ? 'is-invalid' : '' ?>" type="date" name="tim_tahunmasuk" value="<?php echo $tim->tim_tahunmasuk ?>" readonly>
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tim_tahunmasuk') ?>

            </div>
            <div class="form-group">
                <label>Facebook</label>
                <?php if ($tim->tim_fb == '') { ?>
                    <input class="form-control <?php echo form_error('tim_fb') ? 'is-invalid' : '' ?>" type="text" name="tim_fb" value="" />
                <?php } else { ?>
                    <input class="form-control <?php echo form_error('tim_fb') ? 'is-invalid' : '' ?>" type="text" name="tim_fb" value="<?php echo $tim->tim_fb ?>" />
                <?php } ?>
                <div class="invalid-feedback">
                    <?php echo form_error('tim_fb') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Youtube</label>
                <?php if ($tim->tim_yt == '') { ?>
                    <input class="form-control <?php echo form_error('tim_yt') ? 'is-invalid' : '' ?>" type="text" name="tim_yt" />
                <?php } else { ?>
                    <input class="form-control <?php echo form_error('tim_yt') ? 'is-invalid' : '' ?>" type="text" name="tim_yt" value="<?php echo $tim->tim_yt ?>" />
                <?php } ?>
                <div class="invalid-feedback">
                    <?php echo form_error('tim_yt') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <?php if ($tim->tim_ig == '') { ?>
                    <input class="form-control <?php echo form_error('tim_ig') ? 'is-invalid' : '' ?>" type="text" name="tim_ig" />
                <?php } else { ?>
                    <input class="form-control <?php echo form_error('tim_ig') ? 'is-invalid' : '' ?>" type="text" name="tim_ig" value="<?php echo $tim->tim_ig ?>" />
                <?php } ?>
                <div class="invalid-feedback">
                    <?php echo form_error('tim_ig') ?>
                </div>
            </div>

            <div class="form-group">
                <label>Logo tim<br><i> (Format logo .png dan ukuran persegi)</i></label>
                <input class="form-control-file <?php echo form_error('tim_image') ? 'is-invalid' : '' ?>" type="file" name="tim_image" />
                <input type="hidden" name="old_image" value="<?php echo $tim->tim_image ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tim_image') ?>
            </div>
            <button class="btn btn-primary btn-block" value="Save" name="btn" type="submit">edit</button>
        </form>
        <br>
    </div>
</div>
</div>