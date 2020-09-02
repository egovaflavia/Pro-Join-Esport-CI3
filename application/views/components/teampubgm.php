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
        <!-- <img src="<?php echo base_url('frontend/img/games/dota.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <h4 class="font-weight-bold portal-title">TEAM LIST</h4>
        <div class="portal-nav ml-auto">
            <a href="<?php echo base_url() ?>pubgm/player" class="mr-2 ">PLAYERS</a>
            <a href="<?php echo base_url() ?>pubgm/team" class="mr-2 active">TEAMS</a>
            <a href="<?php echo base_url() ?>pubgm/tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>
<div class="container col-lg-2 embed-responsive">
    <?php
    $regis = $_SESSION['id'];
    $id = $regis->registrasi_id;
    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
    $player = $koneksi->query("SELECT * FROM tb_player LEFT JOIN tb_posisi ON tb_player.player_id= tb_posisi.posisi_playerid WHERE player_registrasi='$id' AND player_jenis='pubgm'");
    $nmplayer = $player->fetch_object();
    // elseif ($nmplayer->player_timid != '') { 
    //      } 
    $_SESSION['jenis'] = "pubgm";

    if (isset($_SESSION['akun'])) {
        if ($nmplayer->posisi_timid != '') {
        } else { ?>
            <a href="<?php echo base_url() ?>daftarteam" class="btn btn-primary btn-block">Daftar Tim</a>
        <?php  } ?>
    <?php
    } else { ?>
        <a href="<?php echo base_url() ?>daftarteam" class="btn btn-primary btn-block">Daftar Tim</a>

    <?php }
    ?>
</div>
<!-- <div class="container col-lg-2 embed-responsive">
    <?php

    $_SESSION['jenis'] = "pubgm";
    ?>
    <a href="<?php echo base_url() ?>daftarteam" class="btn btn-primary btn-block">Daftar Tim</a>

</div> -->
<div class="embed-responsive">
    <div class="card bg-black mb-5" style="overflow-x:auto">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12 d-flex flex-row mb-3">
                    <small class="mr-3 mt-1">SORT BY</small>
                    <select class="select-custom" id="selectTeam">
                        <option value="0">-select-</option>
                        <option value="1" onclick="myFunction()">A-Z</option>
                        <option value="2" onclick="myFunction()">Z-A</option>
                    </select>
                </div>
                <div id="awal" class="container">
                    <?php
                    echo " <div class='container'>
                       <div class='row mt-3'>";
                    foreach ($team as $a) {
                        echo "
                    <div class='col-lg-3'>
                        <a href=" . site_url('pubgm/detailtim/' . $a->tim_id) . ">
                        <div class='card bg-dark text-white mb-3 game-card'>
                        <div class='row' style='margin-top: 10px'>
                            <div class='col-lg-4' style='margin-left: 10px'>
                           <div style='background-image:url(" . base_url('upload/tim/' . $a->tim_image) . ");background-size: 100% 100%; width:70px;height: 70px '>
                           </div>
                           
                            </div>
                            <div  class='col-lg-6' style='padding-top:20px'>
                                <h5 class='card-title mt-auto'>" . $a->tim_nama
                            . "</h5>
                                
                            </div>
                        </div>
                    </div>
                        </a>
                    </div> ";
                    }
                    echo "</div> </div>";
                    ?>
                </div>
                <div id="tampilTimPubgm" class="container" style="display: none">
                </div>
                <script>
                    function myFunction() {
                        var x = document.getElementById("awal");
                        var y = document.getElementById("tampilTimPubgm");
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
        </div>
    </div>
</div>