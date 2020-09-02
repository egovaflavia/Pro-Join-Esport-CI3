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

            <div class="card-header" style="margin-left: 30px">
                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/tournament/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatables">
                        <thead>
                            <tr style="background-color: #000">
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Participan</th>
                                <th>Mode</th>
                                <th>Lokasi</th>
                                <th>Rules</th>
                                <th>Prize Koin</th>
                                <th>Prize Uang</th>
                                <th>Fee</th>
                                <th>Region</th>
                                <th>Format</th>
                                <th>Organizer</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tournaments as $tournament) : ?>
                                <tr>
                                    <td>
                                        <?php echo "<font color='#000'>$tournament->tournament_jenis </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_nama</font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_status</font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_tglmulai </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_tglakhir </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'>$tournament->tournament_participan </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_mode </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_lokasi </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'>$tournament->tournament_rules </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_prize </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_prize1 </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_fee </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_region </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_format </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tournament->tournament_organizer </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'>$tournament->tournament_detail </font>" ?>
                                    </td>
                                    <td width="150">
                                        <a href="<?php echo site_url('admin/tournament/edit/' . $tournament->tournament_id) ?>" class="btn btn-small">Edit</a>
                                        <a onclick="deleteConfirm('<?php echo site_url('admin/tournament/delete/' . $tournament->tournament_id) ?>')" href="#!" class="btn btn-small text-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/footer.php") ?>


    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript">
        $(function() {
            $("#datatables").DataTable();
        });
    </script>

</body>

</html>