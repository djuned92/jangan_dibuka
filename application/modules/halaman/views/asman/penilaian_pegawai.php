<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Penilaian Pegawai</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
   			
   			<form action="<?=base_url()?>halaman/asman/create_detail_nilai_pegawai" class="form-horizontal" method="POST">
   				<div class="form-group">
                    <label class="col-lg-2 control-label">Nama Pegawai</label>
                    <div class="col-lg-4">
	                    <select name="id_nilai_pegawai" class="form-control">
		                    <option value="">-- Pilih --</option>
                            <?php foreach($usulan_pegawai as $r):?>
		                    <option value="<?=$r->id_nilai_pegawai?>"><?=$r->nama?></option>
                            <?php endforeach; ?>
		                </select>
	                </div>
                </div>

                <div class="form-group">
                	<label class="col-sm-2 control-label">Tahun</label>
            	  	<div class="col-lg-4">
	            	  	<select name="" class="form-control">
		                    <option value="">-- Pilih --</option>
		                    <option value="">2015</option>
		                    <option value="">2016</option>
		                    <option value="">2017</option>
		                    <option value="">2018</option>
		                </select>
	                </div>
                </div>

                <table class="table table-striped table-bordered table-hover">
                	<tr>
                		<th>#</th>
                		<th>Nama Kriteria</th>
                		<th>Bobot</th>
                	</tr>
                    <?php $i = 1; foreach ($tahun_kriteria as $r):?>
                	<tr>
                		<td><?=$i++?></td>
                		<td><input type="hidden" name="id_kriteria[]" value="<?=$r->id_kriteria?>"><?=$r->nama_kriteria?></td>
                		<td><input type="text" name="bobot_nilai[]"></td>
                	</tr>
                    <?php endforeach;?>
                	<tr>
                		<td colspan="3" align="center">
                			<button class="btn btn-md btn-primary" type="submit">Simpan</button>
                		</td>
                	</tr>
                </table>
   			</form>

   			</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->