<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Siswa
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
            echo form_open_multipart('siswa/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('nim', $siswa['nim']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NIS / NISN
                </label>
                <div class="col-sm-4">
                    <input type="text" value="<?php echo $siswa['nim'] ?>" readonly="" placeholder="MASUKAN NIM" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo $siswa['nisn'] ?>" readonly="" name="nisn" placeholder="MASUKAN NISN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA LENGKAP
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['nama'] ?>" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TEMPAT, TGL LAHIR
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir'] ?>" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?php echo $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    GENDER
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), $siswa['gender'], "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-2">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama', $siswa['kd_agama']);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PILIH ROMBEL
                </label>
                <div class="col-sm-6">
                    <select class="form-control" name="rombel" >
                    <?php foreach($id_sekolah as $id_sekolah)
                        {
                        ?>
                            <option value="<?php echo $id_sekolah->id_rombel; ?>" <?php if($id_sekolah->id_rombel==$siswa['id_rombel']) echo 'selected="selected"';?>><?php echo $id_sekolah->nama_rombel; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT
                </label>
                 <div class="col-sm-9">
                    <textarea class="form-control" name="alamat_siswa"><?php echo $siswa['alamat_siswa'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TELEPON SISWA
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['telepon_siswa'] ?>" name="telepon_siswa" placeholder="MASUKAN NOMOR TELEPON SISWA" id="form-field-1" class="form-control">
                </div>
            </div>
                 <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    DITERIMA DI KELAS
                </label>
                
                <div class="col-sm-6">
                    <select class="form-control" name="kelas_terima" >
                    <?php foreach($ulang as $id_skl)
                        {
                        ?>
                            <option value="<?php echo $id_skl->id_rombel; ?>" <?php if($id_skl->id_rombel==$siswa['kelas_terima']) echo 'selected="selected"';?>><?php echo $id_skl->nama_rombel; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TANGGAL DITERIMA
                </label>
                <div class="col-sm-6">
                    <input type="date" name="tanggal_terima" value="<?php echo $siswa['tanggal_terima'] ?>" id="form-field-1" class="form-control">
                </div>
            </div> 
            
             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ASAL SEKOLAH
                </label>
                <div class="col-sm-6">
                    <input type="text" name="asal_sekolah" value="<?php echo $siswa['asal_sekolah'] ?>" id="form-field-1" class="form-control">
                </div>
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    STATUS SISWA
                </label>
                <div class="col-sm-9">
                    <?php
                    echo form_dropdown('status_keluarga', array('Anak Kandung' => 'Anak Kandung', 'Anak Tiri' => 'Anak Tiri', 'Keponakan' => 'Keponakan'), $siswa['status_keluarga'], "class='form-control'");
                    ?>
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA AYAH
                </label>
                <div class="col-sm-6">
                    <input type="text" name="nama_ayah" value="<?php echo $ortu['nama_ayah'] ?>" id="form-field-1" class="form-control">
                </div>
            </div> 
             <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA IBU
                </label>
                <div class="col-sm-6">
                    <input type="text" name="nama_ibu" value="<?php echo $ortu['nama_ibu'] ?>" id="form-field-1" class="form-control">
                </div>
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    RESET PASSWORD SISWA
                </label>
                <div class="col-sm-9">
                    <input type="text" name="reset_siswa" placeholder="RESET PASSWORD SISWA" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    RESET PASSWORD ORANG TUA SISWA
                </label>
                <div class="col-sm-9">
                    <input type="text" name="reset_ortu" placeholder="RESET PASSWORD ORANG TUA SISWA" id="form-field-1" class="form-control">
                </div>
            </div>
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>