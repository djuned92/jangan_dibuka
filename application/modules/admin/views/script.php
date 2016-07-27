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

<!-- pegawai -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.pegawai').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nip: {
                    validators: {
                        notEmpty: {
                            message: 'NIP tidak boleh kosong'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        }
                    }
                },
                id_jabatan: {
                    validators: {
                        notEmpty: {
                            message: 'Jabatan belum dipilih'
                        }
                    }
                },
                tempat: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat tidak boleh kosong'
                        }
                    }
                },
                tanggal_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal lahir tidak boleh kosong'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Input tidak sesuai dengan alamat email'
                        }
                    }
                },
                jenis_kelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis kelamin tidak boleh kosong'
                        }
                    }
                },
                pendidikan: {
                    validators: {
                        notEmpty: {
                            message: 'Pendidikan belum dipilih'
                        }
                    }
                },
                mulai_bekerja: {
                    validators: {
                        notEmpty: {
                            message: 'Mulai bekerja tidak boleh kosong'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Status belum dipilih'
                        }
                    }
                }
            }
        });
    });
</script>

<!-- sertifikat diklat -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.sertifikat').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_pegawai: {
                    validators: {
                        notEmpty: {
                            message: 'Pegawai belum dipilih'
                        }
                    }
                },
                no_serdik: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor sertifikat diklat tidak boleh kosong'
                        }
                    }
                },
                nama_serdik: {
                    validators: {
                        notEmpty: {
                            message: 'Nama sertifikat diklat tidak boleh kosong'
                        }
                    }
                },
                tanggal_mulai: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal mulai tidak boleh kosong'
                        }
                    }
                },
                tanggal_selesai: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal selesai tidak boleh kosong'
                        }
                    }
                },
                nilai: {
                    validators: {
                        notEmpty: {
                            message: 'Nilai sertifikat diklat tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });
</script>