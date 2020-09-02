<?php $tim_jenis = $_SESSION['jenis']; ?>

<?php
$regis = $_SESSION['akun'];
// $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
$koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
$regis = $_SESSION['id'];
$id = $regis->registrasi_id;
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='$tim_jenis/team';
  </script>");
}
if (isset($_SESSION['akun'])) {
    foreach ($player as $players) :
        // echo $id . "<br>";
        // echo $players->player_registrasi;
        if ($id == $players->player_registrasi && $players->player_jenis == $tim_jenis) {
            $cek = "true";
        }
    endforeach;
    if ($cek != "true") {
        echo ("<script>
        alert('Daftar player Terlebi Dahulu');
        window.location='$tim_jenis/player';
      </script>");
    }
}
?>
<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">DAFTAR TIM JOINESPORTS.</h3>
        </div>
        <div class="col-lg-12">
            <form class="form-horizontal" action="<?php echo site_url('daftarteam') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group" hidden>
                    <label>ID REGIRS</label>
                    <input class="form-control <?php echo form_error('tim_registrasi') ? 'is-invalid' : '' ?>" type="text" name="tim_registrasi" value="<?php echo $id  ?>" readonly />
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_registrasi') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jenis Tim</label>
                    <input class="form-control <?php echo form_error('tim_jenis') ? 'is-invalid' : '' ?>" type="text" name="tim_jenis" value="<?php echo $tim_jenis ?>" readonly />
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_jenis') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama tim</label>
                    <input class="form-control <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" />
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
                    </select>

                </div>
                <div class="form-group">
                    <label>About</label>
                    <textarea name="tim_about" id="tim_about" class="ckeditor"></textarea>
                    <!--                     
                    <input class="form-control <?php echo form_error('tim_about') ? 'is-invalid' : '' ?>" type="text" name="tim_about" /> -->
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_about') ?>
                    </div>
                </div>
                <?php $tg = date('yy-m-d'); ?>
                <div class="form-group">
                    <label>Tanggal Masuk </label>
                    <input class="form-control <?php echo form_error('tim_tahunmasuk') ? 'is-invalid' : '' ?>" type="date" name="tim_tahunmasuk" value="<?php echo $tg ?>" readonly>
                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('tim_tahunmasuk') ?>

                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input class="form-control <?php echo form_error('tim_fb') ? 'is-invalid' : '' ?>" type="text" name="tim_fb" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_fb') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Youtube</label>
                    <input class="form-control <?php echo form_error('tim_yt') ? 'is-invalid' : '' ?>" type="text" name="tim_yt" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_yt') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input class="form-control <?php echo form_error('tim_ig') ? 'is-invalid' : '' ?>" type="text" name="tim_ig" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tim_ig') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Logo Tim<br><i> (Format logo .png dan ukuran persegi)</i></label>
                    <input class="form-control-file <?php echo form_error('tim_image') ? 'is-invalid'  : '' ?>" type="file" name="tim_image" />
                    <input type="hidden" name="old_image" value="default.jpg" />

                    <div class="invalid-feedback">
                    </div>
                    <?php echo form_error('tim_image') ?>
                </div>
                <button class="btn btn-primary btn-block" value="Save" name="btn" type="submit" style="padding: 10px">Daftar</button>
            </form>


            <br>
        </div>
    </div>

</div>


<!-- 

<script src="<?= base_url('frontend/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('frontend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('frontend/') ?>js/joinesports.js"></script>
<script>
    $('document').ready(function() {
        $('#combo_pulau').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= base_url('Daftarteam/ApiPulau') ?>",
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
                url: "<?= base_url('Daftarteam/ApiKota') ?>",
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
</script> -->