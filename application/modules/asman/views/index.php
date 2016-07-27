<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Home</h1>
            </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 ">
            <div class="alert alert-info">
              <strong>Selamat Datang, Anda Login sebagai Asman Keuangan, SDM, dan Administrasi</strong>
            </div>

            <div class="alert alert-warning">
                <strong>Jabatan yang kosong 
                  <ul>
                    <?php foreach($jabatan as $r):?>
                    <li><?=$r->nama_jabatan?></li>
                    <?php endforeach; ?>
                  </ul>
                </strong>
            </div>
            
          </div>
        </div>

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