<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='$tournament->tournament_jenis/detailtournament/$tournament_id';
  </script>");
}

?>
<div class="container top-section register">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <h3 class="text-center">JOIN TOURNAMENT</h3>
        </div>
    </div>
    <div class="col-lg-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Id tournament</label>
                <input class="form-control <?php echo form_error('tournament_id') ? 'is-invalid' : '' ?>" type="text" name="tournament_id" value="<?php echo $tournament->tournament_id ?>" readonly />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tournament_id') ?>
            </div>
            <div class="form-group">
                <label>Nama Tournament</label>
                <input class="form-control <?php echo form_error('tournament_nama') ? 'is-invalid' : '' ?>" type="text" name="tournament_nama" value="<?php echo $tournament->tournament_nama ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('tournament_nama') ?>
                </div>
            </div>

            <div class="form-group">
                <label>Nama player</label>
                <input class="form-control <?php echo form_error('player_nama') ? 'is-invalid' : '' ?>" type="text" name="player_nama" value="<?php echo $idplayer->player_id ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('player_nama') ?>
            </div>
            <div class="form-group">
                <label>Nama Tim</label>

                <input class="form-control <?php echo form_error('tim_nama') ? 'is-invalid' : '' ?>" type="text" name="tim_nama" value="<?php echo $idteam->tim_id ?>" />
                <div class="invalid-feedback">
                </div>
                <?php echo form_error('tim_nama') ?>
            </div>
            <button class="btn btn-primary btn-block" name="save" type="submit">Daftar</button>
        </form>
        <?php
        if (isset($_POST['save'])) {
            $id = ($_POST['tournament_id']);
            $tim = ($_POST['tim_nama']);
            $nama = ($_POST['player_nama']);
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');

            $ambil2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM tb_player LEFT JOIN tb_tim ON tb_player.player_timid=tb_tim.tim_id where tb_tim.tim_id='$tim'");
            $total = mysqli_fetch_array($ambil2);
            $anggota = $total['jumlah'];
            if ($anggota >= 4) {
                $koneksi->query("INSERT INTO tb_daftartournament (tournamentid, daftartournament_idtim, daftartournament_idplayer) VALUES ('$id','$tim','$nama')");
                echo (" <script>
            alert('anda telah bergabung');
            window.location='$tournament->tournament_jenis/detailtournament/$id';
          </script>");
            } else {
                echo (" <script>
                alert('Belum Memenuhi Syarat ');

            window.location='';
          </script>");
            }
        }
        ?>
        <br>
    </div>
</div>