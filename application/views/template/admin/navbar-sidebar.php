<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?=base_url()?>admin/home"><i class="fa fa-home fa-fw"></i> Home</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-list-alt fa-fw"></i> Kelola<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url()?>admin/kelola_user"><i class="fa fa-user fa-fw"></i> Kelola User</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/kelola_pegawai"><i class="fa fa-users fa-fw"></i> Kelola Pegawai</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/kelola_sertifikat_diklat"><i class="fa fa-file fa-fw"></i> Kelola Sertifikat Diklat</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/kelola_jabatan"><i class="fa fa-trophy fa-fw"></i> Kelola Jabatan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=base_url()?>admin/hasil_penilaian_kinerja"><i class="fa fa-bar-chart-o fa-fw"></i> Hasil Penilaian Kinerja</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/cetak_sk"><i class="fa fa-file-text fa-fw"></i> Cetak SK Usulan Pegawai</a>
            </li>
            <li>
                <a href="<?=base_url()?>auth/users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
    </div><!-- /.sidebar-collapse -->
</div><!-- /.navbar-static-side -->