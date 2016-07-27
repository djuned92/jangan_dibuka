<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Semua Pesan</h1>
            </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 ">
            <?php $i = 1; foreach ($message as $r) :?>            
            <div><?=$i++?></div>
            <div>
                <strong>Username : <?=$r->username?></strong>
                <span class="text-muted">
                    <em><?=$r->create_at?></em>
                </span>
            </div>
            <div>Masalah : <?=$r->masalah?></div>
            <?php endforeach;?>
          </div>
        </div>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->