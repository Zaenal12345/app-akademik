<script>
	// select2 initialization
	$(document).ready(function domReady() {
		
		$(".js-select2-mahasiswa").select2({
			placeholder: "Pilih NIM Mahasiswa",
		});

		$(".js-select2-mahasiswa2").select2({
			placeholder: "Pilih NIM Mahasiswa",
			dropdownParent: $("#modal-pkrs")
		});

		$(".js-select2-tahun_ajar").select2({
			placeholder: "Pilih Tahun Ajaran",
		});

		$(".js-select2-tahun_ajar2").select2({
			placeholder: "Pilih Tahun Ajaran",
			dropdownParent: $("#modal-pkrs")
		});

		$(".js-select2-semester").select2({
			placeholder: "Pilih Semester",
		});

		$(".js-select2-matakuliah").select2({
			placeholder: "Pilih Matakuliah",
		});

		$(".js-select2-kelas").select2({
			placeholder: "Pilih Kelas",
		});

		$(".js-select2-jurusan").select2({
			placeholder: "Pilih Jurusan",
		});
		
	});

	// add krs 
	$('#tambah-krs').click(function() {

		// krs data
		var id_mahasiswa = $('#nim2').val();
		var nim_nama = $('#nim2 option:selected').text().split('-');

		// proses insert ke tabel krs
		$('#table-krs_detail tbody:last-child').append(
			'<tr>'+
				'<td class="text-center" style="display:none">'+ id_mahasiswa +'</td>'+  
				'<td class="text-center">'+ nim_nama[0] +'</td>'+  
				'<td class="text-center">'+ nim_nama[1] +'</td>'+  
				'<td class="text-center"><button class="btn btn-sm btn-danger hapus"><i class="feather icon-trash"></i></button></td>'+  
			'</tr>'
		);			

		$("#nim2").val('').trigger('change');
		
	});

	// clear krs detail from table
	$('#table-krs_detail').on('click','.hapus',function() {
		$(this).closest('tr').remove();
	});

	// save all data krs
	$('#simpan-krs').click(function(){

		// college data
		var krs_detail = [];

		$('#table-krs_detail tbody tr input[type=checkbox]:checked').each(function(row, tr) {
                var row = $(this).closest("tr")[0];
                var sub_data = {
                    'id_matakuliah'		: row.cells[0].innerHTML, 
                    'kode_matakuliah'	: row.cells[1].innerHTML, 
                    'nama_matakuliah'	: row.cells[2].innerHTML, 
                    'sks'				: row.cells[3].innerHTML, 
                    'id_dosen'			: row.cells[4].innerHTML, 
                    'nama_dosen'		: row.cells[5].innerHTML, 
                }
    
                krs_detail.push(sub_data);
        });
    
		var all_data = {

			data			: krs_detail,
			id_mahasiswa 	: $('#nim').val(),
			nama_jurusan 	: $('#nama_jurusan').val(),
			jurusan_id 		: $('#jurusan_id').val(),
			nama_kelas 		: $('#nama_kelas').val(),
			kelas_id 		: $('#kelas_id').val(),
			semester 		: $('#semester').val(),
			tahun_ajar_id 	: $('#tahun_ajar_id').val(),

		}

		// console.log(all_data);

		$.ajax({
			url: '<?= base_url()?>krs/store',
			type: 'POST',
			dataType: 'JSON',
			data: all_data,
			success:function(res){

				toastr.success('Data berhasil disimpan',{timeOut: 4000});
				$('#table-krs_detail tbody').empty();
				$('.btn-action').hide();

				setTimeout(() => {
					window.location.href="<?= base_url()?>krs";
				}, 2000);
				
			}
		});


	});
	
	// save all data krs 2
	$('#simpan-krs2').click(function(){

		// college data
		var krs_detail = [];

		$('#table-krs_detail tbody tr').each(function(row, tr) {
                var row = $(this).closest("tr")[0];
                var sub_data = {
                    'id_mahasiswa'		: row.cells[0].innerHTML, 
                    'nim'				: row.cells[1].innerHTML, 
                    'nama_mahasiswa'	: row.cells[2].innerHTML, 
                }
    
                krs_detail.push(sub_data);
        });
    
		var all_data = {

			data			: krs_detail,
			nama_jurusan 	: $('#jurusan_id2 option:selected').text(),
			jurusan_id 		: $('#jurusan_id2').val(),
			nama_kelas 		: $('#kelas_id2 option:selected').text(),
			kelas_id 		: $('#kelas_id2').val(),
			semester 		: $('#semester2').val(),
			tahun_ajar_id 	: $('#tahun_ajar_id2').val(),
			matakuliah_id 	: $('#kode_matakuliah2').val(),
			dosen_id 		: $('#dosen_id2').val(),

		}

		// console.log(all_data);

		$.ajax({
			url: '<?= base_url()?>krs/store2',
			type: 'POST',
			dataType: 'JSON',
			data: all_data,
			success:function(res){

				toastr.success('Data berhasil disimpan',{timeOut: 4000});
				$('#table-krs_detail tbody').empty();

				setTimeout(() => {
					window.location.href="<?= base_url()?>krs";
				}, 2000);
				
			}
		});


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
			{"data": "sks", class:"text-center"},
			{"data": "semester", class:"text-center"},
			{"data": "nama_dosen", class:"text-center"},
			{"data": "tahun_ajar", class:"text-center"},
			{"data": "view", class:"text-center"}
		],

	});

	// auto complete nim dan nama mahasiswa
	$( "#nim" ).change(function(){
		$.ajax({
			url:"<?= base_url()?>krs/getMahasiswa",
			type:"POST",
			data:{id: $(this).val()},
			dataType:'JSON',
			success:function(res){
				$( "#nama_kelas" ).val(res[0].nama_kelas);
        		$( "#nama_jurusan" ).val(res[0].nama_jurusan);
        		$( "#jurusan_id" ).val(res[0].id_jurusan);
        		$( "#kelas_id" ).val(res[0].id_kelas);
				
				getMatakuliah(null, res[0].id_kelas, res[0].id_jurusan, null);
			}
		});
	});

	$('#tahun_ajar_id').change(function() {
		getMatakuliah($('#semester').val(), $('#kelas_id').val(), $('#jurusan_id').val(), $('#tahun_ajar_id').val());
	});

	$('#semester').change(function() {
		getMatakuliah($('#semester').val(), $('#kelas_id').val(), $('#jurusan_id').val(), $('#tahun_ajar_id').val());
	});

	$('#tahun_ajar_id2').change(function() {
		getMatakuliah2($('#kelas_id2').val(), $('#jurusan_id2').val(), $('#tahun_ajar_id2').val());
	});

	$('#jurusan_id2').change(function() {
		getMatakuliah2($('#kelas_id2').val(), $('#jurusan_id2').val(), $('#tahun_ajar_id2').val());
	});

	$('#kelas_id2').change(function() {
		getMatakuliah2($('#kelas_id2').val(), $('#jurusan_id2').val(), $('#tahun_ajar_id2').val());
	});

	$('#kode_matakuliah2').change(function() {
		getDetailMatakuliah($(this).val());
	});

	// check all or unchecked all from checkbox with name select-all
    $('[name="select-all"]').change(function() {
       if(this.checked){
            $('#table-krs_detail tbody :checkbox').prop('checked', true);
        }else{
            $('#table-krs_detail tbody :checkbox').prop('checked', false);
       }
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

	// get matakuliah
	function getMatakuliah(semester,kelas_id,jurusan_id,tahun_ajar_id){

		$.ajax({
			url:'<?= base_url()?>krs/getMatakuliah',
			type:'POST',
			data:{
				semester: semester,
				kelas_id: kelas_id,
				jurusan_id: jurusan_id,
				tahun_ajar_id: tahun_ajar_id,
			},
			dataType:'JSON',
			success:function(res) {
				
				var html = '';

                if(res.length != 0){

                    for (let index = 0; index < res.length; index++) {
                       html+='<tr>'+
                        '<td class="text-center" style="display:none">'+ res[index].id_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].sks +'</td>' +
                        '<td class="text-center" style="display:none">'+ res[index].id_dosen + '</td>' +
                        '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                        '<td class="text-center"><input type="checkbox"></td>' +
                       '</tr>'; 
                    }

               	 	$('.btn-action').show();

                }else{

               	 	$('.btn-action').hide();
                    html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';

                }   

                $('#table-krs_detail tbody').empty();
                $('#table-krs_detail tbody').append(html);

			},
			error:function(error) {
				console.log(error);
			}
		});
		
	}

	// get matakuliah2
	function getMatakuliah2(kelas_id,jurusan_id,tahun_ajar_id){

		$.ajax({
			url:'<?= base_url()?>krs/getMatakuliah',
			type:'POST',
			data:{
				kelas_id: kelas_id,
				jurusan_id: jurusan_id,
				tahun_ajar_id: tahun_ajar_id,
			},
			dataType:'JSON',
			success:function(res) {
				
				var html = '';

				html+='<option value=""></option>';

                if(res.length != 0){

                    for (let index = 0; index < res.length; index++) {
                       html+='<option value="'+ res[index].id_matakuliah +'">'+ res[index].kode_matakuliah +' - '+ res[index].nama_matakuliah +'</option>'; 
                    }

                }

                $('#kode_matakuliah2').empty();
                $('#kode_matakuliah2').append(html);

			},
			error:function(error) {
				console.log(error);
			}
		});
		
	}

	// get detail matakuliah 
	function getDetailMatakuliah(matakuliah_id) {
		
		$.ajax({
			url:'<?= base_url()?>krs/getDetailMatakuliah',
			type:'POST',
			data:{
				matakuliah_id: matakuliah_id
			},
			dataType:'JSON',
			success:function(res) {
			
                $('#sks2').val(res[0].sks);
                $('#semester2').val(res[0].semester);
                $('#nama_dosen2').val(res[0].nama_dosen);
                $('#dosen_id2').val(res[0].id_dosen);

			},
			error:function(error) {
				console.log(error);
			}
		});
		

	}


// if (nim.length == 0 || nama_mahasiswa.length == 0 || nama_jurusan.length == 0 || nama_kelas.length == 0 || semester.length == 0 || total_sks.length == 0 || tahun_ajar.length == 0) {

// 	// validasi form info mahasiswa
// 	if(nim.length == 0){
// 		$('#nim-err').html('Field nim harus di isi.');
// 	}else{
// 		$('#nim-err').html('');
// 	}

// 	if(nama_mahasiswa.length == 0){
// 		$('#nama_mahasiswa-err').html('Field nama mahasiswa harus di isi.');
// 	}else{
// 		$('#nama_mahasiswa-err').html('');
// 	}

// 	if(nama_jurusan.length == 0){
// 		$('#nama_jurusan-err').html('Field program studi harus di isi.');
// 	}else{
// 		$('#nama_jurusan-err').html('');
// 	}

// 	if(nama_kelas.length == 0){
// 		$('#nama_kelas-err').html('Field nama kelas harus di isi.');
// 	}else{
// 		$('#nama_kelas-err').html('');
// 	}

// 	if(tahun_ajar.length == 0){
// 		$('#tahun_ajar-err').html('Field tahun ajar harus di isi.');
// 	}else{
// 		$('#tahun_ajar-err').html('');
// 	}

// 	if(semester.length == 0){
// 		$('#semester-err').html('Field semester harus di isi.');
// 	}else{
// 		$('#semester-err').html('');
// 	}

// 	if(total_sks.length == 0){
// 		$('#total_sks-err').html('Field total sks harus di isi.');
// 	}else{
// 		$('#total_sks-err').html('');
// 	}
	
// } else {
	
	
// 	$('#table-krs_detail tbody tr').each(function(row, tr) {

// 		var sub_data = {   
// 			'id_matakuliah': $(tr).find('td:eq(0)').text(),
// 			'kode_matakuliah': $(tr).find('td:eq(1)').text(),
// 			'nama_matakuliah': $(tr).find('td:eq(2)').text(),
// 			'sks': $(tr).find('td:eq(3)').text(),
// 			'id_dosen': $(tr).find('td:eq(4)').text(),
// 			'nama_dosen': $(tr).find('td:eq(5)').text()
// 		}

// 		krs_detail.push(sub_data);
	
// 	});		

// 	var allData = {
// 		id_mahasiswa: id_mahasiswa, 
// 		nama_mahasiswa: nama_mahasiswa, 
// 		id_tahun_ajar: id_tahun_ajar, 
// 		tahun_ajar: tahun_ajar, 
// 		semester: semester, 
// 		total_sks: total_sks,
// 		nama_kelas: nama_kelas,
// 		nama_jurusan: nama_jurusan,
// 		data: krs_detail
// 	}

	// $.ajax({
	// 	url: '<?= base_url()?>krs/store',
	// 	type: 'POST',
	// 	dataType: 'JSON',
	// 	data: allData,
	// 	success:function(res){
	// 		toastr.success('Data berhasil disimpan',{timeOut: 4000});
	// 		window.location.href="<?= base_url()?>krs";
			
	// 	}
	// });

// }

</script> 
  