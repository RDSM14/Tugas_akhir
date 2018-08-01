<?php //echo $this->session->userdata('id_rombel');?>

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        <tr><td>NISN</td><td> :  <?php echo $this->uri->segment(3) ?></td></tr>
        <tr><td>NAMA SISWA</td><td> :  <?php foreach ($siswa as $murid){echo $murid->nama; }?></td></tr>
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
                <tr><th>NO</th><th>KELAS</th><th>MATAPELAJARAN</th><th>HARI</th><th>JAM MULAI</th><th>JAM SELESAI</th><th>RUANG</th><th>GURU</th><th>LIHAT NILAI</th></tr>
                <?php
                $no=1;;
                foreach ($jadwal->result() as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>KELAS $row->nama_rombel</td>
                        <td>$row->nama_mapel</td>
                        <td>$row->hari</td>
                        <td>$row->jam_mulai</td>
                        <td>$row->jam_selesai</td>
                        <td>$row->nama_ruangan</td>
                        <td>$row->nama_guru</td>
                        <td>".anchor('nilai_siswa/waliDetailNilaiSiswa/'.$row->id_jadwal."/". $row->id_mapel."/". get_tahun_akademik_aktif('id_tahun_akademik')."/". $this->uri->segment(3),'<i class="fa fa-eye" aria-hidden="true"></i>',"title='Lihat Kelas'")."</td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
