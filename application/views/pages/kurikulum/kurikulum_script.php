<script>
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
                        '<td class="text-center"> -- </td>' +
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
            kelas_id: null,
        }
        // console.log(all_data);
        $.ajax({
            url:'<?= base_url()?>kurikulum/store',
            type:'POST',
            data:all_data,
            dataType:'JSON',
            success:function(res){
                
                // ajax call kurikulum data
                $.ajax({
                    url:'<?= base_url()?>kurikulum/show',
                    type:'POST',
                    data:{
                        jurusan_id: $('#jurusan_id').val(),
                        tahun_ajar_id: $('#tahun_ajar_id').val(),
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
                                '<td class="text-center"> -- </td>' +
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
                        $('#tabel-kurikulum').show();

                    }
                })

                toastr.success('Data berhasil disimpan',{timeOut: 4000});
                $('#modal-kurikulum_tambah').modal('hide');
            }
        });

    });
    
    // save all kurikulum data 2
    $('#btn-save2').on('click', function() {
        
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
            kelas_id: null,
        }

        $.ajax({
            url:'<?= base_url()?>kurikulum/store2',
            type:'POST',
            data:all_data,
            dataType:'JSON',
            success:function(res){
                // console.log(res);

                // ajax call kurikulum data
                $.ajax({
                    url:'<?= base_url()?>kurikulum/show',
                    type:'POST',
                    data:{
                        jurusan_id: $('#jurusan_id').val(),
                        tahun_ajar_id: $('#tahun_ajar_id').val(),
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
                                '<td class="text-center"> -- </td>' +
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
            }
        });

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
                dosen_id: $('#dosen_id').val()
            },
            dataType:'JSON',
            success:function(res){
            //    console.log(res);

                // ajax call data kurikulum up to date
                $.ajax({
                    url:'<?= base_url()?>kurikulum/show',
                    type:'POST',
                    data:{
                        jurusan_id: $('#jurusan_id').val(),
                        tahun_ajar_id: $('#tahun_ajar_id').val(),
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
                                '<td class="text-center"> -- </td>' +
                                '<td class="text-center">'+ res[index].nama_dosen + '</td>' +
                            '</tr>'; 
                            }


                        }else{

                            html+='<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';

                        }   

                        $('#data-kurikulum tbody').empty();
                        $('#data-kurikulum tbody').append(html);
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                        $('#modal-kurikulum_ubah').modal('hide');
                    }
                });

            }
        });
    });

function getData(){

}
</script> 

