<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Form Data Peserta Didik
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NIS / NISN
                </label>
                <div class="col-sm-4">
                    <input type="text" name="nim" placeholder="MASUKAN NIS" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="nisn" placeholder="MASUKAN NISN" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    NAMA 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    TTL
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="date" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    JENIS KELAMIN
                </label>
                <div class="col-sm-5">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), null, "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-5">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama');
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    ALAMAT
                </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="alamat_siswa"></textarea>
                </div>
               
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Password untuk Siswa 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="password_siswa" placeholder="MASUKAN PASSWORD UNTUK AKUN SISWA" id="form-field-1" class="form-control">
                </div>
            </div>

            <!--<div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    RT / RW
                </label>
                <div class="col-sm-3">
                    <input type="text" name="rt" placeholder="RT" id="form-field-1" class="form-control">
                </div>
                                <div class="col-sm-3">
                    <input type="text" name="rw" placeholder="RW" id="form-field-1" class="form-control">
                </div>
            </div>-->
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Telepon Siswa 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="telepon_siswa" placeholder="MASUKAN NOMOR TELEPON SISWA" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                     Diterima di Kelas
                </label>
                <div class="col-sm-6">
                    <select class="form-control" name="rombel" >
                    <?php foreach($id_sekolah as $id_sekolah)
                    {
                    ?>
                        <option value="<?php echo $id_sekolah->id_rombel; ?>"><?php echo $id_sekolah->nama_rombel; ?></option>
                        
                    <?php
                    }
                    ?>
                    </select >
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Tanggal Diterima
                </label>
                <div class="col-sm-6">
                    <input type="date" name="tanggal_terima" id="form-field-1" class="form-control">
                </div>
            </div> 
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Asal Sekolah
                </label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="asal_sekolah"></textarea>
                </div>
               
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Status Siswa
                </label>
                <div class="col-sm-5">
                    <?php
                    echo form_dropdown('status_keluarga', array('Anak Kandung' => 'Anak Kandung', 'Anak Tiri' => 'Anak Tiri', 'Keponakan' => 'Keponakan'), null, "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Nama Ayah
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ayah" placeholder="MASUKKAN NAMA AYAH SISWA" id="form-field-1" class="form-control">
                </div>
                <input type="hidden" name="id_sekolah" value="<?php echo $_SESSION['id_sekolah'] ?>">
            </div>
            
          
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Nama Ibu
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ibu" placeholder="MASUKKAN NAMA IBU SISWA" id="form-field-1" class="form-control">
                </div>
                <input type="hidden" name="id_sekolah" value="<?php echo $_SESSION['id_sekolah'] ?>">
            </div>
            
             <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Password untuk Orang Tua / Wali Murid 
                </label>
                <div class="col-sm-9">
                    <input type="text" name="password_ortu" placeholder="MASUKAN PASSWORD UNTUK AKUN ORANG TUA / WALI MURID " id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-2">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-3">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>



 <!--<div class="col-sm-6">
    <!-- start: TEXT FIELDS PANEL
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Form Data Lain Peserta Didik
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                    <i class="fa fa-wrench"></i>
                </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#">
                    <i class="fa fa-refresh"></i>
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-resize-full"></i>
                </a>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>
             
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-2">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-3">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div> -->
    <!-- end: TEXT FIELDS PANEL 
</div>-->
