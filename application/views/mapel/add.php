<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Text Fields
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
            echo form_open('mapel/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KODE MAPEL
                </label>
                <div class="col-sm-9">
                    <input type="text" name="kd_mapel" placeholder="MASUKAN KODE MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_mapel" placeholder="MASUKAN NAMA MAPEL" id="form-field-1" class="form-control">
                </div>
            </div>
           <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    SETTING NILAI
                </label>
                <div class="col-sm-2">
                    Nilai Tertinggi:<input type="text" value="<?php echo $info['nilai_max'];?>" name="nilai_max" placeholder="nilai tertinggi" id="nilai_max_mapel_add" class="form-control" readonly><label class="nilai_max_message_mapel_add" style="color:red">Nilai Tertinggi Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Terendah:<input type="text" value="<?php echo $info['nilai_min'];?>" name="nilai_min" placeholder="nilai terendah" id="nilai_min_mapel_add" class="form-control" readonly><label class="nilai_min_message_mapel_add" style="color:red">Nilai Terendah Harus Lebih Kecil dari D</label>
                </div>
                
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $info['min_a'];?>" name="min_a" placeholder="nilai terendah dari A" id="min_a_mapel_add" class="form-control"><label class="min_a_message_mapel_add" style="color:red">Nilai A Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $info['min_b'];?>" name="min_b" placeholder="nilai terendah dari B" id="min_b_mapel_add" class="form-control"><label class="min_b_message_mapel_add" style="color:red">Nilai B Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $info['min_c'];?>" name="min_c" placeholder="nilai terendah dari C" id="min_c_mapel_add" class="form-control"><label class="min_c_message_mapel_add" style="color:red">Nilai C Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $info['min_d'];?>" name="min_d" placeholder="nilai terendah dari D" id="min_d_mapel_add" class="form-control"><label class="min_d_message_mapel_add" style="color:red">Nilai D Harus Lebih Besar dari nilai terendah</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" id= "submit_mapel" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('mapel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>


<script>
	$(document).ready(function(){
        $(".nilai_max_message_mapel_add").hide();
        $(".nilai_min_message_mapel_add").hide();
        
        $(".min_a_message_mapel_add").hide();
        $(".min_b_message_mapel_add").hide();
        $(".min_c_message_mapel_add").hide();
        $(".min_d_message_mapel_add").hide();
        
        $("#submit_mapel").click(function(){
                   var nilai_max    = $("#nilai_max_mapel_add").val();
                   var nilai_min    = $("#nilai_min_mapel_add").val();
                   var min_a        = $("#min_a_mapel_add").val();
                   var min_b        = $("#min_b_mapel_add").val();
                   var min_c        = $("#min_c_mapel_add").val();
                   var min_d        = $("#min_d_mapel_add").val();


                     if(nilai_max<=min_a)
                         {
                             $(".nilai_max_message_mapel_add").show();
                             $(".min_a_message_mapel_add").show();
                         }
                        else{
                             $(".nilai_max_message_mapel_add").hide();
                             $(".min_a_message_mapel_add").hide();
                        }
                     if(min_a<=min_b)
                         {
                             $(".min_a_message_mapel_add").show();
                             $(".min_b_message_mapel_add").show();
                         }
                        else{
                             $(".min_a_message_mapel_add").hide();
                             $(".min_b_message_mapel_add").hide();
                        }
                     if(min_b<=min_c)
                         {
                             $(".min_b_message_mapel_add").show();
                             $(".min_c_message_mapel_add").show();
                         }
                        else{
                             $(".min_b_message_mapel_add").hide();
                             $(".min_c_message_mapel_add").hide();
                        }
                     if(min_c<=min_d)
                         {
                             $(".min_d_message_mapel_add").show();
                             $(".min_c_message_mapel_add").show();
                         }
                        else{
                             $(".min_c_message_mapel_add").hide();
                             $(".min_d_message_mapel_add").hide();
                        }
                    
                     if(min_d<nilai_min)
                         {  
                             $(".nilai_min_message_mapel_add").show();
                             $(".min_d_message_mapel_add").show();
                         }
                        else{
                             $(".nilai_min_message_mapel_add").hide();
                             $(".min_d_message_mapel_add").hide();
                        }
                    if((nilai_max>min_a) && (min_a>min_b) && (min_b>min_c) && (min_c>min_d) && (min_d>=nilai_min))
                        {
                            return true;
                        }


                return false;
            });

});
</script>

