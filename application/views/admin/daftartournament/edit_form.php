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
            <h3>
                <center>Data daftartournament</center>
            </h3> <br>

            <div class="container-fluid">
                <div class="card-header">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/daftartournament/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $daftartournament->daftartournament_id ?>" />

                        <div class="form-group">
                            <label for="tournamentid" class="col-sm-2 control-label">Nama Tournament</label>
                            <div class="col-sm-8">
                                <select name="tournamentid" class="form-control1">
                                    <?php foreach ($daftartournament1 as $daftartournament) : ?>
                                        <option value="<?php echo $daftartournament->tournament_id ?>"><?php echo $daftartournament->tournament_nama ?></option>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('tournament_nama') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="daftartournament_idtim" class="col-sm-2 control-label">Nama Tim</label>
                            <div class="col-sm-8">
                                <select name="daftartournament_idtim" class="form-control1">
                                    <?php foreach ($daftartournament2 as $daftartournament) : ?>
                                        <option value="<?php echo $daftartournament->tim_id ?>"><?php echo $daftartournament->tim_nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('tournament_jenis') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="daftartournament_idplayer" class="col-sm-2 control-label">Nama Player</label>
                            <div class="col-sm-8">
                                <select name="daftartournament_idplayer" class="form-control1">
                                    <?php foreach ($daftartournament3 as $daftartournament) : ?>
                                        <option value="<?php echo $daftartournament->player_id ?>"><?php echo $daftartournament->player_nickname ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('player_nama') ?>
                            </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-info btn" type="submit" name="btn" value="Save">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>