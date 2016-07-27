<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kriteria Tahunan</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        

        <div class="row">
            <div class="col-lg-12">
                <a href="<?=base_url()?>halaman/admin/buat_kriteria_tahunan">
                    <button class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Buat Kriteria Tahunan
                    </button>
                </a>
                <br /><br />  

                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($kriteria_tahunan as $r):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->tahun?></td>
                            <td>
                                <a href="<?=base_url()?>halaman/admin/detail_kriteria_tahun/<?=$r->tahun?>">
                                    <button type="button" class="btn btn-link">Detail Kriteria
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

         	</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper  -->