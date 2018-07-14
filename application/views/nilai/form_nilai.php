<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td>  <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td>   <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        <tr><td>KELAS</td><td>  ROMBONGAN BELAJAR <?php echo $rombel['kelas']?> ( <?php echo $rombel['nama_rombel']?> )</td></tr>
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
                <tr><th>NISN</th><th>NAMA</th><th>NILAI PENGETAHUAN</th><th>NILAI KETERAMPILAN</th><th>NILAI SPIRITUAL</th><th>NILAI SOSIAL</th></tr>
                <?php foreach ($siswa as $row){
                    
                    echo "<tr>  <td width='100'>$row->nisn</td>
                                <td>".  strtoupper($row->nama)."</td>
                                <td width='50'><input type='float' onKeyup='updateNilai(\"$row->nisn\")' id='nilai_pengetahuan".$row->nisn."' value='".$row->nilai_pengetahuan."' class='form-control'></td>
                                <td width='50'><input type='float' onKeyup='updateNilai(\"$row->nisn\")' id='nilai_pengetahuan".$row->nisn."' value='".$row->nilai_keterampilan."' class='form-control'></td>
                                <td width='300'><input type='textarea' onKeyup='updateNilai(\"$row->nisn\")' id='nilai_pengetahuan".$row->nisn."' value='".$row->nilai_spiritual."' class='form-control'></td>
                                <td width='300'><input type='textarea' onKeyup='updateNilai(\"$row->nisn\")' id='nilai_pengetahuan".$row->nisn."' value='".$row->nilai_sosial."' class='form-control'></td>
                                </tr>";
                }
?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<script type="text/javascript">

function updateNilai(nisn){
    var nilai = $("#nilai_pengetahuan"+nisn).val();
    $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/nilai/update_nilai',
            data:'nisn='+nisn+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai_pengetahuan='+nilai,
            success:function(html){
                //$("#dataSiswa").html(html);
            }
        })
}

</script>