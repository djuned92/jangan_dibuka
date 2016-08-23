<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cetak SK Usulan Pegawai</h1>
            </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 ">
            
            <form action="#" class="form-horizontal" method="POST">
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
                                <li><a href="<?=base_url()?>admin/cetak_sk/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
            
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jabatan Yang Dipromosikan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($cetak_sk_pegawai as $r): ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$r->nama?></td>
                  <td><?=$r->nama_jabatan?></td>
                  <td><?=$r->status_nilai_pegawai?></td>
                  <td>
                    <a target="_blank" href="<?=base_url()?>admin/cetak_sk/cetak/<?=$r->tahun?>">
                      <button type="button" class="btn btn-xs btn-info" title="Print">
                        <i class="fa fa-print"></i>
                      </button>
                    </a>
                    <a href="<?=base_url()?>admin/cetak_sk/download/<?=$r->tahun?>">
                      <button type="button" class="btn btn-xs btn-primary" title="Download">
                        <i class="fa fa-download"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>

          </div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->s