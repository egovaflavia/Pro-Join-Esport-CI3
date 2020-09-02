<?php
// $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
$koneksi = mysqli_connect('localhost', 'root', '', 'db_join');

?>

<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='overview';
  </script>");
}

?>

<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">CREATE TOURNAMENT</h3>
        </div>

    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="<?php echo site_url('buattournaments') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Jenis Game</label>
                <input class="form-control <?php echo form_error('tournament_jenis') ? 'is-invalid' : '' ?>" type="text" name="tournament_jenis" />
                <div class=" invalid-feedback">
                    <?php echo form_error('tournament_jenis') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Tournament</label>
                <input class="form-control <?php echo form_error('tournament_nama') ? 'is-invalid' : '' ?>" type="text" name="tournament_nama" />
                <div class="invalid-feedback">
                    <?php echo form_error('tournament_nama') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Mulai </label>
                <input class="form-control <?php echo form_error('tournament_tglmulai') ? 'is-invalid' : '' ?>" type="date" name="tournament_tglmulai" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_tglmulai') ?>
            </div>
            <div class="form-group">
                <label>Participan</label>
                <input class="form-control <?php echo form_error('tournament_participan') ? 'is-invalid' : '' ?>" type="text" name="tournament_participan" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_participan') ?>
            </div>
            <div class="form-group">
                <label>Mode</label>
                <input class="form-control <?php echo form_error('tournament_mode') ? 'is-invalid' : '' ?>" type="text" name="tournament_mode" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_mode') ?>
            </div>
            <div class="form-group">
                <label>Prize</label>
                <input class="form-control <?php echo form_error('tournament_prize') ? 'is-invalid' : '' ?>" type="text" name="tournament_prize" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_prize') ?>
            </div>
            <div class="form-group">
                <label>entry fee</label>
                <input class="form-control <?php echo form_error('tournament_fee') ? 'is-invalid' : '' ?>" type="text" name="tournament_fee" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_fee') ?>
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
                <select name="tournament_lokasi" id="player_alamat" class="form-control">
                </select>

            </div>
            <div class="form-group">
                <label>Detail</label>
                <textarea name="tournament_detail" id="tournament_detail" class="ckeditor"></textarea>

                <!-- <input class="form-control <?php echo form_error('tournament_detail') ? 'is-invalid' : '' ?>" type="text" name="tournament_detail" /> -->
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_detail') ?>
            </div>
            <div class="form-group">
                <label>Region</label>
                <input class="form-control <?php echo form_error('tournament_region') ? 'is-invalid' : '' ?>" type="text" name="tournament_region" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_region') ?>
            </div>
            <div class="form-group">
                <label>Format</label>
                <input class="form-control <?php echo form_error('tournament_format') ? 'is-invalid' : '' ?>" type="text" name="tournament_format" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_format') ?>
            </div>
            <div class="form-group">
                <label>Organizer</label>
                <input class="form-control <?php echo form_error('tournament_organizer') ? 'is-invalid' : '' ?>" type="text" name="tournament_organizer" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_organizer') ?>
            </div>
            <button class="btn btn-primary btn-block" name="save" type="submit">Daftar</button>
        </form>

        <br>
    </div>
</div>

</div>

<!-- 
<script src="<?= base_url('frontend/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('frontend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('frontend/') ?>js/joinesports.js"></script> -->