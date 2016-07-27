<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kelola Jabatan</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">

                <?php if($this->session->flashdata('ada')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('ada'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('kosong')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('kosong'); ?></strong>
                    </div>
                <?php endif; ?>

                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1; foreach($jabatan as $r):?>
                        <tr>
                            <td><?=$x++?></td>
                            <td><?=$r->kode_jabatan?></td>
                            <td><?=$r->nama_jabatan?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-default">
                                        <?php if($r->status_jabatan == 'Ada'){echo "Ada";}else{echo "Kosong";}?>
                                    </button>
                                    <button class="btn btn-xs btn-default dropdown-toggle"  data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?=base_url()?>admin/kelola_jabatan/ada/<?=$r->id_jabatan?>">Ada</a></li>
                                        <li><a href="<?=base_url()?>admin/kelola_jabatan/kosong/<?=$r->id_jabatan?>">Kosong</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_jabatan?>" data-placement="bottom" title="Lihat yang menjabat">
                                   <i class="fa fa-eye"></i>
                                </button>

                                <!-- modal detail jabatan pegawai -->
                                <div class="modal fade" id="detail<?=$r->id_jabatan?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Pegawai yang menjabat</h4>
                                            </div>

                                            <div class="modal-body">
                        
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                    </tr>
                                                    <?php 
                                                    $i = 1;
                                                    $this->load->model('jabatan_model','jabatan');
                                                    $jabatan_pegawai = $this->jabatan->jabatan_pegawai($r->id_jabatan); 
                                                    foreach($jabatan_pegawai as $datas):
                                                        if($datas->id_jabatan == $r->id_jabatan):
                                                    ?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><?=$datas->nip?></td>
                                                        <td><?=$datas->nama?></td>
                                                    </tr>
                                                    <?php endif; endforeach; ?>
                                                </table>
                        
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end modal detail jabatan pegawai-->

                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>