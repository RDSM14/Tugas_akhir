
<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Jadwal Mengajar
            <div class="panel-tools">
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>KELAS</th><th>MATAPELAJARAN</th><th>HARI</th><th>JAM MULAI</th><th>JAM SELESAI</th><th>RUANG</th></tr>
                <?php
                $no=1;;
                foreach ($jadwal->result() as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nama_rombel</td>
                        <td>$row->nama_mapel</td>
                        <td>$row->hari</td>
                        <td>$row->jam_mulai</td>
                        <td>$row->jam_selesai</td>
                        <td>$row->nama_ruangan</td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
