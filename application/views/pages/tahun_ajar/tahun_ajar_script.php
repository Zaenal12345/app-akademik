<script>
	$(function() {

		// clear add form
        $('#tambah-tahun_ajar').click(function() {
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
		var table = $('#data-tahun_ajar').dataTable({
			initComplete: function() {
				var api = this.api();
				$('#data-tahun_ajar_filter input')
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
				url: "<?= base_url()?>tahunajar/show",
				type: "POST"
			},
			columns:[
				{"data": "tahun_ajar", class:"text-center"},
				{"data": "status", class:"text-center"},
				{"data": "view", class:"text-center"}
			],

		});

		// insert kelas data 
		$('#frm-tahun_ajar').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>tahunajar/store",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-tahun_ajar').DataTable().ajax.reload();
						$('#modal-tahun_ajar').modal('hide');
						toastr.success('Data berhasil disimpan',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.tahun_ajar_err != "") {
							$('#tahun_ajar-err').html(res.tahun_ajar_err);
						} else {
							$('#tahun_ajar-err').html('');
						}

						if (res.status_err != "") {
							$('#status-err').html(res.status_err);
						} else {
							$('#status-err').html('');
						}

					}
				}
			});

		});

		// delete tahun_ajar data 
		$(document).on('click','.delete-tahun_ajar',function() {
			
			if (confirm('Apakah anda ingin menghapus data ini ?')) {

				$.ajax({
					url: "<?= base_url()?>tahunajar/destroy",
					type: "POST",
					dataType: "JSON",
					data: { id: $(this).data('id')},
					success:function(res) {
						
						if (res.success) {
							
							$('#data-tahun_ajar').DataTable().ajax.reload();
							toastr.success('Data berhasil dihapus',{timeOut: 4000});

						}

					}
				});


			} else {
				return false;
			}
		});

		// get tahun_ajar data
		$(document).on('click','.edit-tahun_ajar',function() {

			$.ajax({
				url: "<?= base_url()?>tahunajar/edit",
				type: "POST",
				dataType: "JSON",
				data: { id: $(this).data('id')},
				success:function(res) {
					
					$('#modal-tahun_ajar_edit').modal('show');
					$('#id_tahun_ajar_edit').val(res.id_tahun_ajar);
					$('#tahun_ajar_edit').val(res.tahun_ajar);
					$('#status_edit').val(res.status);
					console.log(res);

				}
			});

		});

		// update tahun ajar data 
		$('#frm-tahun_ajar_edit').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>tahunajar/update",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-tahun_ajar').DataTable().ajax.reload();
						$('#modal-tahun_ajar_edit').modal('hide');
						toastr.success('Data berhasil diubah',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.tahun_ajar_edit_err != "") {
							$('#tahun_ajar_edit-err').html(res.tahun_ajar_edit_err);
						} else {
							$('#tahun_ajar_edit-err').html('');
						}

						if (res.status_edit_err != "") {
							$('#status_edit-err').html(res.status_edit_err);
						} else {
							$('#status_edit-err').html('');
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