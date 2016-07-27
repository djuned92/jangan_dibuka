<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail Kriteria Tahun <?=$kriteria_tahunan->tahun?></h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        

        <div class="row">
            <div class="col-lg-12">
                <a href="<?=base_url()?>halaman/admin/edit_bobot_kriteria/<?=$kriteria_tahunan->tahun?>">
                    <button class="btn btn-sm btn-info">
                        <i class="fa fa-edit"></i> Edit Bobot Kriteria
                    </button>
                </a>
                <br/><br/>

                <?php if($this->session->flashdata('update_bobot_kriteria')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('update_bobot_kriteria'); ?></strong>
                    </div>
                <?php endif; ?>

                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                    <?php $i = 1; foreach($detail_kriteria_tahunan as $r):?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$r->nama_kriteria?></td>
                        <td><?=$r->bobot?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" align="right"><b>Total</b></td>
                        <td>1</td>
                    </tr>
                </table>
 
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper  -->