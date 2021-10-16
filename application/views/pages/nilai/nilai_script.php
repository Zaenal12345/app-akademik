<script>

    // select2 initialization
	$(document).ready(function domReady() {
		
		$(".js-select2-tahun_ajar").select2({
			placeholder: "Pilih Tahun Ajaran",
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

		$(".js-select2-mahasiswa").select2({
			placeholder: "Pilih NIM",
            dropdownParent: $("#modal-perbaikan_nilai")
		});
        
		$(".js-select2-matakuliah").select2({
			placeholder: "Pilih Matakuliah",
            dropdownParent: $("#modal-perbaikan_nilai")
		});

		$(".js-select2-mahasiswa2").select2({
			placeholder: "Pilih NIM",
            dropdownParent: $("#modal-transkip_nilai")
		});

		$(".js-select2-mahasiswa3").select2({
			placeholder: "Pilih NIM",
            dropdownParent: $("#modal-nilai_persemester")
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
			{"data": "nilai", class:"text-center"},
			{"data": "grade", class:"text-center"},
			{"data": "keterangan", class:"text-center"},
			{"data": "view", class:"text-center"}
		],

	});

    $('#list_nilai').dataTable();

    // search process
    $('#cari-list_mahasiwa').click(function(){
        $.ajax({
            url:'<?= base_url()?>nilai/search',
            type: 'POST',
            dataType: 'JSON',
            data:{
                id_matakuliah : $('#matakuliah_id').val(),
                semester : $('#semester').val(),
                id_kelas : $('#kelas_id').val(),
                id_jurusan : $('#jurusan_id').val(),
                id_tahun_ajar : $('#tahun_ajar_id').val(),
            },
            success:function(res){

                let html = '';
                // console.log(res);
                if (res.length != 0) {

                    for (let index = 0; index < res.length; index++) {
                    
                        html+='<tr><td class="text-center">'+ res[index].nim +'</td><td class="text-center">'+ res[index].nama_mahasiswa +'</td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="nilai[]"></div></td><td class="text-center"><div class="form-group" style="margin-top:-10px; margin-bottom: -5px"><input type="text" class="form-control" name="grade[]"></div></td></tr><input type="hidden" name="mahasiswa_id[]" value="'+ res[index].id_mahasiswa +'">';

                    }

                    $('#btn-aksi').show();

                } else {

                    html+='<tr><td colspan="8" class="text-center">Data tidak ditemukan</td></tr>';

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
        
        $.ajax({
            url:'<?= base_url()?>nilai/store',
            type: 'POST',
            dataType: 'JSON',
            data:$(this).serialize(),
            success:function(res){
                console.log(res);
                if (res.message) {

                    toastr.success(res.message,{timeOut: 4000});
                    setTimeout(() => {
                        window.location.href="<?= base_url()?>nilai";
                    }, 2000);
                }
            }
        });

    });

    $('#frm-ubah_nilai').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            type: $(this).attr('method'),
            data:$(this).serialize(),
            dataType:'JSON',
            success:function(res) {
                if (res.message) {
                    toastr.success(res.message,{timeOut: 4000});
                    $('#modal-perbaikan_nilai').modal('hide');
                    $('#data-nilai').DataTable().ajax.reload();
                    $(this).reset();
                }
            }
        })
    })

    $('#nim2').change(function() {
        getNilai($(this).val(),$('#matakuliah_id').val());
    });

    $('#matakuliah_id').change(function() {
        getNilai($('#nim2').val(),$(this).val());
    });

    function getNilai(nim,matakuliah) {
        $.ajax({
            url:'<?= base_url()?>nilai/getNilai',
            type: 'POST',
            dataType: 'JSON',
            data:{
                mahasiswa_id: nim,
                matakuliah_id: matakuliah,
            },
            success:function(res){
                // console.log(res);
                $('#nilai_edit').val(res[0].nilai);
                $('#grade_edit').val(res[0].grade);
            }
        });
    }
</script>

