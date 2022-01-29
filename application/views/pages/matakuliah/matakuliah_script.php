<script>
    
    $(function() {

        // select2 
        $("#jurusan").select2({
			placeholder: "Pilih Jurusan",
			dropdownParent: $("#modal-matakuliah")
		});
        $("#jenis").select2({
			placeholder: "Pilih Jenis",
			dropdownParent: $("#modal-matakuliah")
		});
        $("#sks").select2({
			placeholder: "Pilih SKS",
			dropdownParent: $("#modal-matakuliah")
		});
        $("#semester").select2({
			placeholder: "Pilih Semester",
			dropdownParent: $("#modal-matakuliah")
		});
        $("#jurusan_edit").select2({
			placeholder: "Pilih Jurusan",
			dropdownParent: $("#modal-matakuliah_edit")
		});
        $("#jenis_edit").select2({
			placeholder: "Pilih Jenis",
			dropdownParent: $("#modal-matakuliah_edit")
		});
        $("#sks_edit").select2({
			placeholder: "Pilih SKS",
			dropdownParent: $("#modal-matakuliah_edit")
		});
        $("#semester_edit").select2({
			placeholder: "Pilih Semester",
			dropdownParent: $("#modal-matakuliah_edit")
		});
        
        // clear add form
        $('#tambah-matakuliah').click(function() {
            clear(); 
        });
       
        // setup datatable
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd"  : oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength) 
            };
        };

        // server side scripting
        var table = $('#data-matakuliah').dataTable({
            initComplete: function() {
                var api = this.api();
                $('#data-matakuliah_filter input')
                    .off('.DT')
                    .on('input.DT', function () {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ordering:false,
            ajax:{
                url: "<?= base_url()?>matakuliah/show",
                type: "POST"
            },
            columns:[
                {"data": "kode_matakuliah", class:"text-center"},
                {"data": "nama_matakuliah", class:"text-center"},
                {"data": "sks", class:"text-center"},
                {"data": "semester", class:"text-center"},
                {"data": "nama_jurusan", class:"text-center"},
                {"data": "jenis", class:"text-center"},
                {"data": "status_matakuliah", class:"text-center"},
                {"data": "view", class:"text-center"}
            ],

        });

        // insert matakuliah data 
        $('#frm-matakuliah').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>matakuliah/store",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-matakuliah').DataTable().ajax.reload();
                        $('#modal-matakuliah').modal('hide');
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_matakuliah_err != "") {
                            $('#kode_matakuliah-err').html(res.kode_matakuliah_err);
                        } else {
                            $('#kode_matakuliah-err').html('');
                        }

                        if (res.nama_matakuliah_err != "") {
                            $('#nama_matakuliah-err').html(res.nama_matakuliah_err);
                        } else {
                            $('#nama_matakuliah-err').html('');
                        }

                        if (res.sks_err != "") {
                            $('#sks-err').html(res.sks_err);
                        } else {
                            $('#sks-err').html('');
                        }

                        if (res.semester_err != "") {
                            $('#semester-err').html(res.semester_err);
                        } else {
                            $('#semester-err').html('');
                        }

                        if (res.jurusan_err != "") {
                            $('#jurusan-err').html(res.jurusan_err);
                        } else {
                            $('#jurusan-err').html('');
                        }

                        if (res.jenis_err != "") {
                            $('#jenis-err').html(res.jenis_err);
                        } else {
                            $('#jenis-err').html('');
                        }

                    }
                }
            });

        });

        // delete matakuliah data 
        $(document).on('click','.delete-matakuliah',function() {

            Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Data yang dihapus tidak akan bisa dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
			}).then((result) => {
				if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url()?>matakuliah/destroy",
                        type: "POST",
                        dataType: "JSON",
                        data: { id: $(this).data('id')},
                        success:function(res) {
                            
                            if (res.success) {
                                
                                $('#data-matakuliah').DataTable().ajax.reload();
                                toastr.success('Data berhasil dihapus',{timeOut: 4000});

                            }

                        }
                    });
				}
			})
        });

        // get matakuliah data
        $(document).on('click','.edit-matakuliah',function() {

            $.ajax({
                url: "<?= base_url()?>matakuliah/edit",
                type: "POST",
                dataType: "JSON",
                data: { id: $(this).data('id')},
                success:function(res) {
                    
                    $('#modal-matakuliah_edit').modal('show');
                    $('#id_matakuliah_edit').val(res.id_matakuliah);
                    $('#kode_matakuliah_edit').val(res.kode_matakuliah);
                    $('#nama_matakuliah_edit').val(res.nama_matakuliah);
                    $('#sks_edit').val(res.sks).trigger('change');
                    $('#semester_edit').val(res.semester).trigger('change');
                    $('#jurusan_edit').val(res.jurusan_id_matakuliah).trigger('change');
                    $('#jenis_edit').val(res.jenis).trigger('change');
                    $('#status_edit').val(res.status_matakuliah);
                    $('#kode_matakuliah_edit-err,#nama_matakuliah_edit-err, #sks_edit-err, #semester_edit-err').html('');

                }
            });

        });

        // update matakuliah data 
        $('#frm-matakuliah_edit').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>matakuliah/update",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-matakuliah').DataTable().ajax.reload();
                        $('#modal-matakuliah_edit').modal('hide');
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_matakuliah_edit_err != "") {
                            $('#kode_matakuliah_edit-err').html(res.kode_matakuliah_edit_err);
                        } else {
                            $('#kode_matakuliah_edit-err').html('');
                        }

                        if (res.nama_matakuliah_edit_err != "") {
                            $('#nama_matakuliah_edit-err').html(res.nama_matakuliah_edit_err);
                        } else {
                            $('#nama_matakuliah_edit-err').html('');
                        }

                        if (res.sks_edit_err != "") {
                            $('#sks_edit-err').html(res.sks_edit_err);
                        } else {
                            $('#sks_edit-err').html('');
                        }

                        if (res.semester_edit_err != "") {
                            $('#semester_edit-err').html(res.semester_edit_err);
                        } else {
                            $('#semester_edit-err').html('');
                        }

                        if (res.jurusan_edit_err != "") {
                            $('#jurusan_edit-err').html(res.jurusan_edit_err);
                        } else {
                            $('#jurusan_edit-err').html('');
                        }

                        if (res.jenis_edit_err != "") {
                            $('#jenis_edit-err').html(res.jenis_edit_err);
                        } else {
                            $('#jenis_edit-err').html('');
                        }

                    }
                }
            });

        });

        // function clear error message and form
        function clear() {
            $('#kode_matakuliah,#nama_matakuliah').val('');
            $('#sks,#semester,#jurusan,#jenis').val('').trigger('change');
            $('#kode_matakuliah_edit,#nama_matakuliah_edit').val('');
            $(',#sks_edit,#semester_edit,#jurusan_edit,#jenis_edit').val('').trigger('change');
            $('#kode_matakuliah-err,#nama_matakuliah-err, #sks-err, #semester-err').html('');
            $('#kode_matakuliah_edit-err,#nama_matakuliah_edit-err, #sks_edit-err, #semester_edit-err').html('');
        }

    });

</script>