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
                <center>Data Tournament</center>
            </h3> <br>

            <div class="container-fluid">

                <div class="card-header" style="margin-left: 30px">
                    <a class="btn-success btn" style="margin-bottom: 20px;" href="<?php echo site_url('admin/tournament/') ?>">Back</a>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                        <input type="hidden" name="id" value="<?php echo $tournament->tournament_id ?>" />

                        <div class="form-group">
                            <label for="tournament_jenis" class="col-sm-2 control-label">Jenis Tournament</label>
                            <div class="col-sm-9">
                                <select class="form-control1 <?php echo form_error('tournament_jenis') ? 'is-invalid' : '' ?>" type="text" name="tournament_jenis" placeholder="Jenis tournament" value="<?php echo $tournament->tournament_jenis ?>">
                                    <option value="<?php echo $tournament->tournament_jenis ?>"><?php echo $tournament->tournament_jenis ?></option>
                                    <option value="pubg">PUBG</option>
                                    <option value="ml">Mobile Legend</option>
                                    <option value="dota">DOTA</option>
                                    <option value="freefire">FREE FIRE</option>
                                    <option value="pb">PB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_nama" class="col-sm-2 control-label">Nama tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_nama') ? 'is-invalid' : '' ?>" type="text" name="tournament_nama" placeholder="tournament_nama" value="<?php echo $tournament->tournament_nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_status" class="col-sm-2 control-label">Status Tournament</label>
                            <div class="col-sm-9">
                                <select class="form-control1 <?php echo form_error('tournament_status') ? 'is-invalid' : '' ?>" type="text" name="tournament_status" placeholder="Status Tournament" value="<?php echo $tournament->tournament_status ?>">
                                    <option value="<?php echo $tournament->tournament_status ?>"><?php echo $tournament->tournament_status ?></option>
                                    <option value="segera">Segera</option>
                                    <option value="mulai">Mulai</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_tglmulai" class="col-sm-2 control-label">tglmulai tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_tglmulai') ? 'is-invalid' : '' ?>" type="date" name="tournament_tglmulai" placeholder="tournament_tglmulai" value="<?php echo $tournament->tournament_tglmulai ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_tglmulai') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tournament_tglakhir" class="col-sm-2 control-label">Tanggal Selesai tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_tglakhir') ? 'is-invalid' : '' ?>" type="date" name="tournament_tglakhir" placeholder="tournament_tglakhir" value="<?php echo $tournament->tournament_tglakhir ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_tglakhir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_participan" class="col-sm-2 control-label">participan tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_participan') ? 'is-invalid' : '' ?>" type="text" name="tournament_participan" placeholder="tournament_participan" value="<?php echo $tournament->tournament_participan ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_participan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_mode" class="col-sm-2 control-label">mode tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_mode') ? 'is-invalid' : '' ?>" type="text" name="tournament_mode" placeholder="tournament_mode" value="<?php echo $tournament->tournament_mode ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_mode') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_lokasi" class="col-sm-2 control-label">lokasi tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_lokasi') ? 'is-invalid' : '' ?>" type="text" name="tournament_lokasi" placeholder="tournament_lokasi" value="<?php echo $tournament->tournament_lokasi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_lokasi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_rules" class="col-sm-2 control-label">Rules Tournament</label>
                            <div class="col-sm-9">
                                <textarea class="form-control1 texteditor <?php echo form_error('tournament_rules') ? 'is-invalid' : '' ?>" name="tournament_rules" placeholder=" isi tournament_rules" value="<?php echo $tournament->tournament_rules ?>"><?php echo $tournament->tournament_rules ?></textarea>
                            </div>
                            <div class="invalid-feedback">
                                <?php echo form_error('tournament_rules') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tournament_prize" class="col-sm-2 control-label">Prize Koin tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_prize') ? 'is-invalid' : '' ?>" type="text" name="tournament_prize" placeholder="Prize koin tournament" value="<?php echo $tournament->tournament_prize ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('tournament_prize') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tournament_prize1" class="col-sm-2 control-label">Prize Uang tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_prize1') ? 'is-invalid' : '' ?>" type="text" name="tournament_prize1" placeholder="Prize uang tournament" value="<?php echo $tournament->tournament_prize1 ?>" />
                                <div class="invalid-feedback">
                                </div>
                                <?php echo form_error('tournament_prize1') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_fee" class="col-sm-2 control-label">Fee tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_fee') ? 'is-invalid' : '' ?>" type="text" name="tournament_fee" placeholder="tournament_fee" value="<?php echo $tournament->tournament_fee ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_fee') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_region" class="col-sm-2 control-label">Region tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_region') ? 'is-invalid' : '' ?>" type="text" name="tournament_region" placeholder="tournament_region" value="<?php echo $tournament->tournament_region ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_region') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_format" class="col-sm-2 control-label">Format tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_format') ? 'is-invalid' : '' ?>" type="text" name="tournament_format" placeholder="tournament_format" value="<?php echo $tournament->tournament_format ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_format') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_organizer" class="col-sm-2 control-label">Organizer tournament</label>
                            <div class="col-sm-9">
                                <input class="form-control1 <?php echo form_error('tournament_organizer') ? 'is-invalid' : '' ?>" type="text" name="tournament_organizer" placeholder="tournament_organizer" value="<?php echo $tournament->tournament_organizer ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_organizer') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tournament_detail" class="col-sm-2 control-label">Detail Tournament</label>
                            <div class="col-sm-9">
                                <textarea class="form-control1 texteditor <?php echo form_error('tournament_detail') ? 'is-invalid' : '' ?>" name="tournament_detail" placeholder="tournament detail"><?php echo $tournament->tournament_detail ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tournament_detail') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-info btn" type="submit" name="btn" value="Save" style="margin-bottom: 30px; margin-top: 10px">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js') ?>"></script>
    <!-- panggil ckeditor.js -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <!-- panggil adapter jquery ckeditor -->
    <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/adapters/jquery.js') ?>"></script>
    <!-- setup selector -->
    <script type="text/javascript">
        $('textarea.texteditor').ckeditor();
    </script>
</body>

</html>