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
	var table = $('#data-jadwal').dataTable({
		initComplete: function() {
			var api = this.api();
			$('#data-jadwal_filter input')
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
			url: "<?= base_url()?>jadwal/show",
			type: "POST"
		},
		columns:[
			{"data": "tahun_ajar", class:"text-center"},
			{"data": "hari", class:"text-center"},
			{"data": "nama_matakuliah", class:"text-center"},
			{"data": "nama_dosen", class:"text-center"},
			{"data": "nama_kelas", class:"text-center"},
			{"data": "nama_jurusan", class:"text-center"},
			{"data": "semester", class:"text-center"},
			{"data": "jam_masuk", class:"text-center"},
			{"data": "jam_selesai", class:"text-center"},
			{"data": "ruangan", class:"text-center"},
			{"data": "view", class:"text-center"}
		],

	});

    // save all jadwal
    $('#btn-add').click(function () {
        
        var hari = $('#hari').val();
        var kode_matakuliah = $('#kode_matakuliah').val();
        var nama_matakuliah = $('#matakuliah_id option:selected').text();
        var matakuliah_id = $('#matakuliah_id').val();
        var semester = $('#semester').val();
        var nama_dosen = $('#nama_dosen').val();
        var dosen_id = $('#dosen_id').val();
        var ruangan = $('#ruangan_id option:selected').text();
        var ruangan_id = $('#ruangan_id').val();
        var jam_masuk = $('#jam_masuk').val();
        var jam_selesai = $('#jam_selesai').val();

        $('#table-jadwal_detail tbody').append(
            '<tr>'+
                '<td class="text-center">'+ hari +'</td>'+
                '<td class="text-center">'+ kode_matakuliah +'</td>'+
                '<td class="text-center">'+ nama_matakuliah +'</td>'+
                '<td class="text-center">'+ semester +'</td>'+
                '<td class="text-center" style="display: none;">'+ matakuliah_id +'</td>' +
                '<td class="text-center">'+ nama_dosen +'</td>'+
                '<td class="text-center" style="display: none;">'+ dosen_id +'</td>' +
                '<td class="text-center">'+ ruangan +'</td>' +
                '<td class="text-center" style="display: none;">'+ ruangan_id +'</td>' +
                '<td class="text-center">'+ jam_masuk +'</td>' +
                '<td class="text-center">'+ jam_selesai +'</td>' +
                '<td class="text-center"><a href="#" class="delete-detail_kurikulum btn btn-danger btn-sm"><i class="feather icon-trash"></i></a></td>' +
            '</tr>'
        );

        $('#jam_masuk').val('');
        $('#jam_selesai').val('');
        $('#ruangan').val('');

    });
    
    // save all jadwal
    $('#btn-save').click(function () {
        
        var tahun_ajar_id = $('#tahun_ajar_id').val();
        var kelas_id = $('#kelas_id').val();
        var jurusan_id = $('#jurusan_id').val();
        var data = [];

        $('#table-jadwal_detail tbody tr').each(function(row, tr) {

            var sub_data = {   
                'hari'              : $(tr).find('td:eq(0)').text(),
                'kode_matakuliah'   : $(tr).find('td:eq(1)').text(),
                'nama_matakuliah'   : $(tr).find('td:eq(2)').text(),
                'semester'          : $(tr).find('td:eq(3)').text(),
                'matakuliah_id'     : $(tr).find('td:eq(4)').text(),
                'nama_dosen'        : $(tr).find('td:eq(5)').text(),
                'dosen_id'          : $(tr).find('td:eq(6)').text(),
                'ruangan'           : $(tr).find('td:eq(7)').text(),
                'ruangan_id'        : $(tr).find('td:eq(8)').text(),
                'jam_masuk'         : $(tr).find('td:eq(9)').text(),
                'jam_selesai'       : $(tr).find('td:eq(10)').text()
            }

            data.push(sub_data);

        });		

        var allData = {
            tahun_ajar_id: tahun_ajar_id, 
            kelas_id: kelas_id, 
            jurusan_id: jurusan_id,
            data: data, 
        }

        $.ajax({
            url: '<?= base_url()?>jadwal/store',
            type: 'POST',
            dataType: 'JSON',
            data: allData,
            success:function(res){
                
                toastr.success('Data berhasil disimpan',{timeOut: 4000});
                setTimeout(() => {
                    window.location.href="<?= base_url()?>jadwal";
                }, 3000);
                
            }
        });

    });

    // when change tahun ajar or kelas or jurusan
    $('#tahun_ajar_id').change(function() {
        getMatakuliah(); 
    });
    $('#kelas_id').change(function() {
        getMatakuliah(); 
    });
    $('#jurusan_id').change(function() {
        getMatakuliah(); 
    });

    $('#matakuliah_id').change(function() { 
        getDosen($(this).val());
        getSemester($(this).val());
    });

    $(document).on('click','.delete-detail_kurikulum',function() {
        $(this).closest('tr').remove();
    });

    // call getMatakuliah function
    getMatakuliah(); 
    function getMatakuliah() {
        $.ajax({
            url:'<?= base_url()?>jadwal/getMatakuliah',
            type:'POST',
            dataType:'JSON',
            data:{
                tahun_ajar_id : $('#tahun_ajar_id').val(),
                kelas_id : $('#kelas_id').val(),
                jurusan_id : $('#jurusan_id').val(),
            },
            success:function(res){

               

                if(res.length != 0){
                    
                    var html = '';
                    getDosen(res[0].id_matakuliah);
                    getSemester(res[0].id_matakuliah);

                    for (let index = 0; index < res.length; index++) {
                       
                        html+='<option value="'+ res[index].id_matakuliah +'">'+ res[index].nama_matakuliah +'</option>';
                        
                    }

        
                    $('#matakuliah_id').empty();
                    $('#matakuliah_id').append(html);

                }else{
                    $('#matakuliah_id').empty();
                }

            }
        })
    }

    function getDosen(matakuliah_id) {
        
        $.ajax({
            url:'<?= base_url()?>jadwal/getDosen',
            type:'POST',
            dataType:'JSON',
            data:{
                tahun_ajar_id : $('#tahun_ajar_id').val(),
                kelas_id : $('#kelas_id').val(),
                jurusan_id : $('#jurusan_id').val(),
                matakuliah_id : matakuliah_id
            },
            success:function(res){


                $('#nama_dosen').val('');
                $('#dosen_id').val('');
                $('#nama_dosen').val(res[0].nama_dosen);
                $('#dosen_id').val(res[0].id_dosen);

            }
        })

    }

    function getSemester(matakuliah_id) {
        
        $.ajax({
            url:'<?= base_url()?>jadwal/getSemester',
            type:'POST',
            dataType:'JSON',
            data:{
                matakuliah_id : matakuliah_id
            },
            success:function(res){

                $('#kode_matakuliah').val('');
                $('#semester').val('');
                $('#kode_matakuliah').val(res.kode_matakuliah);
                $('#semester').val(res.semester);

            }
        })

    }

</script>