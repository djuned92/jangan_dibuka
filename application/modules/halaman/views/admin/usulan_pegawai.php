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
            <form action="<?=base_url()?>halaman/admin/create_usulan_pegawai" class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jabatan Yang Dipromosikan</label>
                    <div class="col-sm-4">
                        <select name="level_user" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="">SPV Pengawasan Pendapatan</option>
                            <option value="">SPV Akuntansi</option>
                            <option value="">SPV Logistik</option>
                            <option value="">SPV Pengelolaan Piutang</option>
                            <option value="">SPV Operasi Distribusi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tahun</label>
                    <div class="col-sm-4">
                        <input type="text" name="tahun" class="form-control">
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
                            <th>Pendidikan</th>
                            <th>Mulai Bekerja</th>
                            <th>Jabatan Sekarang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pegawai as $r):?>
                        <tr>
                            <td><input type="checkbox" name="id_pegawai[]" value="<?=$r->id_pegawai?>"></td>
                            <td><?=$r->nip?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->pendidikan?></td>
                            <td><?=$r->mulai_bekerja?></td>
                            <td><?=$r->jabatan?></td>
                            <td>
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#detailPegawai<?=$r->id_pegawai?>">Detail Pegawai</button>
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