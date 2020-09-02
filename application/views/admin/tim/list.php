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
                <center>Data Tim</center>
            </h3> <br>
            <div class="card-header" style="margin-left: 30px">
                <a class="btn btn-info" style="width: 150px" href="<?php echo site_url('admin/tim/add') ?>"> <i class="glyphicon glyphicon-plus"></i> Add New</a>
            </div>

            <div class="panel-body no-padding">
                <table class="table table-striped" id="datatables">
                    <thead>
                        <tr style="background-color: #000;">
                            <th>Jenis Tim</th>
                            <th>Tentang Tim</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Verify</th>
                            <th>Tanggal Masuk</th>
                            <th>Facebook</th>
                            <th>Youtube</th>
                            <th>Instagram</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="black">
                        <?php foreach ($tims as $tim) : ?>
                            <tr>
                                <td>
                                    <?php echo "<font color='#000'>$tim->tim_jenis  </font>" ?>
                                </td>
                                <td style="color: #000">
                                    <?php echo substr($tim->tim_about, 0, 50) . "..."
                                    ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'>$tim->tim_nama </font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'>$tim->tim_lokasi</font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'> $tim->tim_cek </font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'>$tim->tim_tahunmasuk </font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'> $tim->tim_fb </font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'> $tim->tim_yt </font>" ?>
                                </td>
                                <td>
                                    <?php echo "<font color='#000'>$tim->tim_ig <?font>" ?>
                                </td>
                                <td>
                                    <img src="<?php echo base_url('upload/tim/' . $tim->tim_image) ?>" width="64" />
                                </td>
                                <td width="150">
                                    <a href="<?php echo site_url('admin/tim/edit/' . $tim->tim_id) ?>" class="btn btn-small">Edit</a>
                                    <a onclick="deleteConfirm('<?php echo site_url('admin/tim/delete/' . $tim->tim_id) ?>')" href="#!" class="btn btn-small text-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
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