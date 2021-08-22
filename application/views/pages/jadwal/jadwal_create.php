<style>

.select2-container--material {
    width: 100% !important;
    
    ::placeholder {
        color: inherit;
    }
    
    
    /**
     * Textbox
     */
    
    .select2-selection {
        /* @extend input */
        overflow: visible;
        
        font: inherit;
        
        touch-action: manipulation;
        
        margin: 0;
        line-height: inherit;
        border-radius: 0;
        
        box-sizing: inherit;
        
        /* @extend .form-control */
        display: block;
        
        width: 100%;
        color: #55595c;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.15);
        
        padding: .5rem 0 .6rem;
        font-size: 1rem;
        line-height: 1.5;
        background-color: transparent;
        background-image: none;
        border-radius: 0;
        margin-top: .2rem;
        margin-bottom: 1rem;
        
        /* @extend input[type=text] */
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0;
        outline: 0;
        //height: 2.1rem;
        width: 100%;
        font-size: 1rem;
        box-shadow: none;
        transition: all .3s;
        
        min-height: 2.1rem;
        
        .select2-selection__rendered {
            padding-left: 0;
        }
    }
    
    .select2-selection--single {
        .select2-selection__rendered {
            float: left;
        }
        
        .select2-selection__arrow {
            float: right;
        }
    }
    
    .select2-selection--multiple {
        .select2-selection__rendered {
            width: 100%;
            
            li {
                list-style: none;
            }
        }
        
        /**
         * Multiple selected options
         */
        .select2-selection__choice {
            /* @extend .mdl-chip */
            height: 32px;
            //font-family: "Roboto","Helvetica","Arial",sans-serif;
            line-height: 32px;
            padding: 0 12px;
            border: 0;
            border-radius: 16px;
            background-color: #dedede;
            display: inline-block;
            color: rgba(0,0,0,.87);
            margin: 2px 0;
            font-size: 0;
            white-space: nowrap;
            
            /* @extend .mdl-chip__text */
            font-size: 13px;
            vertical-align: middle;
            display: inline-block;
            
            
            
            float: left;
            
            margin-right: 8px;
            margin-bottom: 4px;
        }
        
        /**
         * Multiple selected option clear button
         */
        .select2-selection__choice__remove {
            /* Hide default content */
            font-size: 0;
            
            opacity: 0.38;
            cursor: pointer;
            float: right;
            margin-top: 4px;
            margin-right: -6px;
            margin-left: 6px;
            
            transition: opacity;
            
            &::before {
                content: "cancel";
                
                /* @extend .material-icons */
                font-family: 'Material Icons';
                font-weight: normal;
                font-style: normal;
                font-size: 24px;
                line-height: 1;
                letter-spacing: normal;
                text-transform: none;
                display: inline-block;
                white-space: nowrap;
                word-wrap: normal;
                direction: ltr;
                -webkit-font-feature-settings: 'liga';
                -webkit-font-smoothing: antialiased;
                
                color: #000;
            }
            
            &:hover {
                opacity: 0.54;
            }
        }
    }
    
    .select2-search--inline {
        .select2-search__field {
            width: 100%;
            margin-top: 0;
            
            /* Match input[type=text] */
            height: 34px;
            line-height: 1;
        }
    }
    
    
    
    /**
     * Dropdown
     */
    
    .select2-dropdown {
        border: 0;
        
        .select2-search__field {
            min-height: 2.1rem;
            margin-bottom: 16px;
            border: 0;
            border-bottom: 1px solid #ccc;
            
            transition: all .3s;
            
            &:focus {
                border-bottom: 1px solid #4285f4;
                box-shadow: 0 1px 0 0 #4585f4;
            }
        }
    }
    
    .select2-results__options {
        /* @extend .zf-shadow-depth* */
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);
        
        /* @extend .dropdown-content */
        background-color: #fff;
        margin: 0;
        //display: none;
        min-width: 100px;
        max-height: 650px;
        overflow-y: auto;
        //opacity: 0;
        //position: absolute;
        z-index: 999;
        will-change: width,height;
        
        /* @extend .dropdown-content inline styles */
        //position: absolute;
        //top: 0;
        //left: 0;
        //opacity: 1;
        //display: block;
        
        &--above {
            //top: 50px;
        }
        
        &--below {
            //top: -50px;
        }
    }
    
    
    
    /**
     * Options
     */
    
    .select2-results__option {
        /* @extend .dropdown-content li */
        cursor: pointer;
        
        clear: both;
        color: rgba(0,0,0,.87);
        line-height: 1.5rem;
        //width: 100%;
        text-align: left;
        text-transform: none;
        
        /* @extend .dropdown-content li>a, .dropdown-content li>span */
        font-size: 1.2rem;
        //color: #4285F4;
        display: block;
        padding: 1rem;
        
        /**
         * Disabled options
         */
        &[aria-disabled=true] {
            /* @extend .select-dropdown li.disabled */
            color: rgba(0,0,0,.3);
            background-color: transparent!important;
            cursor: context-menu;
            
            /* @extend .disabled */
            cursor: not-allowed;
        }
        
        /**
         * Selected option
         */
        &[aria-selected=true] {
            /* @extend .dropdown-content li:active, .dropdow-content li:hover */
            color: #4285f4;
            
            background-color: #eee;
        }
        
        /**
         * Active/hovered option
         */
        &--highlighted[aria-selected] {
            background-color: #ddd;
        }
    }
    
    
    
    /**
     * Focused textbox
     */
    
    &.select2-container--focus {
        .select2-selection {
            /* @extend input[type=text]:focus */
            border-bottom: 1px solid #4285f4;
            box-shadow: 0 1px 0 0 #4585f4;
        }
    }
    
    
    
    /**
     * Disabled textbox
     */
    
    &.select2-container--disabled {
        .select2-selection {
            /* @extend .select-wrapper input.select-dropdown:disabled */
            color: rgba(0,0,0,.3);
            cursor: default;
            user-select: none;
            border-bottom: 1px solid rgba(0,0,0,.3);
        }
        
        &.select2-container--focus {
            .select2-selection {
                box-shadow: none;
            }
        }
    }
}


</style>
<section class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Form Tambah Jadwal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Form Tambah Jadwal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion" id="accordionExample">
                    <div class="card mb-3">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tahun_ajar_id"><b>Jadwal Untuk Tahun Ajaran :</b></label>
                                            <select name="tahun_ajar_id" id="tahun_ajar_id" class="form-control js-select2">
                                                <?php foreach($tahun_ajar as $data):?>
                                                    <option value="<?= $data->id_tahun_ajar?>"><?= $data->tahun_ajar?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="tahun_ajar_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="kelas_id"><b>Kelas :</b></label>
                                            <select name="kelas_id" id="kelas_id" class="form-control">
                                                <?php foreach($kelas as $data):?>
                                                    <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="kelas_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="jurusan_id"><b>Program Studi :</b></label>
                                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                                                <?php foreach($jurusan as $data):?>
                                                    <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="jurusan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="accordion" id="accordionExample">
                    <div class="card mb-0">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="hari"><b>Hari :</b></label>
                                            <select name="hari" id="hari" class="form-control">
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                                            <small id="hari-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="matakuliah_id"><b>Matakuliah :</b></label>
                                            <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                                                <option value=""></option>
                                            </select>
                                            <input type="hidden" name="kode_matakuliah" id="kode_matakuliah">
                                            <small id="matakuliah_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_dosen"><b>Nama Dosen :</b></label>
                                            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control">
                                            <input type="hidden" name="dosen_id" id="dosen_id">
                                            <small id="nama_dosen-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="semester"><b>Semester :</b></label>
                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan Semester">
                                            <input type="hidden" name="id_dosen" id="id_dosen">
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ruangan_id"><b>Ruangan :</b></label>
                                            <select name="ruangan_id" id="ruangan_id" class="form-control">
                                                <?php foreach($ruangan as $data):?>
                                                    <option value="<?= $data->id_ruangan?>"><?= $data->nama_ruangan?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="ruangan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jam_masuk"><b>Jam Masuk :</b></label>
                                                    <input type="time" name="jam_masuk" id="jam_masuk" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jam_selesai"><b>Jam Selesai :</b></label>
                                                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jam_masuk"><b>Jam Masuk :</b></label>
                                                    <select name="jam_masuk" id="jam_masuk" class="form-control">
                                                        <option value="07.30">07.30</option>
                                                        <option value="08.20">08.20</option>
                                                        <option value="09.10">09.10</option>
                                                        <option value="10.00">10.00</option>
                                                        <option value="10.50">10.50</option>
                                                        <option value="11.40">11.40</option>
                                                        <option value="12.30">12.30</option>
                                                        <option value="13.20">13.20</option>
                                                        <option value="14.10">14.10</option>
                                                        <option value="15.00">15.00</option>
                                                        <option value="15.50">15.50</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jam_selesai"><b>Jam Selesai :</b></label>
                                                    <select name="jam_selesai" id="jam_selesai" class="form-control">
                                                        <option value="08.20">08.20</option>
                                                        <option value="09.10">09.10</option>
                                                        <option value="10.00">10.00</option>
                                                        <option value="10.50">10.50</option>
                                                        <option value="11.40">11.40</option>
                                                        <option value="12.30">12.30</option>
                                                        <option value="13.20">13.20</option>
                                                        <option value="14.10">14.10</option>
                                                        <option value="15.00">15.00</option>
                                                        <option value="15.50">15.50</option>
                                                        <option value="16.40">16.40</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button" id="btn-add">Tambah</button>  
                                <button class="btn btn-primary" id="btn-save">Simpan</button> 
                                <a href="<?= base_url()?>jadwal" class="btn btn-secondary">Kembali</a> 
                                <br> 
                                
                                <!-- tabel untuk krs -->
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="table-jadwal_detail">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Hari</th>
                                                <th class="text-center">Kode Matakuliah</th>
                                                <th class="text-center">Nama Matakuliah</th>
                                                <th class="text-center">Semester</th>
                                                <th class="text-center" style="display: none;">Id Matakuliah</th>
                                                <th class="text-center">Nama Dosen</th>
                                                <th class="text-center" style="display: none;">Id Dosen</th>
                                                <th class="text-center">Ruangan</th>
                                                <th class="text-center">Jam Masuk</th>
                                                <th class="text-center">Jam Selesai</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
<!-- [ Main Content ] end