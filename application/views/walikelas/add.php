<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/github.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/template/font-awesome/clocklib/assets/css/clock.css">

<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Wali Kelas Baru
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('walikelas/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Tahun Akademik
                </label>
                <div class="col-sm-2">
                <select class="form-control" name="ta">
                    <?php foreach($tahun_akademik as $tahun)
                    {
                    ?>
                        <option value="<?php echo $tahun->id_tahun_akademik?>"><?php echo $tahun->tahun_akademik?></option>
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
                        <option value="<?php echo $guru->username?>"><?php echo $guru->nama_guru?></option>
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
                        <option value="<?php echo $rombel->id_rombel?>"><?php echo $rombel->nama_rombel?></option>
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
                    <?php echo anchor('walikelas', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
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
                    <?php echo anchor('walikelas', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
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
