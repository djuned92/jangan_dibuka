<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hasil Usulan Pegawai</h1>
            </div>
        </div>
        
        <div class="row">
          	<div class="col-lg-12">
          		<table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Tahun Usulan</th>
                            <th>Jabatan Yang Diusulkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($hasil_usulan_pegawai as $r):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->nip?></td>
                            <td><?=$r->nama?></td>
                            <td><?=$r->tahun?></td>
                            <td><?=$r->nama_jabatan?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>  
        	</div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->