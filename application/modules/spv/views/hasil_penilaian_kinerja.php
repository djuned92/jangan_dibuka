<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Penilaian Kinerja</h1>
            </div>
        </div>
        
        <div class="row">
          <?php if ($this->uri->segment(4) == NULL): ?>
            <form action="" class="form-horizontal" method="POST">
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
                          <li><a href="<?=base_url()?>spv/hasil_penilaian_kinerja/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
                </div>
              </div>
            </form>
          <?php elseif($this->uri->segment(4) != NULL):?>
            <form action="" class="form-horizontal" method="POST">
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
                          <li><a href="<?=base_url()?>spv/hasil_penilaian_kinerja/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
                </div>
              </div>
            </form>

            <div class="col-lg-6">
              <div id="chart_div"></div>
            </div>
            <div class="col-lg-6">
              <div id="chart_div_2"></div>          
            </div>
          <?php endif; ?>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->