<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='$pecah->tim_jenis/detailtim/$tim_id';
  </script>");
}
//var_dump($_SESSION['akun']);
?>

<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">JOIN TIM</h3>
        </div>

    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group" hidden>
                <label>Id tim</label>
                <input class="form-control <?php echo form_error('posisi_timid') ? 'is-invalid' : '' ?>" type="text" name="posisi_timid" value="<?php echo $posisi->posisi_timid ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('posisi_timid') ?>
            </div>
            <div class="form-group" hidden>
                <label>Id posisi</label>
                <input class="form-control <?php echo form_error('posisi_timid') ? 'is-invalid' : '' ?>" type="text" name="posisi_id" value="<?php echo $posisi->posisi_id ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('posisi_timid') ?>
            </div>

            <div class="form-group">
                <label>ID Game</label>
                <input class="form-control <?php echo form_error('player_id') ? 'is-invalid' : '' ?>" type="text" name="player_id" value="<?php echo $posisi->posisi_playerid ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_id') ?>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <input class="form-control <?php echo form_error('posisi_nama') ? 'is-invalid' : '' ?>" type="text" name="posisi_nama" value="<?php echo $posisi->posisi_nama ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('posisi_nama') ?>
            </div>
            <?php $tg = date('yy-m-d'); ?>

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
            $idposisi = ($_POST['posisi_id']);
            $posisi = ($_POST['posisi_nama']);
            $nama = ($_POST['player_id']);
            $jenis = ($_POST['tim_jenis']);
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $koneksi->query("UPDATE tb_posisi SET posisi_nama='$posisi' WHERE posisi_id=$idposisi");
            echo (" <script>
                alert('Berhasil Update');
                window.location='../seting/$idr';
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