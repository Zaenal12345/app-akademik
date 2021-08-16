<script>

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
	var table = $('#data-nilai').dataTable({
		initComplete: function() {
			var api = this.api();
			$('#data-nilai_filter input')
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
			url: "<?= base_url()?>nilai/show",
			type: "POST"
		},
		columns:[
			{"data": "nim", class:"text-center"},
			{"data": "nama_mahasiswa", class:"text-center"},
			{"data": "nama_matakuliah", class:"text-center"},
			{"data": "absen", class:"text-center"},
			{"data": "tugas", class:"text-center"},
			{"data": "uts", class:"text-center"},
			{"data": "uas", class:"text-center"},
			{"data": "nilai", class:"text-center"},
			{"data": "grade", class:"text-center"},
			{"data": "keterangan", class:"text-center"},
			{"data": "view", class:"text-center"}
		],

	});

    // search process
    $('#cari-list_mahasiwa').click(function(){
        $.ajax({
            url:'<?= base_url()?>nilai/search',
            type: 'POST',
            dataType: 'JSON',
            data:{
                id_matakuliah : $('#id_matakuliah').val(),
                nama_matakuliah : $('#nama_matakuliah').val(),
                semester : $('#semester').val(),
                id_kelas : $('#id_kelas').val(),
                nama_kelas : $('#nama_kelas').val(),
                id_jurusan : $('#id_jurusan').val(),
                nama_jurusan : $('#nama_jurusan').val(),
                tahun_ajar : $('#tahun_ajar').val(),
                id_tahun_ajar : $('#id_tahun_ajar').val(),
            },
            success:function(res){

                let html = '';

                if (res.length != 0) {

                    for (let index = 0; index < res.length; index++) {
                    
                        html+='<tr><td class="text-center">'+ res[index].nim +'</td><td class="text-center">'+ res[index].nama_mahasiswa +'</td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="absen[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="tugas[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="uts[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="uas[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="nilai[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="grade[]"></div></td></tr><input type="hidden" name="mahasiswa_id[]" value="'+ res[index].id_mahasiswa +'">';

                    }

                    $('#btn-aksi').show();

                } else {

                    html+='<tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>';

                }
                $('#list_mahasiswa tbody').empty();
                $('#tabel-list_nilai').show();
                $('#list_mahasiswa tbody').append(html);
            }
        })
    });

    // submit nilai list
    $(document).on('submit','#list-nilai',function(e){
        e.preventDefault();
        // alert('test');
        // $('#list-nilai').submit();   
        $.ajax({
            url:'<?= base_url()?>nilai/store',
            type: 'POST',
            dataType: 'JSON',
            data:$(this).serialize(),
            success:function(res){
                if (res.message) {
                    window.location.href="<?= base_url()?>nilai";
                }
            }
        });
    })

</script>

<!-- auto complete script -->
<script>

	// auto complete tahun ajar
    $( "#tahun_ajar" ).autocomplete({
      source: "<?= base_url()?>nilai/getTahunAjar",
      select: function( event, ui ) {
        $( "#tahun_ajar" ).val( ui.item.label );
        $( "#id_tahun_ajar" ).val( ui.item.result );
        return false;
      }  
    });

	// auto complete matakuliah
    $( "#nama_matakuliah").autocomplete({
      source: "<?= base_url()?>nilai/getMatakuliah",
      select: function( event, ui ) {
        $( "#nama_matakuliah" ).val( ui.item.label);
        $( "#id_matakuliah" ).val( ui.item.result);
        return false;
		
      }  
    });

	// auto complete kelas
    $( "#nama_kelas").autocomplete({
      source: "<?= base_url()?>nilai/getKelas",
      select: function( event, ui ) {
        $( "#nama_kelas" ).val( ui.item.label);
        $( "#id_kelas" ).val( ui.item.result);
        return false;
		
      }  
    });

	// auto complete program studi
    $( "#nama_jurusan").autocomplete({
      source: "<?= base_url()?>nilai/getJurusan",
      select: function( event, ui ) {
        $( "#nama_jurusan" ).val( ui.item.label);
        $( "#id_jurusan" ).val( ui.item.result);
        return false;
      }  
    });


</script> 

