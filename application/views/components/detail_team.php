<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='" . base_url() . "';
  </script>");
} ?>
<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <!-- <img src="<?php echo base_url('frontend/img/games/pubg.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <h4 class="font-weight-bold portal-title">TEAM PROFILE</h4>
        <div class="portal-nav ml-auto" style="display: none">
            <a href="<?php echo base_url() ?>player" class="mr-2 ">PLAYERS</a>
            <a href="<?php echo base_url() ?>team" class="mr-2 active">TEAMS</a>
            <a href="<?php echo base_url() ?>tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>
<style type="text/css">
    .col1 {
        width: 215px;
        height: 325px;
    }

    .col2 {
        padding: 20px;
    }

    .col3 {
        padding: 20px;
    }

    .col4 {
        padding: 20px;
    }

    .col5 {
        padding: 20px;
    }
</style>

<div class="container embed-responsive">
    <div class="card bg-black mb-3">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="d-flex flex-row">
                        <img src="<?php echo base_url('upload/tim/' . $tim->tim_image) ?>" alt="" style="height: 100px;width: 100px" class="">
                        <div class="d-flex flex-column ml-4">
                            <h4 class="font-weight-bold"><?php echo $tim->tim_nama ?>
                                <?php if ($tim->tim_cek == 'yes') { ?>
                                    <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 25px"><?php  } ?></h4>
                            <h1></h1>
                            <h6 class="text-secondary mt-n2"><i class="fa fa-map-marker-alt"></i> <?php echo $tim->tim_lokasi ?> &nbsp <i class="fa fa-sign-in-alt"></i> <?php echo $tim->tim_tahunmasuk ?></h6>
                            <div class="d-flex flex-row mt-3">
                                <?php if ($tim->tim_yt == "") { ?>
                                <?php } else { ?>
                                    <a href="https://youtube.com/<?php echo $tim->tim_yt ?>" class="mr-3">
                                        <h3><i class="fab fa-youtube"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($tim->tim_fb == "") {
                                } else { ?>
                                    <a href="https://www.facebook.com/<?php echo $tim->tim_fb ?>/" class="mr-3">
                                        <h3><i class="fab fa-facebook-f"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($tim->tim_ig == "") {
                                } else { ?>
                                    <a href="https://www.instagram.com/<?php echo $tim->tim_ig ?>/">
                                        <h3><i class="fab fa-instagram"></i>
                                        </h3>
                                    </a>
                                <?php } ?>
                            </div>

                            <?php
                            if (!isset($_SESSION['akun'])) { ?>
                                <a href="<?php echo base_url() ?>gabungtim" class="btn btn-primary btn-block">JOIN TIM</a>
                                <?php } else {
                                if ($cekid->posisi_timid == '') {
                                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                    $hitung = $koneksi->query("SELECT COUNT(*)AS jumlah FROM tb_posisi where posisi_timid=$tim->tim_id AND posisi_nama NOT IN ('Cadangan')");
                                    $total = mysqli_fetch_array($hitung);
                                    $hitung1 = $koneksi->query("SELECT COUNT(*)AS jumlah1 FROM tb_posisi where posisi_timid=$tim->tim_id AND posisi_nama IN ('Cadangan')");
                                    $total1 = mysqli_fetch_array($hitung1);
                                    $regis = $_SESSION['id'];
                                    $idr = $regis->registrasi_id;
                                    $request = $koneksi->query("SELECT * FROM tb_player LEFT JOIN tb_request ON tb_player.player_id=tb_request.request_playerid WHERE player_registrasi=$idr AND tb_request.request_jenis='$tim->tim_jenis'");
                                    while ($test = $request->fetch_object()) {
                                        if ($test->request_id == '') {
                                            $cek = 0;
                                        } elseif ($test->request_id != '') {
                                            $cek1 = 1;
                                        }
                                    }

                                    if (($tim->tim_jenis == 'pubg') || ($tim->tim_jenis == 'ff') || ($tim->tim_jenis == 'pubgm')) {
                                        if (($total['jumlah'] == 4)) {
                                            echo "  <a href='#' class='btn btn-primary btn-block' style='padding:10px;'>TIM FULL</a> ";
                                            if (($total1['jumlah1'] == 3)) {
                                                echo "  <a href='#' class='btn btn-primary btn-block' style='padding:10px;'>CADANGAN FULL</a> ";
                                            } else { ?>
                                                <a onclick="gabungConfirm('<?php echo base_url('gabungtim/cadangan/' .  $tim->posisi_id) ?>')" href="#!" data-toggle="modal" data-target="#gabungModal" class="btn btn-primary btn-block" style="padding: 10px">CADANGAN</a>
                                            <?php }
                                        } else {
                                            if ($cek1 == 1) { ?>
                                                <a href="#" class="btn btn-primary btn-block">JOIN TIM</a>
                                            <?php  } else {
                                            ?>
                                                <a href="<?php echo base_url() ?>gabungtim" class="btn btn-primary btn-block">JOIN TIM</a>
                                        <?php }
                                        } ?>
                                        <?php  } elseif (($tim->tim_jenis == 'ml') || ($tim->tim_jenis == 'dota') || ($tim->tim_jenis == 'pb')) {
                                        if (($total['jumlah'] >= 5)) {
                                            echo "  <a href='#' class='btn btn-primary btn-block' style='padding:10px;'>TIM FULL</a> ";
                                            if (($total1['jumlah1'] == 3)) {
                                                echo "  <a href='#' class='btn btn-primary btn-block' style='padding:10px;'>CADANGAN FULL</a> ";
                                            } else { ?>
                                                <a onclick="gabungConfirm('<?php echo base_url('gabungtim/cadangan/' .  $tim->posisi_id) ?>')" href="#!" data-toggle="modal" data-target="#gabungModal" class="btn btn-primary btn-block" style="padding: 10px">CADANGAN</a>
                                            <?php }
                                        } else {
                                            if ($cek1 == 1) { ?>
                                                <a href="#" class="btn btn-primary btn-block">JOIN TIM</a>
                                            <?php  } else {
                                            ?>
                                                <a href="<?php echo base_url() ?>gabungtim" class="btn btn-primary btn-block">JOIN TIM</a>
                            <?php }
                                        }
                                    }
                                }
                            } ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-lg-column align-items-lg-end align-items-sm-start mt-3">
                    <div class="text-lg-right">
                        <h4>About</h4>
                    </div>
                    <div>
                        <p style="text-align: right"><?php echo $tim->tim_about ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-black mb-5">
        <div class="container p-4">
            <div class="card achievements p-2 mt-2">
                <h6>ROSTERS</h6>
                <div class="row" style="text-align: center;">
                    <?php
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $ambil = $koneksi->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id LEFT JOIN tb_registrasi ON tb_player.player_registrasi =tb_registrasi.registrasi_id WHERE player_jenis='$tim->tim_jenis' and posisi_timid=$tim->tim_id AND posisi_nama NOT IN ('Cadangan') ORDER BY posisi_nama='Leader' DESC");
                    $hitung = $koneksi->query("SELECT COUNT(*)AS jumlah FROM tb_posisi where posisi_timid=$tim->tim_id AND posisi_nama NOT IN ('Cadangan')");
                    $total = mysqli_fetch_array($hitung);
                    if ($total['jumlah'] == 1) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%; width:190px;height: 190px "> </td>
                                            </tr>
                                        </table>
                                        <h6 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h6>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col col2"></div>
                            <div class="col col3"></div>
                            <div class="col col4"></div>
                            <div class="col col5"></div>
                        <?php }
                    } elseif ($total['jumlah'] == 2) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?> <div class="col col3"></div>
                        <div class="col col4"></div>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 3) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?>
                        <div class="col col4"></div>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 4) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 5) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                    <?php }
                    } else {
                        echo "&nbsp&nbsp&nbspBelum Memiliki Anggota Tim";
                    } ?>
                </div>
            </div>
        </div>
        <div class="container p-4">
            <div class="card achievements p-2 mt-2">
                <h6>CADANGAN</h6>
                <div class="row" style="text-align: center;">
                    <?php
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $ambil = $koneksi->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id LEFT JOIN tb_registrasi ON tb_player.player_registrasi =tb_registrasi.registrasi_id WHERE player_jenis='$tim->tim_jenis' and posisi_timid=$tim->tim_id AND posisi_nama IN ('Cadangan') ORDER BY posisi_nama='Leader' DESC");
                    $hitung = $koneksi->query("SELECT COUNT(*)AS jumlah FROM tb_posisi where posisi_timid=$tim->tim_id AND posisi_nama IN ('Cadangan')");
                    $total = mysqli_fetch_array($hitung);
                    if ($total['jumlah'] == 1) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h6 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h6>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col col2"></div>
                            <div class="col col3"></div>
                            <div class="col col4"></div>
                            <div class="col col5"></div>
                        <?php }
                    } elseif ($total['jumlah'] == 2) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?> <div class="col col3"></div>
                        <div class="col col4"></div>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 3) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?>
                        <div class="col col4"></div>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 4) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>

                        <?php }
                        ?>
                        <div class="col col5"></div>
                        <?php
                    } elseif ($total['jumlah'] == 5) {
                        while ($player = $ambil->fetch_object()) {  ?>
                            <div class="col col1">
                                <a href="<?php
                                            echo site_url($player->player_jenis . '/detailplayer/' . $player->player_id) ?>">
                                    <div class="card bg-dark text-white mb-3">
                                        <table>
                                            <tr>
                                                <td style="background-image:url(<?php echo base_url('upload/player/' . $player->registrasi_image) ?>);background-size: 100% 100%;width:190px;height: 190px"> </td>
                                            </tr>
                                        </table>
                                        <h5 class="card-text" style="margin-bottom: -6px"><?php echo $player->player_nickname ?></h5>
                                        <small style="margin-top: 5px"><?php echo $player->registrasi_nama ?></small>
                                        <hr style=" background:#e0b403;padding: 0.6px;margin: 5px">
                                        <h5><b><?php echo $player->posisi_nama ?></b></h5>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                    <?php }
                    } else {
                        echo "&nbsp&nbsp&nbspBelum Memiliki Anggota Cadangan";
                    } ?>
                </div>
            </div>
        </div>
        <div class="card bg-black mb-5">
            <div class="container p-4 ">
                <div class="card achievements p-2 mt-2">

                    <h6>ACHIEVEMENTS</h6>
                    <?php
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $ambil = $koneksi->query("SELECT * FROM tb_tim LEFT JOIN tb_achievement ON tb_tim.tim_id=tb_achievement.achievement_idtim LEFT JOIN tb_tournament ON tb_achievement.achievement_idtournament=tb_tournament.tournament_id where tb_tim.tim_id=$tim->tim_id");
                    while ($pecah = $ambil->fetch_object()) {
                        if ($pecah->achievement_id == '') {
                            echo "Tidak Ada";
                        } else { ?>
                            <div class="card achievements bg-dark p-2 mt-2" style="margin: 0px">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex flex-row  justify-content-around align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('upload/tim/' . $pecah->tim_image) ?>" alt="" height="50vw">
                                        </div>
                                        <div>
                                            <small class="text-secondary">event</small>
                                            <h6><?php echo $pecah->tournament_nama ?></h6>
                                        </div>
                                        <div>
                                            <small class="text-secondary">date</small>
                                            <h6><?php echo $pecah->tournament_tglmulai ?></h6>
                                        </div>

                                        <div>
                                            <small class="text-secondary">prize</small>
                                            <h6>IDR. <?php echo $pecah->tournament_prize ?></h6>
                                        </div>
                                        <div style="background: #e0b403;border-radius: 10px; height: 100%; width: 100px;padding: 0px">
                                            <h6 style="color:#000000;text-align: center;margin-top: 15px"><?php echo $pecah->achievement_peringkat ?> </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php   }
                        ?>


                    <?php }

                    // if ($pecah->achievement_id == 'NULL') {
                    //     echo "Tidak Ada achivement";
                    // } else {
                    // } 
                    ?>
                    <?php

                    $_SESSION['idtim'] = $tim->tim_id;
                    ?>


                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="gabungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content login-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gabung Tim Sebagai Cadangan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" style="padding: 10px">Cancel</button>
                    <a id="btn-gabung" class="btn btn-danger" href="#" style="padding: 10px">Join</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function gabungConfirm(url) {
        $('#btn-gabung').attr('href', url);
        $('#gabunhModal').modal();
    }
</script>