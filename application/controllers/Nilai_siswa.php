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
            $sqli = "SELECT * FROM tbl_siswa,tbl_walikelas WHERE tbl_siswa.id_rombel=tbl_walikelas.id_rombel AND tbl_walikelas.username_guru='".$_SESSION['username']."'";
            $data['jadwal_siswa'] = $this->db->query($sqli); 
            $this->template->load('template','nilai/walikelas_view',$data);
        }elseif($this->session->userdata('id_level_user')==6 || $this->session->userdata('id_level_user')==7){
            // load daftar jadwal siswa
           echo 'Page Untuk WaliKelas';
        }else{
            $id_sekolah = $_SESSION['id_sekolah'];
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template','nilai/list_jadwal_nilai',$data);
        }
    }
    function waliLihatNilaiSiswa($nisn, $id_rombel){
      
        
        $sqli = "SELECT  tj.id_mapel,tj.id_jadwal,tm.nama_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tj.id_rombel,gr.nama_guru,tl.nama_rombel                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_guru as gr,tbl_rombel as tl
                    WHERE tj.id_mapel=tm.id_mapel and tl.id_rombel=tj.id_rombel and tj.id_ruangan=tr.id_ruangan and tj.username_guru=gr.username AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."' AND tj.id_rombel=".$id_rombel;
        
        $siswa = "SELECT nama FROM tbl_siswa WHERE nisn= $nisn";
        $data['jadwal'] = $this->db->query($sqli); 
        $data['siswa'] = $this->db->query($siswa)->result();
        $this->template->load('template','nilai/wali_view_nilai_sortu',$data);

        //$this->template->load('template','nilai/siswa_see', $data);
   }
    function waliDetailNilaiSiswa($id_jadwal, $id_mapel,$nisn){
      
        //$komponen_nilai =   "SELECT DISTINCT * FROM tbl_komponen_nilai tkn, tbl_mapel tm WHERE tkn.id_mapel= tm.id_mapel AND tm.id_mapel='$id_mapel'";
            
        //$nilai          =   "SELECT * FROM tbl_nilai,tbl_komponen_nilai WHERE nisn = '$nisn' AND tbl_nilai.id_mapel = '$id_mapel' AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen ";
        $nisn = $this->uri->segment(6);
        $nilai = "SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn WHERE  nisn = '$nisn' AND tn.id_mapel = '$id_mapel' AND tkn.id_komponen=tn.id_komponen ORDER BY tn.id_komponen ASC";
        $mapel = "SELECT nama_mapel FROM tbl_mapel WHERE id_mapel = '$id_mapel'";
        $deskripsi      =   "SELECT deskripsi_pengetahuan,deskripsi_spiritual,deskripsi_keterampilan,deskripsi_sosial FROM tbl_deskripsi_nilai tdn WHERE tdn.nisn = '$nisn' AND tdn.id_mapel = '$id_mapel'";
        
        //$result = $query->row();
        
        $viewnisn = "SELECT nisn FROM tbl_siswa WHERE nisn= $nisn";
        $siswa = "SELECT nama FROM tbl_siswa WHERE nisn= $nisn";
        //$total_pengetahuan   =  "SELECT SUM((skor)*porsi/100) as nilai_pengetahuan FROM tbl_nilai,tbl_komponen_nilai WHERE id_jadwal= $id_jadwal AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen AND id_jenis_nilai = 3";
        
        //$data['total_pengetahuan'] = $this->db->query($total_pengetahuan)->row_array()->nilai_pengetahuan;
        $data['viewnisn'] = $this->db->query($viewnisn)->result();
        $data['siswa'] = $this->db->query($siswa)->result();
        $data['nilai']  =   $this->db->query($nilai)->result();
        $data['deskripsi']  =   $this->db->query($deskripsi)->result();
        $data['mapel']  =   $this->db->query($mapel)->result();
       

        $this->template->load('template','nilai/wali_see', $data);
   }
    function walidataJadwalNilai(){
        $rombel         = $_GET['rombel'];
        $sqli = "SELECT * FROM tbl_siswa WHERE id_rombel='".$rombel."'";
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NISN</th>
                        <th>NOMOR INDUK</th>
                        <th>NAMA SISWA</th>
                        <th></th>
                    </tr>
                </thead>";
        $jadwal = $this->db->query($sqli)->result();
        $no=1;
        foreach ($jadwal as $row){
            echo"<tr><td>$no</td>
                <td>$row->nisn</td>
                <td>$row->nim</td>
                <td>$row->nama</td>
                 <td>".anchor('nilai_siswa/waliLihatNilaiSiswa/'.$row->nisn."/". $row->id_rombel."/". get_tahun_akademik_aktif('id_tahun_akademik'),'<i class="fa fa-eye" aria-hidden="true"></i>',"title='Lihat Kelas'")."</td></tr>";
            $no++;
        }
        echo"</table>";
    }
    
}