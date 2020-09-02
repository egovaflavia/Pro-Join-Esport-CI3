<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='" . base_url() . "';
  </script>");
}

?>
<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <!-- <img src="<?php echo base_url('frontend/img/games/pubg.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <h4 class="font-weight-bold portal-title">TOURNAMENT DETAILS</h4>
        <div class="portal-nav ml-auto" style="display: none">
            <a href="<?php echo base_url() ?>player" class="mr-2 ">PLAYERS</a>
            <a href="<?php echo base_url() ?>team" class="mr-2">TEAMS</a>
            <a href="<?php echo base_url() ?>tournaments" class="active">TOURNAMENTS</a>
        </div>
    </div>
</div>

<div class="card bg-black mb-3">
    <div class="container p-3">
        <div class="d-flex flex-column justify-content-between" style="background-image: url(<?php echo base_url('frontend/img/reward.jpg') ?>);background-repeat: no-repeat;background-size: 100%;padding: 10px;border-radius: 10px">
            <div class="card-img-overlay d-flex flex-column">

            </div>
            <div class="text-lg-right">
                <h4 class="font-weight-bold"><?php echo $tournament->tournament_nama ?></h4>
                <h6 class="text-secondary">organized by organizer</h6>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 d-flex flex-row justify-content-lg-start justify-content-between align-items-end">
                    <div style="margin:10px">
                        <small class="text-secondary">Money</small>
                        <h6>IDR. <?php echo $tournament->tournament_prize ?></h6>
                    </div>
                    <div style="margin:10px">
                        <?php if ($tournament->tournament_prize1 == '') {
                            echo "<small class='text-secondary'>coin</small>";
                            echo "<h6> - </h6>";
                        } else { ?>
                            <small class='text-secondary'>coin</small>
                            <h6><?php echo $tournament->tournament_prize1 ?></h6>
                        <?php } ?>
                    </div>
                    <div style="margin:10px" class="ml-3">
                        <small class="text-secondary">start</small>
                        <h6><?php echo $tournament->tournament_tglmulai ?></h6>
                    </div>
                    <div style="margin:10px" class="ml-3">
                        <small class="text-secondary">finish</small>
                        <h6><?php echo $tournament->tournament_tglakhir ?></h6>
                    </div>
                    <div style="margin:10px" class="ml-3">
                        <small class="text-secondary">location</small>
                        <h6><?php echo $tournament->tournament_lokasi ?></h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $jml = $koneksi->query("SELECT COUNT(*) AS jumlah FROM tb_daftartournament  LEFT JOIN  tb_tournament on tb_tournament.tournament_id = tb_daftartournament.tournamentid WHERE tb_daftartournament.tournamentid= $tournament->tournament_id");
                    $total = mysqli_fetch_array($jml);
                    $now = date('Y-m-d');
                    $regis = $_SESSION['id'];
                    $id = $regis->registrasi_id;
                    $cek = $koneksi->query("SELECT * FROM tb_tim LEFT JOIN tb_daftartournament ON tb_tim.tim_id=tb_daftartournament.daftartournament_idtim WHERE tim_registrasi=$id AND tournamentid=$tournament->tournament_id");

                    if ($tournament->tournament_participan == $total['jumlah']) { ?>
                        <a href="#" class="btn btn-primary btn-block">FULL TOURNAMENT</a>
                    <?php } else { ?>

                        <a href="<?php echo base_url($tournament->tournament_jenis . "/daftartournaments/" . $tournament->tournament_id) ?>" class="btn btn-primary btn-block">JOIN TOURNAMENT</a>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="flex-column-reverse">
        <div class="row flex-row-reverse">
            <div class="col-lg-3 mb-3">
                <div class="card bg-black p-3">
                    <small class="text-secondary">status</small>
                    <?php
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $jml = $koneksi->query("SELECT COUNT(*) AS jumlah FROM tb_daftartournament  LEFT JOIN  tb_tournament on tb_tournament.tournament_id = tb_daftartournament.tournamentid WHERE tb_daftartournament.tournamentid= $tournament->tournament_id");
                    $total = mysqli_fetch_array($jml);
                    if ($tournament->tournament_participan == $total['jumlah']) {  ?>
                        <h6 class="text-danger"> <b><?php echo "FULL TOURNAMENT"; ?></b></h6>
                    <?php  } else { ?>
                        <h6 class="text-primary">
                            OPEN FOR REGISTRATION
                        </h6> <?php } ?>
                    <small class="text-secondary">entry fee</small>
                    <h6><?php echo $tournament->tournament_fee ?></h6>
                    <small class="text-secondary">available slots</small>
                    <h6><?php echo "{$total['jumlah']}";  ?>/<?php echo $tournament->tournament_participan ?></h6>
                    <small class="text-secondary">region</small>
                    <h6><?php echo $tournament->tournament_region ?></h6>
                    <small class="text-secondary">format</small>
                    <h6><?php echo $tournament->tournament_format ?></h6>
                </div>
            </div>

            <div class="col-lg-9">

                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#participants">Participants</a></li>
                    <li><a data-toggle="tab" href="#details">Details</a></li>
                    <li><a data-toggle="tab" href="#bracket">Bracket</a></li>
                    <li><a data-toggle="tab" href="#matches">Matches</a></li>
                    <li><a data-toggle="tab" href="#rules">Rules</a></li>
                    <li><a data-toggle="tab" href="#results">Results</a></li>
                    <li><a data-toggle="tab" href="#forum">Forum</a></li>
                </ul>

                <div class="tab-content">
                    <div id="participants" class="tab-pane fade active show">

                        <!-- <button class="btn btn-primary" style="margin-bottom: 30px" onclick="myFunction()">SHOW/HIDE PLAYER</button> -->
                        <?php
                        $no = 0;
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $ambil = $koneksi->query("SELECT * FROM tb_daftartournament LEFT JOIN tb_tim on tb_daftartournament.daftartournament_idtim=tb_tim.tim_id LEFT JOIN tb_player on tb_daftartournament.daftartournament_idplayer=tb_player.player_id  where tournamentid=$tournament->tournament_id"); ?>
                        <div id="show">
                            <div class="container">
                                <div class="row-responsive ">
                                    <div class="row">
                                        <?php
                                        while ($pecah = $ambil->fetch_object()) {
                                        ?> <div class="col-lg-3">
                                                <a href="<?php
                                                            echo site_url($pecah->tim_jenis . '/detailtim/' . $pecah->tim_id) ?>">
                                                    <div class="card bg-black text-white mb-3" style=" height: 200px; width: 200px">
                                                        <table style="height: 200px">
                                                            <tr>
                                                                <td>
                                                                    <img src="<?php echo base_url('upload/tim/' . $pecah->tim_image) ?>" alt="" style="width: 180px;height: 110px; margin-left: 10px">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4 style="margin: 0px; padding: 0px;text-align: center"><?php echo $pecah->tim_nama ?></h4>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="hide" style="display: none">
                            <div class="container">
                                <div class="row-responsive ">
                                    <div class="row">
                                        <?php
                                        while ($pecah = $ambil->fetch_object()) {
                                            echo $pecah->tim_id;
                                            echo $pecah->daftartournament_id;

                                            $no = 0;
                                            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                            $ambil = $koneksi->query("SELECT * FROM tb_daftartournament LEFT JOIN tb_tim on tb_daftartournament.daftartournament_idtim=tb_tim.tim_id LEFT JOIN tb_player on tb_tim.tim_id=tb_player.player_timid  where tournamentid=$tournament->tournament_id AND daftartournament_idtim=$pecah->tim_id ");
                                        ?>
                                            <div class="col-lg-3">
                                                <div class="card bg-black text-white mb-3" style="height: 200px; width: 200px" onmouseover="myFunction()" onmouseout="myFunction()">
                                                    <table border="1" style="height: 200px; width: 200px; text-align: center">
                                                        <?php while ($pecah1 = $ambil->fetch_object()) {
                                                            $no++;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $pecah1->player_nama ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        $no = 0;
                                                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                                        $ambil = $koneksi->query("SELECT * FROM tb_daftartournament LEFT JOIN tb_tim on tb_daftartournament.daftartournament_idtim=tb_tim.tim_id LEFT JOIN tb_player on tb_daftartournament.daftartournament_idplayer=tb_player.player_id  where tournamentid=$tournament->tournament_id AND daftartournament_idtim=$pecah->tim_id ");
                                                        while ($pecah = $ambil->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center"><?php echo $pecah->tim_nama ?></td>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                                        }
                    ?> -->
                        <script>
                            function myFunction() {
                                var x = document.getElementById("show");
                                var y = document.getElementById("hide");

                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                    y.style.display = "none";
                                } else if (y.style.display === "none") {
                                    x.style.display = "none";
                                    y.style.display = "block"
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>

                    </div>

                    <div id="details" class="tab-pane fade">
                        <p><?php echo $tournament->tournament_detail ?></p>
                    </div>
                    <div id="matches" class="tab-pane fade">
                        <table class="table table-borderless table-esport table-responsive">
                            <thead>
                                <tr>
                                    <th>Team A</th>
                                    <th>VS</th>
                                    <th>Team B</th>
                                    <th>Times</th>
                                    <th>Round</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bagan as $bagan) :
                                    if ($bagan->bagan_scorea == "") {
                                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagan->bagan_tima");
                                        $tima = mysqli_fetch_object($nmtim);
                                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagan->bagan_timb");
                                        $timb = mysqli_fetch_object($nmtim);
                                ?>
                                        <tr>
                                            <td style="color: #e0b403"><a href="<?php echo site_url('pb/detailtim/' . $bagan->bagan_tima) ?>"><?php echo $tima->tim_nama ?></a></td>
                                            <td>VS</td>
                                            <td style="color: #e0b403"><a href="<?php echo site_url('pb/detailtim/' . $bagan->bagan_timb) ?>"><?php echo $timb->tim_nama ?></a></td>
                                            <td><?php echo $bagan->bagan_waktu ?></td>
                                            <td><?php echo $bagan->bagan_babak ?></td>
                                        </tr>

                                <?php }
                                endforeach;
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <div id="rules" class="tab-pane fade">
                        <p><?php echo $tournament->tournament_rules ?></p>
                    </div>
                    <div id="results" class="tab-pane fade">
                        <table class="table table-borderless table-esport table-responsive">
                            <thead>
                                <tr>
                                    <th>Team A</th>
                                    <th>VS</th>
                                    <th>Team B</th>
                                    <th>Time</th>
                                    <th>Round</th>
                                    <th>Score Tim A</th>
                                    <th>Score Tim B</th>
                                    <th>WINNER</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bagans as $bagans) :
                                    if ($bagans->bagan_scorea != "") {
                                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_tima");
                                        $tima = mysqli_fetch_object($nmtim);
                                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_timb");
                                        $timb = mysqli_fetch_object($nmtim);
                                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_menang");
                                        $timmenang = mysqli_fetch_object($nmtim);
                                ?>
                                        <tr>
                                            <td style="color: #e0b403"><a href="<?php echo site_url('pb/detailtim/' . $bagan->bagan_tima) ?>"><?php echo $tima->tim_nama ?></a></td>
                                            <td>VS</td>
                                            <td style="color: #e0b403"><a href="<?php echo site_url('pb/detailtim/' . $bagan->bagan_timb) ?>"><?php echo $timb->tim_nama ?></a></td>
                                            <td><?php echo $bagans->bagan_waktu ?></td>
                                            <td><?php echo $bagans->bagan_babak ?></td>
                                            <td><?php echo $bagans->bagan_scorea ?></td>
                                            <td><?php echo $bagans->bagan_scoreb ?></td>
                                            <td style="color: #e0b403"><a href="<?php echo site_url('pb/detailtim/' . $bagan->bagan_menang) ?>"><?php echo $timmenang->tim_nama ?></a></td>
                                        </tr>

                                <?php }
                                endforeach;
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <div id="bracket" class="tab-pane fade">
                        <?php if (!empty($bracket)) { ?>
                            <table class="table-responsive">
                                <tr>
                                    <td style=" text-align: right;color:#e0b403">
                                        <img src="<?php echo base_url('upload/bracket/' . $bracket->bracket_gambar) ?>" width="100%"> </td>
                                </tr>
                            </table>
                        <?php } ?>
                    </div>
                    <div id="forum" class="tab-pane fade">
                        <style type="text/css">
                            .child {
                                margin-left: 50px;
                            }

                            .modal1 {
                                width: 40% !important;
                            }
                        </style>
                        <div class="container">
                            <div class="w3-panel w3-amber">
                                <p>Diskusi </p>
                            </div>
                            <form method="POST" action="<?php echo site_url('Komentar/kirimKomen/' . $tournament->tournament_id) ?>">
                                <?php
                                $regis = $_SESSION['id'];
                                $id = $regis->registrasi_id;
                                // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                $ambil2 = $koneksi->query("SELECT * FROM tb_registrasi WHERE registrasi_id= '$id'");
                                $pecah = $ambil2->fetch_object(); ?>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" type="text" placeholder="Nama" name="nama" value="<?php echo $pecah->registrasi_nama ?>" style="width: 100%;" readonly>
                                </div>
                                <div class="w3-padding">
                                    <textarea name="isi" style="width: 100%;
		height: 80px;"></textarea>
                                </div>
                                <button class="w3-button w3-block w3-amber w3-section w3-padding" type="submit">Kirim </button>

                            </form>
                        </div>
                        <?php
                        $query = $this->db->query("SELECT * FROM tb_komentar WHERE komentar_status='0' AND komentar_idtournament=$tournament->tournament_id ORDER BY komentar_waktu DESC");
                        foreach ($query->result() as $utama) :
                        ?>
                            <div class="container">
                                <div class="w3-panel w3-pale-yellow w3-leftbar w3-border-amber">

                                    <h4> <u><b><?php echo $utama->komentar_nama ?></u></b></h4>
                                    <!-- <small style="margin:0px"><?php echo $utama->komentar_waktu ?></small> -->
                                    <p><?php echo $utama->komentar_isi ?></p>
                                    <p><button class="w3-button w3-tiny w3-amber" onclick="document.getElementById('<?php echo $utama->komentar_id ?>').style.display='block'">Balas</button>
                                    </p>
                                </div>
                            </div>
                            <?php
                            $komentar_id = $utama->komentar_id;
                            $query = $this->db->query("SELECT * FROM tb_komentar WHERE komentar_status='$komentar_id' AND komentar_idtournament='$tournament->tournament_id'");
                            foreach ($query->result() as $balasan) :
                            ?>
                                <div class="container">
                                    <div class="w3-panel w3-pale-yellow w3-leftbar w3-border-amber child" style="margin-left: 50px;">
                                        <h4> <u><b><?php echo $balasan->komentar_nama ?></u></b></h4>
                                        <!-- <small style="margin:0px"><?php echo $utama->komentar_waktu ?></small> -->
                                        <p><?php echo $balasan->komentar_isi ?></p>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div id="<?php echo $utama->komentar_id ?>" class="w3-modal">
                                <div class="w3-modal-content modal1">
                                    <header class="w3-container w3-amber">
                                        <span onclick="document.getElementById('<?php echo $utama->komentar_id ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        <h2>Balas </h2>
                                    </header>
                                    <div class="w3-container">
                                        <form class="w3-container" method="POST" action="<?php echo site_url('Komentar/balasKomen/' . $tournament->tournament_id) ?>">
                                            <input type="hidden" name="id" value="<?php echo $utama->komentar_id ?>">
                                            <div class="w3-section">
                                                <?php $regis = $_SESSION['id'];
                                                $id = $regis->registrasi_id;
                                                // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                                $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                                $ambil2 = $koneksi->query("SELECT * FROM tb_registrasi WHERE registrasi_id= '$id'");
                                                $pecah = $ambil2->fetch_object(); ?>

                                                <input class="w3-input w3-border" type="text" placeholder="Nama" name="namabls" value="<?php echo $pecah->registrasi_nama ?>" style="width: 100%;" readonly>

                                                <br>
                                                <textarea name="isibls" style="width: 100%;height: 80px;"></textarea>
                                                <button class="w3-button w3-block w3-amber w3-section w3-padding" type="submit">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                    <footer class="w3-container w3-amber w3-border-top w3-padding-16">
                                    </footer>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>