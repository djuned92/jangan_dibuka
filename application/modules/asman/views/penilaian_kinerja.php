<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Penilaian Kinerja Pegawai</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
   			  <?php if($this->session->flashdata('create')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('create'); ?></strong>
                    </div>
                <?php endif; ?>

   			<form action="<?=base_url()?>asman/penilaian_kinerja/create" class="form-horizontal" method="POST">
   				<div class="form-group">
                    <label class="col-md-2 control-label">Tahun</label>
                    <div class="col-md-4">
                        <div class="btn-group">
                            <button class="btn btn-md btn-default" disabled>
                                <?php 
                                    foreach($tahun as $r)
                                    {
                                        if($this->uri->segment(4) == $r->tahun)
                                        {
                                            echo $r->tahun; 
                                        }
                                    }
                                    if($this->uri->segment(4) == '')
                                    {
                                        echo "-- Pilih --";
                                    }
                                ?>
                            </button>
                            <button class="btn btn-md btn-default dropdown-toggle"  data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach($tahun as $r): ?>
                                <li><a href="<?=base_url()?>asman/penilaian_kinerja/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Nama Pegawai</label>
                    <div class="col-md-4">
	                    <select name="id_nilai_pegawai" class="form-control">
		                    <option value="">-- Pilih --</option>
                            <?php foreach($penilaian as $r):?>
		                    <option value="<?=$r->id_nilai_pegawai?>"><?=$r->nama?></option>
                            <?php endforeach; ?>
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
                		<td>
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <input class="form-control" type="text" name="bobot_nilai[]">
                                </div>
                            </div>
                        </td>
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
<div id="footer">
  <div class="row">
    <div class="col-lg-2 col-lg-offset-1">
      <img src="<?=base_url()?>assets/img/hitam_putih.jpg?>" class="img-circle" style="width:140px; height:120px;">
    </div>
    <div class="col-lg-5">
      <h4>PT. PLN (Persero) Distribusi Jakarta Raya dan Tangerang Area Pelayanan Pondok Gede</h4>
      <p>Jl. Raya Jati Makmur No. 150, Pondok Gede, Kota Bekasi, Jawa Barat</p>
      <p><a href="www.pln.co.id">www.pln.co.id</a></p>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-lg-5 col-lg-offset-1">
      <footer>
        <p>&copy; 2016, Sistem Penunjang Keputusan oleh <a href="https://www.facebook.com/ahmad.djunaedi.12"><i class="fa fa-facebook-square"> Ahmad Djunaedi</i></a></p>
      </footer>
    </div>
  </div>
</div>