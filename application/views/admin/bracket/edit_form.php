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
                <center>Data Bracket</center>
            </h3> <br>

            <div class="card-header">

                <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/bracket/') ?>">Back</a>
            </div>
            <div class="card-body">

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                    <input type="hidden" name="id" value="<?php echo $bracket->bracket_id ?>" />


                    <div class="form-group">
                        <label for="bracket_tournamentid" class="col-sm-2 control-label">Nama Tournament</label>
                        <div class="col-sm-8">
                            <select name="bracket_tournamentid" class="form-control1">
                                <?php foreach ($bracket1 as $bracket) : ?>
                                    <option value="<?php echo $bracket->tournament_id ?>"><?php echo $bracket->tournament_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Gambar bracket</label>
                        <div class="col-sm-9">
                            <input class="form-control-file <?php echo form_error('bracket_gambar') ? 'is-invalid' : '' ?>" type="file" name="bracket_gambar" />
                            <div class="invalid-feedback">
                            </div>
                            <?php echo form_error('bracket_gambar') ?>
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