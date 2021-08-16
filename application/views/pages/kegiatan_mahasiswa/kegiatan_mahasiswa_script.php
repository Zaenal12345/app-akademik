<script>

$(function() {
    
    // clear add form
    $('#tambah-kegiatan_mahasiswa').click(function() {
        // clear(); 
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
    var table = $('#data-kegiatan_mahasiswa').dataTable({
        initComplete: function() {
            var api = this.api();
            $('#data-kegiatan_mahasiswa_filter input')
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
            url: "<?= base_url()?>KegiatanMahasiswa/show",
            type: "POST"
        },
        columns:[
            {"data": "nama_kegiatan", class:"text-center"},
            {"data": "gambar", class:"text-center"},
            {"data": "tanggal_awal", class:"text-center"},
            {"data": "tanggal_akhir", class:"text-center"},
            // {"data": "deskripsi", class:"text-center"},
            {"data": "view", class:"text-center"}
        ],

    });

    // create or data 
    $('#frm-kegiatan_mahasiswa').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>KegiatanMahasiswa/store',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nama_kegiatan_err != "") {
                        $('#nama_kegiatan_err').html(res.nama_kegiatan_err);
                    } else {
                        $('#nama_kegiatan_err').html('');
                    }

                    if (res.tanggal_awal_err != "") {
                        $('#tanggal_awal_err').html(res.tanggal_awal_err);
                    } else {
                        $('#tanggal_awal_err').html('');
                    }

                    if (res.tanggal_akhir_err != "") {
                        $('#tanggal_akhir_err').html(res.tanggal_akhir_err);
                    } else {
                        $('#tanggal_akhir_err').html('');
                    }

                    if (res.deskripsi_err != "") {
                        $('#deskripsi_err').html(res.deskripsi_err);
                    } else {
                        $('#deskripsi_err').html('');
                    }

                    console.log(res);
                }

                if (res.success) {
                    $('#data-kegiatan_mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi disimpan',{timeOut: 4000});
                    $('#modal-kegiatan_mahasiswa').modal('hide');
                    clear();

                } 
            }

        });
        

    });

    // delete data kegiatan_mahasiswa
    $(document).on('click','.delete-kegiatan_mahasiswa',function(){
       if (confirm('Anda yakin ingin menghapus data ini ?')) {
            $.ajax({
                url:'<?= base_url()?>KegiatanMahasiswa/destroy',
                type:'POST',
                data:{id:$(this).data('id')},
                dataType:'JSON',
                success:function(res){
                    $('#data-kegiatan_mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi dihapus',{timeOut: 4000});
                }
            });
       } else {
           return false;
       }
    });

    // edit data kegiatan_mahasiswa
    $(document).on('click','.edit-kegiatan_mahasiswa', function(){
        $.ajax({
            url:'<?= base_url()?>KegiatanMahasiswa/edit',
            type:'POST',
            dataType:'JSON',
            data:{id: $(this).data('id')},
            success:function(res){
                
                $('#modal-kegiatan_mahasiswa_edit').modal('show');
                
                $('#id_kegiatan_edit').val(res.id);
                $('#nama_kegiatan_edit').val(res.nama_kegiatan);
                $('#tanggal_awal_edit').val(res.tanggal_awal);
                $('#tanggal_akhir_edit').val(res.tanggal_akhir);
                $('#deskripsi_edit').val(res.deskripsi);
                $('#gambar_lama').val(res.gambar_utama);

            }
        })
    });

    // update or data 
    $('#frm-kegiatan_mahasiswa_edit').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url:'<?= base_url()?>KegiatanMahasiswa/update',
            type:'POST',
            dataType:'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res){
                
                if (res.error) {

                    if (res.nama_kegiatan_edit_err != "") {
                        $('#nama_kegiatan_edit_err').html(res.nama_kegiatan_edit_err);
                    } else {
                        $('#nama_kegiatan_edit_err').html('');
                    }

                    if (res.tanggal_awal_edit_err != "") {
                        $('#tanggal_awal_edit_err').html(res.tanggal_awal_edit_err);
                    } else {
                        $('#tanggal_awal_edit_err').html('');
                    }

                    if (res.tanggal_akhir_edit_err != "") {
                        $('#tanggal_akhir_edit_err').html(res.tanggal_akhir_edit_err);
                    } else {
                        $('#tanggal_akhir_edit_err').html('');
                    }

                    if (res.deskripsi_edit_err != "") {
                        $('#deskripsi_edit_err').html(res.deskripsi_edit_err);
                    } else {
                        $('#deskripsi_edit_err').html('');
                    }
                    console.log(res);

                }

                if (res.success) {
                    $('#data-kegiatan_mahasiswa').DataTable().ajax.reload();
                    toastr.success('Data berhasi diubah',{timeOut: 4000});
                    $('#modal-kegiatan_mahasiswa_edit').modal('hide');
                    clear();

                } 
            }

        });

    });


});


function clear(){
    $('#frm-kegiatan_mahasiswa')[0].reset();
}

</script>