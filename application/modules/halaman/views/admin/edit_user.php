<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit User</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
            	<form action="<?=base_url()?>halaman/admin/update_user/<?=$users->id_user?>" class="form-horizontal" method="POST">
            		
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Level User</label>
                        <div class="col-sm-6">
                            <select name="level_user" class="form-control" readonly>
                                <option value="">-- Pilih --</option>
                                <option value="Admin" <?=$users->level_user == 'Admin' ? 'selected = "selected"': ''; ?>>Admin</option>
                                <option value="Asman" <?=$users->level_user == 'Asman' ? 'selected = "selected"': ''; ?>>Asman</option>
                                <option value="Manajer" <?=$users->level_user == 'Manajer' ? 'selected = "selected"': ''; ?>>Manajer</option>
                            </select>
                        </div>
                    </div>

            		<div class="form-group">
                        <label class="col-sm-3 control-label">NIP</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nip" value="<?=$users->nip?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" value="<?=$users->nama?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="Aktif" <?=$users->status == 'Aktif' ? 'selected = "selected"': ''; ?>>Aktif</option>
			                    <option value="Tidak Aktif" <?=$users->status == 'Tidak Aktif' ? 'selected = "selected"': ''; ?>>Tidak Aktif</option>
			                </select>
		                </div>
                    </div>

                    <div class="form-group">
			            <label class="col-sm-3 control-label"></label>
			            <div class="col-sm-3">
			                <input type="hidden" name="<?=$users->id_user?>" value="<?=$users->id_user?>">
			                <a href="<?=base_url()?>halaman/admin/kelola_users"><button class="btn btn-default">Batal</button></a>                
			                <button type="submit" class="btn btn-primary">Simpan</button>
			        </div>
            	</form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->