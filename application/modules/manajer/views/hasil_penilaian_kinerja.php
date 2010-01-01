<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Penilaian Kinerja</h1>
            </div>
        </div>
        
        <?php if ($this->uri->segment(4) == NULL): ?>
          <div class="row">
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
                          <li><a href="<?=base_url()?>manajer/hasil_penilaian_kinerja/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
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
                            <li><a href="<?=base_url()?>manajer/hasil_penilaian_kinerja/index/<?=$r->tahun?>"><?=$r->tahun?></a></li>
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
          </div>

          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jabatan Yang Diusulkan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($_detail_nilai_pegawai as $r):?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?=$r->nama?></td>
                    <td><?=$r->nama_jabatan?></td>
                    <td>
                    <!-- input hidden tahun -->
                    <input type="hidden" name="tahun" value="<?=$r->tahun?>">
                      <!-- status pegawai dipromosikan atau tidak -->
                      <div class="btn-group">
                          <button class="btn btn-xs btn-default">
                            <?php if($r->status_nilai_pegawai == 'Dipromosikan'){echo "Dipromosikan";}else{echo "Tidak Dipromosikan";}?>
                          </button>
                          <button class="btn btn-xs btn-default dropdown-toggle"  data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=base_url()?>manajer/hasil_penilaian_kinerja/promosi/<?=$r->id_nilai_pegawai?>">Dipromosikan</a></li>
                            <li><a href="<?=base_url()?>manajer/hasil_penilaian_kinerja/tidak_promosi/<?=$r->id_nilai_pegawai?>">Tidak Dipromosikan</a></li>
                          </ul>
                      </div>
                    </td>
                    <td>
                      <!-- button aksi detail pegawais -->
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detailPegawai<?=$r->id_pegawai?>" title="Detail Pegawai">
                        <i class="fa fa-eye"></i>
                      </button>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>  
          </div>
        <?php endif; ?>
        
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<!-- modal detail pegawai -->
<?php foreach ($pegawai as $r):?>
<div class="modal fade" id="detailPegawai<?=$r->id_pegawai?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Detail Pegawai</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="<?=base_url()?>assets/img/<?=$r->foto?>" class="img-rounded" style="width:140px; height:120px;">
                </div>
            
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3">Detail Pegawai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="1">Nip</td>
                                <td colspan="2"><?=$r->nip?></td>
                            </tr>
                            <tr>
                                <td colspan="1">Nama</td>
                                <td colspan="2"><?=$r->nama?></td>
                            </tr>
                            <tr>
                                <td colspan="1">TTL</td>
                                <td colspan="2">
                                    <?php
                                        $tanggal_lahir = $r->tanggal_lahir; 
                                        echo $r->tempat.', '.$tanggal_lahir;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Alamat</td>
                                <td colspan="2"><?=$r->alamat?></td>
                            </tr>
                            <tr>
                                <td colspan="1">Jenis Kelamin</td>
                                <td colspan="2">
                                    <?php 
                                    if($r->jenis_kelamin == 'P')
                                    {
                                        echo "Perempuan";
                                    }
                                    else
                                    {
                                        echo "Laki - Laki";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Pendidikan</td>
                                <td colspan="2"><?=$r->pendidikan?></td>
                            </tr>
                            <tr>
                                <td colspan="1">Mulai Bekerja</td>
                                <td colspan="2"><?=$r->mulai_bekerja?></td>
                            </tr>
                            <tr>
                                <td colspan="1">Jabatan</td>
                                <td colspan="2"><?=$r->nama_jabatan?></td>
                            </tr>
                            <tr>
                                <td colspan="1">Status</td>
                                <td colspan="2"><?=$r->status?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3">Sertifikat Diklat</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nama Sertifikat</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $this->load->model('sertifikat_diklat_model','sertifikat_diklat');
                            $sertifikat_diklat = $this->sertifikat_diklat->get_by_id_pegawai($r->id_pegawai); 
                            foreach($sertifikat_diklat as $datas):
                                if($datas->id_pegawai == $r->id_pegawai):
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$datas->nama_serdik?></td>
                                <td><?=$datas->nilai?></td>
                            </tr>
                            <?php endif; endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- end modal detail pegawai -->
