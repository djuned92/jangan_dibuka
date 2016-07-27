<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Master Kriteria</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
        		<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addKriteria">
                    <i class="fa fa-plus"></i> Tambah Kriteria
                </button>
                <br /><br />

                <?php if($this->session->flashdata('create_kriteria')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('create_kriteria'); ?></strong>
                    </div>
                <?php endif; ?> 

        		<table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
            				<th>#</th>
            				<th>Nama Kriteria</th>
            			</tr>
        			</thead>
                    <tbody>
            			<?php $i = 1; foreach($kriteria as $r):?>
            			<tr>
            				<td><?=$i++?></td>
            				<td><?=$r->nama_kriteria?></td>
            			</tr>
        		        <?php endforeach;?>
                    </tbody>
        		</table>    
    	
    		</div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<!-- modal add kriteria -->
<div class="modal fade" id="addKriteria" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Kriteria</h4>
            </div>

            <form id="tambahKriteria" action="<?=base_url()?>spv/master_kriteria/create" class="form-horizontal" method="POST">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Kriteria</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama_kriteria" placeholder="Nama Kriteria">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- end modal add kriteria -->