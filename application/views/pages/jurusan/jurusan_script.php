<script>
    
    $(function() {

        // clear add form
        $('#tambah-jurusan').click(function() {
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
        var table = $('#data-jurusan').dataTable({
            initComplete: function() {
                var api = this.api();
                $('#data-jurusan_filter input')
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
                url: "<?= base_url()?>jurusan/show",
                type: "POST"
            },
            columns:[
                {"data": "nama_fakultas", class:"text-center"},
                {"data": "kode_jurusan", class:"text-center"},
                {"data": "nama_jurusan", class:"text-center"},
                {"data": "view", class:"text-center"}
            ],

        });

        // insert jurusan data 
        $('#frm-jurusan').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>jurusan/store",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-jurusan').DataTable().ajax.reload();
                        $('#modal-jurusan').modal('hide');
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_jurusan_err != "") {
                            $('#kode_jurusan-err').html(res.kode_jurusan_err);
                        } else {
                            $('#kode_jurusan-err').html('');
                        }

                        if (res.nama_jurusan_err != "") {
                            $('#nama_jurusan-err').html(res.nama_jurusan_err);
                        } else {
                            $('#nama_jurusan-err').html('');
                        }

                        if (res.nama_fakultas_err != "") {
                            $('#nama_fakultas-err').html(res.nama_fakultas_err);
                        } else {
                            $('#nama_fakultas-err').html('');
                        }

                    }
                }
            });

        });

        // delete fajurusankultas data 
        $(document).on('click','.delete-jurusan',function() {
            
            if (confirm('Apakah anda ingin menghapus data ini ?')) {

                $.ajax({
                    url: "<?= base_url()?>jurusan/destroy",
                    type: "POST",
                    dataType: "JSON",
                    data: { id: $(this).data('id')},
                    success:function(res) {
                        
                        if (res.success) {
                            
                            $('#data-jurusan').DataTable().ajax.reload();
                            toastr.success('Data berhasil dihapus',{timeOut: 4000});

                        }

                    }
                });


            } else {
                return false;
            }
        });

        // get jurusan data
        $(document).on('click','.edit-jurusan',function() {

            $.ajax({
                url: "<?= base_url()?>jurusan/edit",
                type: "POST",
                dataType: "JSON",
                data: { id: $(this).data('id')},
                success:function(res) {
                    
                    $('#modal-jurusan_edit').modal('show');
                    $('#id_jurusan_edit').val(res.id_jurusan);
                    $('#kode_jurusan_edit').val(res.kode_jurusan);
                    $('#nama_jurusan_edit').val(res.nama_jurusan);
                    $('#nama_fakultas_edit').val(res.fakultas_id);
                    // console.log(res);

                }
            });

        });

        // update jurusan data 
        $('#frm-jurusan_edit').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>jurusan/update",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-jurusan').DataTable().ajax.reload();
                        $('#modal-jurusan_edit').modal('hide');
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_jurusan_edit_err != "") {
                            $('#kode_jurusan_edit-err').html(res.kode_jurusan_edit_err);
                        } else {
                            $('#kode_jurusan_edit-err').html('');
                        }

                        if (res.nama_jurusan_edit_err != "") {
                            $('#nama_jurusan_edit-err').html(res.nama_jurusan_edit_err);
                        } else {
                            $('#nama_jurusan_edit-err').html('');
                        }

                        if (res.nama_fakultas_edit_err != "") {
                            $('#nama_fakultas_edit-err').html(res.nama_fakultas_edit_err);
                        } else {
                            $('#nama_fakultas_edit-err').html('');
                        }

                    }
                }
            });

        });

        // function clear error message and form
        function clear() {
            $('#kode_jurusan,#nama_jurusan,#nama_fakultas').val('');
            $('#kode_jurusan_edit,#nama_jurusan_edit,#nama_fakultas_edit').val('');
            $('#kode_jurusan-err,#nama_jurusan-err, #nama_fakultas-err').html('');
            $('#kode_jurusan_edit-err,#nama_jurusan_edit-err, #nama_fakultas_edit-err').html('');
        }



    });

</script>