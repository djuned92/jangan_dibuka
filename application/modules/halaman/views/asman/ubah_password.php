<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ubah Password</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <form action="<?=base_url()?>halaman/asman/ubah_password" class="form-horizontal" method="POST">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password Lama</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="old_password" placeholder="Password Lama">
                        </div>
                        <?=form_error('old_password','<span class="help-block">','</span>')?>
                        <?php if($this->session->flashdata('wrong_password')):?>
                            <span class="help-block"><?=$this->session->flashdata('wrong_password')?></span>
                        <?php endif;?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password Baru</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" placeholder="Password Baru">
                        </div>
                        <?=form_error('password','<span class="help-block">','</span>')?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ulangi Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Ulangi Password">
                        </div>
                        <?=form_error('confirm_password','<span class="help-block">','</span>')?>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-3">
                            <button type="reset" class="btn btn-default">Batal</button>                
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->