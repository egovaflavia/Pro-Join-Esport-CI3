<div class="navbar-default sidebar" role="navigation">
    <center><img src="<?php echo base_url(); ?>frontend/img/logo/logo je2.png" alt="" width="100px"></center>
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu" style="margin-left: 20px">
            <li>
                <a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/berita">Berita</a>
            </li>
            <li>
                <a href="#">Player<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url() ?>admin/players">Data Player</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/posisi">Data Posisi</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/sponsor">Sponsor</a>
                <a href="<?php echo base_url() ?>admin/tim">Tim</a>
                <a href="<?php echo base_url() ?>admin/registrasi">Registrasi</a>
                <a href="<?php echo base_url() ?>admin/tournament">Tournament</a>
                <a href="<?php echo base_url() ?>admin/achievement">Achievements</a>
                <a href="<?php echo base_url() ?>admin/poin">Poin</a>
                <a href="<?php echo base_url() ?>admin/reward">Reward</a>
            </li>


            <li>
                <a href="#">Pendaftaran<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url() ?>admin/daftartim">Pendaftar Tim</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/daftartournament">Pendaftar Tournament</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#">Bracket<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url() ?>admin/bracket">Bracket </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/bagan">Bagan </a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/komentar">Komentar </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/klaim">Klaim </a>
            </li>

            <li>
                <a href="<?php echo site_url('logout') ?>"><i class="fa fa-dashboard fa-fw nav_icon"></i>Logout</a>
            </li>



        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>