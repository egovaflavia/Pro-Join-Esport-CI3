<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <img src="<?php echo base_url('frontend/img/games/pubg.png') ?>" alt="" height="30px" class="mr-2 mb-3">
        <h4 class="font-weight-bold portal-title">GAME PORTAL</h4>
        <div class="portal-nav ml-auto">
            <a href="<?php echo base_url() ?>pubg/player" class="mr-2 ">PLAYERS</a>
            <a href="<?php echo base_url() ?>pubg/team" class="mr-2">TEAMS</a>
            <a href="<?php echo base_url() ?>pubg/tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-dark text-white mb-3">
                <img src="<?php echo base_url('frontend/img/pubg.jpeg') ?>" class="card-img" style="width: 540px;height: 345px">
                <div class="card-img-overlay d-flex flex-column">

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card bg-black mb-3">
                <div class="container">
                    <h6 class="text-lg-right text-primary font-weight-bold mt-4">ONGOING TOURNAMENTS</h6>
                    <?php
                    $now = date('Y-m-d');
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $ambil = $koneksi->query("SELECT * FROM tb_tournament  where tournament_status='mulai' AND tournament_jenis='pubg' LIMIT 3");
                    //
                    while ($pecah = $ambil->fetch_object()) {
                    ?>
                        <a href="<?php echo site_url('pubg/detailtournament/' . $pecah->tournament_id) ?>">
                            <div class="card bg-dark text-white mb-3 game-card">
                                <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                                <div class="card-img-overlay d-flex flex-column">

                                    <h5 class="card-title mt-auto"><?php echo $pecah->tournament_nama ?></h5>
                                </div>
                            </div>
                        </a>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="card bg-black col-lg-12 mb-3">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h6 class="text-primary font-weight-bold">UPCOMING MATCH</h6>
                        <div class="card bg-dark text-white mb-3 game-card">
                            <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                            <div class="card-img-overlay d-flex flex-column">
                                <small class="card-text">Last updated 3 mins ago</small>
                                <h5 class="card-title mt-auto">TEAM 1 VS TEAM 2</h5>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mb-3 game-card">
                            <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                            <div class="card-img-overlay d-flex flex-column">
                                <small class="card-text">Last updated 3 mins ago</small>
                                <h5 class="card-title mt-auto">TEAM 1 VS TEAM 2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary font-weight-bold">MATCH RESULT</h6>
                        <div class="card bg-dark text-white mb-3 game-card">
                            <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                            <div class="card-img-overlay d-flex flex-column">
                                <small class="card-text">Last updated 3 mins ago</small>
                                <h5 class="card-title mt-auto">TEAM 1 VS TEAM 2</h5>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mb-3 game-card">
                            <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                            <div class="card-img-overlay d-flex flex-column">
                                <small class="card-text">Last updated 3 mins ago</small>
                                <h5 class="card-title mt-auto">TEAM 1 VS TEAM 2</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <a href="" class=" btn btn-primary text-center mb-4 mt-4" style="width:300px; border-radius: 100px">SEE ALL MATCHES</a></center>
        </div>
        <div class="card bg-black col-lg-12 mb-5">
            <div class="container">
                <div class="row mt-4">

                    <div class="col-md-6" id="hide">
                        <h6 class="text-primary font-weight-bold">UPCOMING TOURNAMENTS</h6>
                        <?php
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $ambil = $koneksi->query("SELECT * FROM tb_tournament LEFT JOIN tb_achievement on tb_tournament.tournament_id=tb_achievement.achievement_idtournament where tournament_status='segera' AND tournament_jenis='pubg' ORDER BY tournament_tglmulai DESC LIMIT 2");
                        while ($satu = $ambil->fetch_object()) {
                            if (($satu->tournament_status == 'segera') && ($satu->tournament_id != $satu->achievement_idtournament)) { ?>
                                <a href="<?php echo site_url('pubg/detailtournament/' . $satu->tournament_id) ?>">
                                    <div class="card bg-dark text-white mb-3 game-card">
                                        <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                                        <div class="card-img-overlay d-flex flex-column">
                                            <h5 class="card-title mt-auto"><?php echo $satu->tournament_nama ?></h5>
                                            <small class="card-text"><?php echo $satu->tournament_tglmulai ?></small>
                                        </div>
                                    </div>
                                </a>
                        <?php }
                        } ?>

                    </div>
                    <div class="col-md-6" id="hide1">
                        <h6 class="text-primary font-weight-bold">PAST TOURNAMENTS</h6>
                        <?php
                        $now = date('Y-m-d');
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $ambil = $koneksi->query("SELECT * FROM tb_tournament LEFT JOIN tb_achievement on tb_tournament.tournament_id=tb_achievement.achievement_idtournament where tournament_status='selesai' AND tournament_jenis='pubg'ORDER BY tournament_tglmulai ASC LIMIT 2");
                        while ($satu = $ambil->fetch_object()) {
                            if (($satu->tournament_status == 'selesai') && ($satu->tournament_id == $satu->achievement_idtournament)) { ?>
                                <a href="<?php echo site_url('pubg/detailtournament/' . $satu->tournament_id) ?>">
                                    <div class="card bg-dark text-white mb-3 game-card">
                                        <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                                        <div class="card-img-overlay d-flex flex-column">
                                            <h5 class="card-title mt-auto"><?php echo $satu->tournament_nama ?></h5>
                                            <small class="card-text"><?php echo $satu->tournament_tglmulai ?></small>
                                        </div>
                                    </div>
                                </a>
                        <?php }
                        } ?>

                    </div>
                    <!-- <div class="col-md-6" id="show" style="display: none">
                        <h6 class="text-primary font-weight-bold">UPCOMING TOURNAMENTS</h6>
                        <?php
                        $now = date('Y-m-d');
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $ambil = $koneksi->query("SELECT * FROM tb_tournament LEFT JOIN tb_achievement on tb_tournament.tournament_id=tb_achievement.achievement_idtournament where tournament_jenis='pubg' ORDER BY tournament_tglmulai DESC");
                        while ($satu = $ambil->fetch_object()) {
                            if (($satu->tournament_status == 'segera') && ($satu->tournament_id != $satu->achievement_idtournament)) { ?>
                                <a href="<?php echo site_url('tournaments/detail/' . $satu->tournament_id) ?>">
                                    <div class="card bg-dark text-white mb-3 game-card">
                                        <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                                        <div class="card-img-overlay d-flex flex-column">
                                            <h5 class="card-title mt-auto"><?php echo $satu->tournament_nama ?></h5>
                                            <small class="card-text"><?php echo $satu->tournament_tglmulai ?></small>
                                        </div>
                                    </div>
                                </a>
                        <?php }
                        } ?>

                    </div>
                    <div class="col-md-6" id="show1" style="display: none">
                        <h6 class="text-primary font-weight-bold">PAST TOURNAMENTS</h6>

                        <?php
                        $now = date('Y-m-d');
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $ambil = $koneksi->query("SELECT * FROM tb_tournament LEFT JOIN tb_achievement on tb_tournament.tournament_id=tb_achievement.achievement_idtournament where tournament_status='selesai' AND tournament_jenis='pubg' ORDER BY tournament_tglmulai ASC");
                        while ($satu = $ambil->fetch_object()) {
                            if (($satu->tournament_status == 'selesai') && ($satu->tournament_id == $satu->achievement_idtournament)) { ?>
                                <a href="<?php echo site_url('tournaments/detail/' . $satu->tournament_id) ?>">
                                    <div class="card bg-dark text-white mb-3 game-card">
                                        <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img">
                                        <div class="card-img-overlay d-flex flex-column">
                                            <h5 class="card-title mt-auto"><?php echo $satu->tournament_nama ?></h5>
                                            <small class="card-text"><?php echo $satu->tournament_tglmulai ?></small>
                                        </div>
                                    </div>
                                </a>
                        <?php }
                        } ?>

                    </div> -->
                </div>

                <!-- <script>
                    function fungsiSaya() {
                        var x = document.getElementById("show");
                        var y = document.getElementById("show1");
                        var a = document.getElementById("hide");
                        var b = document.getElementById("hide1");
                        var z = document.getElementById("btn");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            y.style.display = "block";
                            a.style.display = "none";
                            b.style.display = "none";
                            z.style.display = "none";
                        } else {
                            x.style.display = "none";
                            y.style.display = "none";
                            z.style.display = "block";

                        }
                    }
                </script> -->

            </div>
            <center>
                <!-- <button onclick="fungsiSaya()" class=" btn btn-primary text-center mb-4 mt-4" style="width:300px; border-radius: 100px" id="btn">SEE ALL TOURNAMENTS</button> -->
                <a href="<?php echo site_url('pubg/tournaments') ?>" class=" btn btn-primary text-center mb-4 mt-4" style="width:300px; border-radius: 100px" id="btn">SEE ALL TOURNAMENTS</a>

            </center>
        </div>

        <div class="col-lg-6">
            <div class="text-white mb-3">
                <div class="d-flex flex-column">
                    <table>
                        <h5 class="font-weight-bold ">PLAYER SPOTLIGHT</h5>
                        <hr width=100% style="background-color: #e0b403; margin-top: 0.9px ">
                        <thead>
                            <tr>
                                <th width="100"></th>
                                <th width="300"></th>
                                <th width="150"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                            $ambil = $koneksi->query("SELECT * FROM tb_player where player_cek='yes' AND player_jenis='pubg ' ORDER BY player_tglmasuk ASC LIMIT 3");
                            while ($pecah = $ambil->fetch_object()) {
                                $no++; ?>
                                <tr>
                                    <td> <img src="<?php echo base_url('frontend/img/id.png') ?>" style="width: 20px;height: 20px">
                                    </td>
                                    <td><a href="<?php
                                                    echo site_url('pubg/detailplayer/' . $pecah->player_id) ?>"><?php echo $pecah->player_nickname ?>
                                            <?php if ($pecah->player_cek == 'yes') { ?>
                                                <img src="<?php echo base_url('frontend/img/centang.png') ?>" style="width: 14px"><?php  } ?></a></td>
                                    <td><img src="<?php echo base_url('upload/player/' . $pecah->image) ?>" width="64" /></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="<?php echo base_url('pubg/player') ?>" class="btn btn-primary font-weight-bold mt-4">SEE ALL PLAYERS</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="text-white mb-3">
                <div class="d-flex flex-column">
                    <table style="margin-left: 10px">
                        <h5 class="font-weight-bold ">TEAM SPOTLIGHT</h5>
                        <hr width=100% style="background-color: #e0b403; margin-top: 0.9px  ">
                        <thead>
                            <tr>
                                <th width="100"></th>
                                <th width="300"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                            $ambil = $koneksi->query("SELECT * FROM tb_tim where tim_cek='yes' AND tim_jenis='pubg' ORDER BY tim_tahunmasuk ASC LIMIT 3");
                            while ($pecah = $ambil->fetch_object()) {
                                $no++; ?>
                                <tr>
                                    <td><img src="<?php echo base_url('upload/tim/' . $pecah->tim_image) ?>" style="width: 60px;height: 65px" /></td>
                                    <td><?php echo $pecah->tim_nama ?></td>
                                </tr> <?php } ?>
                        </tbody>
                    </table>
                    <a href="<?php echo base_url('pubg/team') ?>" class="btn btn-primary font-weight-bold mt-4">SEE ALL TEAMS</a>
                </div>
            </div>
        </div>




    </div>
</div>