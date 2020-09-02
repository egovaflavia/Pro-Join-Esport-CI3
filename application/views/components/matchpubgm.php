<?php
if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='" . base_url() . "';
  </script>");
}

?>
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
// $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database'); 
?>

<div class="card bg-black col-lg-12 mb-3" style="margin-top: 100px">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h6 class="text-primary font-weight-bold">UPCOMING MATCH</h6>
                <?php
                foreach ($bagan as $bagan) :
                    $jenis = $koneksi->query("SELECT tournament_jenis from tb_tournament WHERE tournament_id=$bagan->bagan_tournamentid");
                    $jenistournament = mysqli_fetch_object($jenis);
                    if (($bagan->bagan_scorea == "") && ($jenistournament->tournament_jenis == 'pubgm')) {
                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagan->bagan_tima");
                        $tima = mysqli_fetch_object($nmtim);
                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagan->bagan_timb");
                        $timb = mysqli_fetch_object($nmtim);

                ?>
                        <div class="card bg-dark text-white mb-3 game-card" style="background-image:url(<?php echo base_url('frontend/img/placeholder.jpg') ?>); background-size: 100% ;">
                            <a href="<?php echo site_url('pubgm/detailtournament/' . $bagan->bagan_tournamentid) ?>">
                                <div class="card-img d-flex flex-column" style="margin-top:-15px;margin-left:0px;">
                                    <h5 class="card-title mt-auto" style="color:white;margin-left:5px"><?php echo $tima->tim_nama ?> VS <?php echo $timb->tim_nama ?></h5>
                                    <small style="text-align:right;margin-right:5px; color:white;"><?php echo $bagan->bagan_waktu ?></small>
                                </div>
                            </a>
                        </div>

                <?php $no = 1;
                    }
                endforeach;
                if ($no != 1) {
                    echo "Tidak Ada Match";
                }
                ?>

            </div>
            <div class="col-md-6">
                <h6 class="text-primary font-weight-bold">MATCH RESULT</h6>
                <?php

                foreach ($bagans as $bagans) :
                    $jenis = $koneksi->query("SELECT tournament_jenis from tb_tournament WHERE tournament_id=$bagans->bagan_tournamentid");
                    $jenistournament = mysqli_fetch_object($jenis);
                    if (($bagans->bagan_scorea != "") && ($jenistournament->tournament_jenis == 'pubgm')) {
                        $no++;
                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_tima");
                        $tima = mysqli_fetch_object($nmtim);
                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_timb");
                        $timb = mysqli_fetch_object($nmtim);
                        $nmtim = $koneksi->query("SELECT tim_nama from tb_tim WHERE tim_id=$bagans->bagan_menang");
                        $timmenang = mysqli_fetch_object($nmtim);
                ?>
                        <div class="card bg-dark text-white mb-3 game-card" style="background-image:url(<?php echo base_url('frontend/img/placeholder.jpg') ?>); background-size: 100% ;">
                            <a href="<?php echo site_url('pubgm/detailtournament/' . $bagans->bagan_tournamentid) ?>">
                                <div class="card-img d-flex flex-column" style="margin-top:-15px;margin-left:0px;">
                                    <h5 class="card-title mt-auto" style="color:white;margin-left:5px"><?php echo $tima->tim_nama ?> VS <?php echo $timb->tim_nama ?></h5>
                                    <small style="text-align:right;margin-right:5px; color:white;"><?php echo $bagan->bagan_waktu ?></small>
                                </div>
                            </a>
                        </div>

                <?php $no = 1;
                    }
                endforeach;
                if ($no != 1) {
                    echo "Tidak Ada Match";
                }
                ?>
            </div>
        </div>
    </div>

</div>