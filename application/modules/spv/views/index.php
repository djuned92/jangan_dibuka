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
              <strong>Selamat Datang, Anda Login sebagai SPV Sumber Daya Manusia</strong>
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

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->