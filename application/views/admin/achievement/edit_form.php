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
                <center>Data achievement</center>
            </h3> <br>

            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-header">

                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/achievement/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $achievement->achievement_id ?>" />


                        <div class="form-group">
                            <label for="achievement_idtournament" class="col-sm-2 control-label">id tournament</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('achievement_idtournament') ? 'is-invalid' : '' ?>" type="text" name="achievement_idtournament" readonly placeholder="achievement_idtournament" value="<?php echo $achievement->achievement_idtournament ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('achievement_idtournament') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="achievement_idtim" class="col-sm-2 control-label">ID tim</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('achievement_idtim') ? 'is-invalid' : '' ?>" type="text" readonly name="achievement_idtim" placeholder="achievement_idtim" value="<?php echo $achievement->achievement_idtim ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('achievement_idtim') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="achievement_idplayer" class="col-sm-2 control-label">id player</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('achievement_idplayer') ? 'is-invalid' : '' ?>" type="text" readonly name="achievement_idplayer" placeholder="achievement_idplayer" value="<?php echo $achievement->achievement_idplayer ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('achievement_idplayer') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="achievement_peringkat" class="col-sm-2 control-label">Peringkat</label>
                            <div class="col-sm-8">
                                <input class="form-control1 <?php echo form_error('achievement_peringkat') ? 'is-invalid' : '' ?>" type="text" name="achievement_peringkat" placeholder="achievement_peringkat" value="<?php echo $achievement->achievement_peringkat ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('achievement_peringkat') ?>
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
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>