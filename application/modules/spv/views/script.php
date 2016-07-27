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