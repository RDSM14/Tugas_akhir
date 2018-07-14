<div class="col-sm-12">

        
        
        
        <?php if($this->session->flashdata('data_sekolah_masuk'))
    {
    ?>
    <script>
        alert("Data Telah Disimpan");
    </script>
        
    <?php
    }
    ?>

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
            echo form_open('sekolah/index', 'role="form" class="form-horizontal"');
            echo form_hidden('id_sekolah',$info['id_sekolah']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA SEKOLAH
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $info['nama_sekolah'];?>" name="nama_sekolah" placeholder="MASUKAN NAMA SEKOLAH" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT SEKOLAH
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_sekolah" value="<?php echo $info['alamat_sekolah'];?>" placeholder="MASUKAN ALAMAT SEKOLAH" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    EMAIL, TELPON
                </label>
                
                <div class="col-sm-5">
                    <input type="email" value="<?php echo $info['email'];?>" name="email" placeholder="EMAIL SEKOLAH" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" value="<?php echo $info['telpon'];?>" name="telpon" placeholder="TELPON" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    JENJANG SEKOLAH
                </label>
                <div class="col-sm-2">
                    <?php
                    echo cmb_dinamis('jenjang','tbl_jenjang_sekolah','nama_jenjang','id_jenjang',$info['id_jenjang_sekolah']);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    SETTING NILAI
                </label>
                <div class="col-sm-2">
                    Nilai Tertinggi:<input type="text" value="<?php echo $info['nilai_max'];?>" name="nilai_max" placeholder="nilai tertinggi" id="nilai_max" class="form-control"><label class="nilai_max_message" style="color:red">Nilai Tertinggi Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Terendah:<input type="text" value="<?php echo $info['nilai_min'];?>" name="nilai_min" placeholder="nilai terendah" id="nilai_min" class="form-control"><label class="nilai_min_message" style="color:red">Nilai Terendah Harus Lebih Kecil dari D</label>
                </div>
                
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $info['min_a'];?>" name="min_a" placeholder="nilai terendah dari A" id="min_a" class="form-control"><label class="min_a_message" style="color:red">Nilai A Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $info['min_b'];?>" name="min_b" placeholder="nilai terendah dari B" id="min_b" class="form-control"><label class="min_b_message" style="color:red">Nilai B Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $info['min_c'];?>" name="min_c" placeholder="nilai terendah dari C" id="min_c" class="form-control"><label class="min_c_message" style="color:red">Nilai C Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $info['min_d'];?>" name="min_d" placeholder="nilai terendah dari D" id="min_d" class="form-control"><label class="min_d_message" style="color:red">Nilai D Harus Lebih Besar dari nilai terendah</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" id="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>
<script>
	$(document).ready(function(){
        $(".nilai_max_message").hide();
        $(".nilai_min_message").hide();
        
        $(".min_a_message").hide();
        $(".min_b_message").hide();
        $(".min_c_message").hide();
        $(".min_d_message").hide();
        
        $("#submit").click(function(){
                   var nilai_max    = $("#nilai_max").val();
                   var nilai_min    = $("#nilai_min").val();
                   var min_a        = $("#min_a").val();
                   var min_b        = $("#min_b").val();
                   var min_c        = $("#min_c").val();
                   var min_d        = $("#min_d").val();


                     if(nilai_max<=min_a)
                         {
                             $(".nilai_max_message").show();
                             $(".min_a_message").show();
                         }
                        else{
                             $(".nilai_max_message").hide();
                             $(".min_a_message").hide();
                        }
                     if(min_a<=min_b)
                         {
                             $(".min_a_message").show();
                             $(".min_b_message").show();
                         }
                        else{
                             $(".min_a_message").hide();
                             $(".min_b_message").hide();
                        }
                     if(min_b<=min_c)
                         {
                             $(".min_b_message").show();
                             $(".min_c_message").show();
                         }
                        else{
                             $(".min_b_message").hide();
                             $(".min_c_message").hide();
                        }
                     if(min_c<=min_d)
                         {
                             $(".min_d_message").show();
                             $(".min_c_message").show();
                         }
                        else{
                             $(".min_c_message").hide();
                             $(".min_d_message").hide();
                        }
                    
                     if(min_d<nilai_min)
                         {  
                             $(".nilai_min_message").show();
                             $(".min_d_message").show();
                         }
                        else{
                             $(".nilai_min_message").hide();
                             $(".min_d_message").hide();
                        }
                    
                    if((nilai_max>min_a) && (min_a>min_b) && (min_b>min_c) && (min_c>min_d) && (min_d>=nilai_min))
                        {
                            return true;
                        }

                return false;
            });

});
</script>
