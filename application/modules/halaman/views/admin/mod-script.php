<!-- add user -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tambahUser').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	level_user: {
                    validators: {
                        notEmpty: {
                            message: 'Level User tidak boleh kosong'
                        }
                    }
                },
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
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Confirm Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Confirm Password tidak sama'
                        }
                    }
                }
            }
        });
    });
</script>

<!-- tambah kriteria -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tambahKriteria').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama_kriteria: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Kriteria tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>