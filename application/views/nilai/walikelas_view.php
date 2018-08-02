<?php //echo $this->session->userdata('id_rombel');?>

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
                <tr><th>NO</th><th>NISN</th><th>NOMOR INDUK</th><th>NAMA</th><th>ALAMAT</th><th>LIHAT NILAI</th>
                <?php
                $no=1;;
                foreach ($jadwal_siswa->result() as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>$row->nisn</td>
                        <td>$row->nim</td>
                        <td>$row->nama</td>
                        <td>$row->alamat_siswa</td>
                        <td>".anchor('nilai_siswa/waliLihatNilaiSiswa/'.$row->nisn."/". $row->id_rombel."/". get_tahun_akademik_aktif('id_tahun_akademik'),'<i class="fa fa-eye" aria-hidden="true"></i>',"title='Lihat Kelas'")."</td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
