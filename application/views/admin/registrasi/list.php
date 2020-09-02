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
                <center>Data Registrasi</center>
            </h3> <br>


            <div class="card-header" style="margin-left: 30px">

                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/registrasi/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatables">
                        <thead>
                            <tr style="background-color: #000">
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Facebook</th>
                                <th>Youtube</th>
                                <th>Instagram</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registrasis as $registrasi) : ?>
                                <tr>
                                    <td>
                                        <?php echo "<font color='#000'> $registrasi->registrasi_nama </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $registrasi->registrasi_nohp </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $registrasi->registrasi_email </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'> $registrasi->registrasi_username  </font>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<font color='#000'>$registrasi->registrasi_password </font>" ?>
                                    </td>
                                    <td> <?php echo "<font color='#000'> $registrasi->registrasi_tgllahir </font>"
                                            ?>
                                    </td>
                                    <td> <?php echo "<font color='#000'> $registrasi->registrasi_alamat </font>"
                                            ?>
                                    </td>
                                    <td> <?php echo "<font color='#000'> $registrasi->registrasi_fb </font>"
                                            ?>
                                    </td>
                                    <td> <?php echo "<font color='#000'> $registrasi->registrasi_yt </font>"
                                            ?>
                                    </td>
                                    <td> <?php echo "<font color='#000'> $registrasi->registrasi_ig </font>"
                                            ?>
                                    </td>

                                    <td>
                                        <img src="<?php echo base_url('upload/player/' . $registrasi->registrasi_image) ?>" width="64" />
                                    </td>
                                    <td width="150">
                                        <a href="<?php echo site_url('admin/registrasi/edit/' . $registrasi->registrasi_id) ?>" class="btn btn-small">Edit</a>
                                        <a onclick="deleteConfirm('<?php echo site_url('admin/registrasi/delete/' . $registrasi->registrasi_id) ?>')" href="#!" class="btn btn-small text-danger"> Hapus</a>
                                    </td>
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