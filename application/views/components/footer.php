<div style="background-color:#e0b403">
    <div class="container embed-responsive">
        <center>
            <h6 style="color:black;margin-top:5px;margin-bottom:0px "><b>Mitra Kami</b></h6>
            <?php
            // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
            $ambil = $koneksi->query("SELECT * FROM tb_sponsor");

            while ($pecah = $ambil->fetch_object()) {
            ?>
                <a href="<?php echo $pecah->sponsor_link ?>"> <img src="<?php echo base_url('upload/sponsor/' . $pecah->image) ?>" class="mb-2" style="height:50px"></a>
            <?php } ?>
        </center>
    </div>
</div>


<footer class="text-white-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo base_url('frontend/img/logo/header.png') ?>" width="60%" class="mb-3">
                <p>JOINESPORTS merupakan portal media yang menyajikan event,update turnamen, profil tim, match analysis,
                    prediksi, dan masih banyak lagi. Gabung JOINESPORTS sekarang dan dapatkan berbagai benefit!</p>
            </div>
            <div class="col-lg-6 ml-auto text-lg-right">
                <a href="<?php echo base_url() ?>">HOME</a>
                <!-- <a href="">NEWS</a> -->
                <!-- <a href="">ABOUT</a> -->
                <a href="#">CONTACT</a>
                <!-- <a href="">PARTNERS</a> -->
                <br>
                <div class="social d-flex justify-content-lg-end">
                    <a href="#" class="mx-2">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom d-flex flex-row text-lg-left text-sm-center">
        <div class="container">
            <p>Copyright © JOINESPORTS. All Right Reserved</p>
        </div>
    </div>
</footer>