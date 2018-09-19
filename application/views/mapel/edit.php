<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Mata Pelajaran
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

            <?php foreach($mapel as $row){
            echo form_open('mapel/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('kd_mapel', $row->kode);
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KODE MAPEL
                </label>
                <div class="col-sm-9">
                    <input type="hidden" readonly="" value="<?php echo $row->id_mpel;?>" name="id_mapel" placeholder="MASUKAN KODE MAPEL" id="form-field-1" class="form-control">
                    <input type="text" value="<?php echo $row->kode;?>" name="kd_mapel" placeholder="MASUKAN KODE MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $row->amapel;?>" name="nama_mapel" placeholder="MASUKAN NAMA MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    SETTING NILAI
                </label>
                <div class="col-sm-2">
                    Nilai Tertinggi Sekolah:<input type="text" value="<?php echo $row->maximal;?>" name="nilai_max" placeholder="nilai tertinggi" id="nilai_max_mapel_edit" class="form-control" readonly><label class="nilai_max_message_mapel_edit" style="color:red">Nilai Tertinggi Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Terendah Sekolah:<input type="text" value="<?php echo $row->minimal;?>" name="nilai_min" placeholder="nilai terendah" id="nilai_min_mapel_edit" class="form-control" readonly><label class="nilai_min_message_mapel_edit" style="color:red">Nilai Terendah Harus Lebih Kecil dari D</label>
                </div>
                
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $row->nilai_a;?>" name="min_a" placeholder="nilai terendah dari A" id="min_a_mapel_edit" class="form-control"><label class="min_a_message_mapel_edit" style="color:red">Nilai A Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $row->nilai_b;?>" name="min_b" placeholder="nilai terendah dari B" id="min_b_mapel_edit" class="form-control"><label class="min_b_message_mapel_edit" style="color:red">Nilai B Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $row->nilai_c;?>" name="min_c" placeholder="nilai terendah dari C" id="min_c_mapel_edit" class="form-control"><label class="min_c_message_mapel_edit" style="color:red">Nilai C Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $row->nilai_d;?>" name="min_d" placeholder="nilai terendah dari D" id="min_d_mapel_edit" class="form-control"><label class="min_d_message_mapel_edit" style="color:red">Nilai D Harus Lebih Besar dari nilai terendah</label>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" id="submit_edit_mapel" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('mapel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        <?php } ?>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>


<script>
	$(document).ready(function(){
        $(".nilai_max_message_mapel_edit").hide();
        $(".nilai_min_message_mapel_edit").hide();
        
        $(".min_a_message_mapel_edit").hide();
        $(".min_b_message_mapel_edit").hide();
        $(".min_c_message_mapel_edit").hide();
        $(".min_d_message_mapel_edit").hide();
        
        $("#submit_edit_mapel").click(function(){
                   var nilai_max    = parseFloat($("#nilai_max_mapel_edit").val());
                   var nilai_min    = parseFloat($("#nilai_min_mapel_edit").val());
                   var min_a        = parseFloat($("#min_a_mapel_edit").val());
                   var min_b        = parseFloat($("#min_b_mapel_edit").val());
                   var min_c        = parseFloat($("#min_c_mapel_edit").val());
                   var min_d        = parseFloat($("#min_d_mapel_edit").val());


                     if(nilai_max<=min_a)
                         {
                             $(".nilai_max_message_mapel_edit").show();
                             $(".min_a_message_mapel_edit").show();
                         }
                        else{
                             $(".nilai_max_message_mapel_edit").hide();
                             $(".min_a_message_mapel_edit").hide();
                        }
                     if(min_a<=min_b)
                         {
                             $(".min_a_message_mapel_edit").show();
                             $(".min_b_message_mapel_edit").show();
                         }
                        else{
                             $(".min_a_message_mapel_edit").hide();
                             $(".min_b_message_mapel_edit").hide();
                        }
                     if(min_b<=min_c)
                         {
                             $(".min_b_message_mapel_edit").show();
                             $(".min_c_message_mapel_edit").show();
                         }
                        else{
                             $(".min_b_message_mapel_edit").hide();
                             $(".min_c_message_mapel_edit").hide();
                        }
                     if(min_c<=min_d)
                         {
                             $(".min_d_message_mapel_edit").show();
                             $(".min_c_message_mapel_edit").show();
                         }
                        else{
                             $(".min_c_message_mapel_edit").hide();
                             $(".min_d_message_mapel_edit").hide();
                        }
                    
                     if(min_d<nilai_min)
                         {  
                             $(".nilai_min_message_mapel_edit").show();
                             $(".min_d_message_mapel_edit").show();
                         }
                        else{
                             $(".nilai_min_message_mapel_edit").hide();
                             $(".min_d_message_mapel_edit").hide();
                        }
                    if((nilai_max>min_a) && (min_a>min_b) && (min_b>min_c) && (min_c>min_d) && (min_d>=nilai_min))
                        {
                            return true;
                        }


                return false;
            });

});
</script>