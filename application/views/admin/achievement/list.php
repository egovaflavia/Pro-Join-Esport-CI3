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

            <div class="card-header" style="margin-left: 30px">

                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/achievement/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatables">
                        <thead>
                            <tr style="background-color: #000">
                                <th>ID tournament</th>
                                <th>Nama Tim</th>
                                <th>ID Player</th>
                                <th>Peringkat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($achievements as $achievement) :
                                $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                                // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                                $ambil2 = $koneksi->query("SELECT * FROM tb_tournament WHERE tournament_id= $achievement->achievement_idtournament");
                                $pecah = $ambil2->fetch_object();
                                $ambil2 = $koneksi->query("SELECT * FROM tb_tim WHERE tim_id= $achievement->achievement_idtim");
                                $tim = $ambil2->fetch_object(); ?>
                                <tr>
                                    <td width="100">
                                        <?php echo "<font color='#000'> $pecah->tournament_nama </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $tim->tim_nama </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $achievement->achievement_idplayer </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $achievement->achievement_peringkat </font>" ?>
                                    </td>


                                    <td width="150">
                                        <a href="<?php echo site_url('admin/achievement/edit/' . $achievement->achievement_id) ?>" class="btn btn-small">Edit</a>
                                        <a onclick="deleteConfirm('<?php echo site_url('admin/achievement/delete/' . $achievement->achievement_id) ?>')" href="#!" class="btn btn-small text-danger"> Hapus</a>
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
    <?php $this->load->view("admin/_partials/footer.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>



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