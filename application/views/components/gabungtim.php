<?php $tim_id = $_SESSION['idtim'];
// $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
$koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
$ambil = $koneksi->query("SELECT * FROM tb_tim where tim_id=$tim_id");
$pecah = $ambil->fetch_object();
$regis = $_SESSION['id'];
$id = $regis->registrasi_id;
?>

<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='$pecah->tim_jenis/detailtim/$tim_id';
  </script>");
}
//var_dump($_SESSION['akun']);
if (isset($_SESSION['akun'])) {
    foreach ($player as $players) :
        // echo $id . "<br>";
        // echo $players->player_registrasi;
        if ($id == $players->player_registrasi && $pecah->tim_jenis == $players->player_jenis) {
            $cek = "true";
        }
    endforeach;
    if ($cek != "true") {
        echo ("<script>
        alert('Daftar player Terlebi Dahulu');
        window.location='$pecah->tim_jenis/player';
      </script>");
    }
}
?>

<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">JOIN TIM</h3>
        </div>

    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="<?php echo site_url('gabungtim') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group" hidden>
                <label>Id tim</label>
                <input class="form-control <?php echo form_error('posisi_timid') ? 'is-invalid' : '' ?>" type="text" name="posisi_timid" value="<?php echo $pecah->tim_id ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('posisi_timid') ?>
            </div>
            <div class="form-group">
                <label>Nama tim</label>
                <input class="form-control <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" value="<?php echo $pecah->tim_nama ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tim_nama') ?>
            </div>
            <?php
            foreach ($idplayer as $idplayer) :
                if ($pecah->tim_jenis == $idplayer->player_jenis) { ?>
                    <div class="form-group">
                        <label>ID Game</label>
                        <input class="form-control <?php echo form_error('player_id') ? 'is-invalid' : '' ?>" type="text" name="player_id" value="<?php echo $idplayer->player_id ?>" readonly />
                        <div class="invalid-feedback">
                        </div>
                        <?php echo form_error('player_id') ?>
                    </div>
            <?php }
            endforeach;
            ?>


            <div class="form-group">
                <label>Posisi</label>
                <input class="form-control <?php echo form_error('posisi_nama') ? 'is-invalid' : '' ?>" type="text" name="posisi_nama" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('posisi_nama') ?>
            </div>
            <?php $tg = date('yy-m-d'); ?>
            <div class="form-group">
                <label>Tanggal Masuk </label>
                <input class="form-control <?php echo form_error('player_tglmasuk') ? 'is-invalid' : '' ?>" type="date" name="player_tglmasuk" value="<?php echo $tg ?>" readonly>
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_tglmasuk') ?>

            </div>
            <div class="form-group" hidden>
                <label>Jenis Game</label>
                <input class="form-control <?php echo form_error('tim_jenis') ? 'is-invalid' : '' ?>" type="text" name="tim_jenis" value="<?php echo $pecah->tim_jenis ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('tim_jenis') ?>
                </div>
            </div>

            <button class="btn btn-primary btn-block" name="save" type="submit">Daftar</button>
        </form>
        <br>
        <?php
        if (isset($_POST['save'])) {
            $id = ($_POST['posisi_timid']);
            $posisi = ($_POST['posisi_nama']);
            $nama = ($_POST['player_id']);
            $jenis = ($_POST['tim_jenis']);
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $koneksi->query("INSERT INTO tb_request (request_timid,request_playerid, request_posisi,request_jenis) VALUES ('$id','$nama','$posisi','$jenis')");
            echo (" <script>
                alert('Tunggu Konfirmasi Leader Tim');
                window.location='$jenis/detailtim/$id';
              </script>");
            //     if ($pecah1 == true) {
            //         $ambill = $koneksi->query("update tb_player set player_nama='$pecah1->player_nama',
            //     posisi_timid='$id',player_posisi='$posisi' where player_id='$pecah1->player_id'");
            //         echo (" <script>
            //     alert('anda telah bergabung');
            //     window.location='$jenis/detailtim/$id';
            //   </script>");
            //     } else {
            //         echo (" <script>
            //     alert('Id game atau Player Tidak Terdaftar');
            //     window.location='gabungtim';
            //   </script>");
            //     }
        }
        ?>
    </div>
</div>