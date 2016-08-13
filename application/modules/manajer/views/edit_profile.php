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
            	<form action="<?=base_url()?>manajer/edit_profile/index/<?=$pegawai->id_pegawai?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
            		
            		<div class="form-group">
                        <label class="col-sm-3 control-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?=$pegawai->nip?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$pegawai->nama?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jabatan</label>
                        <div class="col-sm-8">
                            <select name="id_jabatan" class="form-control" readonly>
                                <option value="">-- Pilih --</option>
                                
                                <?php foreach($jabatan as $datas):?>
                                <option value="<?=$datas->id_jabatan?>" <?=$datas->id_jabatan == $pegawai->id_jabatan ? 'selected = "selected"': ''; ?>><?=$datas->nama_jabatan?></option>
                                <?php endforeach;?>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="<?=$pegawai->tempat?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?=$pegawai->tanggal_lahir?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="alamat"><?=$pegawai->alamat?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" placeholder="Ex = contoh@email.com" value="<?=$pegawai->email?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="radio" class="radio-inline" name="jenis_kelamin" value="L" <?=$pegawai->jenis_kelamin == 'L' ?'checked':''?>> Laki - Laki
                            <input type="radio" class="radio-inline" name="jenis_kelamin" value="P" <?=$pegawai->jenis_kelamin == 'P' ?'checked':''?>> Perempuan
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pendidikan</label>
                        <div class="col-sm-3">
                            <select name="pendidikan" class="form-control" readonly>
                                <option value="">-- Pilih --</option>
                                <option value="SMA/SMK" <?=$pegawai->pendidikan == 'SMA/SMK' ? 'selected = "selected"': ''; ?>>SMA/SMK</option>
                                <option value="D3" <?=$pegawai->pendidikan == 'D3' ? 'selected = "selected"': ''; ?>>D3</option>
                                <option value="S1" <?=$pegawai->pendidikan == 'S1' ? 'selected = "selected"': ''; ?>>S1</option>
                                <option value="S2" <?=$pegawai->pendidikan == 'S2' ? 'selected = "selected"': ''; ?>>S2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mulai Bekerja</label>
                        <div class="col-sm-3">
                            <input type="text" name="mulai_bekerja" class="form-control" placeholder="Ex = 2003" value="<?=$pegawai->mulai_bekerja?>" readonly>
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
			        </div>

            	</form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->