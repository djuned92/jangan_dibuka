<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usulan Pegawai</h1>
            </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 ">
            <?=validation_errors()?>
            <form action="<?=base_url()?>spv/usulan_pegawai/create" class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-2">
                        <input type="text" name="tahun" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan Kosong</label>
                    <div class="col-sm-5">
                        <select name="id_jabatan" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($jabatan as $r):?>
                            <option value="<?=$r->id_jabatan?>"><?=$r->nama_jabatan?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="7"><p>Pilih pegawai yang akan diusulkan</p></th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pegawai as $r):?>
                        <tr>
                            <td><input type="checkbox" name="id_pegawai[]" value="<?=$r->id_pegawai?>"></td>
                            <td><?=$r->nip?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->nama_jabatan?></td>
                            <td>
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#detailPegawai<?=$r->id_pegawai?>" title="Detail Pegawai">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- modal detail pegawai -->
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
                                                                    <td colspan="1">Status</td>
                                                                    <td colspan="2"><?=$r->status?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="table table-striped"ss>
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
                                <!-- end modal detail pegawai -->

                            </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <td colspan="7" align="center"><button type="submit" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </tbody>
                </table>  
            </form>
          </div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->