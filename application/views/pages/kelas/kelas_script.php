<script>
	$(function() {

		// clear add form
        $('#tambah-kelas').click(function() {
            clear(); 
        });
		
		// setup datatable
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd"	: oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength) 
			};
		};

		// server side scripting
		var table = $('#data-kelas').dataTable({
			initComplete: function() {
				var api = this.api();
				$('#data-kelas_filter input')
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
				url: "<?= base_url()?>kelas/show",
				type: "POST"
			},
			columns:[
				{"data": "kode_kelas", class:"text-center"},
				{"data": "nama_kelas", class:"text-center"},
				{"data": "view", class:"text-center"}
			],

		});

		// insert kelas data 
		$('#frm-kelas').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>kelas/store",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-kelas').DataTable().ajax.reload();
						$('#modal-kelas').modal('hide');
						toastr.success('Data berhasil disimpan',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.kode_kelas_err != "") {
							$('#kode_kelas-err').html(res.kode_kelas_err);
						} else {
							$('#kode_kelas-err').html('');
						}

						if (res.nama_kelas_err != "") {
							$('#nama_kelas-err').html(res.nama_kelas_err);
						} else {
							$('#nama_kelas-err').html('');
						}

					}
				}
			});

		});

		// delete kelas data 
		$(document).on('click','.delete-kelas',function() {
			
			if (confirm('Apakah anda ingin menghapus data ini ?')) {

				$.ajax({
					url: "<?= base_url()?>kelas/destroy",
					type: "POST",
					dataType: "JSON",
					data: { id: $(this).data('id')},
					success:function(res) {
						
						if (res.success) {
							
							$('#data-kelas').DataTable().ajax.reload();
							toastr.success('Data berhasil dihapus',{timeOut: 4000});

						}

					}
				});


			} else {
				return false;
			}
		});

		// get kelas data
		$(document).on('click','.edit-kelas',function() {

			$.ajax({
				url: "<?= base_url()?>kelas/edit",
				type: "POST",
				dataType: "JSON",
				data: { id: $(this).data('id')},
				success:function(res) {
					
					$('#modal-kelas_edit').modal('show');
					$('#id_kelas_edit').val(res.id_kelas);
					$('#kode_kelas_edit').val(res.kode_kelas);
					$('#nama_kelas_edit').val(res.nama_kelas);
					console.log(res);

				}
			});

		});

		// update kelas data 
		$('#frm-kelas_edit').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>kelas/update",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-kelas').DataTable().ajax.reload();
						$('#modal-kelas_edit').modal('hide');
						toastr.success('Data berhasil diubah',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.kode_kelas_edit_err != "") {
							$('#kode_kelas_edit-err').html(res.kode_kelas_edit_err);
						} else {
							$('#kode_kelas_edit-err').html('');
						}

						if (res.nama_kelas_edit_err != "") {
							$('#nama_kelas_edit-err').html(res.nama_kelas_edit_err);
						} else {
							$('#nama_kelas_edit-err').html('');
						}

					}
				}
			});

		});

		// function clear error message and form
		function clear() {
			$('#kode_kelas,#nama_kelas').val('');
			$('#kode_kelas_edit,#nama_kelas_edit').val('');
			$('#kode_kelas-err,#nama_kelas-err').html('');
			$('#kode_kelas_edit-err,#nama_kelas_edit-err').html('');
		}

	});
</script>