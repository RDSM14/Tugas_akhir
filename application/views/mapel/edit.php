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
                    <input type="text" value="<?php echo $row->kode;?>" name="kd_mapel" placeholder="MASUKAN KODE MAPEL" id="kd_mapel" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    MATA PELAJARAN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $row->amapel;?>" name="nama_mapel" placeholder="MASUKAN NAMA MAPEL" id="nama_mapel" class="form-control">
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
                    Nilai Minimum A+ :<input type="text" value="<?php echo $row->nilai_aplus ;?>" name="min_aplus" placeholder="nilai terendah dari A+" id="min_aplus" class="form-control"><label class="min_aplus_message_mapel_edit" style="color:red">Nilai A+ Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $row->nilai_a;?>" name="min_a" placeholder="nilai terendah dari A" id="min_a" class="form-control"><label class="min_a_message_mapel_edit" style="color:red">Nilai A Harus Lebih Besar dari A-</label>
                </div>
                
                <div class="col-sm-2">
                    Nilai Minimum A- :<input type="text" value="<?php echo $row->nilai_amin;?>" name="min_amin" placeholder="nilai terendah dari A-" id="min_amin" class="form-control"><label class="min_amin_message_mapel_edit" style="color:red">Nilai A- Harus Lebih Besar dari B+</label>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum B +:<input type="text" value="<?php echo $row->nilai_bplus;?>" name="min_bplus" placeholder="nilai terendah dari B+" id="min_bplus" class="form-control"><label class="min_bplus_message_mapel_edit" style="color:red">Nilai B+ Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $row->nilai_b;?>" name="min_b" placeholder="nilai terendah dari B" id="min_b" class="form-control"><label class="min_b_message_mapel_edit" style="color:red">Nilai B Harus Lebih Besar dari B-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B -:<input type="text" value="<?php echo $row->nilai_bmin;?>" name="min_bmin" placeholder="nilai terendah dari B-" id="min_bmin" class="form-control"><label class="min_bmin_message_mapel_edit" style="color:red">Nilai B- Harus Lebih Besar dari C+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum C +:<input type="text" value="<?php echo $row->nilai_cplus;?>" name="min_cplus" placeholder="nilai terendah dari C+" id="min_cplus" class="form-control"><label class="min_cplus_message_mapel_edit" style="color:red">Nilai C+ Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $row->nilai_c;?>" name="min_c" placeholder="nilai terendah dari C" id="min_c" class="form-control"><label class="min_c_message_mapel_edit" style="color:red">Nilai C Harus Lebih Besar dari C-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C -:<input type="text" value="<?php echo $row->nilai_cmin;?>" name="min_cmin" placeholder="nilai terendah dari C-" id="min_cmin" class="form-control"><label class="min_cmin_message_mapel_edit" style="color:red">Nilai C- Harus Lebih Besar dari D+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum D +:<input type="text" value="<?php echo $row->nilai_dplus;?>" name="min_dplus" placeholder="nilai terendah dari D+" id="min_dplus" class="form-control"><label class="min_dplus_message_mapel_edit" style="color:red">Nilai D+ Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $row->nilai_d;?>" name="min_d" placeholder="nilai terendah dari D" id="min_d" class="form-control"><label class="min_d_message_mapel_edit" style="color:red">Nilai D Harus Lebih Besar dari D-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D -:<input type="text" value="<?php echo $row->nilai_dmin;?>" name="min_dmin" placeholder="nilai terendah dari D-" id="min_dmin" class="form-control"><label class="min_dmin_message_mapel_edit" style="color:red">Nilai D- Harus Lebih Besar dari nilai terendah</label>
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" id="submit_edit_mapel" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('mapel', 'Kembali', array('class' => 'btn btn-row btn-sm')); ?>
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
        $(".min_aplus_message_mapel_edit").hide();
        $(".min_a_message_mapel_edit").hide();
        $(".min_amin_message_mapel_edit").hide();
        $(".min_bplus_message_mapel_edit").hide();
        $(".min_b_message_mapel_edit").hide();
        $(".min_bmin_message_mapel_edit").hide();
        $(".min_cplus_message_mapel_edit").hide();
        $(".min_c_message_mapel_edit").hide();
        $(".min_cmin_message_mapel_edit").hide();
        $(".min_dplus_message_mapel_edit").hide();
        $(".min_d_message_mapel_edit").hide();
        $(".min_dmin_message_mapel_edit").hide();
        
        $("#submit_edit_mapel").click(function(){
                   var nilai_max    = parseFloat($("#nilai_max_mapel_edit").val());
                   var nilai_min    = parseFloat($("#nilai_min_mapel_edit").val());
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
                             $(".nilai_max_message_mapel_edit").show();
                             $(".min_aplus_message_mapel_edit").show();
                         }
                        else{
                             $(".nilai_max_message_mapel_edit").hide();
                             $(".min_aplus_message_mapel_edit").hide();
                        }
                     if(min_aplus<=min_a)
                         {
                             $(".min_a_message_mapel_edit").show();
                             $(".min_aplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_a_message_mapel_edit").hide();
                             $(".min_aplus_message_mapel_edit").hide();
                        }
                        
                     if(min_a<=min_amin)
                         {
                             $(".min_a_message_mapel_edit").show();
                             $(".min_amin_message_mapel_edit").show();
                         }
                        else{
                             $(".min_a_message_mapel_edit").hide();
                             $(".min_amin_message_mapel_edit").hide();
                        }
                     if(min_amin<=min_bplus)
                         {
                             $(".min_amin_message_mapel_edit").show();
                             $(".min_bplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_amin_message_mapel_edit").hide();
                             $(".min_bplus_message_mapel_edit").hide();
                        }
                     if(min_bplus<=min_b)
                         {
                             $(".min_b_message_mapel_edit").show();
                             $(".min_bplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_b_message_mapel_edit").hide();
                             $(".min_bplus_message_mapel_edit").hide();
                        }
                     if(min_b<=min_bmin)
                         {
                             $(".min_b_message_mapel_edit").show();
                             $(".min_bmin_message_mapel_edit").show();
                         }
                        else{
                             $(".min_b_message_mapel_edit").hide();
                             $(".min_bmin_message_mapel_edit").hide();
                        }
                     if(min_bmin<=min_cplus)
                         {
                             $(".min_bmin_message_mapel_edit").show();
                             $(".min_cplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_bmin_message_mapel_edit").hide();
                             $(".min_cplus_message_mapel_edit").hide();
                        }
                     if(min_cplus<=min_c)
                         {
                             $(".min_c_message_mapel_edit").show();
                             $(".min_cplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_cplus_message_mapel_edit").hide();
                             $(".min_c_message_mapel_edit").hide();
                        }
                     if(min_c<=min_cmin)
                         {
                             $(".min_c_message_mapel_edit").show();
                             $(".min_cmin_message_mapel_edit").show();
                         }
                        else{
                             $(".min_cmin_message_mapel_edit").hide();
                             $(".min_c_message_mapel_edit").hide();
                        }
                     if(min_cmin<=min_dplus)
                         {
                             $(".min_dplus_message_mapel_edit").show();
                             $(".min_cmin_message_mapel_edit").show();
                         }
                        else{
                             $(".min_cmin_message_mapel_edit").hide();
                             $(".min_dplus_message_mapel_edit").hide();
                        }
                     if(min_dplus<=min_d)
                         {
                             $(".min_d_message_mapel_edit").show();
                             $(".min_dplus_message_mapel_edit").show();
                         }
                        else{
                             $(".min_dplus_message_mapel_edit").hide();
                             $(".min_d_message_mapel_edit").hide();
                        }
                    
                     if(min_d<=min_dmin)
                         {
                             $(".min_d_message_mapel_edit").show();
                             $(".min_dmin_message_mapel_edit").show();
                         }
                        else{
                             $(".min_dmin_message_mapel_edit").hide();
                             $(".min_d_message_mapel_edit").hide();
                        }
                    
                     if(min_dmin<nilai_min)
                         {  
                             $(".nilai_min_message_mapel_edit").show();
                             $(".min_dmin_message_mapel_edit").show();
                         }
                        else{
                             $(".nilai_min_message_mapel_edit").hide();
                             $(".min_dmin_message_mapel_edit").hide();
                        }
                    
                    
                    if((nilai_max>min_aplus) && (min_aplus>min_a) && (min_a>min_amin) && (min_amin>min_bplus) && (min_bplus>min_b) && (min_b>min_bmin) && (min_bmin>min_cplus) && (min_cplus>min_c) && (min_c>min_cmin) && (min_cmin>min_dplus) && (min_dplus>min_d) && (min_d>min_dmin) && (min_dmin>=nilai_min))
                        {
                             return true;
                        }
                return false;
            });

});
</script>