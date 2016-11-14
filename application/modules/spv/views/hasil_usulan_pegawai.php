<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Usulan Pegawai</h1>
            </div>
        </div>
        
        <div class="row">
          	<div class="col-lg-12">
          		<table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Nip</th>
                            <th>Nama</th> -->
                            <th>Tahun Usulan</th>
                            <th>Jabatan Yang Diusulkan</th>
                            <th>Pegawai Yang Diusulkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($hasil_usulan_pegawai as $r):?>
                        <tr>
                            <td><?=$i++?></td>
                            <!-- <td><?=$r->nip?></td>
                            <td><?=$r->nama?></td> -->
                            <td><?=$r->tahun?></td>
                            <td><?=$r->nama_jabatan?></td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#usulanPegawai<?=$r->tahun?>" data-placement="bottom" title="Pegawai Yang Diusulkan">
                                   <i class="fa fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>  
        	</div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<!-- modal pegawai usulan -->
<?php foreach($hasil_usulan_pegawai as $r):?>
<div class="modal fade" id="usulanPegawai<?=$r->tahun?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pegawai Yang Diusulkan</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $this->load->model('nilai_pegawai_model','nilai_pegawai');
                                    $data = $this->nilai_pegawai->get_nilai_pegawai($r->tahun);
                                    $i = 1;
                                    foreach($data as $datas):
                                    if($r->tahun == $datas->tahun): 
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$datas->nip?></td>
                                    <td><?=$datas->nama?></td>
                                </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal detail pegawai -->