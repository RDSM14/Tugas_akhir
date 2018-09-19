<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Karyawan Tata Usaha
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
            echo form_open('tu/edit', 'role="form" class="form-horizontal"');
           
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NIP
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nip" value="<?php echo $tu['nip']?>" placeholder="MASUKAN nip" id="form-field-1" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA LENGKAP
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $tu['nama_lengkap']?>" name="nama_lengkap" placeholder="MASUKAN NAMA tu" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TELEPON
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $tu['telepon_TU']?>" name="telepon_TU" placeholder="MASUKAN NOMOR TELEPON KARYAWAN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('tu', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>