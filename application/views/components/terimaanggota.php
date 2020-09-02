<div class="container top-section ">

    <div class="col-lg-12">
        <table class="table table-borderless table-esport">
            <thead class="bg-black">
                <tr>
                    <th>No</th>
                    <th>idPlayer</th>
                    <th>tim</th>
                    <th>Posisi</th>
                    <th width='10px'></th>

                </tr>
            </thead>
            <tbody>
                <?php
                // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
                $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
                $no = 1;
                foreach ($tim as $tim) :
                    $ambil1 = $koneksi->query("SELECT * FROM tb_request WHERE request_timid=$tim->tim_id");
                    while ($request = $ambil1->fetch_object()) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><a href="<?php
                                            echo site_url($request->request_jenis . '/detailplayer/' . $request->request_playerid) ?>"><?php echo $request->request_playerid ?></a></td>
                            <td><?php echo $tim->tim_nama ?></td>
                            <td> <?php echo $request->request_posisi ?></td>
                            <td><a href="<?php echo site_url('overview/acc/' . $request->request_id) ?>" class="btn btn-primary btn-block">TERIMA</a><a href="<?php echo site_url('overview/tolak/' . $request->request_id) ?>" class="btn btn-primary btn-block">TOLAK</a></td>
                        </tr>
                <?php
                    }
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php

?>