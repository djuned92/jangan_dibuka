<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?=base_url()?>admin/home">SPK PT PLN (Persero)</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages" style="width:402px; height:auto;">
            <?php foreach ($pesan as $r): ?>
            <li>
                <a href="#">
                    <div>
                        <strong>Username : <?=$r->username?></strong>
                        <span class="pull-right text-muted">
                            <em><?=$r->create_at?></em>
                        </span>
                    </div>
                    <div>Masalah : <?=$r->masalah?></div>
                </a>
            </li>
            <li class="divider"></li>
            <?php endforeach; ?>
            <li>
                <a class="text-center" href="#">
                    <strong>Read All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul><!-- /.dropdown-messages -->
    </li><!-- /.dropdown -->
</ul><!-- /.navbar-top-links -->