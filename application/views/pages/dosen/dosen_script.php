<script>

$(function() {
    
    // clear add form
    $('#tambah-dosen').click(function() {
        clear_add()
    });
    
    // setup datatable
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd"  : oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength) 
        };
    };

    // server side scripting
    var table = $('#data-dosen').dataTable({
        initComplete: function() {
            var api = this.api();
            $('#data-dosen_filter input')
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
            url: "<?= base_url()?>dosen/show",
            type: "POST"
        },
        columns:[
            {"data": "gambar", class:"text-center"},
            {"data": "nik", class:"text-center"},
            {"data": "nidn", class:"text-center"},
            {"data": "nama_dosen", class:"text-center"},
            {"data": "gelar", class:"text-center"},
            {"data": "pendidikan", class:"text-center"},
            {"data": "status_dosen", class:"text-center"},
            {"data": "jenis_kelamin_dosen", class:"text-center"},
            {"data": "view", class:"text-center"}
        ],

    });

    // create or data 
    $('#frm-dosen').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>dosen/store',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nik_err != "") {
                        $('#nik_err').html(res.nik_err);
                    } else {
                        $('#nik_err').html('');
                    }

                    if (res.nidn_err != "") {
                        $('#nidn_err').html(res.nidn_err);
                    } else {
                        $('#nidn_err').html('');
                    }

                    if (res.nama_dosen_err != "") {
                        $('#nama_dosen_err').html(res.nama_dosen_err);
                    } else {
                        $('#nama_dosen_err').html('');
                    }

                    if (res.jenis_kelamin_err != "") {
                        $('#jenis_kelamin_err').html(res.jenis_kelamin_err);
                    } else {
                        $('#jenis_kelamin_err').html('');
                    }

                    if (res.gelar_err != "") {
                        $('#gelar_err').html(res.gelar_err);
                    } else {
                        $('#gelar_err').html('');
                    }

                    if (res.pendidikan_err != "") {
                        $('#pendidikan_err').html(res.pendidikan_err);
                    } else {
                        $('#pendidikan_err').html('');
                    }

                    if (res.status_err != "") {
                        $('#status_err').html(res.status_err);
                    } else {
                        $('#status_err').html('');
                    }

                    if (res.tempat_lahir_err != "") {
                        $('#tempat_lahir_err').html(res.tempat_lahir_err);
                    } else {
                        $('#tempat_lahir_err').html('');
                    }

                    if (res.tanggal_lahir_err != "") {
                        $('#tanggal_lahir_err').html(res.tanggal_lahir_err);
                    } else {
                        $('#tanggal_lahir_err').html('');
                    }

                    if (res.agama_err != "") {
                        $('#agama_err').html(res.agama_err);
                    } else {
                        $('#agama_err').html('');
                    }

                    if (res.alamat_err != "") {
                        $('#alamat_err').html(res.alamat_err);
                    } else {
                        $('#alamat_err').html('');
                    }

                    if (res.no_telp_err != "") {
                        $('#no_telp_err').html(res.no_telp_err);
                    } else {
                        $('#no_telp_err').html('');
                    }

                    console.log(res);
                }

                if (res.success) {
                    $('#data-dosen').DataTable().ajax.reload();
                    toastr.success('Data berhasi disimpan',{timeOut: 4000});
                    $('#modal-dosen').modal('hide');
                    clear();

                } 
            }

        });

    });

    // delete data dosen
    $(document).on('click','.delete-dosen',function(){
       if (confirm('Anda yakin ingin menghapus data ini ?')) {
            $.ajax({
                url:'<?= base_url()?>dosen/destroy',
                type:'POST',
                data:{id:$(this).data('id')},
                dataType:'JSON',
                success:function(res){
                    $('#data-dosen').DataTable().ajax.reload();
                    toastr.success('Data berhasi dihapus',{timeOut: 4000});
                }
            });
       } else {
           return false;
       }
    });

    // edit data dosen
    $(document).on('click','.edit-dosen', function(){
        $.ajax({
            url:'<?= base_url()?>dosen/edit',
            type:'POST',
            dataType:'JSON',
            data:{id: $(this).data('id')},
            success:function(res){
                
                $('#modal-dosen_edit').modal('show');
                $('#id_dosen_edit').val(res.id_dosen);
                $('#nik_edit').val(res.nik);
                $('#nidn_edit').val(res.nidn);
                $('#nama_dosen_edit').val(res.nama_dosen);
                $('#alamat_edit').val(res.alamat_dosen);
                $('#gelar_edit').val(res.gelar);
                $('#pendidikan_edit').val(res.pendidikan);
                $('#jenis_kelamin_edit').val(res.jenis_kelamin_dosen);
                $('#status_edit').val(res.status_dosen);
                $('#agama_edit').val(res.agama_dosen);
                $('#tanggal_lahir_edit').val(res.tanggal_lahir_dosen);
                $('#tempat_lahir_edit').val(res.tempat_lahir_dosen);
                $('#foto_lama').val(res.foto_dosen);

                console.log(res);
                clear_edit();

            }
        })
    });

    // update or data 
    $('#frm-dosen_edit').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>dosen/update',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nik_edit_err != "") {
                        $('#nik_edit_err').html(res.nik_edit_err);
                    } else {
                        $('#nik_edit_err').html('');
                    }

                    if (res.nidn_edit_err != "") {
                        $('#nidn_edit_err').html(res.nidn_edit_err);
                    } else {
                        $('#nidn_edit_err').html('');
                    }

                    if (res.nama_dosen_edit_err != "") {
                        $('#nama_dosen_edit_err').html(res.nama_dosen_edit_err);
                    } else {
                        $('#nama_dosen_edit_err').html('');
                    }

                    if (res.jenis_kelamin_edit_err != "") {
                        $('#jenis_kelamin_edit_err').html(res.jenis_kelamin_edit_err);
                    } else {
                        $('#jenis_kelamin_edit_err').html('');
                    }

                    if (res.gelar_edit_err != "") {
                        $('#gelar_edit_err').html(res.gelar_edit_err);
                    } else {
                        $('#gelar_edit_err').html('');
                    }

                    if (res.pendidikan_edit_err != "") {
                        $('#pendidikan_edit_err').html(res.pendidikan_edit_err);
                    } else {
                        $('#pendidikan_edit_err').html('');
                    }

                    if (res.status_edit_err != "") {
                        $('#status_edit_err').html(res.status_edit_err);
                    } else {
                        $('#status_edit_err').html('');
                    }

                    if (res.tempat_lahir_edit_err != "") {
                        $('#tempat_lahir_edit_err').html(res.tempat_lahir_edit_err);
                    } else {
                        $('#tempat_lahir_edit_err').html('');
                    }

                    if (res.tanggal_lahir_edit_err != "") {
                        $('#tanggal_lahir_edit_err').html(res.tanggal_lahir_edit_err);
                    } else {
                        $('#tanggal_lahir_edit_err').html('');
                    }

                    if (res.agama_edit_err != "") {
                        $('#agama_edit_err').html(res.agama_edit_err);
                    } else {
                        $('#agama_edit_err').html('');
                    }

                    if (res.alamat_edit_err != "") {
                        $('#alamat_edit_err').html(res.alamat_edit_err);
                    } else {
                        $('#alamat_edit_err').html('');
                    }

                }

                if (res.success) {
                    $('#data-dosen').DataTable().ajax.reload();
                    toastr.success('Data berhasi diubah',{timeOut: 4000});
                    $('#modal-dosen_edit').modal('hide');
                    clear();

                } 
            }

        });

    });


});


function clear_add(){
    $('#frm-dosen')[0].reset();
    $('#nik_err,#nidn_err,#nama_dosen_err,#jenis_kelamin_err,#gelar_err,#pendidikan_err,#status_err,#tempat_lahir_err,#tanggal_lahir_err,#agama_err,#alamat_err').html('');
}
function clear_edit(){
    $('#nik_edit_err,#nidn_edit_err,#nama_dosen_edit_err,#jenis_kelamin_edit_err,#gelar_edit_err,#pendidikan_edit_err,#status_edit_err,#tempat_lahir_edit_err,#tanggal_lahir_edit_err,#agama_edit_err,#alamat_edit_err').html('');
}

</script>