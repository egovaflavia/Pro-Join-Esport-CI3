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
                <center>Data Komentar</center>
            </h3> <br>

            <div class="card-header" style="margin-left: 30px">

                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/komentar/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div style="margin-left: 10px; margin-right: 10px;">

                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatables">
                            <thead>
                                <tr style="background-color: #000">

                                    <th>ID Tournament</th>
                                    <th>Nama </th>
                                    <th>Isi komentar</th>
                                    <th>Waktu komentar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($komentars as $komentar) : ?>
                                    <tr>
                                        <td>
                                            <?php echo "<font color='#000'> $komentar->komentar_idtournament </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $komentar->komentar_nama </font>" ?>
                                        </td>
                                        <td style="color: #000">
                                            <?php echo substr($komentar->komentar_isi, 0, 100) . "..." ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $komentar->komentar_waktu </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $komentar->komentar_status </font>" ?>
                                        </td>


                                        <td width="150">
                                            <a href="<?php echo site_url('admin/komentar/edit/' . $komentar->komentar_id) ?>" class="btn btn-small">Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/komentar/delete/' . $komentar->komentar_id) ?>')" href="#!" class="btn btn-small text-danger">Hapus</a>
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