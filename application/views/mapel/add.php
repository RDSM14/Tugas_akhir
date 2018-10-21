<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Tambah Data Mata Pelajaran Baru
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
            echo form_open('mapel/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KODE MAPEL
                </label>
                <div class="col-sm-9">
                    <input type="text" name="kd_mapel" placeholder="MASUKAN KODE MAPEL" id="kd_mapel" class="form-control"><label class="kd_mapel" style="color:red">Kode Mata Pelajaran Tidak Boleh Kosong</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_mapel" placeholder="MASUKAN NAMA MAPEL" id="nama_mapel" class="form-control"><label class="nama_mapel" style="color:red">Mata Pelajaran Tidak Boleh Kosong</label>
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
                    Nilai Minimum A+ :<input type="text" value="<?php echo $info['min_aplus'];?>" name="min_aplus" placeholder="nilai terendah dari A+" id="min_aplus" class="form-control"><label class="min_aplus_message_mapel_add" style="color:red">Nilai A+ Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $info['min_a'];?>" name="min_a" placeholder="nilai terendah dari A" id="min_a" class="form-control"><label class="min_a_message_mapel_add" style="color:red">Nilai A Harus Lebih Besar dari A-</label>
                </div>
                
                <div class="col-sm-2">
                    Nilai Minimum A- :<input type="text" value="<?php echo $info['min_amin'];?>" name="min_amin" placeholder="nilai terendah dari A-" id="min_amin" class="form-control"><label class="min_amin_message_mapel_add" style="color:red">Nilai A- Harus Lebih Besar dari B+</label>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum B +:<input type="text" value="<?php echo $info['min_bplus'];?>" name="min_bplus" placeholder="nilai terendah dari B+" id="min_bplus" class="form-control"><label class="min_bplus_message_mapel_add" style="color:red">Nilai B+ Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $info['min_b'];?>" name="min_b" placeholder="nilai terendah dari B" id="min_b" class="form-control"><label class="min_b_message_mapel_add" style="color:red">Nilai B Harus Lebih Besar dari B-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B -:<input type="text" value="<?php echo $info['min_bmin'];?>" name="min_bmin" placeholder="nilai terendah dari B-" id="min_bmin" class="form-control"><label class="min_bmin_message_mapel_add" style="color:red">Nilai B- Harus Lebih Besar dari C+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum C +:<input type="text" value="<?php echo $info['min_cplus'];?>" name="min_cplus" placeholder="nilai terendah dari C+" id="min_cplus" class="form-control"><label class="min_cplus_message_mapel_add" style="color:red">Nilai C+ Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $info['min_c'];?>" name="min_c" placeholder="nilai terendah dari C" id="min_c" class="form-control"><label class="min_c_message_mapel_add" style="color:red">Nilai C Harus Lebih Besar dari C-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C -:<input type="text" value="<?php echo $info['min_cmin'];?>" name="min_cmin" placeholder="nilai terendah dari C-" id="min_cmin" class="form-control"><label class="min_cmin_message_mapel_add" style="color:red">Nilai C- Harus Lebih Besar dari D+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum D +:<input type="text" value="<?php echo $info['min_dplus'];?>" name="min_dplus" placeholder="nilai terendah dari D+" id="min_dplus" class="form-control"><label class="min_dplus_message_mapel_add" style="color:red">Nilai D+ Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $info['min_d'];?>" name="min_d" placeholder="nilai terendah dari D" id="min_d" class="form-control"><label class="min_d_message_mapel_add" style="color:red">Nilai D Harus Lebih Besar dari D-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D -:<input type="text" value="<?php echo $info['min_dmin'];?>" name="min_dmin" placeholder="nilai terendah dari D-" id="min_dmin" class="form-control"><label class="min_dmin_message_mapel_add" style="color:red">Nilai D- Harus Lebih Besar dari nilai terendah</label>
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
        $(".kd_mapel").hide();
        $(".nama_mapel").hide();
        
        $(".min_aplus_message_mapel_add").hide();
        $(".min_a_message_mapel_add").hide();
        $(".min_amin_message_mapel_add").hide();
        $(".min_bplus_message_mapel_add").hide();
        $(".min_b_message_mapel_add").hide();
        $(".min_bmin_message_mapel_add").hide();
        $(".min_cplus_message_mapel_add").hide();
        $(".min_c_message_mapel_add").hide();
        $(".min_cmin_message_mapel_add").hide();
        $(".min_dplus_message_mapel_add").hide();
        $(".min_d_message_mapel_add").hide();
        $(".min_dmin_message_mapel_add").hide();
        
        $("#submit_mapel").click(function(){
                   var nilai_max    = parseFloat($("#nilai_max_mapel_add").val());
                   var nilai_min    = parseFloat($("#nilai_min_mapel_add").val());
                   var min_aplus        = parseFloat($("#min_aplus").val());
                   var min_a        = parseFloat($("#min_a").val());
                   var min_amin        = parseFloat($("#min_amin").val());
                   var min_bplus        = parseFloat($("#min_bplus").val());
                   var min_b        = parseFloat($("#min_b").val());
                   var min_bmin       = parseFloat($("#min_bmin").val());
                   var min_cplus        = parseFloat($("#min_cplus").val());
                   var min_c        = parseFloat($("#min_c").val());
                   var min_cmin        = parseFloat($("#min_cmin").val());
                   var min_dplus        = parseFloat($("#min_dplus").val());
                   var min_d        = parseFloat($("#min_d").val());
                   var min_dmin        = parseFloat($("#min_dmin").val());


                     if(nilai_max<=min_aplus)
                         {
                             $(".nilai_max_message_mapel_add").show();
                             $(".min_aplus_message_mapel_add").show();
                         }
                        else{
                             $(".nilai_max_message_mapel_add").hide();
                             $(".min_aplus_message_mapel_add").hide();
                        }
                     if(min_aplus<=min_a)
                         {
                             $(".min_a_message_mapel_add").show();
                             $(".min_aplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_a_message_mapel_add").hide();
                             $(".min_aplus_message_mapel_add").hide();
                        }
                        
                     if(min_a<=min_amin)
                         {
                             $(".min_a_message_mapel_add").show();
                             $(".min_amin_message_mapel_add").show();
                         }
                        else{
                             $(".min_a_message_mapel_add").hide();
                             $(".min_amin_message_mapel_add").hide();
                        }
                     if(min_amin<=min_bplus)
                         {
                             $(".min_amin_message_mapel_add").show();
                             $(".min_bplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_amin_message_mapel_add").hide();
                             $(".min_bplus_message_mapel_add").hide();
                        }
                     if(min_bplus<=min_b)
                         {
                             $(".min_b_message_mapel_add").show();
                             $(".min_bplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_b_message_mapel_add").hide();
                             $(".min_bplus_message_mapel_add").hide();
                        }
                     if(min_b<=min_bmin)
                         {
                             $(".min_b_message_mapel_add").show();
                             $(".min_bmin_message_mapel_add").show();
                         }
                        else{
                             $(".min_b_message_mapel_add").hide();
                             $(".min_bmin_message_mapel_add").hide();
                        }
                     if(min_bmin<=min_cplus)
                         {
                             $(".min_bmin_message_mapel_add").show();
                             $(".min_cplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_bmin_message_mapel_add").hide();
                             $(".min_cplus_message_mapel_add").hide();
                        }
                     if(min_cplus<=min_c)
                         {
                             $(".min_c_message_mapel_add").show();
                             $(".min_cplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_cplus_message_mapel_add").hide();
                             $(".min_c_message_mapel_add").hide();
                        }
                     if(min_c<=min_cmin)
                         {
                             $(".min_c_message_mapel_add").show();
                             $(".min_cmin_message_mapel_add").show();
                         }
                        else{
                             $(".min_cmin_message_mapel_add").hide();
                             $(".min_c_message_mapel_add").hide();
                        }
                     if(min_cmin<=min_dplus)
                         {
                             $(".min_dplus_message_mapel_add").show();
                             $(".min_cmin_message_mapel_add").show();
                         }
                        else{
                             $(".min_cmin_message_mapel_add").hide();
                             $(".min_dplus_message_mapel_add").hide();
                        }
                     if(min_dplus<=min_d)
                         {
                             $(".min_d_message_mapel_add").show();
                             $(".min_dplus_message_mapel_add").show();
                         }
                        else{
                             $(".min_dplus_message_mapel_add").hide();
                             $(".min_d_message_mapel_add").hide();
                        }
                    
                     if(min_d<=min_dmin)
                         {
                             $(".min_d_message_mapel_add").show();
                             $(".min_dmin_message_mapel_add").show();
                         }
                        else{
                             $(".min_dmin_message_mapel_add").hide();
                             $(".min_d_message_mapel_add").hide();
                        }
                    
                     if(min_dmin<nilai_min)
                         {  
                             $(".nilai_min_message_mapel_add").show();
                             $(".min_dmin_message_mapel_add").show();
                         }
                        else{
                             $(".nilai_min_message_mapel_add").hide();
                             $(".min_dmin_message_mapel_add").hide();
                        }
                    
                  
                    if((nilai_max>min_aplus) && (min_aplus>min_a) && (min_a>min_amin) && (min_amin>min_bplus) && (min_bplus>min_b) && (min_b>min_bmin) && (min_bmin>min_cplus) && (min_cplus>min_c) && (min_c>min_cmin) && (min_cmin>min_dplus) && (min_dplus>min_d) && (min_d>min_dmin) && (min_dmin>=nilai_min))
                        {
                             if (kd_mapel == ' ' || kd_mapel == null)
                             {  
                                 $(".kd_mapel").show();                    
                                return false;
                             }
                             else{
                                     $(".kd_mapel").hide();
                                    if (nama_mapel == ' ' || nama_mapel == null)
                                        {  
                                             $(".nama_mapel").show();                    
                                                return false;
                                         }
                                        else{
                                             $(".nama_mapel").hide();
                                                return true;
                                            
                                        }
                             }
                        }
                return false;
            });

});
</script>

