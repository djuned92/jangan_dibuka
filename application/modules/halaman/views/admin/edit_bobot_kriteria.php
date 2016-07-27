<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Bobot Kriteria</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        

        <div class="row">
            <div class="col-lg-12">
                <br /><br />  
                <?=validation_errors()?>
                <form action="<?=base_url()?>halaman/admin/update_bobot_kriteria" method="POST">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; foreach ($detail_kriteria_tahun as $r):?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$r->nama_kriteria?></td>
                        <td><input type="text" name="bobot[]" value="<?=$r->bobot?>"></td>

                        <!-- input hidden tahun -->
                        <input type="hidden" name="id_kriteria_tahunan[]" value="<?=$r->id_kriteria_tahunan?>">
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" align="right"><b>Total</b></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </td>
                    </tr>
                </table>
                </form>

         	</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper 