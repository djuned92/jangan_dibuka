<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kelola Pegawai</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">
                <i class="fa fa-plus"></i> Tambah Pegawai
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
            				<th>Nip</th>
            				<th>Nama</th>
            				<th>Jabatan</th>
            				<!-- <th>Email</th> -->
            				<th>Aksi</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php $i=1; foreach($pegawai as $r):?>
            			<tr>
            				<td><?=$i++?></td>
            				<td><?=$r->nip?></td>
            				<td><?=$r->nama?></td>
            				<td><?=$r->nama_jabatan?></td>
            				<!-- <td><?=$r->email?></td> -->
            				<td>
            					<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_pegawai?>" data-placement="bottom" title="Detail <?=$r->nama?>">
                                   <i class="fa fa-eye"></i>
                                </button>

                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?=$r->id_pegawai?>" data-placement="bottom" title="Edit <?=$r->nama?>">
                                   <i class="fa fa-edit"></i>
                                </button>

                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?=$r->id_pegawai?>" data-placement="bottom" title="Hapus <?=$r->nama?>">
                                    <i class="fa fa-trash-o"></i>
                                </button>

                                <!-- modal detail pegawai -->
                                <div class="modal fade" id="detail<?=$r->id_pegawai?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Detail Pegawai</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?=base_url()?>assets/img/<?=$r->foto?>" class="img-rounded" style="width:140px; height:120px;">
                                                    </div>
                                                
                                                    <div class="col-md-10">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Detail Pegawai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="1">Nip</td>
                                                                    <td colspan="2"><?=$r->nip?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nama</td>
                                                                    <td colspan="2"><?=$r->nama?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">TTL</td>
                                                                    <td colspan="2">
                                                                        <?php
                                                                            $tanggal_lahir = $r->tanggal_lahir; 
                                                                            echo $r->tempat.', '.$tanggal_lahir;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Alamat</td>
                                                                    <td colspan="2"><?=$r->alamat?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Email</td>
                                                                    <td colspan="2"><?=$r->email?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Jenis Kelamin</td>
                                                                    <td colspan="2">
                                                                        <?php 
                                                                        if($r->jenis_kelamin == 'P')
                                                                        {
                                                                            echo "Perempuan";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Laki - Laki";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Pendidikan</td>
                                                                    <td colspan="2"><?=$r->pendidikan?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Mulai Bekerja</td>
                                                                    <td colspan="2"><?=$r->mulai_bekerja?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Status</td>
                                                                    <td colspan="2"><?=$r->status?></td>
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
                                <!-- end modal detail pegawai -->

                                <!-- modal hapus -->
                                <div class="modal fade" id="delete<?=$r->id_pegawai?>" tabindex="-1" role="dialog">
								    <div class="modal-dialog modal-lg">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">Hapus Pegawai</h4>
								            </div>

								            <form action="<?=base_url()?>admin/kelola_pegawai/delete/<?=$r->id_pegawai?>" class="form-horizontal" method="POST">
								                <div class="modal-body">
								                    <h4>Apakah anda ingin menghapus pegawai dengan nama <strong><?=$r->nama?> ?</strong></h4>
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

<!-- modal create pegawai -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Pegawai</h4>
            </div>

            <form action="<?=base_url()?>admin/kelola_pegawai/create" class="form-horizontal pegawai" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                	<div class="form-group">
	                    <label class="col-sm-3 control-label">NIP</label>
	                    <div class="col-sm-8">
	                        <input type="text" name="nip" class="form-control" placeholder="NIP">
	                    </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Nama</label>
	                    <div class="col-sm-8">
	                        <input type="text" name="nama" class="form-control" placeholder="Nama">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Jabatan</label>
			            <div class="col-sm-8">
			                <select name="id_jabatan" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    
			                    <?php foreach($jabatan as $r): ?>
			                    <option value="<?=$r->id_jabatan?>"><?=$r->nama_jabatan?></option>
			                	<?php endforeach;?>
			                
			                </select>
			            </div>
			        </div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
	                    <div class="col-sm-3">
			                <input type="text" name="tempat" class="form-control"  placeholder="Tempat Lahir">
			            </div>
			            <div class="col-sm-3">
			                <input type="date" name="tanggal_lahir" class="form-control">
			            </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Alamat</label>
	                    <div class="col-sm-8">
			                <textarea class="form-control" rows="3" name="alamat"></textarea>
			            </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Email</label>
	                    <div class="col-sm-8">
	                        <input type="email" name="email" class="form-control" placeholder="Ex = contoh@email.com">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Jenis Kelamin</label>
			            <div class="col-sm-8">
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="L" checked> Laki - Laki
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="P"> Perempuan
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="col-sm-3 control-label">Pendidikan</label>
			            <div class="col-sm-3">
			                <select name="pendidikan" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="SMA/SMK">SMA/SMK</option>
			                    <option value="D3">D3</option>
			                    <option value="S1">S1</option>
			                    <option value="S2">S2</option>
			                </select>
			            </div>
			        </div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Mulai Bekerja</label>
	                    <div class="col-sm-3">
	                        <input type="text" name="mulai_bekerja" class="form-control" placeholder="Ex = 2003">
	                    </div>
                  	</div>

					<div class="form-group">
	                    <label class="col-sm-3 control-label">Foto</label>
	                    <div class="col-sm-8">
	                        <input type="file" name="userfile" class="form-control">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Status</label>
			            <div class="col-sm-3">
			                <select name="status" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="Kawin">Kawin</option>
			                    <option value="Belum Kawin">Belum Kawin</option>
			                </select>
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
<!-- end modal create pegawai -->

<!-- modal edit pegawai -->
<?php foreach($pegawai as $r):?>
<div class="modal fade" id="edit<?=$r->id_pegawai?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Pegawai</h4>
            </div>

            <form action="<?=base_url()?>admin/kelola_pegawai/update/<?=$r->id_pegawai?>" class="form-horizontal pegawai" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                	<div class="form-group">
	                    <label class="col-sm-3 control-label">NIP</label>
	                    <div class="col-sm-8">
	                        <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?=$r->nip?>">
	                    </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Nama</label>
	                    <div class="col-sm-8">
	                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$r->nama?>">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Jabatan</label>
			            <div class="col-sm-8">
			                <select name="id_jabatan" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    
			                    <?php foreach($jabatan as $datas):?>
			                    <option value="<?=$datas->id_jabatan?>" <?=$datas->id_jabatan == $r->id_jabatan ? 'selected = "selected"': ''; ?>><?=$datas->nama_jabatan?></option>
			                	<?php endforeach;?>
			                
			                </select>
			            </div>
			        </div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
	                    <div class="col-sm-3">
			                <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="<?=$r->tempat?>">
			            </div>
			            <div class="col-sm-3">
			                <input type="date" name="tanggal_lahir" class="form-control" value="<?=$r->tanggal_lahir?>">
			            </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Alamat</label>
	                    <div class="col-sm-8">
			                <textarea class="form-control" rows="3" name="alamat"><?=$r->alamat?></textarea>
			            </div>
                  	</div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Email</label>
	                    <div class="col-sm-8">
	                        <input type="email" name="email" class="form-control" placeholder="Ex = contoh@email.com" value="<?=$r->email?>">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Jenis Kelamin</label>
			            <div class="col-sm-8">
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="L" <?=$r->jenis_kelamin == 'L' ?'checked':''?>> Laki - Laki
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="P" <?=$r->jenis_kelamin == 'P' ?'checked':''?>> Perempuan
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="col-sm-3 control-label">Pendidikan</label>
			            <div class="col-sm-3">
			                <select name="pendidikan" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="SMA/SMK" <?=$r->pendidikan == 'SMA/SMK' ? 'selected = "selected"': ''; ?>>SMA/SMK</option>
			                    <option value="D3" <?=$r->pendidikan == 'D3' ? 'selected = "selected"': ''; ?>>D3</option>
			                    <option value="S1" <?=$r->pendidikan == 'S1' ? 'selected = "selected"': ''; ?>>S1</option>
			                    <option value="S2" <?=$r->pendidikan == 'S2' ? 'selected = "selected"': ''; ?>>S2</option>
			                </select>
			            </div>
			        </div>

                  	<div class="form-group">
	                    <label class="col-sm-3 control-label">Mulai Bekerja</label>
	                    <div class="col-sm-3">
	                        <input type="text" name="mulai_bekerja" class="form-control" placeholder="Ex = 2003" value="<?=$r->mulai_bekerja?>">
	                    </div>
                  	</div>

					<div class="form-group">
	                    <label class="col-sm-3 control-label">Foto</label>
	                    <div class="col-sm-8">
	                        <input type="file" name="userfile" class="form-control">
	                    </div>
                  	</div>

                  	<div class="form-group">
			            <label class="col-sm-3 control-label">Status</label>
			            <div class="col-sm-3">
			                <select name="status" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="Kawin" <?=$r->status == 'Kawin' ? 'selected = "selected"': ''; ?>>Kawin</option>
			                    <option value="Belum Kawin" <?=$r->status == 'Belum Kawin' ? 'selected = "selected"': ''; ?>>Belum Kawin</option>
			                </select>
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
<?php endforeach;?>
<!-- end modal edit pegawai -->