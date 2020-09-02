<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <!-- <img src="<?php echo base_url('frontend/img/games/pubg.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <!-- <h4 class="font-weight-bold portal-title">Player PROFILE</h4>
        <div class="portal-nav ml-auto" style="display: none">
            <a href="<?php echo base_url() ?>Player" class="mr-2 active">PlayerS</a>
            <a href="<?php echo base_url() ?>team" class="mr-2">TEAMS</a>
            <a href="<?php echo base_url() ?>tournaments">TOURNAMENTS</a>
        </div> -->
    </div>
</div>

<div class="card bg-black mb-3">
    <div class="container">

        <?php
        $regis = $_SESSION['id'];
        $idr = $regis->registrasi_id;

        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $timm = $koneksi->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id LEFT JOIN tb_tim ON tb_posisi.posisi_timid=tb_tim.tim_id WHERE tb_player.player_registrasi=$idr ");
        //foreach ($timm as $tim) : 
        while ($tim = $timm->fetch_object()) {
            if ($tim->posisi_timid != '') {
        ?>

                <div class="row">
                    <div class="col-lg-6 d-flex flex-column" style="margin-top: 10px;margin-bottom: 10px">
                        <div class="d-flex flex-row" style="margin-top: 10px">
                            <img src="<?php echo base_url('upload/tim/' . $tim->tim_image) ?>" alt="" style="height: 100px;width: 100px" class="">
                            <div class="d-flex flex-column ml-4">
                                <a href="<?php echo base_url($tim->tim_jenis . '/detailtim/' . $tim->tim_id) ?>">
                                    <h4 class="font-weight-bold"><?php echo $tim->tim_nama ?>
                                </a>
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

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-lg-column align-items-lg-end align-items-sm-start mt-3">
                        <?php
                        // $ambil = $koneksi->query("SELECT * FROM tb_tim LEFT JOIN tb_posisi ON tb_tim.tim_id=tb_posisi.posisi_timid LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE tb_posisi.posisi_timid=$tim->tim_id AND tb_posisi.posisi_nama='Leader'");
                        // while ($posisi = $ambil->fetch_object()) {
                        // 
                        if ($tim->posisi_nama == 'Leader') {   ?>
                            <div class="text-lg-right">
                                <a href="<?php echo base_url($tim->tim_jenis . '/editteam/' . $tim->tim_id) ?>" class="btn btn-primary btn-block" style="padding: 10px">Edit</a>

                            </div>
                        <?php } else { ?>
                            <div class="text-lg-right">

                                <a onclick="keluarConfirm('<?php echo base_url('overview/keluar/' .  $tim->posisi_id) ?>')" href="#!" data-toggle="modal" data-target="#keluarModal" class="btn btn-primary btn-block" style="padding: 10px">Keluar</a>
                            </div>

                        <?php    } ?>
                    </div>
                </div>
                <?php
                $ambil1 = $koneksi->query("SELECT * FROM tb_tim LEFT JOIN tb_posisi ON tb_tim.tim_id=tb_posisi.posisi_timid LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE tb_posisi.posisi_timid=$tim->tim_id");
                if ($tim->posisi_nama == 'Leader') {
                ?>

                    <div>
                        <table class="table table-borderless table-esport">
                            <thead class="bg-black">
                                <tr>
                                    <th scope="col">ID GAME</th>
                                    <th scope="col">NICKNAME GAME</th>
                                    <th scope="col">POSISI</th>
                                    <th scope="col" width="10px">ACTION</th>
                                    <th scope="col" width="10px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($anggota = $ambil1->fetch_object()) { ?>
                                    <tr>
                                        <td><?php echo $anggota->posisi_playerid ?></td>
                                        <td><a href="<?php echo base_url($anggota->player_jenis . '/detailplayer/' . $anggota->player_id) ?>"><?php echo $anggota->player_nickname ?></td>
                                        <td><?php echo $anggota->posisi_nama ?></a></td>
                                        <td><a href="<?php echo base_url('overview/editposisi/' . $anggota->posisi_id) ?>" class="btn btn-primary btn-block" style="padding: 10px">Edit</a></td>
                                        <td>
                                            <a onclick="deleteConfirm('<?php echo base_url('overview/keluar/' . $anggota->posisi_id) ?>')" href="#!" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary btn-block" style="padding: 10px">Keluar</a> </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
        <?php
                }
            }
        } ?>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content login-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluarkan Anggota dari Tim</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" style="padding: 10px">No</button>
                    <a id="btn-delete" class="btn btn-danger" href="#" style="padding: 10px">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content login-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar dari Tim</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" style="padding: 10px">No</button>
                    <a id="btn-keluar" class="btn btn-danger" href="#" style="padding: 10px">Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    function keluarConfirm(url) {
        $('#btn-keluar').attr('href', url);
        $('#keluarModal').modal();
    }
</script>