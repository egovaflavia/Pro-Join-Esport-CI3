<header class="landing" id="home">
    <div class="container d-flex flex-column justify-content-end">
        <div class="row">
            <div class="col-lg-6">
                <h1>JOIN THE BIGGEST ESPORTS COMMUNITY IN INDONESIA</h1><br><br>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
        <div class="d-flex flex-row bg-black justify-content-around portal-list">
            <div class="p-2">
                <a href="<?php echo base_url() ?>pb"><img src="<?php echo base_url('frontend/img/games/pb.png') ?>" alt="" class="img-fluid">
                </a>
            </div>
            <div class="p-2">
                <a href="<?php echo base_url() ?>ml"><img src="<?php echo base_url('frontend/img/games/ml.png') ?>" alt="" class="img-fluid"></a>
            </div>
            <div class="p-2">
                <a href="<?php echo base_url() ?>pubgm"><img src="<?php echo base_url('frontend/img/games/pubgm.png') ?>" alt="" class="img-fluid"></a>
            </div>
            <div class="p-2">
                <a href="#"><img src="<?php echo base_url('frontend/img/games/pubg.png') ?>" alt="" class="img-fluid"></a>
            </div>

            <div class="p-2">
                <a href="#"><img src="<?php echo base_url('frontend/img/games/dota.png') ?>" alt="" class="img-fluid"></a>
            </div>

            <div class="p-2">
                <a href="#"><img src="<?php echo base_url('frontend/img/games/ff.png') ?>" alt="" class="img-fluid"></a>
            </div>

        </div>
    </div>
</header>

<section class="news">
    <div class="container">
        <div class="row-responsive ">
            <div class="row">
                <div class="col-lg-7" class="card bg-dark text-white mb-3" style="height: 360px; background-image: url(<?php echo base_url('frontend/img/pubg.jpeg') ?>); background-size: 100% 100%; margin-top:25px">

                    <div class="card-img-overlay d-flex flex-column" style="height: 360px; ">
                    </div>
                    <!-- </a> -->



                </div>

                <div class="col-lg-5">
                    <h6 style="color:#e0b403;text-align: right">POPULER NEWS</h6>
                    <?php foreach ($berital as $berita) : ?>
                        <a href="<?php echo site_url('overview/detail/' . $berita->berita_id) ?>">
                            <div class="row" style="margin-left: 10px">
                                <div class="col-lg-5" class="card bg-dark text-white mb-3" style="height: 100px; background-image: url(<?php echo base_url('upload/berita/' . $berita->image) ?>); background-size: 100% 100%">
                                    <div class="card-img-overlay d-flex flex-column" style="height: 100%;">

                                    </div>

                                </div>
                                <div class="col-lg-7">
                                    <h6 class="card-title mt-auto" style="margin-bottom:0px;"> <?php echo $berita->berita_judul ?></h6>
                                </div>
                            </div>

                        </a><br>
                    <?php endforeach;  ?>

                </div>
            </div>
        </div>
        <h5 class="mb-3">LATEST NEWS</h5>
        <div class=" embed-responsive">
            <div class="row">
                <?php
                // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                $ambil = $koneksi->query("SELECT * FROM tb_berita order by berita_post ASC LIMIT 6");
                while ($berita = $ambil->fetch_object()) {  ?>
                    <div class="col-lg-4 col-md-6 ">
                        <a href="<?php echo site_url('overview/detail/' . $berita->berita_id) ?>">
                            <div class="col-lg-12" class="card bg-dark text-white mb-3" style="padding-left: 0px">
                                <img src="<?php echo base_url('upload/berita/' . $berita->image) ?>" alt="" style="width:350px; height: 200px">
                                <div class="card-img-overlay d-flex flex-column">
                                    <small class="card-text" style="text-align: right"> <?php echo $berita->berita_post ?></small>
                                    <h5 class="card-title mt-auto"> <?php echo $berita->berita_judul ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <a href=" <?php echo base_url('news') ?>">
            <h4 style="text-align: right"> SEE ALL ></h4>
        </a>
    </div>
</section>


<div style="background-image: url(<?php echo base_url('frontend/img/landing.jpg') ?>);">

    <div class="row-responsive" style="background:rgba(224,180,3,0.8);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-white mb-5">
                        <center>
                            <div class="d-flex flex-column" style="margin-top: 90px; ">
                                <h5 class="font-weight-bold">GABUNG JOIN ESPORT SEKARANG</h5>
                                <p>Dapatkan Reward Menarik hanya dengan login harian <br>
                                    dan menagkan JOINESPORTs official Tournamen</p>
                                <a href="<?php echo site_url('register') ?>" class="btn btn-primary btn-block text-primary font-weight-bold" type="submit" style="background-color: #000000;">JOIN SEKARANG</a>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container" style="margin-top: 100px">
                        <h6 class="text-lg-left text-white font-weight-bold mt-3">Ada berbagai reward menarik yang dapat kamu menangkan</h6>
                        <div class="row">
                            <?php
                            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                            $reward = $koneksi->query("SELECT * FROM tb_reward ORDER BY reward_koin DESC LIMIT 3");
                            $no = 0;
                            while ($pecah = $reward->fetch_object()) {
                            ?>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('upload/reward/' . $pecah->reward_image) ?>" style="width: 100px;height:100px">
                                </div>
                            <?php $no++;
                            }
                            if ($no == 0) {
                                echo  "<div class='col-lg-4'>
                               <h5>Coming Soon</h5>
                            </div> ";
                            } ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<?php
if (isset($_SESSION['akun'])) {
    // munculkain pop up klaim jika data klaimnya tidak ada untuk hari ini
    if (empty($klaim)) {
?>
        <div class="popup-wrapper" id="popup">
            <div class="popup-container">
                <form class="form-horizontal" action="" method="">
                    <h1 style="text-align: center">KLAIM</h1>
                    <a class="btn btn-primary btn-block" href="<?php echo base_url('overview/aksi_klaim'); ?>">klaim</a>
                    <a class="popup-close" href="#popup">X</a>
                </form>

            </div>
        </div>
<?php }
}
?>

<div class="row-responsive" style="background-image: url(<?php echo base_url('frontend/img/featur.jpg'); ?>); background-size: 100% 100%">
    <div class="row-responsive" style="background:rgba(0,0,3,0.8);">
        <div class="container">
            <div class=" embed-responsive">
                <div class="row ">
                    <div class="col-lg-6">
                        <div style="margin-top: 40px; margin-bottom: 50px; width:460px;">
                            <h4 class="text-lg-left text-primary font-weight-bold mt-3">FEATURED TOURNAMENTS</h4>
                            <?php
                            $now = date('Y-m-d');

                            $ambil = $koneksi->query("SELECT * FROM tb_tournament ORDER BY tournament_tglmulai DESC LIMIT 2");
                            while ($pecah = $ambil->fetch_object()) {
                            ?> <a href="<?php echo site_url($pecah->tournament_jenis . '/detailtournament/' . $pecah->tournament_id) ?>">
                                    <div class="card bg-dark text-white mb-2 game-card" style="height:70px;">
                                        <img src="<?php echo base_url('frontend/img/placeholder.jpg') ?>" class="card-img" style="height:70px;">
                                        <div class="card-img-overlay d-flex flex-column" style="height: 70px;padding-top: 5px;">
                                            <h4 class="card-title mt-auto"><b><?php echo $pecah->tournament_nama ?></b></h4>
                                            <small class="card-text" style="margin-top: -8px;color:#e0b403"><b><?php echo $pecah->tournament_tglmulai ?></b></small>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="text-white mb-4">
                                <div class="d-flex flex-column" style=" margin-top: 50px;">
                                    <h5 class="font-weight-bold">Daftarkan Tournamen Mu di JOIN ESPORT</h5>
                                    <p>Dapatkan berbagai benefit dengan mendaftarkan <br>
                                        Tournamen mu di JOIN ESPORT</p>
                                    <!-- <a href="<?php echo base_url() ?>buattournament" class="btn btn-primary btn-block">Daftarkan Tournamen</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>