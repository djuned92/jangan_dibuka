<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kelola Sertifikat Diklat</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                    <i class="fa fa-plus"></i> Tambah Sertifikat Diklat
                </button>
                <br /><br />

                <?php if($this->session->flashdata('create')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('create'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('update')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('update'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('delete')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('delete'); ?></strong>
                    </div>
                <?php endif; ?>

                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Sertifikat diklat</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($sertifikat_diklat as $r):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->nama_serdik?></td>
                            <td><?=$r->nilai?></td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_serdik?>" data-placement="bottom" title="Detail">
                                   <i class="fa fa-eye"></i>
                                </button>

                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?=$r->id_serdik?>" data-placement="bottom" title="Edit">
                                   <i class="fa fa-edit"></i>
                                </button>

                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?=$r->id_serdik?>" data-placement="bottom" title="Hapus">
                                    <i class="fa fa-trash-o"></i>
                                </button>

                                <!-- modal detail sertifikat diklat -->
                                <div class="modal fade" id="detail<?=$r->id_serdik?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Detail Sertifikat Diklat</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?=base_url()?>assets/img/<?=$r->bukti_serdik?>" class="img-rounded" style="width:140px; height:120px;">
                                                    </div>
                                                
                                                    <div class="col-md-10">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Detail Sertifikat Diklat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="1">Nama</td>
                                                                    <td colspan="2"><?=$r->nama?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">No Sertifikat Diklat</td>
                                                                    <td colspan="2"><?=$r->no_serdik?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nama Sertifikat Diklat</td>
                                                                    <td colspan="2"><?=$r->nama_serdik?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Tanggal Mulai</td>
                                                                    <td colspan="2"><?=$r->tanggal_mulai?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Tanggal Selesai</td>
                                                                    <td colspan="2"><?=$r->tanggal_selesai?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nilai</td>
                                                                    <td colspan="2"><?=$r->nilai?></td>
                                                                </tr>
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
                                <!-- end modal detail sertifikat diklat -->

                                <!-- modal hapus -->
                                <div class="modal fade" id="delete<?=$r->id_serdik?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Hapus Pegawai</h4>
                                            </div>

                                            <form action="<?=base_url()?>admin/kelola_sertifikat_diklat/delete/<?=$r->id_serdik?>" class="form-horizontal" method="POST">
                                                <div class="modal-body">
                                                    <h4>Apakah anda ingin menghapus sertifikat diklat <strong><?=$r->nama_serdik?> ?</strong></h4>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal hapus -->

                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal create serdik -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Sertifikat Diklat</h4>
            </div>

            <form action="<?=base_url()?>admin/kelola_sertifikat_diklat/create" class="form-horizontal sertifikat" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pegawai</label>
                        <div class="col-sm-8">
                            <select name="id_pegawai" class="form-control">
                                <option value="">-- Pilih --</option>
                                
                                <?php foreach($pegawai as $r): ?>
                                <option value="<?=$r->id_pegawai?>"><?=$r->nama?></option>
                                <?php endforeach;?>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">No Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_serdik" class="form-control" placeholder="No Sertifikat Diklat">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_serdik" class="form-control" placeholder="Nama Sertifikat Diklat">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Mulai</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_mulai" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_selesai" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nilai</label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai" class="form-control" placeholder="Nilai">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Scan Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="file" name="userfile" class="form-control">
                        </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- end modal create serdik -->

<!-- modal edit serdik -->
<?php foreach($sertifikat_diklat as $r):?>
<div class="modal fade" id="edit<?=$r->id_serdik?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Sertifikat Diklat</h4>
            </div>

            <form action="<?=base_url()?>admin/kelola_sertifikat_diklat/update/<?=$r->id_serdik?>" class="form-horizontal sertifikat" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pegawai</label>
                        <div class="col-sm-8">
                            <select name="id_pegawai" class="form-control">
                                <option value="">-- Pilih --</option>
                                
                                <?php foreach($pegawai as $datas): ?>
                                <option value="<?=$datas->id_pegawai?>" <?=$r->id_pegawai == $datas->id_pegawai ? 'selected = "selected"': ''; ?>><?=$datas->nama?></option>
                                <?php endforeach;?>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">No Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_serdik" class="form-control" placeholder="No Sertifikat Diklat" value="<?=$r->no_serdik?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_serdik" class="form-control" placeholder="No Sertifikat Diklat" value="<?=$r->nama_serdik?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Mulai</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_mulai" class="form-control" value="<?=$r->tanggal_mulai?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_selesai" class="form-control" value="<?=$r->tanggal_selesai?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nilai</label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai" class="form-control" placeholder="Nilai" value="<?=$r->nilai?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Scan Sertifikat Diklat</label>
                        <div class="col-sm-8">
                            <input type="file" name="userfile" class="form-control">
                        </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal edit serdik -->