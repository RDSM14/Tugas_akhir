<?php
class Nilai extends CI_Controller{
    
    
    function index(){
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        if($this->session->userdata('id_level_user')==4||$this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $sql = "SELECT tj.id_rombel,tj.id_jadwal as id_jadwal,tj.kelas,tm.nama_mapel,tm.id_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tb.nama_rombel
                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_rombel as tb
                    WHERE tj.id_mapel=tm.id_mapel and tj.id_ruangan=tr.id_ruangan and tb.id_rombel=tj.id_rombel and tj.username_guru='".$_SESSION['username']."'";
        $data['jadwal'] = $this->db->query($sql); 
        $this->template->load('template','nilai/list_kelas',$data);
            
        }elseif($this->session->userdata('id_level_user')==6||$this->session->userdata('id_level_user')==7){
            // load daftar jadwal siswa
            
        }            // load daftar ngajar guru
        else{
            echo "NULL";
        }
    }
    
    
    function rombel(){
        $id_jadwal      = $this->uri->segment(3);
        $id_mapel      = $this->uri->segment(4);
        $jadwal         = $this->db->get_where('tbl_jadwal',array('id_jadwal'=>$id_jadwal))->row_array();
        $id_rombel      = $jadwal['id_rombel'];
        /*$rombel         =   "SELECT rb.nama_rombel,rb.kelas,jr.nama_jurusan, mp.nama_mapel
                            FROM tbl_jadwal AS j,tbl_jurusan as jr, tbl_rombel as rb,tbl_mapel as mp
                            WHERE j.kd_jurusan=jr.kd_jurusan and rb.id_rombel=j.id_rombel and mp.kd_mapel=j.kd_mapel 
                            and j.id_jadwal=13='$id_rombel'";*/
        $rombel         = "SELECT *,tbl_mapel.id_mapel as id_mapel FROM tbl_jadwal,tbl_rombel,tbl_siswa,tbl_mapel WHERE                              tbl_jadwal.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_rombel=tbl_siswa.id_rombel AND id_jadwal='$id_jadwal' AND tbl_mapel.id_mapel='$id_mapel'";
        $siswa          =   "SELECT s.nama,s.nisn
                            FROM tbl_history_kelas as hk,tbl_siswa as s
                            WHERE hk.nisn=s.nisn ";
        
        $deskripsi      =   "SELECT * FROM tbl_deskripsi_nilai tdn, tbl_nilai tn WHERE tdn.id_mapel = tn.id_mapel";
        
        $komponen_nilai =   "SELECT DISTINCT * FROM tbl_komponen_nilai tkn, tbl_mapel tm WHERE tkn.id_mapel= tm.id_mapel AND tm.id_mapel='$id_mapel'";
        
        $nilai          =   "SELECT * FROM tbl_nilai tn ";
               
        $data['rombel'] =   $this->db->query($rombel)->row_array();
        $data['siswa']  =   $this->db->query($siswa)->result();
        $data['deskripsi']  =   $this->db->query($deskripsi)->result();
        $data['komponen_nilai']  =   $this->db->query($komponen_nilai)->result();
        $data['nilai']  =   $this->db->query($nilai)->result();
        $this->template->load('template','nilai/form_nilai',$data);
    }
    
    function update_nilai(){
        $nisn        = $_GET['nisn'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai_pengetahuan      = $_GET['nilai'];
        
        // parameter
        $params = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal,'nilai_pengetahuan'=>$nilai_pengetahuan);
        
        $validasi = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal);
        $chek = $this->db->get_where('tbl_nilai',$validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('nisn',$nisn);
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('tbl_nilai',array('nilai_pengetahuan'=>$nilai_pengetahuan));
        }else{
            // proses insert
            $this->db->insert('tbl_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
    function update_nilai_spiritual(){
        $nisn        = $_GET['nisn'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai_spiritual      = $_GET['nilai_spiritual'];
        
        // parameter
        $params = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal,'nilai_spiritual'=>$nilai_spiritual);
        
        $validasi = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal);
        $chek = $this->db->get_where('tbl_nilai',$validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('nisn',$nisn);
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('tbl_nilai',array('nilai_spiritual'=>$nilai_spiritual));
        }else{
            // proses insert
            $this->db->insert('tbl_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
    function update_nilai_sosial(){
        $nisn        = $_GET['nisn'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai_sosial      = $_GET['nilai_sosial'];
        
        // parameter
        $params = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal,'nilai_sosial'=>$nilai_spiritual);
        
        $validasi = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal);
        $chek = $this->db->get_where('tbl_nilai',$validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('nisn',$nisn);
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('tbl_nilai',array('nilai_sosial'=>$nilai_sosial));
        }else{
            // proses insert
            $this->db->insert('tbl_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
    function update_nilai_keterampilan(){
        $nisn        = $_GET['nisn'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai_keterampilan      = $_GET['nilai_keterampilan'];
        
        // parameter
        $params = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal,'nilai_keterampilan'=>$nilai_keterampilan);
        
        $validasi = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal);
        $chek = $this->db->get_where('tbl_nilai',$validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('nisn',$nisn);
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('tbl_nilai',array('nilai_keterampilan'=>$nilai_keterampilan));
        }else{
            // proses insert
            $this->db->insert('tbl_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
     function update_deskripsi_pengetahuan(){
        $id_deskripsi = $_GET['id_deskripsi'];
        $deskripsi_pengetahuan = $_GET['deskripsi_pengetahuan'];
        
        // parameter
        $params = array('id_deskripsi'=>$id_deskripsi,'deskripsi_pengetahuan'=>$deskripsi_pengetahuan);
        
        $validasi = array('id_deskripsi'=>$id_deskripsi);
        $chek = $this->db->get_where('tbl_deskripsi_nilai', $validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('id_deskripsi', $id_deskripsi);
            $this->db->update('tbl_deskripsi_nilai', array('deskripsi_pengetahuan'=> $deskripsi_pengetahuan));
        }else{
            // proses insert
            $this->db->insert('tbl_deskripsi_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
     function update_deskripsi_spiritual(){
        $id_deskripsi = $_GET['id_deskripsi'];
        $deskripsi_spiritual = $_GET['deskripsi_spiritual'];
        
        // parameter
        $params = array('id_deskripsi'=>$id_deskripsi,'deskripsi_spiritual'=>$deskripsi_spiritual);
        
        $validasi = array('id_deskripsi'=>$id_deskripsi);
        $chek = $this->db->get_where('tbl_deskripsi_nilai', $validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('id_deskripsi', $id_deskripsi);
            $this->db->update('tbl_deskripsi_nilai', array('deskripsi_spiritual'=> $deskripsi_spiritual));
        }else{
            // proses insert
            $this->db->insert('tbl_deskripsi_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
     function update_deskripsi_sosial(){
        $id_deskripsi = $_GET['id_deskripsi'];
        $deskripsi_sosial = $_GET['deskripsi_sosial'];
        
        // parameter
        $params = array('id_deskripsi'=>$id_deskripsi,'deskripsi_sosial'=>$deskripsi_sosial);
        
        $validasi = array('id_deskripsi'=>$id_deskripsi);
        $chek = $this->db->get_where('tbl_deskripsi_nilai', $validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('id_deskripsi', $id_deskripsi);
            $this->db->update('tbl_deskripsi_nilai', array('deskripsi_sosial'=> $deskripsi_sosial));
        }else{
            // proses insert
            $this->db->insert('tbl_deskripsi_nilai',$params);
            echo "data sudah masuk";
        }
    }
    
    function update_deskripsi_keterampilan(){
        $id_deskripsi = $_GET['id_deskripsi'];
        $deskripsi_keterampilan = $_GET['deskripsi_keterampilan'];
        
        // parameter
        $params = array('id_deskripsi'=>$id_deskripsi,'deskripsi_sosial'=>$deskripsi_keterampilanl);
        
        $validasi = array('id_deskripsi'=>$id_deskripsi);
        $chek = $this->db->get_where('tbl_deskripsi_nilai', $validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('id_deskripsi', $id_deskripsi);
            $this->db->update('tbl_deskripsi_nilai', array('deskripsi_keterampilan'=> $deskripsi_keterampilan));
        }else{
            // proses insert
            $this->db->insert('tbl_deskripsi_nilai',$params);
            echo "data sudah masuk";
        }
    }
}