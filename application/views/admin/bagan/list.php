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
                <center>Data bagan</center>
            </h3> <br>

            <div class="card-header" style="margin-left: 30px">

                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/bagan/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div style="margin-left: 10px; margin-right: 10px;">

                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatables">
                            <thead>
                                <tr style="background-color: #000">
                                    <th>ID Tournament</th>
                                    <th>Team A</th>
                                    <th>Tim B</th>
                                    <th>Waktu Bertanding</th>
                                    <th>Score A</th>
                                    <th>Score B</th>
                                    <th>Babak</th>
                                    <th>Menang</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($bagans as $bagan) :
                                    // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                    $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                    $ambil2 = $koneksi->query("SELECT * FROM tb_tournament WHERE tournament_id= $bagan->bagan_tournamentid");
                                    $pecah = $ambil2->fetch_object();
                                    $ambil2 = $koneksi->query("SELECT * FROM tb_tim WHERE tim_id= $bagan->bagan_tima");
                                    $tima = $ambil2->fetch_object();
                                    $ambil2 = $koneksi->query("SELECT * FROM tb_tim WHERE tim_id= $bagan->bagan_timb");
                                    $timb = $ambil2->fetch_object();
                                    $ambil2 = $koneksi->query("SELECT * FROM tb_tim WHERE tim_id= $bagan->bagan_menang");
                                    $menang = $ambil2->fetch_object(); ?>

                                    <tr>
                                        <td>
                                            <?php echo "<font color='#000'> $pecah->tournament_nama </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $tima->tim_nama </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $timb->tim_nama </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $bagan->bagan_waktu </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $bagan->bagan_scorea </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $bagan->bagan_scoreb </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $bagan->bagan_babak </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $menang->tim_nama </font>" ?>
                                        </td>
                                        <td>
                                            <?php echo "<font color='#000'> $bagan->bagan_keterangan </font>" ?>
                                        </td>

                                        <td width="150">
                                            <a href="<?php echo site_url('admin/bagan/edit/' . $bagan->bagan_id) ?>" class="btn btn-small">Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/bagan/delete/' . $bagan->bagan_id) ?>')" href="#!" class="btn btn-small text-danger">Hapus</a>
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