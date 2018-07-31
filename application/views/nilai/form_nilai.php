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
                <tr><th>NIS</th><th>NAMA</th><th></th><th></th><th></th>
                <?php foreach ($siswa as $row){
                    //href='nilai/rombel/'".$row->nisn.'/'.$row->nisn." 
                    /*echo "<tr>  <td width='140'>$row->nisn</td>
                                <td>".  strtoupper($row->nama)."</td>
                                <td width='150'><a class='btn btn-success' href='". base_url('index.php/nilai/inputNilai/'.$row->nisn.'/'.$this->uri->segment(4)).'/'.$this->uri->segment(3).'/'.$row->nama."'>Masukkan Nilai Angka</td>
                                <td width='150'><a class='btn btn-success' href='". base_url('index.php/nilai/lihatNilai/'.$row->nisn.'/'.$this->uri->segment(4)).'/'.$this->uri->segment(3).'/'.$row->nama."'>Lihat Nilai Siswa</td>
                                <td width='150'><a class='btn btn-success' href='". base_url('index.php/nilai/deskripsiNilai/'.$row->nisn.'/'.$this->uri->segment(4)).'/'.$this->uri->segment(3).'/'.$row->nama."'>Deskripsi Nilai</td>
                                
                                </tr>";*/
                    echo "<tr>  <td width='140'>$row->nisn</td>
                                <td>".  strtoupper($row->nama)."</td>
                                 <td width='150'><a class='btn btn-success' href='". base_url('index.php/nilai/inputNilai/'.$row->nisn.'/'.$this->uri->segment(4)).'/'.$this->uri->segment(3).'/'.$row->nama."'>Masukkan Komponen Nilai</td>
                                <td width='150'><a class='btn btn-success' href='". base_url('index.php/nilai/deskripsiNilai/'.$row->nisn.'/'.$this->uri->segment(4)).'/'.$this->uri->segment(3).'/'.$row->nama."'>Deskripsi Nilai</td>
                                
                                </tr>";
                }
?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
    <script type="text/javascript">
        $(document).on("click", ".btn", function () {
             var nisn = $(this).data('id'); 
             var mapel = $(this).data('mapel'); 
                 $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() ?>index.php/nilai/getData',
                 data: { 'nisn':nisn,'mapel':mapel},
                 success: function(response) {
                     alert(nisn);
                     console.log(mapel);
                    $('#result').html(response);
                 }
             });
        });
    </script>
    <script type="text/javascript">
       /* $(document).on("click", ".btn", function () 
        {
        e.preventDefault();
           var nisn = $(this).data('id');
           var id_mapel = $(this).data('mapel');
            
           $.ajax({
                type:'GET',
                url :'<?php echo base_url() ?>index.php/nilai/getData',
                data:'nisn='+nisn+'&id_mapel='+id_mapel,
                success:function(resp){
                    console.log(nisn);
                }
            });
        });*/
    </script>
</div>

<p id="result"></p>


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

<?php /* LAMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
<div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<?php  foreach ($komponen_nilai as $komponen_nilai){
    
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
*/?>

<!--END OF MODAL-->

<div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar_edit" id="kode_barang2" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar_edit" id="nama_barang2" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harga_edit" id="harga2" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

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

    
    
    
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/getData')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(barang_kode, barang_nama, barang_harga){
                        $('#ModalaEdit').modal('show');
                        $('[name="kobar_edit"]').val(data.barang_kode);
                        $('[name="nabar_edit"]').val(data.barang_nama);
                        $('[name="harga_edit"]').val(data.barang_harga);
                    });
                }
            });
            return false;
        });
</script>

