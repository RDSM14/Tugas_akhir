<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Tambah Data Kelas / Rombongan Belajar Baru
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
            echo form_open('rombel/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA ROMBEL
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_rombel" placeholder="MASUKAN NAMA ROMBEL" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KELAS
                </label>
                <div class="col-sm-9">
                    <select name="kelas" class="form-control">

                        <?php
                        for ($i = 1; $i <= $info['jumlah_kelas']; $i++) {
                            echo "<option value='$i'>Kelas $i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('rombel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>