<script>
    
    $(function() {

        // clear add form
        $('#tambah-matakuliah').click(function() {
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
        var table = $('#data-matakuliah').dataTable({
            initComplete: function() {
                var api = this.api();
                $('#data-matakuliah_filter input')
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
                url: "<?= base_url()?>matakuliah/show",
                type: "POST"
            },
            columns:[
                {"data": "kode_matakuliah", class:"text-center"},
                {"data": "nama_matakuliah", class:"text-center"},
                {"data": "sks", class:"text-center"},
                {"data": "semester", class:"text-center"},
                {"data": "nama_jurusan", class:"text-center"},
                {"data": "jenis", class:"text-center"},
                {"data": "status_matakuliah", class:"text-center"},
                {"data": "view", class:"text-center"}
            ],

        });

        // insert matakuliah data 
        $('#frm-matakuliah').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>matakuliah/store",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-matakuliah').DataTable().ajax.reload();
                        $('#modal-matakuliah').modal('hide');
                        toastr.success('Data berhasil disimpan',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_matakuliah_err != "") {
                            $('#kode_matakuliah-err').html(res.kode_matakuliah_err);
                        } else {
                            $('#kode_matakuliah-err').html('');
                        }

                        if (res.nama_matakuliah_err != "") {
                            $('#nama_matakuliah-err').html(res.nama_matakuliah_err);
                        } else {
                            $('#nama_matakuliah-err').html('');
                        }

                        if (res.sks_err != "") {
                            $('#sks-err').html(res.sks_err);
                        } else {
                            $('#sks-err').html('');
                        }

                        if (res.semester_err != "") {
                            $('#semester-err').html(res.semester_err);
                        } else {
                            $('#semester-err').html('');
                        }

                    }
                }
            });

        });

        // delete matakuliah data 
        $(document).on('click','.delete-matakuliah',function() {
            
            if (confirm('Apakah anda ingin menghapus data ini ?')) {

                $.ajax({
                    url: "<?= base_url()?>matakuliah/destroy",
                    type: "POST",
                    dataType: "JSON",
                    data: { id: $(this).data('id')},
                    success:function(res) {
                        
                        if (res.success) {
                            
                            $('#data-matakuliah').DataTable().ajax.reload();
                            toastr.success('Data berhasil dihapus',{timeOut: 4000});

                        }

                    }
                });


            } else {
                return false;
            }
        });

        // get matakuliah data
        $(document).on('click','.edit-matakuliah',function() {

            $.ajax({
                url: "<?= base_url()?>matakuliah/edit",
                type: "POST",
                dataType: "JSON",
                data: { id: $(this).data('id')},
                success:function(res) {
                    
                    $('#modal-matakuliah_edit').modal('show');
                    $('#id_matakuliah_edit').val(res.id_matakuliah);
                    $('#kode_matakuliah_edit').val(res.kode_matakuliah);
                    $('#nama_matakuliah_edit').val(res.nama_matakuliah);
                    $('#sks_edit').val(res.sks);
                    $('#semester_edit').val(res.semester);
                    // console.log(res);
                    $('#kode_matakuliah_edit-err,#nama_matakuliah_edit-err, #sks_edit-err, #semester_edit-err').html('');

                }
            });

        });

        // update matakuliah data 
        $('#frm-matakuliah_edit').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url()?>matakuliah/update",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success:function(res) {
                    
                    if (res.success) {
                        
                        $('#data-matakuliah').DataTable().ajax.reload();
                        $('#modal-matakuliah_edit').modal('hide');
                        toastr.success('Data berhasil diubah',{timeOut: 4000});
                        clear();

                    } 

                    if (res.error) {

                        if (res.kode_matakuliah_edit_err != "") {
                            $('#kode_matakuliah_edit-err').html(res.kode_matakuliah_edit_err);
                        } else {
                            $('#kode_matakuliah_edit-err').html('');
                        }

                        if (res.nama_matakuliah_edit_err != "") {
                            $('#nama_matakuliah_edit-err').html(res.nama_matakuliah_edit_err);
                        } else {
                            $('#nama_matakuliah_edit-err').html('');
                        }

                        if (res.sks_edit_err != "") {
                            $('#sks_edit-err').html(res.sks_edit_err);
                        } else {
                            $('#sks_edit-err').html('');
                        }

                        if (res.semester_edit_err != "") {
                            $('#semester_edit-err').html(res.semester_edit_err);
                        } else {
                            $('#semester_edit-err').html('');
                        }

                    }
                }
            });

        });

        // function clear error message and form
        function clear() {
            $('#kode_matakuliah,#nama_matakuliah,#sks,#semester').val('');
            $('#kode_matakuliah_edit,#nama_matakuliah_edit,#sks_edit,#semester_edit').val('');
            $('#kode_matakuliah-err,#nama_matakuliah-err, #sks-err, #semester-err').html('');
            $('#kode_matakuliah_edit-err,#nama_matakuliah_edit-err, #sks_edit-err, #semester_edit-err').html('');
        }



    });

</script>