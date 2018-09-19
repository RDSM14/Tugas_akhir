<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Tambah Data Tahun Akademik Baru
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
            echo form_open('tahunakademik/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TAHUN AKADEMIK
                </label>
                <div class="col-sm-9">
                    <input type="text" name="tahun_akademik" placeholder="MASUKAN TAHUN AKADEMIK" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    SEMESTER AKTIF
                </label>
                <div class="col-sm-9">
                    <?php echo form_dropdown('semester_aktif',array('1'=>'1','2'=>'2'),'',"class='form-control'")?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    STATUS
                </label>
                <div class="col-sm-9">
                    <?php echo form_dropdown('is_aktif',array('n'=>'TIDAK','y'=>'AKTIF'),'',"class='form-control'")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('tahunakademik', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>