<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='" . base_url() . "';
  </script>");
}?>
<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <!-- <img src="<?php echo base_url('frontend/img/games/pb.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <h4 class="font-weight-bold portal-title">PLAYER LIST</h4>
        <div class="portal-nav ml-auto">
            <a href="<?php echo base_url() ?>pb/player" class="mr-2 active">PLAYERS</a>
            <a href="<?php echo base_url() ?>pb/team" class="mr-2">TEAMS</a>
            <a href="<?php echo base_url() ?>pb/tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>

<div class="container col-lg-2 embed-responsive">
    <?php
    $_SESSION['jenis'] = "pb";

    if (!isset($_SESSION['akun'])) {
    ?>
        <a href="<?php echo base_url() ?>daftarplayer" class="btn btn-primary btn-block ">Daftar Player</a>
    <?php
    } elseif ($id->registrasi_id == $cek->player_registrasi) { ?>

    <?php } else { ?>
        <a href="<?php echo base_url() ?>daftarplayer" class="btn btn-primary btn-block ">Daftar Player</a>
    <?php }
    ?>
</div>
<div class="card bg-black" style="overflow-x:auto">
    <div class="container">
        <table class="table table-borderless table-esport">
            <thead class="bg-black">
                <tr>
                    <th scope="col" width=10px></th>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">NICKNAME</th>
                    <th scope="col">NAME</th>
                    <th scope="col" width=10px></th>
                    <th scope="col">TEAM</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($players as $player) : ?>
                    <tr>
                        <td> <img src="<?php echo base_url('frontend/img/id.png') ?>" width="20px" height="20px">
                        </td>
                        <!-- <td> <?php echo $player->player_id ?> </td> -->
                        <td style="color: #e0b403"><a href="<?php
                                                            echo site_url('pb/detailplayer/' . $player->player_id) ?>"><?php echo $player->player_nickname ?>
                                <?php if ($player->player_cek == 'yes') { ?>
                                    <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 20px"><?php  } ?></a></td>
                        <td> <?php echo $player->registrasi_nama ?> </td>
                        <td> <img src="<?php echo base_url('upload/tim/' . $player->tim_image) ?>" width="40px" height="40px" /></td>
                        <td> <?php echo $player->tim_nama ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php
                foreach ($playerss as $player) : ?>
                    <tr>
                        <td> <img src="<?php echo base_url('frontend/img/id.png') ?>" style="width: 20px;height: 20px">
                        </td>
                        <!-- <td> <?php echo $player->player_id ?> </td> -->
                        <td style="color: #e0b403"><a href="<?php
                                                            echo site_url('pb/detailplayer/' . $player->player_id) ?>"><?php echo $player->player_nickname ?>
                                <?php if ($player->player_cek == 'yes') { ?>
                                    <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 20px"><?php  } ?></a></td>
                        <td> <?php echo $player->registrasi_nama ?> </td>
                        <td></td>
                        <td> Tidak Ada Tim</td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        $("#datatables").DataTable();
    });
</script>