<script>

$(function() {
    
    // clear add form
    $('#tambah-mahasiswa').click(function() {
        clear(); 
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
    var table = $('#data-mahasiswa').dataTable({
        initComplete: function() {
            var api = this.api();
            $('#data-mahasiswa_filter input')
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
            url: "<?= base_url()?>mahasiswa/show",
            type: "POST"
        },
        columns:[
            {"data": "nim", class:"text-center"},
            {"data": "gambar", class:"text-center"},
            {"data": "nama_mahasiswa", class:"text-center"},
            {"data": "nama_jurusan", class:"text-center"},
            {"data": "nama_kelas", class:"text-center"},
            {"data": "status_mahasiswa", class:"text-center"},
            {"data": "jenis_kelamin", class:"text-center"},
            {"data": "tahun_angkatan", class:"text-center"},
            {"data": "view", class:"text-center"}
        ],

    });

    // create or data 
    $('#frm-mahasiswa').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>mahasiswa/store',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nim_err != "") {
                        $('#nim_err').html(res.nim_err);
                    } else {
                        $('#nim_err').html('');
                    }

                    if (res.nama_mahasiswa_err != "") {
                        $('#nama_mahasiswa_err').html(res.nama_mahasiswa_err);
                    } else {
                        $('#nama_mahasiswa_err').html('');
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

                    if (res.status_mahasiswa_err != "") {
                        $('#status_mahasiswa_err').html(res.status_mahasiswa_err);
                    } else {
                        $('#status_mahasiswa_err').html('');
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

                    if (res.tahun_angkatan_err != "") {
                        $('#tahun_angkatan_err').html(res.tahun_angkatan_err);
                    } else {
                        $('#tahun_angkatan_err').html('');
                    }

                    console.log(res);
                }

                if (res.success) {
                    $('#data-mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi disimpan',{timeOut: 4000});
                    $('#modal-mahasiswa').modal('hide');
                    clear();

                } 
            }

        });

    });

    // delete data mahasiswa
    $(document).on('click','.delete-mahasiswa',function(){
       if (confirm('Anda yakin ingin menghapus data ini ?')) {
            $.ajax({
                url:'<?= base_url()?>mahasiswa/destroy',
                type:'POST',
                data:{id:$(this).data('id')},
                dataType:'JSON',
                success:function(res){
                    $('#data-mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi dihapus',{timeOut: 4000});
                }
            });
       } else {
           return false;
       }
    });

    // edit data mahasiswa
    $(document).on('click','.edit-mahasiswa', function(){
        $.ajax({
            url:'<?= base_url()?>mahasiswa/edit',
            type:'POST',
            dataType:'JSON',
            data:{id: $(this).data('id')},
            success:function(res){
                
                $('#modal-mahasiswa_edit').modal('show');
                
                $('#id_mahasiswa_edit').val(res.id_mahasiswa);
                $('#nim_edit').val(res.nim);
                $('#nama_mahasiswa_edit').val(res.nama_mahasiswa);
                $('#alamat_edit').val(res.alamat);
                $('#jurusan_id_edit').val(res.jurusan_id);
                $('#kelas_id_edit').val(res.kelas_id);
                $('#jenis_kelamin_edit').val(res.jenis_kelamin);
                $('#status_mahasiswa_edit').val(res.status_mahasiswa);
                $('#agama_edit').val(res.agama);
                $('#tanggal_lahir_edit').val(res.tanggal_lahir);
                $('#tempat_lahir_edit').val(res.tempat_lahir);
                $('#foto_lama').val(res.foto);
                $('#tahun_angkatan_edit').val(res.tahun_angkatan);

            }
        })
    });

    // update or data 
    $('#frm-mahasiswa_edit').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>mahasiswa/update',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nim_edit_err != "") {
                        $('#nim_edit_err').html(res.nim_edit_err);
                    } else {
                        $('#nim_edit_err').html('');
                    }

                    if (res.nama_mahasiswa_edit_err != "") {
                        $('#nama_mahasiswa_edit_err').html(res.nama_mahasiswa_edit_err);
                    } else {
                        $('#nama_mahasiswa_edit_err').html('');
                    }

                    if (res.jenis_kelamin_edit_err != "") {
                        $('#jenis_kelamin_edit_err').html(res.jenis_kelamin_edit_err);
                    } else {
                        $('#jenis_kelamin_edit_err').html('');
                    }

                    if (res.jurusan_id_edit_err != "") {
                        $('#jurusan_id_edit_err').html(res.jurusan_id_edit_err);
                    } else {
                        $('#jurusan_id_edit_err').html('');
                    }

                    if (res.kelas_id_edit_err != "") {
                        $('#kelas_id_edit_err').html(res.kelas_id_edit_err);
                    } else {
                        $('#kelas_id_edit_err').html('');
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

                    if (res.tahun_angkatan_edit_err != "") {
                        $('#tahun_angkatan_edit_err').html(res.tahun_angkatan_edit_err);
                    } else {
                        $('#tahun_angkatan_edit_err').html('');
                    }

                }

                if (res.success) {
                    $('#data-mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi disimpan',{timeOut: 4000});
                    $('#modal-mahasiswa_edit').modal('hide');
                    clear();

                } 
            }

        });

    });


});


function clear(){
    $('#frm-mahasiswa')[0].reset();
}

</script>