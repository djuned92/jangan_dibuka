<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistem Pendukung Keputusan</title>
  
  
   <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.css">

    <!-- formvalidation CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/formValidation.css">

      <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/style_vini.css">

  
</head>

<body style="background: #0ac986;">
  <div class="login-form">
     <div>
       <img class="img-rounded" src="<?=base_url()?>assets/img/logo.jpg" style="widht:80px;height:80px; margin-left:110px;">
        <h4 align="center">Sistem Pendukung Keputusan</h4>
     </div>
     <div>
      <?php if ($this->session->flashdata('username_not_register')) : ?>
          <strong>
              <span class='help-block'><?=$this->session->flashdata('username_not_register')?></span>
          </strong>
      <?php elseif ($this->session->flashdata('wrong_password')) : ?>
          <strong>
              <span class='help-block'><?=$this->session->flashdata('wrong_password')?></span>
          </strong>
      <?php elseif ($this->session->flashdata('status_tidak_aktif')) : ?>
          <strong>
              <span class='help-block'><?=$this->session->flashdata('status_tidak_aktif')?></span>
          </strong>
      <?php endif; ?>
     </div>
    <form id="defaultForm" method="post" class="form-horizontal" action="<?=base_url()?>auth/users">
     <div class="form-group ">
       <input type="text" name="username" class="form-control" placeholder="Username ">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name="password" class="form-control" placeholder="Password">
       <i class="fa fa-lock"></i>
     </div>

      <a class="link" href="#modalPesan" data-toggle="modal" data-target="#modalPesan">Help <span class="glyphicon glyphicon-question-sign"></span></a>
     <button type="submit" class="log-btn" >Log in</button>
    </form>
    
   </div>


<!-- modal pesan -->
<div id="modalPesan" class="modal fade modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Help</h4>
            </div>
            
            <form id="pesan" method="post" class="form-horizontal" action="<?=base_url()?>auth/users/create_message">  
                <div class="modal-body">   
    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Username</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="col-lg-2 control-label">Masalah</label>
                        <div class="col-lg-9">
                            <select name="masalah" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Lupa Password">Lupa Password</option>
                                <option value="Status Tidak Aktif">Status Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-lg-2 control-label">Isi pesan</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="3" name="isi_pesan" placeholder="Isi pesan"></textarea>
                        </div>
                    </div> -->
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal pesan -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- formvalidation js -->
<script src="<?=base_url()?>assets/dist/js/formValidation.js"></script>

<!-- bootstrap js -->
<script src="<?=base_url()?>assets/dist/js/framework/bootstrap.js"></script>

<!-- Validation script -->
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').formValidation({
        framework : 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Username tidak boleh kosong'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password tidak boleh kosong'
                    }
                }
            }
        }
    });
});
</script>

<!-- script modal pesan -->
<script type="text/javascript">
$(document).ready(function () {
    $('#pesan').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',  
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username tidak boleh kosong'
                    }
                }
            },
            masalah: {
                validators: {
                    notEmpty: {
                        message: 'Masalah belum dipilih'
                    }
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'), // action => <?=base_url()?>auth/users/create_message 
            type: 'POST',
            data: $form.serialize(),
            success: function(result) {
                $('#modalPesan').modal('hide');
                reload();
            }
        });
    });
});

function reload() // function reload atau refresh form modal 
{
    $('#modalPesan').on('hidden.bs.modal', function() {
         $('#pesan').formValidation('resetForm', true);
    });
}
</script>
</body>
</html>
