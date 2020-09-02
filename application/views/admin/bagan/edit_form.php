<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="page-wrapper">
            <br>
            <h1>
                <center>Data Bagan</center>
            </h1> <br>

            <div class="container-fluid">
                <div class="card-header" style="margin-left: 30px">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/bagan/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
                    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $bagan->bagan_id ?>" />

                        <?php
                        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                        $nmtournament = $koneksi->query("SELECT tournament_nama FROM tb_tournament WHERE tournament_id = $bagan->bagan_tournamentid");
                        $a = $nmtournament->fetch_object();

                        $nmtima = $koneksi->query("SELECT tim_nama FROM tb_tim WHERE tim_id = $bagan->bagan_tima");
                        $b = $nmtima->fetch_object();

                        $nmtimb = $koneksi->query("SELECT tim_nama FROM tb_tim WHERE tim_id = $bagan->bagan_timb");
                        $c = $nmtimb->fetch_object();

                        ?>

                        <div class="form-group">
                            <label for="bagan_tournamentid" class="col-sm-2 control-label">Nama Tournament</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_tournamentid') ? 'is-invalid' : '' ?>" type="text" name="bagan_tournamentid1" placeholder="bagan_tournamentid" value="<?php echo $a->tournament_nama ?>" readonly />
                                <input class="form-control1 <?php echo form_error('bagan_tournamentid') ? 'is-invalid' : '' ?>" type="hidden" name="bagan_tournamentid" placeholder="bagan_tournamentid" value="<?php echo $bagan->bagan_tournamentid ?>" readonly />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_tournamentid') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_tima" class="col-sm-2 control-label">Nama Tim A</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_tima') ? 'is-invalid' : '' ?>" type="text" name="bagan_tima1" placeholder="bagan_tima" value="<?php echo $b->tim_nama ?>" readonly>
                                <input class="form-control1 <?php echo form_error('bagan_tima') ? 'is-invalid' : '' ?>" type="hidden" name="bagan_tima" placeholder="bagan_tima" value="<?php echo $bagan->bagan_tima ?>" readonly>
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_tima') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_timb" class="col-sm-2 control-label">Nama Tim B</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_timb') ? 'is-invalid' : '' ?>" type="text" name="bagan_timb1" placeholder="bagan_timb" value="<?php echo $c->tim_nama ?>" readonly /><input class="form-control1 <?php echo form_error('bagan_timb') ? 'is-invalid' : '' ?>" type="hidden" name="bagan_timb" placeholder="bagan_timb" value="<?php echo $bagan->bagan_timb ?>" readonly />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_timb') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_waktu" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_waktu') ? 'is-invalid' : '' ?>" type="text" name="bagan_waktu" value="<?php echo $bagan->bagan_waktu ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_waktu') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_scorea" class="col-sm-2 control-label">Score tim A</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_scorea') ? 'is-invalid' : '' ?>" type="text" name="bagan_scorea" placeholder="bagan_scorea" value="<?php echo $bagan->bagan_scorea ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_scorea') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_scoreb" class="col-sm-2 control-label">Score tim B</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('bagan_scoreb') ? 'is-invalid' : '' ?>" type="text" name="bagan_scoreb" placeholder="bagan_scoreb" value="<?php echo $bagan->bagan_scoreb ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_scoreb') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_menang" class="col-sm-2 control-label">Tim Menang</label>
                            <div class="col-sm-9">

                                <select name="bagan_menang" id="bagan_tournament" class="form-control1">
                                    <option value="">-PILIH TIM-</option>
                                    <?php
                                    $menang = $koneksi->query("SELECT daftartournament_idtim,tim_nama FROM tb_daftartournament LEFT JOIN tb_tim ON tb_daftartournament.daftartournament_idtim=tb_tim.tim_id WHERE tb_daftartournament.tournamentid =$bagan->bagan_tournamentid");

                                    while ($d = $menang->fetch_object()) { ?>
                                        <option value="<?= $d->daftartournament_idtim ?>"><?= $d->tim_nama ?></option>
                                    <?php  } ?>


                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Babak</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('bagan_babak') ? 'is-invalid' : '' ?>" type="text" name="bagan_babak" placeholder="bagan_babak" value="<?php echo $bagan->bagan_babak ?>" readonly />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_babak') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bagan_keterangan" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('bagan_keterangan') ? 'is-invalid' : '' ?>" type="text" name="bagan_keterangan" placeholder="Keterangan" value="<?php echo $bagan->bagan_keterangan ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('bagan_keterangan') ?>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-info btn" type="submit" name="btn" value="Save">Simpan</button><br><br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>