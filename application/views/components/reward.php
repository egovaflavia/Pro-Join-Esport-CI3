<?php
error_reporting(0);
?>
<?php
$regis = $_SESSION['akun'];
// $ambilll = $regis->fetch_object();
$regis['nama'];

if (!isset($_SESSION['akun'])) {
    //header('location:login.php');
    echo (" <script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location='" . base_url() . "';
  </script>");
}
?>
<div class="container">
    <div class="row-responsive " style=" margin-top: 120px;margin-bottom: 20px; background-image: url(<?php echo base_url('frontend/img/reward.jpg') ?>);height: 200px">
        <div class="row-responsive" style="background:rgba(0,0,3,0.6);height: 200px">
            <div class="container p-3">
                <h1 style="text-align: center;">GET YOURSELF A REWARD!</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="nav nav-tabs">
                        <!-- <li>SORT BY <a data-toggle="tab" href="#coin">COIN</a></li> -->
                        <li><a data-toggle="tab" href="#all">ALL</a></li>
                        <li><a data-toggle="tab" href="#hardware">HARDWARE</a></li>
                        <li><a data-toggle="tab" href="#voucher">VOUCHER</a></li>
                        <li><a data-toggle="tab" href="#merch">MERCH</a></li>

                    </ul>
                </div>
                <?php
                if (isset($_SESSION['akun'])) {
                ?>
                    <div class="col-lg-6" style="text-align: right">
                        <?php
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $regis = $_SESSION['id'];
                        $id = $regis->registrasi_id;
                        $idplayer = $koneksi->query("SELECT player_id from tb_player where player_registrasi=$id");
                        $jml = 0;
                        $tgl = date('Y-m-d');
                        // $koin = $koneksi->query("INSERT INTO tb_koin ('koin_id', 'register_id', 'koin_tgl', 'koin_total') VALUES ('','$pecah->registrasi_id','$tgl','1')");
                        // $pecah = $ambil1->fetch_object();

                        while ($pecah2 = $idplayer->fetch_object()) {
                            $ambil2 = $koneksi->query("SELECT SUM(poin_jumlah) AS jumlah FROM tb_poin WHERE poin_playernama='$pecah2->player_id'");
                            $total = mysqli_fetch_array($ambil2);
                            $anggota = $total['jumlah'];
                            $jml = $jml + $anggota;
                        }
                        ?>

                        <h6> <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;">
                            <?php $klaim = $koneksi->query("SELECT SUM(klaim_poin) AS jumlah FROM tb_klaim WHERE klaim_registrasiid='$id'");
                            $total = mysqli_fetch_array($klaim);
                            $tot_klaim = $total['jumlah'];
                            $total = $tot_klaim + $jml;
                            echo $total ?></h6>

                    </div>
                <?php } else {
                    $total = 0; ?>
                    <div class="col-lg-6" style="text-align: right">

                        <h6> <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;">
                            <?php echo $total ?></h6>

                    </div>
                <?php }

                ?>
            </div>


            <div class="tab-content">
                <div id="all" class="tab-pane fade  active show">
                    <div class="embed-responsive">
                        <div class="row" style="margin-bottom: 10px; margin-left: 10px">
                            <?php
                            foreach ($rewards as $rewards) : ?>
                                <div class="col-lg-2 " style=" border: 1px solid #e0b403;margin-left: 10px; padding-right: 0px;padding-left: 10px;padding-bottom: 10px;padding-top: 10px; border-radius: 9px;margin-bottom: 10px;max-width: 15%">
                                    <table class="table-responsive">
                                        <tr>
                                            <td style=" text-align: right;color:#e0b403">
                                                <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;"> <?php echo $rewards->reward_koin ?></td>
                                        </tr>
                                        <tr style="background: url(<?php echo base_url('upload/reward/' . $rewards->reward_image) ?>); background-size: 100% 100%;height: 170px;">
                                            <td align=left valign=bottom>
                                                <?php echo $rewards->reward_nama ?><br>
                                                <font style="text-align: right;color:#e0b403;font-size: 10px"> <?php echo $rewards->reward_koin - $total ?> coin left to unlock</font>
                                            </td>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            <?php endforeach;
                            if (empty($rewards)) {
                                echo "<h1>COMING SOON</h1>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="hardware" class="tab-pane fade">
                    <div class="embed-responsive">
                        <div class="row" style="margin-bottom: 10px; margin-left: 10px">
                            <?php
                            foreach ($hardware as $hardware) : ?>
                                <div class="col-lg-2 " style=" border: 1px solid #e0b403;margin-left: 10px; padding-right: 0px;padding-left: 10px;padding-bottom: 10px;padding-top: 10px; border-radius: 9px;margin-bottom: 10px;max-width: 15%">
                                    <table class="table-responsive">
                                        <tr>
                                            <td style=" text-align: right;color:#e0b403">
                                                <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;"> <?php echo $hardware->reward_koin ?></td>
                                        </tr>
                                        <tr style="background: url(<?php echo base_url('upload/reward/' . $hardware->reward_image) ?>); background-size: 100% 100%;height: 170px;">
                                            <td align=left valign=bottom>
                                                <?php echo $hardware->reward_nama ?><br>
                                                <font style="text-align: right;color:#e0b403;font-size: 10px"> <?php echo $hardware->reward_koin - $total ?> coin left to unlock</font>
                                            </td>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            <?php endforeach;
                            if (empty($hardware)) {
                                echo "<h1>COMING SOON</h1>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="voucher" class="tab-pane fade ">
                    <div class="embed-responsive">
                        <div class="row" style="margin-bottom: 10px; margin-left: 10px">
                            <?php
                            foreach ($voucher as $voucher) : ?>
                                <div class="col-lg-2 " style=" border: 1px solid #e0b403;margin-left: 10px; padding-right: 0px;padding-left: 10px;padding-bottom: 10px;padding-top: 10px; border-radius: 9px;margin-bottom: 10px;max-width: 15%">
                                    <table class="table-responsive">
                                        <tr>
                                            <td style=" text-align: right;color:#e0b403">
                                                <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;"> <?php echo $voucher->reward_koin ?></td>
                                        </tr>
                                        <tr style="background: url(<?php echo base_url('upload/reward/' . $voucher->reward_image) ?>); background-size: 100% 100%;height: 170px;">
                                            <td align=left valign=bottom>
                                                <?php echo $voucher->reward_nama ?><br>
                                                <font style="text-align: right;color:#e0b403;font-size: 10px"> <?php echo $voucher->reward_koin - $total ?> coin left to unlock</font>
                                            </td>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            <?php endforeach;
                            if (empty($voucher)) {
                                echo "<h1>COMING SOON</h1>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="merch" class="tab-pane fade ">
                    <div class="embed-responsive">
                        <div class="row" style="margin-bottom: 10px; margin-left: 10px">
                            <?php
                            foreach ($merch as $merch) : ?>
                                <div class="col-lg-2 " style=" border: 1px solid #e0b403;margin-left: 10px; padding-right: 0px;padding-left: 10px;padding-bottom: 10px;padding-top: 10px; border-radius: 9px;margin-bottom: 10px;max-width: 15%">
                                    <table class="table-responsive">
                                        <tr>
                                            <td style=" text-align: right;color:#e0b403">
                                                <img src="<?php echo base_url('frontend/img/koin.png') ?>" style="width: 20px;"> <?php echo $merch->reward_koin ?></td>
                                        </tr>
                                        <tr style="background: url(<?php echo base_url('upload/reward/' . $merch->reward_image) ?>); background-size: 100% 100%;height: 170px;">
                                            <td align=left valign=bottom>
                                                <?php echo $merch->reward_nama ?><br>
                                                <font style="text-align: right;color:#e0b403;font-size: 10px"> <?php echo $merch->reward_koin - $total ?> coin left to unlock</font>
                                            </td>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            <?php endforeach;
                            if (empty($merch)) {
                                echo "<h1>COMING SOON</h1>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>