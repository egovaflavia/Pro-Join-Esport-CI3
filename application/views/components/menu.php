<?php
error_reporting(0);
?>
<div class="responsive">
    <nav class="navbar navbar-expand-sm fixed-top navbar-second">
        <div class="container">
            <ul class="navbar-nav ml-auto">
                <?php
                if (!isset($_SESSION['akun'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="" data-toggle="modal" data-target="#loginForm">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>register">REGISTER</a>
                    </li>
                <?php
                }
                if (isset($_SESSION['akun'])) { ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>login/logout">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>login/logout">User</a> -->
                    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        GAMES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="dropNav">
                        <a class="dropdown-item" href="<?php echo base_url() ?>pubg">PUBG</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>ml">Mobile Legends</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>ff">Free Fire</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>pb">Point Blank</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>dota">DOTA</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>pubgm">PUBG Mobile</a>
                    </div>
                    </li> -->
                <?php }
                ?>
            </ul>
        </div>
    </nav>
</div>
<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content login-form">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign in to JOINESPORTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                    <div class="form-group row">
                        <label for="Email" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="inputPassword" placeholder="Input your username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">PASSWORD</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Input your password">
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="save" class="btn btn-primary btn-block" value="Sign In">
                </form>

                <a href="<?php echo base_url() ?>register" class="btn btn-link btn-block">Create a new account</a>

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>"><img src="<?php echo base_url('frontend/img/logo/header.png') ?>" alt="" width="150px"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>news">NEWS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        GAMES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="dropNav">
                        <a class="dropdown-item" href="<?php echo base_url() ?>pb">Point Blank</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>ml">Mobile Legends</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>pubgm">PUBG Mobile</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>overview/coming">PUBG</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>overview/coming">DOTA</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>overview/coming">Free Fire</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>reward">REWARD</a>
                </li>
                <?php
                if (!isset($_SESSION['akun'])) { ?>


                <?php } else {
                    $regis = $_SESSION['id'];
                    $id = $regis->registrasi_id;
                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                    $ambil = $koneksi->query("SELECT * FROM tb_registrasi WHERE registrasi_id='$id'");
                    $nmuser = $ambil->fetch_object();
                    $playerpubg = $koneksi->query("SELECT * FROM tb_player LEFT JOIN tb_posisi ON tb_player.player_id=tb_posisi.posisi_playerid WHERE player_registrasi='$id'");
                    while ($nmplayer = $playerpubg->fetch_object()) {
                        if ($nmplayer->posisi_timid == '') {
                            $cek = 0;
                        } else {
                            $cek1 = 1;
                        }
                    }
                    $tim = $koneksi->query("SELECT * FROM tb_tim WHERE tim_registrasi='$id'");
                    $nmtim = $tim->fetch_object(); ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('upload/player/' . $nmuser->registrasi_image) ?>" alt="" style="width: 30px;height: 30px;border-radius: 99em; border: 0px; box-shadow: 0px 0px 2px 1px rgb(204, 204, 204); padding: 0px;">
                            <?php
                            echo substr($nmuser->registrasi_nama, 0, 7);
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="dropNav">
                            <a class="dropdown-item" href="<?php echo base_url() . "overview/profil/" . $id  ?>">Profil</a>
                            <?php if ($cek1 == 1) { ?>
                                <a class="dropdown-item" href="<?php echo base_url('overview/seting/' . $nmuser->registrasi_id) ?>">Team</a>
                                <a class="dropdown-item" href="<?php echo base_url("overview/request/" . $nmuser->registrasi_id) ?>">Request</a>
                            <?php
                            } ?>


                            <a class="dropdown-item" href="<?php echo base_url() ?>login/logout">Logout</a>
                        </div>
                    </li>
                <?php }
                ?>
                <!-- <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="">
                        <div id="hideForm">SEARCH</div> <i class="fa fa-search"></i>
                    </a>
                </li> -->
                <?php
                if (!isset($_SESSION['akun'])) { ?>
                    <li class="nav-item" id="hideForm">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginForm">LOGIN</a>
                    </li>
                    <li class="nav-item" id="hideForm">
                        <a class="nav-link" href="">REGISTER</a>
                    </li>

                <?php
                }
                if (isset($_SESSION['akun'])) { ?>
                    <li class="nav-item" id="hideForm">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>login/logout">LOGOUT</a>
                    </li>
                <?php }
                ?>

            </ul>
        </div>
    </div>
</nav>