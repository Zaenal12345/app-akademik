<script>
	$(function() {

		// clear add form
        $('#tambah-ruangan').click(function() {
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
		var table = $('#data-ruangan').dataTable({
			initComplete: function() {
				var api = this.api();
				$('#data-ruangan_filter input')
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
				url: "<?= base_url()?>ruangan/show",
				type: "POST"
			},
			columns:[
				{"data": "nama_ruangan", class:"text-center"},
				{"data": "view", class:"text-center"}
			],

		});

		// insert ruangan data 
		$('#frm-ruangan').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>ruangan/store",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-ruangan').DataTable().ajax.reload();
						$('#modal-ruangan').modal('hide');
						toastr.success('Data berhasil disimpan',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.nama_ruangan_err != "") {
							$('#nama_ruangan-err').html(res.nama_ruangan_err);
						} else {
							$('#nama_ruangan-err').html('');
						}

					}
				}
			});

		});

		// delete ruangan data 
		$(document).on('click','.delete-ruangan',function() {
			
			if (confirm('Apakah anda ingin menghapus data ini ?')) {

				$.ajax({
					url: "<?= base_url()?>ruangan/destroy",
					type: "POST",
					dataType: "JSON",
					data: { id: $(this).data('id')},
					success:function(res) {
						
						if (res.success) {
							
							$('#data-ruangan').DataTable().ajax.reload();
							toastr.success('Data berhasil dihapus',{timeOut: 4000});

						}

					}
				});


			} else {
				return false;
			}
		});

		// get ruangan data
		$(document).on('click','.edit-ruangan',function() {

			$.ajax({
				url: "<?= base_url()?>ruangan/edit",
				type: "POST",
				dataType: "JSON",
				data: { id: $(this).data('id')},
				success:function(res) {
					
					$('#modal-ruangan_edit').modal('show');
					$('#id_ruangan_edit').val(res.id_ruangan);
					$('#nama_ruangan_edit').val(res.nama_ruangan);

				}
			});

		});

		// update ruangan data 
		$('#frm-ruangan_edit').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: "<?= base_url()?>ruangan/update",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize(),
				success:function(res) {
					
					if (res.success) {
						
						$('#data-ruangan').DataTable().ajax.reload();
						$('#modal-ruangan_edit').modal('hide');
						toastr.success('Data berhasil diubah',{timeOut: 4000});
						clear();

					} 

					if (res.error) {

						if (res.nama_ruangan_edit_err != "") {
							$('#nama_ruangan_edit-err').html(res.nama_ruangan_edit_err);
						} else {
							$('#nama_ruangan_edit-err').html('');
						}

					}
				}
			});

		});

		// function clear error message and form
		function clear() {
			$('#nama_ruangan').val('');
			$('#nama_ruangan_edit').val('');
			$('#nama_ruangan-err').html('');
			$('#nama_ruangan_edit-err').html('');
		}

	});
</script>