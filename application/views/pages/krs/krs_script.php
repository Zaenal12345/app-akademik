<!-- crud script -->
<script>

	// add krs 
	$('#tambah-krs').click(function() {

		// krs data
		var id_matakuliah = $('#id_matakuliah').val();
		var kode_matakuliah = $('#kode_matakuliah').val();
		var nama_matakuliah = $('#nama_matakuliah').val();
		var sks = $('#sks').val();
		var id_dosen = $('#id_dosen').val();
		var nama_dosen = $('#nama_dosen').val();

		// validate required krs form
		if(kode_matakuliah.length == 0 || nama_matakuliah.length == 0 || sks.length == 0 || nama_dosen.length == 0){
			
			// replace message
			if(kode_matakuliah.length == 0){
				$('#kode_matakuliah-err').html('Field kode matakuliah harus di isi.');
			}else{
				$('#kode_matakuliah-err').html('');
			}

			if(nama_matakuliah.length == 0){
				$('#nama_matakuliah-err').html('Field nama matakuliah harus di isi.');
			}else{
				$('#nama_matakuliah-err').html('');
			}

			if(sks.length == 0){
				$('#sks-err').html('Field sks harus di isi.');
			}else{
				$('#sks-err').html('');
			}

			if(nama_dosen.length == 0){
				$('#nama_dosen-err').html('Field nama dosen harus di isi.');
			}else{
				$('#nama_dosen-err').html('');
			}
			


		}else{

			// proses insert ke tabel krs
			$('#table-krs_detail tbody:last-child').append(
				'<tr>'+
					'<td class="text-center" style="display:none">'+ id_matakuliah +'</td>'+  
					'<td class="text-center">'+ kode_matakuliah +'</td>'+  
					'<td class="text-center">'+ nama_matakuliah +'</td>'+  
					'<td class="text-center">'+ sks +'</td>'+  
					'<td class="text-center" style="display:none">'+ id_dosen +'</td>'+  
					'<td class="text-center">'+ nama_dosen +'</td>'+  
					'<td class="text-center"><button class="btn btn-sm btn-danger hapus"><i class="feather icon-trash"></i></button></td>'+  
				'</tr>'
			);

			clear();
			

		}
		
	});

	// clear krs detail from table
	$('#table-krs_detail').on('click','.hapus',function() {
		$(this).closest('tr').remove();
	});

	// add all data krs to table
	$('#simpan-krs').click(function(){

		// college data
		var krs_detail = [];
		var id_mahasiswa 	= $('#id_mahasiswa').val();
		var nama_mahasiswa 	= $('#nama_mahasiswa').val();
		var nim 			= $('#nim').val();
		var nama_jurusan 	= $('#nama_jurusan').val();
		var nama_kelas 		= $('#nama_kelas').val();
		var semester 		= $('#semester').val();
		var total_sks 		= $('#total_sks').val();
		var id_tahun_ajar 	= $('#id_tahun_ajar').val();
		var tahun_ajar 		= $('#tahun_ajar').val();

		if (nim.length == 0 || nama_mahasiswa.length == 0 || nama_jurusan.length == 0 || nama_kelas.length == 0 || semester.length == 0 || total_sks.length == 0 || tahun_ajar.length == 0) {

			// validasi form info mahasiswa
			if(nim.length == 0){
				$('#nim-err').html('Field nim harus di isi.');
			}else{
				$('#nim-err').html('');
			}

			if(nama_mahasiswa.length == 0){
				$('#nama_mahasiswa-err').html('Field nama mahasiswa harus di isi.');
			}else{
				$('#nama_mahasiswa-err').html('');
			}

			if(nama_jurusan.length == 0){
				$('#nama_jurusan-err').html('Field program studi harus di isi.');
			}else{
				$('#nama_jurusan-err').html('');
			}

			if(nama_kelas.length == 0){
				$('#nama_kelas-err').html('Field nama kelas harus di isi.');
			}else{
				$('#nama_kelas-err').html('');
			}

			if(tahun_ajar.length == 0){
				$('#tahun_ajar-err').html('Field tahun ajar harus di isi.');
			}else{
				$('#tahun_ajar-err').html('');
			}

			if(semester.length == 0){
				$('#semester-err').html('Field semester harus di isi.');
			}else{
				$('#semester-err').html('');
			}

			if(total_sks.length == 0){
				$('#total_sks-err').html('Field total sks harus di isi.');
			}else{
				$('#total_sks-err').html('');
			}
			
		} else {
			
			
			$('#table-krs_detail tbody tr').each(function(row, tr) {

				var sub_data = {   
					'id_matakuliah': $(tr).find('td:eq(0)').text(),
					'kode_matakuliah': $(tr).find('td:eq(1)').text(),
					'nama_matakuliah': $(tr).find('td:eq(2)').text(),
					'sks': $(tr).find('td:eq(3)').text(),
					'id_dosen': $(tr).find('td:eq(4)').text(),
					'nama_dosen': $(tr).find('td:eq(5)').text()
				}

				krs_detail.push(sub_data);
			
			});		

			var allData = {
				id_mahasiswa: id_mahasiswa, 
				nama_mahasiswa: nama_mahasiswa, 
				id_tahun_ajar: id_tahun_ajar, 
				tahun_ajar: tahun_ajar, 
				semester: semester, 
				total_sks: total_sks,
				nama_kelas: nama_kelas,
				nama_jurusan: nama_jurusan,
				data: krs_detail
			}

			$.ajax({
				url: '<?= base_url()?>krs/store',
				type: 'POST',
				dataType: 'JSON',
				data: allData,
				success:function(res){
					toastr.success('Data berhasil disimpan',{timeOut: 4000});
					window.location.href="<?= base_url()?>krs";
					
				}
			});

		}


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
	var table = $('#data-krs').dataTable({
		initComplete: function() {
			var api = this.api();
			$('#data-krs_filter input')
				.off('.DT')
				.on('input.DT', function () {
					api.search(this.value).draw();
				});
		},
		oLanguage: {
			sProcessing: "loading..."
		},
		responsive:true,
		processing: true,
		serverSide: true,
		ordering:false,
		ajax:{
			url: "<?= base_url()?>krs/show",
			type: "POST"
		},
		columns:[
			{"data": "nim", class:"text-center"},
			{"data": "nama_mahasiswa", class:"text-center"},
			{"data": "nama_kelas", class:"text-center"},
			{"data": "nama_jurusan", class:"text-center"},
			{"data": "kode_matakuliah", class:"text-center"},
			{"data": "nama_matakuliah", class:"text-center"},
			{"data": "sks_matakuliah", class:"text-center"},
			{"data": "semester", class:"text-center"},
			{"data": "nama_dosen", class:"text-center"},
			{"data": "tahun_ajar", class:"text-center"},
			{"data": "view", class:"text-center"}
		],

	});


	/*
	* all function for manage krs
	* and other
	*/

	// function clear error message and form
	function clear() {
		$('#id_matakuliah').val('');
		$('#kode_matakuliah').val('');
		$('#nama_matakuliah').val('');
		$('#sks').val('');
		$('#id_dosen').val('');
		$('#nama_dosen').val('');

		$('#kode_matakuliah-err,#nama_matakuliah-err,#sks-err,#nama_dosen-err').html('');
	}

	// validate function only number 
	function onlyNumber(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;
	}

	// clear error message
	function clear_error_message_krs(){

	}

	
</script>

<!-- auto complete script -->
<script>

	// auto complete nim dan nama mahasiswa
    $( "#nim" ).autocomplete({
      source: "<?= base_url()?>krs/getMahasiswa",
      select: function( event, ui ) {
        $( "#nim" ).val( ui.item.value );
        $( "#nama_mahasiswa" ).val(ui.item.result);
        $( "#id_mahasiswa" ).val(ui.item.result2);
        $( "#nama_kelas" ).val(ui.item.result3);
        $( "#nama_jurusan" ).val(ui.item.result4);
        return false;
		// console.log(ui);
      }  
    });

	// auto complete tahun ajar
    $( "#tahun_ajar" ).autocomplete({
      source: "<?= base_url()?>krs/getTahunAjar",
      select: function( event, ui ) {
        $( "#tahun_ajar" ).val( ui.item.label );
        $( "#id_tahun_ajar" ).val( ui.item.result );
        return false;
      }  
    });

	// auto complete matakuliah
    $( "#kode_matakuliah").autocomplete({
      source: "<?= base_url()?>krs/getMatakuliah",
      select: function( event, ui ) {
        $( "#kode_matakuliah" ).val( ui.item.label);
        $( "#nama_matakuliah" ).val( ui.item.result2);
        $( "#id_matakuliah" ).val( ui.item.result);
        $( "#sks").val( ui.item.result3);
        return false;
		
      }  
    });

	// auto complete dosen
    $( "#nama_dosen" ).autocomplete({
      source: "<?= base_url()?>krs/getDosen",
      select: function( event, ui ) {
        $( "#nama_dosen" ).val( ui.item.label );
        $( "#id_dosen" ).val( ui.item.result );
        return false;
      }  
    });

</script> 
  
