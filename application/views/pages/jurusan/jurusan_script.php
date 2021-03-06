<script>
    
    $(function() {
	
		$(".js-select2-fakultas").select2({
			placeholder: "Pilih Fakultas",
			dropdownParent: $("#modal-jurusan")
		});

		$(".js-select2-fakultas2").select2({
			placeholder: "Pilih Fakultas",
			dropdownParent: $("#modal-jurusan_edit")
		});

		$(".js-select2-jenjang").select2({
			placeholder: "Pilih Jenjang Pendidikan",
			dropdownParent: $("#modal-jurusan")
		});

		$(".js-select2-jenjang2").select2({
			placeholder: "Pilih Jenjang Pendidikan",
			dropdownParent: $("#modal-jurusan_edit")
		});

        // clear add form
        $('#tambah-jurusan').click(function() {
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
        var table = $('#data-jurusan').dataTable({
            initComplete: function() {
                var api = this.api();
                $('#data-jurusan_filter input')
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
                url: "<?= base_url()?>jurusan/show",
                type: "POST"
            },
            columns:[
                {"data": "nama_fakultas", class:"text-center"},
                {"data": "kode_jurusan", class:"text-center"},
                {"data": "nama_jurusan", class:"text-center"},
                {"data": "status_akreditasi", class:"text-center"},
                {"data": "jenjang", class:"text-center"},
                {"data": "view", class:"text-center"}
            ],

        });

        // insert jurusan data 
        $('#frm-jurusan').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>jurusan/store",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-jurusan').DataTable().ajax.reload();
                        $('#modal-jurusan').modal('hide');
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_jurusan_err != "") {
                            $('#kode_jurusan-err').html(res.kode_jurusan_err);
                        } else {
                            $('#kode_jurusan-err').html('');
                        }

                        if (res.nama_jurusan_err != "") {
                            $('#nama_jurusan-err').html(res.nama_jurusan_err);
                        } else {
                            $('#nama_jurusan-err').html('');
                        }

                        if (res.nama_fakultas_err != "") {
                            $('#nama_fakultas-err').html(res.nama_fakultas_err);
                        } else {
                            $('#nama_fakultas-err').html('');
                        }
                        
                        if (res.status_akreditasi_err != "") {
                            $('#status_akreditasi-err').html(res.status_akreditasi_err);
                        } else {
                            $('#status_akreditasi-err').html('');
                        }

                        if (res.jenjang_err != "") {
                            $('#jenjang-err').html(res.jenjang_err);
                        } else {
                            $('#jenjang-err').html('');
                        }

                    }
                }
            });

        });

        // delete fajurusankultas data 
        $(document).on('click','.delete-jurusan',function() {

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
                        url: "<?= base_url()?>jurusan/destroy",
                        type: "POST",
                        dataType: "JSON",
                        data: { id: $(this).data('id')},
                        success:function(res) {
                            
                            if (res.success) {
                                
                                $('#data-jurusan').DataTable().ajax.reload();
                                toastr.success('Data berhasil dihapus',{timeOut: 4000});

                            }

                        }
                    });
				}
			})
        });

        // get jurusan data
        $(document).on('click','.edit-jurusan',function() {

            $.ajax({
                url: "<?= base_url()?>jurusan/edit",
                type: "POST",
                dataType: "JSON",
                data: { id: $(this).data('id')},
                success:function(res) {
                    
                    $('#modal-jurusan_edit').modal('show');
                    $('#id_jurusan_edit').val(res.id_jurusan);
                    $('#kode_jurusan_edit').val(res.kode_jurusan);
                    $('#nama_jurusan_edit').val(res.nama_jurusan);
                    $('#status_akreditasi_edit').val(res.status_akreditasi);
                    $('#nama_fakultas_edit').val(res.fakultas_id).trigger('change');
                    $('#jenjang_edit').val(res.jenjang).trigger('change');
                    $('#kode_jurusan_edit-err,#nama_jurusan_edit-err, #nama_fakultas_edit-err, #status_akreditasi_edit-err, #jenjang_edit_err').html('');

                }
            });

        });

        // update jurusan data 
        $('#frm-jurusan_edit').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>jurusan/update",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-jurusan').DataTable().ajax.reload();
                        $('#modal-jurusan_edit').modal('hide');
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_jurusan_edit_err != "") {
                            $('#kode_jurusan_edit-err').html(res.kode_jurusan_edit_err);
                        } else {
                            $('#kode_jurusan_edit-err').html('');
                        }

                        if (res.nama_jurusan_edit_err != "") {
                            $('#nama_jurusan_edit-err').html(res.nama_jurusan_edit_err);
                        } else {
                            $('#nama_jurusan_edit-err').html('');
                        }

                        if (res.nama_fakultas_edit_err != "") {
                            $('#nama_fakultas_edit-err').html(res.nama_fakultas_edit_err);
                        } else {
                            $('#nama_fakultas_edit-err').html('');
                        }

                        if (res.status_akreditasi_edit_err != "") {
                            $('#status_akreditasi_edit-err').html(res.status_akreditasi_edit_err);
                        } else {
                            $('#status_akreditasi_edit-err').html('');
                        }

                        if (res.jenjang_edit_err != "") {
                            $('#jenjang_edit-err').html(res.jenjang_edit_err);
                        } else {
                            $('#jenjang_edit-err').html('');
                        }

                    }
                }
            });

        });

        // function clear error message and form
        function clear() {
            $('#kode_jurusan,#nama_jurusan,#status_akreditasi').val('');
            $('#nama_fakultas,#jenjang').val('').trigger('change');
            $('#kode_jurusan-err,#nama_jurusan-err, #nama_fakultas-err, #jenjang_err, #status_akreditasi_err').html('');

            $('#kode_jurusan_edit,#nama_jurusan_edit,#nama_fakultas_edit').val('');
            $('#kode_jurusan_edit-err,#nama_jurusan_edit-err, #nama_fakultas_edit-err, #jenjang_edit_err, #status_akreditasi_edit_err').html('');
        }



    });

</script>