<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Komponen Nilai
        </div>
        <div class="panel-body">
            
            
            <?php
            echo form_open_multipart('mapel/add_komponen', 'role="form" class="form-horizontal"');
            ?>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Nama Komponen
                </label>
                <div class="col-sm-9">
                     <input type="hidden" name="id_mapel" value="<?php echo $id_mapel ?>" readonly="" placeholder="MASUKAN NIM" id="form-field-1" class="form-control">
                    <input type="text" name="nama_komponen"  placeholder="MASUKAN NAMA KOMPONEN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Jenis Nilai
                </label>
                <div class="col-sm-2">
                    <select class="form-control" name="jenis_nilai">
                        <?php foreach($jenis_nilai as $jenis_nilai)
                        {
                        ?>
                            <option value="<?php echo $jenis_nilai->id_jenis_nilai?>"><?php echo $jenis_nilai->nama_jenis_nilai?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-2">
                    <button type="submit" id="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-3">
                    <?php $id_mapelnya = $this->uri->segment(3); ?>
                    <?php echo anchor('mapel/list_komponen/'.$id_mapelnya, 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>

