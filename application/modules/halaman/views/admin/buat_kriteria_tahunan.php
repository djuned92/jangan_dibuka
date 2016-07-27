<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pilih Kriteria</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        

        <div class="row">
            <div class="col-lg-12">

                <?=validation_errors()?>
                <form id="pilihKriteria" action="<?=base_url()?>halaman/admin/create_kriteria_tahunan" class="form-horizontal" method="POST">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Tahun</th>
                            <th colspan="2"><input type="text" name="tahun"></th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                        </tr>
                        <?php foreach ($kriteria as $r):?>
                        <tr>
                            <td><input type="checkbox" name="id_kriteria[]" value="<?=$r->id_kriteria?>"></td>
                            <td><?=$r->nama_kriteria?></td>
                            <td><input type="text" name="bobot[]"></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><button type="submit" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </table>
                </form>

         	</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper  -->