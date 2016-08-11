<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Penilaian Kinerja</h1>
            </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 ">

            <table class="table table-striped table-bordered table-hover" id="myTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jabatan yang diusulkan</th>
                  <th>Hasil Penilaian</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $x = 1;
                  foreach($_detail_nilai_pegawai as $r):
                ?>
                <tr>
                  <td><?=$x++?></td>
                  <td><?=$r->nama?></td>
                  <td><?=$r->nama_jabatan?></td>
                  <td>
                    <?php
                      $hasil = 0;
                      for($i=1; $i<=$total; $i++)
                      {
                       foreach ($detail_nilai_pegawai as $datas) 
                       {
                         if($datas->id_nilai_pegawai == $i)
                         {
                           $evaluasi = $datas->bobot * $datas->bobot_nilai;
                           $hasil += $evaluasi;
                         }
                       }
                       if($hasil !=0 and $r->id_nilai_pegawai == $i)
                       { 
                         echo $hasil;
                       }
                       $hasil = 0; // reset hasil
                      }
                    ?>
                  </td>
                </tr>
                <?php
                  endforeach;
                ?>
              </tbody>
            </table>
              
          </div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->