<?php
Class Nilai_siswa extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('Model_jadwal'));
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
    }
    
        
    function index(){
        if( $this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $username = $this->session->userdata('username');
            $sql = "SELECT tj.id_jadwal,tm.nama_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tl.nama_rombel
                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_rombel as tl
                    WHERE tj.id_mapel=tm.id_mapel and tj.id_rombel=tl.id_rombel and tj.id_ruangan=tr.id_ruangan and tj.username_guru='$username' AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."'";
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','jadwal/jadwal_ajar_guru',$data);
        }elseif($this->session->userdata('id_level_user')==6 || $this->session->userdata('id_level_user')==7){
            // load daftar jadwal siswa
            $sql = "SELECT tj.id_jadwal,tm.nama_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tj.id_rombel,gr.nama_guru,tl.nama_rombel                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_guru as gr,tbl_rombel as tl
                    WHERE tj.id_mapel=tm.id_mapel and tl.id_rombel=tj.id_rombel and tj.id_ruangan=tr.id_ruangan and tj.username_guru=gr.username AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."' AND tj.id_rombel=".$this->session->userdata('id_rombel');
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','jadwal/jadwal_ajar_siswa',$data);
        }else{
        $id_sekolah = $_SESSION['id_sekolah'];
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $this->template->load('template','jadwal/list',$data);
        }
    }
    
    function dataJadwalWali(){
        $id_sekolah     = $_SESSION['id_sekolah'];
        //$kelas          = $_GET['kelas'];
        //$id_kurikulum   = $_GET['id_kurikulum'];
        $rombel         = $_GET['rombel'];
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MATA PELAJARAN</th>
                        <th>GURU</th>
                        <th>RUANGAN</th>
                        <th>HARI</th>
                        <th>JAM MULAI</th>
                        <th>JAM SELESAI</th>
                        <th></th>
                    </tr>
                </thead>";
        
        $sql = "SELECT  tj.hari,tj.id_jadwal,tm.nama_mapel,tg.username,tg.nama_guru,tr.nama_ruangan,tj.hari,tj.jam_mulai,tj.jam_selesai
                FROM tbl_jadwal as tj, tbl_mapel as tm, tbl_ruangan as tr, tbl_guru as tg,tbl_rombel as tb
                WHERE tj.id_mapel=tm.id_mapel and tj.id_ruangan=tr.id_ruangan and tg.username=tj.username_guru and tb.id_rombel=tj.id_rombel and tj.id_rombel='$rombel' and tb.id_sekolah='$id_sekolah' AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."'";
        $jadwal = $this->db->query($sql)->result();
        $no=1;
        foreach ($jadwal as $row){
            echo"<tr><td>$no</td>
                <td>$row->nama_mapel</td>
                <td>$row->nama_guru</td>
                <td>$row->nama_ruangan</td>
                <td>$row->hari</td>
                <td>$row->jam_mulai</td>
                <td>$row->jam_selesai</td>
                <td>".anchor('jadwal/edit_jadwal/'.$row->id_jadwal,'<i class="fa fa-pencil"></i>')."                                                    ".anchor('jadwal/delete/'.$row->id_jadwal,'<i class="fa fa-trash-o"></i>')."</td></tr>";
            $no++;
        }
        
        echo"</table>";
    }
    
    
}