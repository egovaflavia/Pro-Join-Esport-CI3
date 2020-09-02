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
        <h4 class="font-weight-bold portal-title">PLAYER PROFILE</h4>
        <div class="portal-nav ml-auto" style="display: none">
            <a href="<?php echo base_url() ?>player" class="mr-2 active">PLAYERS</a>
            <a href="<?php echo base_url() ?>team" class="mr-2">TEAMS</a>
            <a href="<?php echo base_url() ?>tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>
<?php

if ($players->posisi_timid == '') { ?>
    <div class="card bg-black mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="d-flex flex-row">
                        <img src="<?php echo base_url('upload/player/' . $player->registrasi_image) ?>" alt="" style="width: 100px;height: 100px; margin-top:10px" class="">
                        <div class="d-flex flex-column ml-4">
                            <h4 class="font-weight-bold"><?php echo $player->player_nickname ?>
                                <?php if ($player->player_cek == 'yes') { ?>
                                    <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 20px"><?php  } ?></h4>
                            <!-- <h6 class="text-secondary mt-n2">id:<?php echo $player->player_id ?></h6> -->
                            <h6 class="text-secondary mt-n2"><?php echo $player->registrasi_nama ?></h6>
                            <div class="d-flex flex-row mt-3">
                                <?php if ($player->registrasi_yt == '') { ?>

                                <?php } else { ?>
                                    <a href="https://youtube.com/<?php echo $player->registrasi_yt ?>" class="mr-3">
                                        <h3><i class="fab fa-youtube"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($player->registrasi_fb == '') {
                                } else { ?>
                                    <a href="https://www.facebook.com/<?php echo $player->registrasi_fb ?>/" class="mr-3">
                                        <h3><i class="fab fa-facebook-f"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($player->registrasi_ig == '') {
                                } else { ?>
                                    <a href="https://www.instagram.com/<?php echo $player->registrasi_ig ?>/">
                                        <h3><i class="fab fa-instagram"></i>
                                        </h3>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row text-secondary mt-2 mb-1 profile-details">
                        <small class="mr-3"><i class="fa fa-map-marker-alt"></i> <?php echo $player->registrasi_alamat ?></small>

                        <small class="mr-3"><i class="fa fa-user"></i><?php
                                                                        $tanggal = new DateTime($player->registrasi_tgllahir);
                                                                        $today = new DateTime('today');
                                                                        $y = $today->diff($tanggal)->y;
                                                                        echo  " " . $y ?> tahun</small>
                        <small class="mr-3"><i class="fa fa-sign-in-alt"></i> <?php echo $player->player_tglmasuk ?></small>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card bg-black mb-5">
        <div class="container p-4">
            <h6>ACHIEVEMENTS</h6>
            <?php
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $ambil1 = $koneksi->query("SELECT * FROM tb_player LEFT JOIN tb_achievement ON tb_player.player_id=tb_achievement.achievement_idplayer LEFT JOIN tb_tournament ON tb_achievement.achievement_idtournament=tb_tournament.tournament_id where tb_achievement.achievement_idplayer=$player->player_id AND player_id='$players->player_id'");
            if ($ambil1 == 'true') {
                while ($pecah1 = $ambil1->fetch_object()) {
            ?>
                    <div class="card achievements p-2 mt-2">
                        <div class="row">
                            <div class="col-lg-6 d-flex flex-row justify-content-around align-items-center">
                                <div>
                                    <img src="<?php echo base_url('upload/tim/' . $pecah1->registrasi_image) ?>" alt="" height="50vw">
                                </div>
                                <div>
                                    <small class="text-secondary">event</small>
                                    <h6><?php echo $pecah1->tournament_nama ?></h6>
                                </div>
                                <div>
                                    <small class="text-secondary">date</small>
                                    <h6><?php echo $pecah1->tournament_tglmulai ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex flex-row justify-content-around align-items-center">
                                <div>
                                    <small class="text-secondary">prize</small>
                                    <h6>IDR. <?php echo $pecah1->tournament_prize ?></h6>
                                </div>
                                <div style="background: #e0b403;border-radius: 10px; height: 100%; width: 100px;padding: 0px">
                                    <h6 style="color:#000000;text-align: center;margin-top: 15px"><?php echo $pecah1->achievement_peringkat ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "Tidak Ada achivement";
            } ?>
        </div>
    </div>
<?php }

if ($players->posisi_timid != '') { ?>
    <div class="card bg-black mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="d-flex flex-row">
                        <img src="<?php echo base_url('upload/player/' . $players->registrasi_image) ?>" alt="" style="width: 100px;height: 100px; margin-top:10px" class="">
                        <div class="d-flex flex-column ml-4" style="margin-top:10px">
                            <h4 class="font-weight-bold"><?php echo $players->player_nickname ?>
                                <?php if ($players->player_cek == 'yes') { ?>
                                    <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 20px"><?php  } ?></h4>
                            <h4 class="text-secondary mt-n2"> </h4>
                            <h6 class="text-secondary mt-n2"><?php echo $players->registrasi_nama ?></h6>
                            <div class="d-flex flex-row mt-3">
                                <?php if ($players->registrasi_yt == '') { ?>

                                <?php } else { ?>
                                    <a href="https://youtube.com/<?php echo $players->registrasi_yt ?>" class="mr-3">
                                        <h3><i class="fab fa-youtube"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($players->registrasi_fb == '') {
                                } else { ?>
                                    <a href="https://www.facebook.com/<?php echo $players->registrasi_fb ?>/" class="mr-3">
                                        <h3><i class="fab fa-facebook-f"></i></h3>
                                    </a>
                                <?php } ?>
                                <?php if ($players->registrasi_ig == '') {
                                } else { ?>
                                    <a href="https://www.instagram.com/<?php echo $players->registrasi_ig ?>/">
                                        <h3><i class="fab fa-instagram"></i>
                                        </h3>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row text-secondary mt-2 mb-1 profile-details">
                        <small class="mr-3"><i class="fa fa-map-marker-alt"></i> <?php echo $players->registrasi_alamat ?></small>

                        <small class="mr-3"><i class="fa fa-user"></i><?php
                                                                        $tanggal = new DateTime($players->registrasi_tgllahir);
                                                                        $today = new DateTime('today');
                                                                        $y = $today->diff($tanggal)->y;
                                                                        echo  " " . $y ?> tahun</small>
                        <small class="mr-3"><i class="fa fa-sign-in-alt"></i> <?php echo $players->player_tglmasuk ?></small>
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-lg-column align-items-lg-end align-items-sm-start mt-3">
                    <div class="text-lg-right">
                        <small class="text-secondary">current team</small>
                        <h4><?php echo $players->tim_nama ?></h4>
                    </div>
                    <div>
                        <img src="<?php echo base_url('upload/tim/' . $players->tim_image) ?>" alt="" class="mt-auto ml-2" height="50px">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card bg-black mb-5">
        <div class="container p-4">
            <h6>ACHIEVEMENTS</h6>
            <?php
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $aciev = $koneksi->query("SELECT * FROM tb_achievement where achievement_idtim=$players->posisi_timid");
            while ($pecah1 = $aciev->fetch_object()) {
                if ($pecah1->achievement_idtim == $players->posisi_timid) {
                    $ambil = $koneksi->query("SELECT * FROM tb_player LEFT JOIN tb_posisi ON tb_player.player_id = tb_posisi.posisi_playerid LEFT JOIN tb_tim ON tb_tim.tim_id= tb_posisi.posisi_timid LEFT JOIN tb_achievement ON tb_tim.tim_id=tb_achievement.achievement_idtim LEFT JOIN tb_tournament ON tb_achievement.achievement_idtournament=tb_tournament.tournament_id where tb_achievement.achievement_idtim=$players->posisi_timid AND player_id='$players->player_id'");
                    while ($pecah = $ambil->fetch_object()) {
                        $no = 1;
            ?>
                        <div class="card achievements p-2 mt-2">
                            <div class="row">
                                <div class="col-lg-6 d-flex flex-row justify-content-around align-items-center">
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
                                </div>
                                <div class="col-lg-6 d-flex flex-row justify-content-around align-items-center">
                                    <div>
                                        <small class="text-secondary">team</small>
                                        <h6><?php echo $pecah->tim_nama ?></h6>
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
            <?php }
                } else {
                    $kosong = 'Tidak Ada';
                }
            }
            if ($no != 1) {
                echo 'Tidak Ada achivement';
            }
            ?>

        </div>
    </div>
<?php }
?>