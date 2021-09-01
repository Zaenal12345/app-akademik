<script>

    // select2 initialization
	$(document).ready(function domReady() {
		
		$(".js-select2-kelas").select2({
			placeholder: "Pilih Kelas",
		});

		$(".js-select2-tahun_ajar").select2({
			placeholder: "Pilih Tahun Ajaran",
		});

		$(".js-select2-jurusan").select2({
			placeholder: "Pilih Jurusan",
		});
		
	});

    // add button
    $('#add-kurikulum').click(function() {
        // unchecked all checkbox
        $('#datatable2 tbody tr input[type=checkbox]:checked').prop("checked", false);
        $('[name="select_all"]').prop("checked", false);

        // hide alert error
        $('#alert-error').html('').hide();
    });

    // copy button
    $('#copy-kurikulum').click(function() {
        // unchecked all checkbox
        $('#datatable3 tbody tr input[type=checkbox]:checked').prop("checked", false);
        $('[name="select_all2"]').prop("checked", false);

        // hide alert error
        $('#alert-error2').html('').hide();
    });

    // datatable initialize
    $('#datatable2').dataTable({
        ordering: false
    });

    // checkbox action
    $('[name="select_all"]').change(function() {
       if(this.checked){
            $('#datatable2 tbody :checkbox').prop('checked', true);
        }else{
            $('#datatable2 tbody :checkbox').prop('checked', false);
       }
    });

    $('[name="select_all2"]').change(function() {
       if(this.checked){
            $('#datatable3 tbody :checkbox').prop('checked', true);
        }else{
            $('#datatable3 tbody :checkbox').prop('checked', false);
       }
    });

    // search-kurikulum
    $('#search-kurikulum').click(function() {
        $.ajax({
            url:'<?= base_url()?>kurikulum/show',
            type:'POST',
            data:{
                jurusan_id: $('#jurusan_id').val(),
                tahun_ajar_id: $('#tahun_ajar_id').val(),
                kelas_id: $('#kelas_id').val(),
            },
            dataType:'JSON',
            success:function(res){

                var html = '';

                if(res.length != 0){

                    for (let index = 0; index < res.length; index++) {
                       html+='<tr>'+
                        '<td class="text-center" style="display:none>'+ res[index].id_kurikulum +'</td>' +
                        '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].sks +'</td>' +
                        '<td class="text-center">'+ res[index].semester +'</td>' +
                        '<td class="text-center"> '+ res[index].nama_kelas+' </td>' +
                        '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                       '</tr>'; 
                    }


                }else{

                    html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';

                }   

                $('.btn-action').show();
                $('#data-kurikulum tbody').empty();
                // $('#data-kurikulum').DataTable().clear().draw();
                $('#data-kurikulum tbody').append(html);
                // $('#data-kurikulum').DataTable();
                $('#tabel-kurikulum').show();

            }
        })
    });

    // search-kurikulum2
    $('#search-kurikulum2').click(function() {
        $.ajax({
            url:'<?= base_url()?>kurikulum/show2',
            type:'POST',
            data:{
                tahun_ajar_id: $('#tahun_ajar_id2').val(),
                jurusan_id: $('#jurusan_id2').val(),
                kelas_id: $('#kelas_id2').val(),
            },
            dataType:'JSON',
            success:function(res){

                var html = '';

                if(res.length != 0){

                    for (let index = 0; index < res.length; index++) {
                       html+='<tr>'+
                        '<td class="text-center" style="display:none">'+ res[index].id_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                        '<td class="text-center">'+ res[index].sks +'</td>' +
                        '<td class="text-center"><input type="checkbox"></td>' +
                       '</tr>'; 
                    }


                }else{

                    html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';

                }   

                $('.btn-action').show();
                $('#datatable3 tbody').empty();
                $('#datatable3 tbody').append(html);
                // $('#data-kurikulum').DataTable();
                // $('#tabel-kurikulum').show();

            }
        })
    });

    // save all kurikulum data 
    $('#btn-save').on('click', function() {
        
        if($('#datatable2 tbody tr input[type=checkbox]:checked').length != 0){

            var data = [];
    
            $('#datatable2 tbody tr input[type=checkbox]:checked').each(function(row, tr) {
                var row = $(this).closest("tr")[0];
                var sub_data = {
                    'id_matakuliah': row.cells[0].innerHTML, 
                    'kode_matakuliah': row.cells[1].innerHTML, 
                    'nama_matakuliah': row.cells[2].innerHTML, 
                }
    
                data.push(sub_data);
            });
    
            var all_data = {
                data: data,
                tahun_ajar_id: $('#tahun_ajar_id').val(),
                jurusan_id: $('#jurusan_id').val(),
                kelas_id: $('#kelas_id').val(),
            }
    
            $.ajax({
                url:'<?= base_url()?>kurikulum/store',
                type:'POST',
                data:all_data,
                dataType:'JSON',
                success:function(res){
                    
                    if(res.success){
                        // ajax call kurikulum data
                        $.ajax({
                            url:'<?= base_url()?>kurikulum/show',
                            type:'POST',
                            data:{
                                jurusan_id: $('#jurusan_id').val(),
                                tahun_ajar_id: $('#tahun_ajar_id').val(),
                                kelas_id: $('#kelas_id').val(),
                            },
                            dataType:'JSON',
                            success:function(res){
    
                                var html = '';
    
                                if(res.length != 0){
    
                                    for (let index = 0; index < res.length; index++) {
                                    html+='<tr>'+
                                        '<td class="text-center" style="display:none>'+ res[index].id_kurikulum +'</td>' +
                                        '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                                        '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                                        '<td class="text-center">'+ res[index].sks +'</td>' +
                                        '<td class="text-center">'+ res[index].semester +'</td>' +
                                        '<td class="text-center"> '+ res[index].nama_kelas+' </td>' +
                                        '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                                    '</tr>'; 
                                    }
    
    
                                }else{
    
                                    html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';
    
                                }   
    
                                $('.btn-action').show();
                                $('#data-kurikulum tbody').empty();
                                // $('#data-kurikulum').DataTable().clear().draw();
                                $('#data-kurikulum tbody').append(html);
                                // $('#data-kurikulum').DataTable();
                                $('#tabel-kurikulum').show();
    
                            }
                        })
    
                        // message success & hide modal
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        $('#modal-kurikulum_tambah').modal('hide');
    
                        // unchecked all checkbox
                        $('#datatable2 tbody tr input[type=checkbox]:checked').prop("checked", false);
                        $('[name="select_all"]').prop("checked", false);
    
                    }else{
    
                        var message = '';
    
                        message+='<ul>';
                        for (let index = 0; index < res.length; index++) {
                            message+='<li> Matakuliah '+ res[index].nama_matakuliah +' sudah ada</li>';
                        }
                        message+='</ul>';
    
                        $('#alert-error').html('');
                        $('#alert-error').html(message);
                        $('#alert-error').show().delay(10000).fadeOut('slow');
    
                    }
    
                }
            });
        }else{
            $('#alert-error').html('');
            $('#alert-error').html('<p class="text-center">Tidak ada matakuliah yang dipilih</p>');
            $('#alert-error').show().delay(10000).fadeOut('slow');
        }


    });
    
    // save all kurikulum data 2
    $('#btn-save2').on('click', function() {
        
        if($('#datatable3 tbody tr input[type=checkbox]:checked').length != 0){

            var data = [];
    
            $('#datatable3 tbody tr input[type=checkbox]:checked').each(function(row, tr) {
                var row = $(this).closest("tr")[0];
                var sub_data = {
                    'id_matakuliah': row.cells[0].innerHTML, 
                    'kode_matakuliah': row.cells[1].innerHTML, 
                    'nama_matakuliah': row.cells[2].innerHTML, 
                }
    
                data.push(sub_data);
            });
    
            var all_data = {
                data: data,
                tahun_ajar_id: $('#tahun_ajar_id').val(),
                jurusan_id: $('#jurusan_id').val(),
                kelas_id: $('#kelas_id').val(),
            }
    
            $.ajax({
                url:'<?= base_url()?>kurikulum/store2',
                type:'POST',
                data:all_data,
                dataType:'JSON',
                success:function(res){
    
                    if(res.success){

                        // ajax call kurikulum data
                        $.ajax({
                            url:'<?= base_url()?>kurikulum/show',
                            type:'POST',
                            data:{
                                jurusan_id: $('#jurusan_id').val(),
                                tahun_ajar_id: $('#tahun_ajar_id').val(),
                                kelas_id: $('#kelas_id').val(),
                            },
                            dataType:'JSON',
                            success:function(res){
        
                                var html = '';
        
                                if(res.length != 0){
        
                                    for (let index = 0; index < res.length; index++) {
                                    html+='<tr>'+
                                        '<td class="text-center" style="display:none>'+ res[index].id_kurikulum +'</td>' +
                                        '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                                        '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                                        '<td class="text-center">'+ res[index].sks +'</td>' +
                                        '<td class="text-center">'+ res[index].semester +'</td>' +
                                        '<td class="text-center"> '+ res[index].nama_kelas+' </td>' +
                                        '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                                    '</tr>'; 
                                    }
        
        
                                }else{
        
                                    html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';
        
                                }   
        
                                $('.btn-action').show();
                                $('#data-kurikulum tbody').empty();
                                $('#data-kurikulum tbody').append(html);
                                // $('#data-kurikulum').DataTable();
                                // $('#tabel-kurikulum').show();
        
                            }
                        })
        
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        $('#modal-kurikulum_copy').modal('hide');

                        // unchecked all checkbox
                        $('#datatable3 tbody tr input[type=checkbox]:checked').prop("checked", false);
                        $('[name="select_all2"]').prop("checked", false);

                    }else{

                        var message = '';
    
                        message+='<ul>';
                        for (let index = 0; index < res.length; index++) {
                            message+='<li> Matakuliah '+ res[index].nama_matakuliah +' sudah ada</li>';
                        }
                        message+='</ul>';
    
                        $('#alert-error2').html('');
                        $('#alert-error2').html(message);
                        $('#alert-error2').show().delay(10000).fadeOut('slow');

                    }

                }
            });

        }else{

            $('#alert-error2').html('');
            $('#alert-error2').html('<p class="text-center">Tidak ada matakuliah yang dipilih</p>');
            $('#alert-error2').show().delay(10000).fadeOut('slow');

        }

    });

    // edit kurikulum
    $(document).on('click','.edit-kurikulum',function() {
        $('#modal-kurikulum_ubah').modal('show');
        $('#id_kurikulum').val($(this).data('id'));
    });

    // update kurikulum
    $('#btn-update').click(function() {
        $.ajax({
            url:'<?= base_url()?>kurikulum/update',
            type:'POST',
            data:{
                id_kurikulum: $('#id_kurikulum').val(),
                dosen_id: $('#dosen_id').val(),
            },
            dataType:'JSON',
            success:function(res){

                // ajax call data kurikulum up to date
                $.ajax({
                    url:'<?= base_url()?>kurikulum/show',
                    type:'POST',
                    data:{
                        jurusan_id: $('#jurusan_id').val(),
                        tahun_ajar_id: $('#tahun_ajar_id').val(),
                        kelas_id: $('#kelas_id').val(),
                    },
                    dataType:'JSON',
                    success:function(res){

                        var html = '';

                        if(res.length != 0){

                            for (let index = 0; index < res.length; index++) {
                            html+='<tr>'+
                                '<td class="text-center" style="display:none>'+ res[index].id_kurikulum +'</td>' +
                                '<td class="text-center">'+ res[index].kode_matakuliah +'</td>' +
                                '<td class="text-center">'+ res[index].nama_matakuliah +'</td>' +
                                '<td class="text-center">'+ res[index].sks +'</td>' +
                                '<td class="text-center">'+ res[index].semester +'</td>' +
                                '<td class="text-center"> '+ res[index].nama_kelas+' </td>' +
                                '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                            '</tr>'; 
                            }


                        }else{

                            html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';

                        }   

                        $('#data-kurikulum tbody').empty();
                        $('#data-kurikulum tbody').append(html);
                        $('#modal-kurikulum_ubah').modal('hide');
                        // $('#data-kurikulum').DataTable();
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                    }
                });

            }
        });
    });

function getData(){

}
</script> 

