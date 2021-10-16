<script>
    $('#table-matakuliah').dataTable();

    // checkbox action
    $('[name="select_all"]').change(function() {
       if(this.checked){
            $('#table-matakuliah tbody :checkbox').prop('checked', true);
        }else{
            $('#table-matakuliah tbody :checkbox').prop('checked', false);
       }
    });

    // save all kurikulum data 
    $('#btn-save').on('click', function() {
        
        if($('#table-matakuliah tbody tr input[type=checkbox]:checked').length != 0){

            var data = [];
    
            $('#table-matakuliah tbody tr input[type=checkbox]:checked').each(function(row, tr) {
                var row = $(this).closest("tr")[0];
                var sub_data = {
                    'id_matakuliah': row.cells[0].innerHTML, 
                    'kode_matakuliah': row.cells[1].innerHTML, 
                    'nama_matakuliah': row.cells[2].innerHTML, 
                    'sks': row.cells[3].innerHTML, 
                    'semester': row.cells[4].innerHTML, 
                    'jurusan': row.cells[5].innerHTML, 
                    'jenis': row.cells[6].innerHTML, 
                }
    
                data.push(sub_data);
            });
    
            var all_data = {
                data: data,
            }
    
            $.ajax({
                url:'<?= base_url()?>dikti/insertMatakuliah',
                type:'POST',
                data:all_data,
                dataType:'JSON',
                success:function(res){
                    
                    if(res.success){
                        // message success & hide modal
                        toastr.success(res.message,{timeOut: 4000});
                        $('#modal-insert_matakuliah').modal('hide');
    
                        // unchecked all checkbox
                        $('#table-matakuliah tbody tr input[type=checkbox]:checked').prop("checked", false);
                        $('[name="select_all"]').prop("checked", false);
    
                    }else{
    
                        var message = res.message;
    
                        $('#alert-error').html('');
                        $('#alert-error').html(message);
                        $('#alert-error').show().delay(10000).fadeOut('slow');
    
                    }
                    console.log(res);
    
                }
            });

        }else{
            $('#alert-error').html('');
            $('#alert-error').html('<p class="text-center">Tidak ada matakuliah yang dipilih</p>');
            $('#alert-error').show().delay(10000).fadeOut('slow');
        }


    });
</script>