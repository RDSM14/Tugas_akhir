<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td>  <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td>   <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        <tr><td>KELAS</td><td>  KELAS <?php echo $rombel['kelas']?> ( <?php echo $rombel['nama_rombel']?> )</td></tr>
        <tr><td>MATA PELAJARAN</td><td><?php echo $rombel['nama_mapel']?></td></tr>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DAFTAR SISWA
            <div class="panel-tools">
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NIS</th><th>NAMA</th><th></th><th></th>
                <?php foreach ($siswa as $row){
            
                    echo "<tr>  <td width='140'>$row->nisn</td>
                                <td>".  strtoupper($row->nama)."</td>
                                <td width='150'><button class='btn btn-success' href='nilai/rombel/'".$row->nisn.'/'.$row->nisn." data-toggle='modal' data-id = ".$row->nisn." data-mapel = ".$this->uri->segment(4)." data-target='#ModalAngka'>Komponen Nilai</td>
                                    <td width='150'><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Deskripsi / Catatan</td>
                                
                                </tr>";
                                
                }
?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
    
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Deskripsi Nilai</h4>
      </div>
      <div class="modal-body">
        
        <?php
        echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
        ?>
<?php foreach ($deskripsi as $desk){
    ?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">
                Deskripsi Pengetahuan 
            </label>
            <div class="col-sm-9">
                <textarea name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" class="form-control" onkeyup="updateDeskripsiPengetahuan(<?php echo $desk->id_deskripsi ?>)"><?php echo $desk->deskripsi_pengetahuan ?></textarea>
            </div>
        </div>
          
       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">
                Deskripsi Spiritual 
            </label>
            <div class="col-sm-9">
                <textarea name="deskripsi_spiritual" id="deskripsi_spiritual" class="form-control" onkeyup="updateDeskripsiSpiritual(<?php echo $desk->id_deskripsi ?>)"><?php echo $desk->deskripsi_spiritual ?></textarea>
            </div>
        </div>

       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">
                Deskripsi Sosial 
            </label>
            <div class="col-sm-9">
                 <textarea name="deskripsi_sosial" id="deskripsi_sosial" class="form-control" onkeyup="updateDeskripsiSosial(<?php echo $desk->id_deskripsi ?>)"><?php echo $desk->deskripsi_sosial ?></textarea>
            </div>
        </div>

       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">
                Deskripsi Keterampilan 
            </label>
            <div class="col-sm-9">
                  <textarea name="deskripsi_keterampilan" id="deskripsi_keterampilan" class="form-control" onkeyup="updateDeskripsiKeterampilan(<?php echo $desk->id_deskripsi ?>)"><?php echo $desk->deskripsi_keterampilan ?></textarea>
            </div>
        </div>
                
<?php } ?>
        
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalAngka" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Deskripsi Nilai</h4>
      </div>
      <div class="modal-body">
        
        <?php
        echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
        ?>
<?php foreach ($komponen_nilai as $komponen_nilai){
    
    foreach ($nilai as $value){
    ?>
        
       <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">
                <?php  echo $komponen_nilai->nama_komponen ; ?>
            </label>
           
           <input type="hidden" id="nisn">
            
           
           <script>
           $("#nisn").val()
           </script>

            <div class="col-sm-9">
                <input type="text" id="<?php echo $komponen_nilai->id_komponen ?>" 
                       value="<?php echo $value->skor?>" 
                       onkeyup="updatenilai(<?php echo $value->id_nilai?>)" name="nama" 
                       placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                <!--<textarea name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" class="form-control" onkeyup="updateDeskripsiPengetahuan</textarea>
            </div>-->
            </div>
        </div> 
                
<?php }} ?>
        
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--END OF MODAL-->

<script type="text/javascript">

function updateNilaiPengetahuan(nisn){
    var nilai = $("#nilai"+nisn).val();

    $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/nilai/update_nilai',
            data:'nisn='+nisn+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai='+nilai,
            success:function(html){
                //$("#dataSiswa").html(html);
            }
        })
}
    
function updateNilaiSpiritual(nisn){
var nilai = $("#nilai_spiritual"+nisn).val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_nilai_spiritual',
        data:'nisn='+nisn+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai_spiritual='+nilai,
        success:function(html){
            //$("#dataSiswa").html(html);
        }
    })
}
    
    function updateNilaiSosial(nisn){
var nilai = $("#nilai_sosial"+nisn).val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_nilai_sosial',
        data:'nisn='+nisn+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai_sosial='+nilai,
        success:function(html){
            //$("#dataSiswa").html(html);
        }
    })
}
    
function updateNilaiKeterampilan(nisn){
var nilai = $("#nilai_keterampilan"+nisn).val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_nilai_keterampilan',
        data:'nisn='+nisn+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai_keterampilan='+nilai,
        success:function(html){
            //$("#dataSiswa").html(html);
        }
    })
}
    
function updateDeskripsiPengetahuan(id_deskripsi){
var deskripsi_pengetahuan = $("#deskripsi_pengetahuan").val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_deskripsi_pengetahuan',
        data:'id_deskripsi='+id_deskripsi+'&deskripsi_pengetahuan='+deskripsi_pengetahuan,
        success:function(html){

        }
    })
}
    
    function updateNilai(id_deskripsi){
var deskripsi_pengetahuan = $("#deskripsi_pengetahuan").val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_deskripsi_pengetahuan',
        data:'id_deskripsi='+id_deskripsi+'&deskripsi_pengetahuan='+deskripsi_pengetahuan,
        success:function(html){

        }
    })
}
    
function updateDeskripsiSpiritual(id_deskripsi){
var deskripsi_spiritual = $("#deskripsi_spiritual").val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_deskripsi_spiritual',
        data:'id_deskripsi='+id_deskripsi+'&deskripsi_spiritual='+deskripsi_spiritual,
        success:function(html){

        }
    })
}
    
    function updateDeskripsiSosial(id_deskripsi){
var deskripsi_sosial = $("#deskripsi_sosial").val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_deskripsi_sosial',
        data:'id_deskripsi='+id_deskripsi+'&deskripsi_sosial='+deskripsi_sosial,
        success:function(html){

        }
    })
}
    
    function updateDeskripsiKeterampilan(id_deskripsi){
var deskripsi_keterampilan = $("#deskripsi_keterampilan").val();

$.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>index.php/nilai/update_deskripsi_keterampilan',
        data:'id_deskripsi='+id_deskripsi+'&deskripsi_keterampilan='+deskripsi_keterampilan,
        success:function(html){

        }
    })
}

</script>

