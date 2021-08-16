<script>
	$(function() {

		// clear add form
        $('#tambah-fakultas').click(function() {
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
		var table = $('#data-fakultas').dataTable({
			initComplete: function() {
				var api = this.api();
				$('#data-fakultas_filter input')
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
				url: "<?= base_url()?>fakultas/show",
				type: "POST"
			},
			columns:[
				{"data": "kode_fakultas", class:"text-center"},
				{"data": "nama_fakultas", class:"text-center"},
				{"data": "view", class:"text-center"}
			],

		});

		// insert fakultas data 
		$('#frm-fakultas').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>fakultas/store",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-fakultas').DataTable().ajax.reload();
						$('#modal-fakultas').modal('hide');
						toastr.success('Data berhasil disimpan',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.kode_fakultas_err != "") {
							$('#kode_fakultas-err').html(res.kode_fakultas_err);
						} else {
							$('#kode_fakultas-err').html('');
						}

						if (res.nama_fakultas_err != "") {
							$('#nama_fakultas-err').html(res.nama_fakultas_err);
						} else {
							$('#nama_fakultas-err').html('');
						}

					}
				}
			});

		});

		// delete fakultas data 
		$(document).on('click','.delete-fakultas',function() {
			
			if (confirm('Apakah anda ingin menghapus data ini ?')) {

				$.ajax({
					url: "<?= base_url()?>fakultas/destroy",
					type: "POST",
					dataType: "JSON",
					data: { id: $(this).data('id')},
					success:function(res) {
						
						if (res.success) {
							
							$('#data-fakultas').DataTable().ajax.reload();
							toastr.success('Data berhasil dihapus',{timeOut: 4000});

						}

					}
				});


			} else {
				return false;
			}
		});

		// get fakultas data
		$(document).on('click','.edit-fakultas',function() {

			$.ajax({
				url: "<?= base_url()?>fakultas/edit",
				type: "POST",
				dataType: "JSON",
				data: { id: $(this).data('id')},
				success:function(res) {
					
					$('#modal-fakultas_edit').modal('show');
					$('#id_fakultas_edit').val(res.id_fakultas);
					$('#kode_fakultas_edit').val(res.kode_fakultas);
					$('#nama_fakultas_edit').val(res.nama_fakultas);
					console.log(res.id);

				}
			});

		});

		// update fakultas data 
		$('#frm-fakultas_edit').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>fakultas/update",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-fakultas').DataTable().ajax.reload();
						$('#modal-fakultas_edit').modal('hide');
						toastr.success('Data berhasil diubah',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.kode_fakultas_edit_err != "") {
							$('#kode_fakultas_edit-err').html(res.kode_fakultas_edit_err);
						} else {
							$('#kode_fakultas_edit-err').html('');
						}

						if (res.nama_fakultas_edit_err != "") {
							$('#nama_fakultas_edit-err').html(res.nama_fakultas_edit_err);
						} else {
							$('#nama_fakultas_edit-err').html('');
						}

					}

				}
			});

		});

		// function clear error message and form
		function clear() {
			$('#kode_fakultas,#nama_fakultas').val('');
			$('#kode_fakultas_edit,#nama_fakultas_edit').val('');
			$('#kode_fakultas-err,#nama_fakultas-err').html('');
			$('#kode_fakultas_edit-err,#nama_fakultas_edit-err').html('');
		}

	});
</script>