<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Send Email</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 ">
                <?=validation_errors()?>
                <form action="<?=base_url()?>halaman/admin/process_send_mail" class="form-horizontal" method="POST">    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-8">
                            <input type="text" name="subject" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-8">
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->