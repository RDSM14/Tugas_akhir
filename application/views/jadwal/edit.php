<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/github.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/clock.css">

    
<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Jadwal Pelajaran
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('jadwal/edit_jadwal', 'role="form" class="form-horizontal"');
            ?>
            <?php foreach ($jadwal as $pilih)
            {
                $tahun_akademiq= $pilih->id_tahun_akademik;
                $pelajaran = $pilih->id_mapel;
                $teach = $pilih->username_guru;
                $mulai = $pilih->jam_mulai;
                $selesai = $pilih->jam_selesai;
                $room = $pilih->id_ruangan;
                $smester = $pilih->semester;
                $day = $pilih->hari;
                $rom = $pilih->id_rombel;
                $id_jadwalnya = $pilih->id_jadwal;
                
            }
            ?>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Tahun Akademik
                </label>
                <div class="col-sm-2">
                    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwalnya;?>"  id="form-field-1" class="form-control">
                <select class="form-control" name="ta">
                    
                    <?php foreach($tahun_akademik as $tahun)
                    {
                    ?>
                        <option value="<?php echo $tahun->id_tahun_akademik?>"<?php if( $tahun->id_tahun_akademik==$tahun_akademiq) echo 'selected="selected"';?>><?php echo $tahun->tahun_akademik?></option>
                    <?php
                    }
                    ?>
                </select>
           </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Mata Pelajaran
                </label>
                
                    <div class="col-sm-2">
                <select class="form-control" name="mapel">
                    <?php foreach($mapel as $mapel)
                    {    //$aktif = ($mapel->id_mapel == $pelajaran?'selected':''); 
                        
                    ?>
                        
                        <option value="<?php echo $mapel->id_mapel?>" <?php if($mapel->id_mapel==$pelajaran) echo 'selected="selected"';?>><?php echo $mapel->nama_mapel?></option>
                    <?php
                    }
                    ?>
                </select>
           </div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Guru
                </label>
              
                   <div class="col-sm-2">
                <select class="form-control" name="guru">
                    <?php foreach($guru as $guru)
                    {
                    ?>
                        <option value="<?php echo $guru->username?>"<?php if( $guru->username==$teach) echo 'selected="selected"';?>><?php echo $guru->nama_guru?></option>
                    <?php
                    }
                    ?>
                </select>
           </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Jam Mulai
                </label>
                <div class="col-sm-2" >
                    <div class="input-group clockpicker-with-callbacks ">
                        <input type="text" id="jam_mulai" class="form-control" value="<?php echo $mulai;?>" name="mulai">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                    </div>
                </div>
            </div>
            <p id="errorClock" style="color:red">Jam mulai tidak boleh lebih dari jam selesai</p>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Jam Selesai
                </label>
                <div class="col-sm-2">
                    <div class="input-group clockpicker-with-callbacks col-sm-2">
                        <input type="text" id="jam_selesai" class="form-control" value="<?php echo $selesai ?>" name="selesai">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
			 </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Ruangan
                </label>
                <div class="col-sm-2">
                <select class="form-control" name="ruangan">
                    <?php foreach($ruangan as $ruangan)
                    {
                    ?>
                        <option value="<?php echo $ruangan->id_ruangan?>"<?php if($ruangan->id_ruangan==$room) echo 'selected="selected"';?>><?php echo $ruangan->nama_ruangan?></option>
                    <?php
                    }
                    ?>
                </select>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-2">
             <select class="form-control" name="semester">
                
                <option value="1"<?php if($smester=='1'){ ?> selected="selected" <?php } ?>>1</option>
                <option value="2"<?php if($smester=='2'){ ?> selected="selected" <?php } ?>>2</option>
                    
             </select>
                    </div>
               
            </div><div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Hari
                </label>
           <div class="col-sm-2">
               <select class="form-control" name="hari">
                    <?php foreach($hari as $hari)
{
    ?>
                    <option value="<?php echo $hari ?>"<?php if($hari==$day) echo 'selected="selected"';?>><?php echo $hari ?></option>
                    <?php
}
            ?>
                </select>
            </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Rombel
                </label>
                <div class="col-sm-2">
               <select class="form-control" name="rombel">
                    <?php foreach($rombel as $rombel)
                    {
                    ?>
                        <option value="<?php echo $rombel->id_rombel?>"<?php if($rombel->id_rombel==$rom) echo 'selected="selected"';?>><?php echo $rombel->nama_rombel?></option>
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
                    <?php echo anchor('jadwal', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>



 <!--<div class="col-sm-6">
    <!-- start: TEXT FIELDS PANEL
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Form Data Lain Peserta Didik
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
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>
             
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-2">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-3">
                    <?php echo anchor('jadwal', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div> -->
    <!-- end: TEXT FIELDS PANEL 
</div>-->

<script type="text/javascript" src="<?php echo base_url()?>/template/font-awesome/clocklib/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/template/font-awesome/clocklib/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/template/font-awesome/clocklib/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">

$('.clockpicker-with-callbacks').clockpicker({
		donetext: 'Done',
		init: function() { 
			console.log("colorpicker initiated");
		},
		beforeShow: function() {
			console.log("before show");
		},
		afterShow: function() {
			console.log("after show");
		},
		beforeHide: function() {
			console.log("before hide");
		},
		afterHide: function() {
			console.log("after hide");
		},
		beforeHourSelect: function() {
			console.log("before hour selected");
		},
		afterHourSelect: function() {
			console.log("after hour selected");
		},
		beforeDone: function() {
			console.log("before done");
		},
		afterDone: function() {
			console.log("after done");
		}
	})
	.find('input').change(function(){
		console.log(this.value);
	});


</script>
<script type="text/javascript" src="<?php echo base_url()?>/template/font-awesome/clocklib/assets/js/highlight.min.js"></script>

<script>
    $("#errorClock").hide();
    $("#submit").click(function()
    {
        
        var jam_mulai = document.getElementById("jam_mulai").value;
        var jam_selesai = document.getElementById("jam_selesai").value;
        if(jam_mulai >= jam_selesai)
            {
                $("#errorClock").fadeIn();
                return false;
            }
        else{
            $("#errorClock").hide();
            return true;
        }
    });
</script>
