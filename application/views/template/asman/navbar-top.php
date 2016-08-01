<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">SPK PT PLN (Persero)</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="<?=base_url()?>asman/edit_profile"><i class="fa fa-user fa-fw"></i> Edit Profile</a>
            </li>
            <li><a href="<?=base_url()?>asman/ubah_password"><i class="fa fa-lock fa-fw"></i> Ubah Password</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?=base_url()?>auth/users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul><!-- /.dropdown-user -->
    </li><!-- /.dropdown -->
</ul><!-- /.navbar-top-links -->