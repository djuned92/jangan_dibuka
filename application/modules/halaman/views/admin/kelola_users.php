<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kelola Users</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
                
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUser">
                <span class="fa fa-plus"></span> Tambah User</button>
                <br /><br />    
                
                <?php if($this->session->flashdata('create_user')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('create_user'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('aktifasi_user')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('aktifasi_user'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('reset_password')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('reset_password'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('delete_user')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('delete_user'); ?></strong>
                    </div>
                <?php endif; ?>


                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Level User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; foreach($users as $r): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->level_user?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->username?></td>
                            <td><?=$r->password?></td>
                            <td><?=$r->jabatan?></td>
                            <td><?=$r->status?></td>
                            <td>
                                <a href="<?=base_url()?>halaman/admin/reset_password/<?=$r->id_user?>">
                                    <button class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Reset Password">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </a>

                                <a href="<?=base_url()?>halaman/admin/aktifasi_user/<?=$r->id_user?>" style="<?php if ($r->status == 'Aktif') { echo "pointer-events: none";}?>">
                                    <button class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="bottom" title="Aktifasi User" <?php if ($r->status == 'Aktif') { echo 'disabled';}?>>
                                        <i class="fa fa-check"></i>
                                    </button>
                                </a>
                            
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?=$r->id_user?>" data-placement="bottom" title="Hapus">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

<!-- modal delete -->
<?php foreach($users as $r): ?>   
<div class="modal fade" id="delete<?=$r->id_user?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus User</h4>
            </div>

            <form action="<?=base_url()?>halaman/admin/delete_user/<?=$r->id_user?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus user <strong><?=$r->username?></strong></h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal delete -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<!-- modal add -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah User</h4>
            </div>

            <form id="tambahUser" action="<?=base_url()?>halaman/admin/create_user" class="form-horizontal" method="POST">
              <div class="modal-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Level User</label>
                    <div class="col-sm-8">
                        <select name="level_user" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Asman">Asman</option>
                            <option value="Manajer">Manajer</option>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                        <select name="id_pegawai" class="form-control">
                            <option value="">- Pilih -</option>
                            
                            <?php foreach ($pegawai as $r):?>
                              <option value="<?=$r->id_pegawai?>"><?=$r->nama?></option>
                            <?php endforeach;?>
                        
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="nip" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="confirm_password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option> 
                        </select>
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
<!-- end modal add -->

<!-- modal edit -->
<?php foreach ($users as $r):?>
<div class="modal fade" id="edit<?=$r->id_user?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>

            <form id="tambahUser" action="<?=base_url()?>halaman/admin/update_user" class="form-horizontal" method="POST">
              <div class="modal-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Level User</label>
                    <div class="col-sm-8">
                        <select name="level_user" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Asman">Asman</option>
                            <option value="Manajer">Manajer</option>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                        <select name="id_pegawai" class="form-control">
                            <option value="">- Pilih -</option>
                            
                            <?php foreach ($pegawai as $r):?>
                              <option value="<?=$r->id_pegawai?>"><?=$r->nama?></option>
                            <?php endforeach;?>
                        
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="nip" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="confirm_password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option> 
                        </select>
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
<!-- end modal edit -->
