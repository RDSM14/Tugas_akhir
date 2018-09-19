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
<script>
	$(document).ready(function(){
        $(".nilai_max_message").hide();
        $(".nilai_min_message").hide();
        
        $(".min_a_message").hide();
        $(".min_b_message").hide();
        $(".min_c_message").hide();
        $(".min_d_message").hide();
        
        $("#submit").click(function(){
                   var nilai_max    = parseFloat($("#nilai_max").val());
                   var nilai_min    = parseFloat($("#nilai_min").val());
                   var min_a        = parseFloat($("#min_a").val());
                   var min_b        = parseFloat($("#min_b").val());
                   var min_c        = parseFloat($("#min_c").val());
                   var min_d        = parseFloat($("#min_d").val());


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
