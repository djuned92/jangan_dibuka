<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Profile</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
            	<form action="<?=base_url()?>halaman/admin/edit_profile/<?=$pegawai->id_pegawai?>" class="form-horizontal" method="POST">
            		
            		<div class="form-group">
                        <label class="col-sm-3 control-label">NIP</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nip" value="<?=$pegawai->nip?>" placeholder="NIP">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" value="<?=$pegawai->nama?>" placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="tempat" value="<?=$pegawai->tempat?>" placeholder="Tanggal">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?=$pegawai->tanggal_lahir?>" placeholder="Tanggal Lahir">	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" name="alamat"><?=$pegawai->alamat?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-6">
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="L" <?=$pegawai->jenis_kelamin ?'checked':''?>> Laki - Laki
			                <input type="radio" class="radio-inline" name="jenis_kelamin" value="P" <?=$pegawai->jenis_kelamin ?'checked':''?>> Perempuan
			            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control">
			                    <option value="">-- Pilih --</option>
			                    <option value="Kawin" <?=$pegawai->status == 'Kawin' ? 'selected = "selected"': ''; ?>>Kawin</option>
			                    <option value="Belum Kawin" <?=$pegawai->status == 'Belum Kawin' ? 'selected = "selected"': ''; ?>>Belum Kawin</option>
			                </select>
		                </div>
                    </div>

                    <div class="form-group">
			            <label class="col-sm-3 control-label"></label>
			            <div class="col-sm-3">
			                <input type="hidden" name="<?=$pegawai->id_pegawai?>" value="<?=$pegawai->id_pegawai?>">
			                <a href="<?=base_url()?>halaman/admin/index"><button class="btn btn-default">Batal</button></a>                
			                <button type="submit" class="btn btn-primary">Simpan</button>
			        </div>
            	</form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->