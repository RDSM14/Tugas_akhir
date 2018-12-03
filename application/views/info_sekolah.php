
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
            Info Sekolah
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        <!--untuk admin dan TU -->
        <?php if($this->session->userdata('id_level_user')==2 || $this->session->userdata('id_level_user')==3){ ?>
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
                    <input type="text" value="<?php echo $info['nama_sekolah'];?>" name="nama_sekolah" id="nama_sekolah"  placeholder="MASUKAN NAMA SEKOLAH" class="form-control"> <label class="nama_sekolah_msg" style="color:red">Nama Sekolah Tidak Boleh Kosong</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT SEKOLAH
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_sekolah" value="<?php echo $info['alamat_sekolah'];?>" placeholder="MASUKAN ALAMAT SEKOLAH" id="alamat_sekolah" class="form-control"><label class="alamat_sekolah" style="color:red">Alamat Sekolah Tidak Boleh Kosong</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    EMAIL, TELEPON
                </label>
                
                <div class="col-sm-5">
                    <input type="email" value="<?php echo $info['email'];?>" name="email" placeholder="EMAIL SEKOLAH" id="email" class="form-control"><label class="email" style="color:red">Email Tidak Boleh Kosong</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" value="<?php echo $info['telpon'];?>" name="telpon" placeholder="TELEPON" id="telpon" class="form-control"><label class="telpon" style="color:red">Nomor Telepon Tidak Boleh Kosong</label>
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
                    Nilai Minimum A+ :<input type="text" value="<?php echo $info['min_aplus'];?>" name="min_aplus" placeholder="nilai terendah dari A+" id="min_aplus" class="form-control"><label class="min_aplus_message" style="color:red">Nilai A+ Harus Lebih Besar dari A</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum A:<input type="text" value="<?php echo $info['min_a'];?>" name="min_a" placeholder="nilai terendah dari A" id="min_a" class="form-control"><label class="min_a_message" style="color:red">Nilai A Harus Lebih Besar dari A-</label>
                </div>
                
                <div class="col-sm-2">
                    Nilai Minimum A- :<input type="text" value="<?php echo $info['min_amin'];?>" name="min_amin" placeholder="nilai terendah dari A-" id="min_amin" class="form-control"><label class="min_amin_message" style="color:red">Nilai A- Harus Lebih Besar dari B+</label>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum B +:<input type="text" value="<?php echo $info['min_bplus'];?>" name="min_bplus" placeholder="nilai terendah dari B+" id="min_bplus" class="form-control"><label class="min_bplus_message" style="color:red">Nilai B+ Harus Lebih Besar dari B</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B:<input type="text" value="<?php echo $info['min_b'];?>" name="min_b" placeholder="nilai terendah dari B" id="min_b" class="form-control"><label class="min_b_message" style="color:red">Nilai B Harus Lebih Besar dari B-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum B -:<input type="text" value="<?php echo $info['min_bmin'];?>" name="min_bmin" placeholder="nilai terendah dari B-" id="min_bmin" class="form-control"><label class="min_bmin_message" style="color:red">Nilai B- Harus Lebih Besar dari C+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum C +:<input type="text" value="<?php echo $info['min_cplus'];?>" name="min_cplus" placeholder="nilai terendah dari C+" id="min_cplus" class="form-control"><label class="min_cplus_message" style="color:red">Nilai C+ Harus Lebih Besar dari C</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C:<input type="text" value="<?php echo $info['min_c'];?>" name="min_c" placeholder="nilai terendah dari C" id="min_c" class="form-control"><label class="min_c_message" style="color:red">Nilai C Harus Lebih Besar dari C-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum C -:<input type="text" value="<?php echo $info['min_cmin'];?>" name="min_cmin" placeholder="nilai terendah dari C-" id="min_cmin" class="form-control"><label class="min_cmin_message" style="color:red">Nilai C- Harus Lebih Besar dari D+</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                </label>
                <div class="col-sm-2">
                    Nilai Minimum D +:<input type="text" value="<?php echo $info['min_dplus'];?>" name="min_dplus" placeholder="nilai terendah dari D+" id="min_dplus" class="form-control"><label class="min_dplus_message" style="color:red">Nilai D+ Harus Lebih Besar dari D</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D:<input type="text" value="<?php echo $info['min_d'];?>" name="min_d" placeholder="nilai terendah dari D" id="min_d" class="form-control"><label class="min_d_message" style="color:red">Nilai D Harus Lebih Besar dari D-</label>
                </div>
                <div class="col-sm-2">
                    Nilai Minimum D -:<input type="text" value="<?php echo $info['min_dmin'];?>" name="min_dmin" placeholder="nilai terendah dari D-" id="min_dmin" class="form-control"><label class="min_dmin_message" style="color:red">Nilai D- Harus Lebih Besar dari nilai terendah</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    LOGO SEKOLAH <br>(MAX 1 MB)
                </label>
                <div class="col-sm-9">
                    <input type="file" name="foto_sekolah" id="foto_sekolah"  placeholder="MASUKAN LOGO SEKOLAH" class="form-control"> 
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
        <?php }else{ ?>
        <!--untuk admin dan TU -->
        
        <!--untuk SELAIN admin dan TU -->
        <div class="panel-body">
            <table style="margin-left:150px; font-family: cursive; ">
                <tr>
                    <td style="padding :25px; font-size:xx-large;">Nama Sekolah </td>
                    <td style="padding :25px; font-size:xx-large;">:</td>
                    <td style="padding :25px; font-size:xx-large;"><?php echo $info['nama_sekolah'];?></td>
                </tr>
                <tr>
                    <td style="padding :25px; font-size:xx-large;">Alamat Sekolah </td>
                    <td style="padding :25px; font-size:xx-large;">:</td>
                    <td style="padding :25px; font-size:xx-large;"><?php echo $info['alamat_sekolah'];?></td>
                </tr>
                <tr>
                    <td style="padding :25px; font-size:xx-large;">E-Mail Sekolah </td>
                    <td style="padding :25px; font-size:xx-large;">:</td>
                    <td style="padding :25px; font-size:xx-large;"><?php echo $info['email'];?></td>
                </tr>
                <tr>
                    <td style="padding :25px; font-size:xx-large;">Telepon Sekolah </td>
                    <td style="padding :25px; font-size:xx-large;">:</td>
                    <td style="padding :25px; font-size:xx-large;"><?php echo $info['telpon'];?></td>
                </tr>
                <tr>
                    <td style="padding :25px; font-size:xx-large;">Jenjang Sekolah </td>
                    <td style="padding :25px; font-size:xx-large;">:</td>
                    <td style="padding :25px; font-size:xx-large;">
                        <?php $id_jenjang = $info['id_jenjang_sekolah'];
                        //        echo $info['id_jenjang_sekolah'];
                                switch ($id_jenjang){
                                    case "1":
                                        echo "Sekolah Dasar / Madrasah Ibtidayah (SD/MI)";
                                        break;
                                    case "2":
                                        echo "Sekolah Menengah Pertama / Madrasah Tsanawiyah (SMP/MTs)";
                                        break;
                                    case "3":
                                        echo "Sekolah Menengah Atas / Sekolah Menengah Kejuruan / Madrasah Aliyah (SMA/SMK/MA)";
                                        break;
                                    case "4":
                                        echo "Taman Kanak-Kanak (TK)";
                                        break;
                                    
                                }
                        
                        ?>
                    </td>
                </tr>
               
            </table>
        </div>
        <?php } ?>
        <!--untuk SELAIN admin dan TU -->
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
        
        $(".nama_sekolah_msg").hide();
        $(".alamat_sekolah").hide();
        $(".email").hide();
        $(".telpon").hide();
        
        $(".nilai_max_message").hide();
        $(".nilai_min_message").hide();
        
        $(".min_aplus_message").hide();
        $(".min_a_message").hide();
        $(".min_amin_message").hide();
        $(".min_bplus_message").hide();
        $(".min_b_message").hide();
        $(".min_bmin_message").hide();
        $(".min_cplus_message").hide();
        $(".min_c_message").hide();
        $(".min_cmin_message").hide();
        $(".min_dplus_message").hide();
        $(".min_d_message").hide();
        $(".min_dmin_message").hide();
        
        $("#submit").click(function(){
                   var nilai_max    = parseFloat($("#nilai_max").val());
                   var nilai_min    = parseFloat($("#nilai_min").val());
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
                             $(".nilai_max_message").show();
                             $(".min_aplus_message").show();
                         }
                        else{
                             $(".nilai_max_message").hide();
                             $(".min_aplus_message").hide();
                        }
                     if(min_aplus<=min_a)
                         {
                             $(".min_a_message").show();
                             $(".min_aplus_message").show();
                         }
                        else{
                             $(".min_a_message").hide();
                             $(".min_aplus_message").hide();
                        }
                        
                     if(min_a<=min_amin)
                         {
                             $(".min_a_message").show();
                             $(".min_amin_message").show();
                         }
                        else{
                             $(".min_a_message").hide();
                             $(".min_amin_message").hide();
                        }
                     if(min_amin<=min_bplus)
                         {
                             $(".min_amin_message").show();
                             $(".min_bplus_message").show();
                         }
                        else{
                             $(".min_amin_message").hide();
                             $(".min_bplus_message").hide();
                        }
                     if(min_bplus<=min_b)
                         {
                             $(".min_b_message").show();
                             $(".min_bplus_message").show();
                         }
                        else{
                             $(".min_b_message").hide();
                             $(".min_bplus_message").hide();
                        }
                     if(min_b<=min_bmin)
                         {
                             $(".min_b_message").show();
                             $(".min_bmin_message").show();
                         }
                        else{
                             $(".min_b_message").hide();
                             $(".min_bmin_message").hide();
                        }
                     if(min_bmin<=min_cplus)
                         {
                             $(".min_bmin_message").show();
                             $(".min_cplus_message").show();
                         }
                        else{
                             $(".min_bmin_message").hide();
                             $(".min_cplus_message").hide();
                        }
                     if(min_cplus<=min_c)
                         {
                             $(".min_c_message").show();
                             $(".min_cplus_message").show();
                         }
                        else{
                             $(".min_cplus_message").hide();
                             $(".min_c_message").hide();
                        }
                     if(min_c<=min_cmin)
                         {
                             $(".min_c_message").show();
                             $(".min_cmin_message").show();
                         }
                        else{
                             $(".min_cmin_message").hide();
                             $(".min_c_message").hide();
                        }
                     if(min_cmin<=min_dplus)
                         {
                             $(".min_dplus_message").show();
                             $(".min_cmin_message").show();
                         }
                        else{
                             $(".min_cmin_message").hide();
                             $(".min_dplus_message").hide();
                        }
                     if(min_dplus<=min_d)
                         {
                             $(".min_d_message").show();
                             $(".min_dplus_message").show();
                         }
                        else{
                             $(".min_dplus_message").hide();
                             $(".min_d_message").hide();
                        }
                    
                     if(min_d<=min_dmin)
                         {
                             $(".min_d_message").show();
                             $(".min_dmin_message").show();
                         }
                        else{
                             $(".min_dmin_message").hide();
                             $(".min_d_message").hide();
                        }
                    
                     if(min_dmin<nilai_min)
                         {  
                             $(".nilai_min_message").show();
                             $(".min_dmin_message").show();
                         }
                        else{
                             $(".nilai_min_message").hide();
                             $(".min_dmin_message").hide();
                        }
                    
                    if((nilai_max>min_aplus) && (min_aplus>min_a) && (min_a>min_amin) && (min_amin>min_bplus) && (min_bplus>min_b) && (min_b>min_bmin) && (min_bmin>min_cplus) && (min_cplus>min_c) && (min_c>min_cmin) && (min_cmin>min_dplus) && (min_dplus>min_d) && (min_d>min_dmin) && (min_dmin>=nilai_min))
                        {
                             if (nama_sekolah == '' || nama_sekolah == null)
                             {  
                                 $(".nama_sekolah").show();                    
                                return false;
                             }

                             else{
                                     $(".nama_sekolah").hide();
                                    //return true;
                                 
                                    if (alamat_sekolah == '' || alamat_sekolah == null)
                                        {  
                                             $(".alamat_sekolah").show();                    
                                                return false;
                                         }
                                        else{
                                             $(".alamat_sekolah").hide();
                                            if (email == '' || email == null)
                                                {  
                                                     $(".email").show();                    
                                                        return false;
                                                 }
                                                else{
                                                     $(".email").hide();

                                                        if (telpon == '' || telpon == null)
                                                            {  
                                                                 $(".telpon").show();                    
                                                                    return false;
                                                             }
                                                            else{
                                                                 $(".telpon").hide();
                                                                return true;
                                                            }
                                                }
                                            
                                        }
                             }
                        }
                   

                return false;
            });

});
</script>
