<!--  Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kriteria Tahunan</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        

        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                    <i class="fa fa-plus"></i> Buat Kriteria Tahunan
                </button>
                <br /><br />  

                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1; foreach ($kriteria_tahunan as $r):?>
                        <tr>
                            <td><?=$x++?></td>
                            <td><?=$r->tahun?></td>
                            <td>
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detail<?=$r->tahun?>" data-placement="bottom" title="Detail Kriteria Tahun <?=$r->tahun?>">
                                   <i class="fa fa-eye"></i>
                                </button>

                                <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?=$r->tahun?>" data-placement="bottom" title="Edit Kriteria Tahun <?=$r->tahun?>">
                                   <i class="fa fa-edit"></i>
                                </button>
                                
                                <!-- modal detail kriteria tahunan -->
                                <div class="modal fade" id="detail<?=$r->tahun?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Detail Kriteria Tahun <?=$r->tahun?></h4>
                                            </div>

                                            <div class="modal-body">
                        
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Kriteria</th>
                                                        <th>Bobot</th>
                                                    </tr>
                                                    <?php 
                                                    $i = 1;
                                                    $this->load->model('kriteria_tahunan_model','kriteria_tahunan');
                                                    $detail_kriteria_tahunan = $this->kriteria_tahunan->detail_kriteria_tahunan($r->tahun); 
                                                    foreach($detail_kriteria_tahunan as $datas):
                                                        if($datas->tahun == $r->tahun):
                                                    ?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><?=$datas->nama_kriteria?></td>
                                                        <td><?=$datas->bobot?></td>
                                                    </tr>
                                                    <?php endif; endforeach; ?>
                                                    <tr>
                                                        <td colspan="2" align="right"><b>Total</b></td>
                                                        <td>1</td>
                                                    </tr>
                                                </table>
                        
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end modal detail kriteria tahunan-->

                                <!-- modal edit kriteria tahunan -->
                                <div class="modal fade" id="edit<?=$r->tahun?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Edit Bobot Kriteria Tahun <?=$r->tahun?></h4>
                                            </div>

                                            <form class="form-horizontal" action="<?=base_url()?>spv/kriteria_tahunan/update" method="POST">
                                                <div class="modal-body">
                                                    
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Bobot</th>
                                                        </tr>
                                                        <?php 
                                                        $i = 1;
                                                        $this->load->model('kriteria_tahunan_model','kriteria_tahunan');
                                                        $detail_kriteria_tahunan = $this->kriteria_tahunan->detail_kriteria_tahunan($r->tahun); 
                                                        foreach($detail_kriteria_tahunan as $datas):
                                                            if($datas->tahun == $r->tahun):
                                                        ?>
                                                        <tr>
                                                            <td><?=$i++?></td>
                                                            <td><?=$datas->nama_kriteria?></td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="col-sm-3">
                                                                        <input class="form-control" type="text" name="bobot[]" value="<?=$datas->bobot?>">
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- input hidden tahun -->
                                                            <input type="hidden" name="id_kriteria_tahunan[]" value="<?=$datas->id_kriteria_tahunan?>">
                                                        </tr>
                                                        <?php endif; endforeach; ?>
                                                        <tr>
                                                            <td colspan="2" align="right"><b>Total</b></td>
                                                            <td>1</td>
                                                        </tr>
                                                    </table>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal edit kriteria tahunan-->

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

         	</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper  -->

<!-- modal create kriteria tahunan -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Buat Kriteria Tahunan</h4>
            </div>

            <form id="pilihKriteria" action="<?=base_url()?>spv/kriteria_tahunan/create" class="form-horizontal" method="POST">
                <div class="modal-body">
                    
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Tahun</th>
                            <th>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="tahun">
                                    </div>
                                </div>
                            </th>
                            <th>Bobot nilai dari 0 - 1</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                        </tr>
                        <?php foreach ($kriteria as $r):?>
                        <tr>
                            <td><input type="checkbox" name="id_kriteria[]" value="<?=$r->id_kriteria?>"></td>
                            <td><?=$r->nama_kriteria?></td>
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="bobot[]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <td>1</td>
                        </tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- end modal create kriteria tahunan -->