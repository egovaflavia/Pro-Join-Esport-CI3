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
        <form class="form-horizontal" action="<?php echo base_url('overview/edit/' . $player->player_id) ?>" method="post" enctype="multipart/form-data">
            <?php
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $ambil = $regis['nama'];
            $ambil1 = $koneksi->query("SELECT * FROM tb_registrasi WHERE registrasi_username='$ambil'");
            $pecah = $ambil1->fetch_object()
            ?>
            <!-- <input type="hidden" name="player_id" value="<?php echo $player->player_id ?>" /> -->
            <div class="form-group" hidden>
                <label>ID REGIRS</label>
                <input class="form-control <?php echo form_error('player_registrasi') ? 'is-invalid' : '' ?>" type="text" name="player_registrasi" value="<?php echo $pecah->registrasi_id ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('player_registrasi') ?>
                </div>
            </div>
            <div class="form-group" hidden>
                <label>cek</label>
                <input class="form-control <?php echo form_error('player_cek') ? 'is-invalid' : '' ?>" type="text" name="player_cek" value="<?php echo $player->player_cek ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('player_cek') ?>
                </div>
            </div>
            <div class="form-group" hidden>
                <label>Jenis Game</label>
                <input class="form-control <?php echo form_error('player_jenis') ? 'is-invalid' : '' ?>" type="text" name="player_jenis" value="<?php echo $player->player_jenis ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('player_jenis') ?>
                </div>
            </div>
            <div class="form-group">
                <label>ID Game</label>
                <input class="form-control <?php echo form_error('player_id') ? 'is-invalid' : '' ?>" type="text" name="player_id" value="<?php echo $player->player_id ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_id') ?>
            </div>
            <div class="form-group">
                <label>Nickname game</label>
                <input class="form-control <?php echo form_error('player_nickname') ? 'is-invalid' : '' ?>" type="text" name="player_nickname" value="<?php echo $player->player_nickname ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_nickname') ?>
            </div>
            <div class="form-group" hidden>
                <label>Tanggal Masuk </label>
                <input class="form-control <?php echo form_error('player_tglmasuk') ? 'is-invalid' : '' ?>" type="date" name="player_tglmasuk" value="<?php echo $player->player_tglmasuk ?>" readonly>
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_tglmasuk') ?>

            </div>

            <button class="btn btn-primary btn-block" value="Save" name="btn" type="submit">edit</button>
        </form>
        <br>
    </div>
</div>