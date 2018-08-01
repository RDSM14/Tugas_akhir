<?php
class Nilai extends CI_Controller{
    
    
    function index(){
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
        if($this->session->userdata('id_level_user')==4||$this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $sql = "SELECT tj.id_rombel,tj.id_jadwal as id_jadwal,tm.nama_mapel,tm.id_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tb.nama_rombel
                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_rombel as tb
                    WHERE tj.id_mapel=tm.id_mapel and tj.id_ruangan=tr.id_ruangan and tb.id_rombel=tj.id_rombel and tj.username_guru='".$_SESSION['username']."' AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."'";
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','nilai/list_kelas',$data);
            
        }elseif($this->session->userdata('id_level_user')==6||$this->session->userdata('id_level_user')==7){
             $sql = "SELECT  tj.id_mapel,tj.id_jadwal,tm.nama_mapel,tj.jam_mulai,tj.jam_selesai,tr.nama_ruangan,tj.hari,tj.semester,tj.id_rombel,gr.nama_guru,tl.nama_rombel                    FROM tbl_jadwal as tj,tbl_ruangan as tr,tbl_mapel as tm,tbl_guru as gr,tbl_rombel as tl
                    WHERE tj.id_mapel=tm.id_mapel and tl.id_rombel=tj.id_rombel and tj.id_ruangan=tr.id_ruangan and tj.username_guru=gr.username AND tj.id_tahun_akademik = '".get_tahun_akademik_aktif('id_tahun_akademik')."' AND tj.id_rombel=".$this->session->userdata('id_rombel');
            $data['jadwal'] = $this->db->query($sql); 
            $this->template->load('template','nilai/view_nilai_sortu',$data);
            
        }            
        else{
            $id_sekolah = $_SESSION['id_sekolah'];
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template','nilai/list_jadwal',$data);
        }
    }
    
    
    function rombel(){
        $id_jadwal      = $this->uri->segment(3);
        $id_mapel       = $this->uri->segment(4);
        $id_ta          = $this->uri->segment(5);
        $jadwal         = $this->db->get_where('tbl_jadwal',array('id_jadwal'=>$id_jadwal))->row_array();
        $id_rombel      = $jadwal['id_rombel'];
        /*$rombel         =   "SELECT rb.nama_rombel,rb.kelas,jr.nama_jurusan, mp.nama_mapel
                            FROM tbl_jadwal AS j,tbl_jurusan as jr, tbl_rombel as rb,tbl_mapel as mp
                            WHERE j.kd_jurusan=jr.kd_jurusan and rb.id_rombel=j.id_rombel and mp.kd_mapel=j.kd_mapel 
                            and j.id_jadwal=13='$id_rombel'";*/
        $rombel         = "SELECT DISTINCT *,tbl_mapel.id_mapel as id_mapel FROM tbl_history_kelas,tbl_jadwal,tbl_rombel,tbl_siswa,tbl_mapel WHERE tbl_jadwal.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_rombel=tbl_siswa.id_rombel AND id_jadwal='$id_jadwal' AND tbl_mapel.id_mapel='$id_mapel' AND tbl_siswa.nisn=tbl_history_kelas.nisn AND tbl_history_kelas.id_tahun_akademik='$id_ta'";
        $siswa          =   "SELECT DISTINCT *,tbl_mapel.id_mapel as id_mapel FROM tbl_history_kelas,tbl_jadwal,tbl_rombel,tbl_siswa,tbl_mapel WHERE tbl_jadwal.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_rombel=tbl_siswa.id_rombel AND id_jadwal='$id_jadwal' AND tbl_mapel.id_mapel='$id_mapel' AND tbl_siswa.nisn=tbl_history_kelas.nisn AND tbl_history_kelas.id_tahun_akademik='$id_ta'";
        
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
    
    
    ///////////
    
    function inputNilai($nisn, $id_mapel){
      
        $komponen_nilai =   "SELECT * FROM tbl_nilai as t1
            RIGHT JOIN tbl_komponen_nilai as t2 ON t1.id_komponen = t2.id_komponen
            WHERE t1.id_komponen IS NULL AND t2.id_mapel ='$id_mapel'";


        
        /*SELECT * FROM tbl_nilai as t1
RIGHT JOIN tbl_komponen_nilai as t2 ON t1.id_komponen = t2.id_komponen
WHERE t1.id_komponen IS NULL AND t2.id_mapel = 5 AND IF (nisn = 456789011, 1, 0) = 0*/
        //$nilai          =   "SELECT * FROM tbl_nilai,tbl_komponen_nilai WHERE nisn = '$nisn' AND tbl_nilai.id_mapel = '$id_mapel' AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen ";
        
        

        //$nilai = "SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn WHERE  nisn = '$nisn' AND tkn.id_mapel = '$id_mapel' AND tn.id_mapel='$id_mapel'";
        
        //$data['nilai']  =   $this->db->query($nilai)->result();
        $data['komponen_nilai']  =   $this->db->query($komponen_nilai)->result();
        $mapel = "SELECT nama_mapel FROM tbl_mapel WHERE id_mapel = '$id_mapel'";
        $data['mapel']  =   $this->db->query($mapel)->result();
       
        $this->template->load('template','nilai/update_nilai', $data);
   }
    
    function lihatNilaiSiswa($id_jadwal, $id_mapel){
      
        //$komponen_nilai =   "SELECT DISTINCT * FROM tbl_komponen_nilai tkn, tbl_mapel tm WHERE tkn.id_mapel= tm.id_mapel AND tm.id_mapel='$id_mapel'";
            
        //$nilai          =   "SELECT * FROM tbl_nilai,tbl_komponen_nilai WHERE nisn = '$nisn' AND tbl_nilai.id_mapel = '$id_mapel' AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen ";
        $nisn = $_SESSION['username'];
        $nilai = "SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn WHERE  nisn = '$nisn' AND tn.id_mapel = '$id_mapel' AND tkn.id_komponen=tn.id_komponen ORDER BY tn.id_komponen ASC";
        $mapel = "SELECT nama_mapel FROM tbl_mapel WHERE id_mapel = '$id_mapel'";
        $deskripsi      =   "SELECT deskripsi_pengetahuan,deskripsi_spiritual,deskripsi_keterampilan,deskripsi_sosial FROM tbl_deskripsi_nilai tdn WHERE tdn.nisn = '$nisn' AND tdn.id_mapel = '$id_mapel'";
        
        //$result = $query->row();
        $data['nilai']  =   $this->db->query($nilai)->result();
        $data['deskripsi']  =   $this->db->query($deskripsi)->result();
        $data['mapel']  =   $this->db->query($mapel)->result();
       

        $this->template->load('template','nilai/siswa_see', $data);
   }
    
    
    
    
    
    function lihatNilai($nisn, $id_mapel){
      
        //$komponen_nilai =   "SELECT DISTINCT * FROM tbl_komponen_nilai tkn, tbl_mapel tm WHERE tkn.id_mapel= tm.id_mapel AND tm.id_mapel='$id_mapel'";
            
        //$nilai          =   "SELECT * FROM tbl_nilai,tbl_komponen_nilai WHERE nisn = '$nisn' AND tbl_nilai.id_mapel = '$id_mapel' AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen ";

        $nilai = "SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn WHERE  nisn = '$nisn' AND tn.id_mapel = '$id_mapel' AND tkn.id_komponen=tn.id_komponen";
        $mapel = "SELECT nama_mapel FROM tbl_mapel WHERE id_mapel = '$id_mapel'";
        $deskripsi      =   "SELECT deskripsi_pengetahuan,deskripsi_spiritual,deskripsi_keterampilan,deskripsi_sosial FROM tbl_deskripsi_nilai tdn WHERE tdn.nisn = '$nisn' AND tdn.id_mapel = '$id_mapel'";
        
        //$result = $query->row();
        $data['nilai']  =   $this->db->query($nilai)->result();
        $data['deskripsi']  =   $this->db->query($deskripsi)->result();
        $data['mapel']  =   $this->db->query($mapel)->result();
       

        $this->template->load('template','nilai/see_nilai', $data);
   }
    function deskripsiNilai($nisn, $id_mapel){
      
        //$komponen_nilai =   "SELECT DISTINCT * FROM tbl_komponen_nilai tkn, tbl_mapel tm WHERE tkn.id_mapel= tm.id_mapel AND tm.id_mapel='$id_mapel'";
            
        //$nilai          =   "SELECT * FROM tbl_nilai,tbl_komponen_nilai WHERE nisn = '$nisn' AND tbl_nilai.id_mapel = '$id_mapel' AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen ";

        $nilai = "SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn WHERE  nisn = '$nisn' AND tn.id_mapel = '$id_mapel' AND tkn.id_komponen=tn.id_komponen";
        $mapel = "SELECT nama_mapel FROM tbl_mapel WHERE id_mapel = '$id_mapel'";
        $deskripsi      =   "SELECT id_deskripsi,deskripsi_pengetahuan,deskripsi_spiritual,deskripsi_keterampilan,deskripsi_sosial FROM tbl_deskripsi_nilai tdn WHERE tdn.nisn = '$nisn' AND tdn.id_mapel = '$id_mapel'";
        
        //$result = $query->row();
        $data['nilai']  =   $this->db->query($nilai)->result();
        $data['deskripsi']  =   $this->db->query($deskripsi)->result();
        $data['mapel']  =   $this->db->query($mapel)->result();
       

        $this->template->load('template','nilai/deskripsi_nilai', $data);
   }
    
   	function getDataDeskripsi(){
        $nisn = $this->input->post('nisn');
        $mapel = $this->input->post('mapel');
        $query = $this->db->query("SELECT * FROM tbl_deskripsi_nilai WHERE nisn = '$nisn' AND id_mapel = '$mapel'");
        $data = $query->result();

        echo json_encode(['data'=>$data]);
   	}

    function getDataKomponen(){
        $mapel = $this->input->post('mapel');
        $query = $this->db->query("SELECT * FROM tbl_komponen_nilai WHERE id_mapel = '$mapel'");
        $data = $query->result();

        echo json_encode(['data'=>$data]);
    }

    function getDataNilai(){
        $nisn = $this->input->post('nisn');
        $mapel = $this->input->post('mapel');
        $komponen = $this->input->post('id_komponen');
        $data = "";
        if (!empty($nisn)) {
            $query = $this->db->query("SELECT * FROM tbl_komponen_nilai tkn, tbl_nilai tn 
                WHERE nisn = '$nisn' 
                AND tn.id_mapel = '$mapel'
                AND tn.id_komponen = '$komponen'
                AND tkn.id_komponen=tn.id_komponen");
            $data =  $query->result();
        }
        echo json_encode(['data'=>$data]);
    }

    function submitNilai(){
        $nisn = $this->input->post('nisn');
        $mapel = $this->input->post('mapel');
        $komponen = $this->input->post('id_komponen');
        $nilai = $this->input->post('nilai');
        $jadwal = $this->input->post('jadwal');

        $hasil = "";
        $message = "";

        if(is_numeric($nilai) && $nilai != ""){
            $query = $this->db->query("SELECT * FROM tbl_nilai 
                WHERE nisn = '$nisn' 
                AND id_mapel = '$mapel'
                AND id_komponen = '$komponen'
                AND id_jadwal = '$jadwal' ");

            if($query->num_rows() > 0){ // if true maka edit
                $id_nilai = $query->row()->id_nilai;
                $query = $this->db->query("UPDATE tbl_nilai SET skor = '$nilai' WHERE id_nilai = '$id_nilai'");
                $hasil = $query;
                $message = "Update nilai berhasil";
            } else { // else submit baru
                $query = $this->db->query("INSERT INTO tbl_nilai (id_jadwal,id_mapel,nisn,id_komponen,skor) VALUES ('$jadwal','$mapel','$nisn','$komponen','$nilai') ");
                $hasil = $query;
                $message = "Input nilai berhasil";
            }
        } else {
            $hasil = false;
            $message = "Kolom nilai harus diisi";
        }

        echo json_encode(['hasil'=>$hasil,'message'=>$message]);
    }

    function submitDeskripsi(){
        $nisn = $this->input->post('nisn');
        $mapel = $this->input->post('mapel');
        $spiritual = $this->input->post('spiritual');
        $sosial = $this->input->post('sosial');
        $pengetahuan = $this->input->post('pengetahuan');
        $keterampilan = $this->input->post('keterampilan');

        $hasil = "";
        $message = "";
        if($spiritual != "" && $sosial != "" && $pengetahuan != "" && $keterampilan != ""){
        	$query = $this->db->query("SELECT * FROM tbl_deskripsi_nilai 
                WHERE nisn = '$nisn' 
                AND id_mapel = '$mapel'");

        	if($query->num_rows() > 0){ // if true maka edit
                $id_deskripsi = $query->row()->id_deskripsi;
                $query = $this->db->query("UPDATE tbl_deskripsi_nilai SET 
                	deskripsi_spiritual = '$spiritual',
                	deskripsi_sosial = '$sosial',
                	deskripsi_pengetahuan = '$pengetahuan',
                	deskripsi_keterampilan = '$keterampilan'
                	WHERE id_deskripsi = '$id_deskripsi'");
                $hasil = $query;
                $message = "Update deskripsi berhasil";
            } else { // else submit baru
                $query = $this->db->query("INSERT INTO 
                	tbl_deskripsi_nilai (nisn,id_mapel,deskripsi_pengetahuan,deskripsi_keterampilan,deskripsi_spiritual,deskripsi_sosial) 
                	VALUES ('$nisn','$mapel','$pengetahuan','$keterampilan','$spiritual','$sosial') ");
                $hasil = $query;
                $message = "Input deskripsi berhasil";
            }

        } else {
            $hasil = false;
            $message = "Semua kolom harus diisi";
        }

        echo json_encode(['hasil'=>$hasil,'message'=>$message]);
    }
    
    function masuk()
    {
       $id_komponen = $this->input->post('id_komponen');
        //echo  count($id_komponen);
       $nilai = $this->input->post('nilai');
        //echo  count($nilai)."/";
       $id_mapel = $this->input->post('id_mapel');
        //echo  $id_mapel."/";
       $id_jadwal = $this->input->post('id_jadwal');
       //echo  $id_jadwal."/";
       $nisn = $this->input->post('nisn');
       //echo  $nisn."/";
        
        for($k=0 ; $k < count($id_komponen) ; $k++)
        {   
            // $id_mapel = $this->input->post('id_mapel');
              echo  $k."=pengulangan/ ";
              echo  $id_mapel."=id_mapel/ ";
             //$id_jadwal = $this->input->post('id_jadwal');
             echo  $id_jadwal."=id_jadwal/ ";
             //$nisn = $this->input->post('nisn');
             echo  $nisn."=nisn/ ";
             echo $id_komponen[$k]."=id_komponen/ ";
            
            if (($nilai[$k] != "")||($nilai[$k] != NULL))
            {
                $parameter = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal, 'id_mapel'=>$id_mapel,'skor'=>$nilai[$k], 'id_komponen'=>$id_komponen[$k]);            
                     
            }
            
            $val = array('nisn'=>$nisn,'id_jadwal'=>$id_jadwal, 'id_mapel'=>$id_mapel, 'id_komponen'=>$id_komponen[$k]);
            //print_r $validasi.'/';
            $chek = $this->db->get_where('tbl_nilai',$val);
            echo $chek->num_rows()."= ada apa nggak table? /";
                
            if($chek->num_rows()>0){
                    $this->db->where('id_komponen', $id_komponen[$k]);
                    $this->db->where('id_mapel', $id_mapel);
                    $this->db->where('id_jadwal', $id_jadwal);
                    $this->db->where('nisn', $nisn);
                    if (($nilai[$k]!="")||($nilai[$k]!=NULL)){
                        //$this->db->update('tbl_nilai', array('skor' => $nilai[$i]));    
                    }
                    
                    echo "               ++             nilai ada   <br> ";
                
            }
           else
            {   if (($nilai[$k]!="")||($nilai[$k]!=NULL)){
                        //echo count($nilai[$k])."/";
              //      $this->db->insert('tbl_nilai',$parameter);
                }
                
                    
                echo "                  --             nilai gak ada ";
            }
            
        }
        
        
    }
    
    
    function deskripsi(){
        $id_deskripsi = $this->input->post('id_deskripsi');
        $id_mapel = $this->input->post('id_mapel');
        $nisn = $this->input->post('nisn');
        $deskripsi_spiritual = $this->input->post('deskripsi_spiritual');
        $deskripsi_sosial = $this->input->post('deskripsi_sosial');
        $deskripsi_pengetahuan = $this->input->post('deskripsi_pengetahuan');
        $deskripsi_keterampilan = $this->input->post('deskripsi_keterampilan');
        $parameters_update = array('nisn'=>$nisn,'id_deskripsi'=>$id_deskripsi,'id_mapel'=>$id_mapel,'deskripsi_spiritual'=>$deskripsi_spiritual,'deskripsi_sosial'=>$deskripsi_sosial,'deskripsi_pengetahuan'=>$deskripsi_pengetahuan,'deskripsi_keterampilan'=>$deskripsi_keterampilan);
        $parameters_insert = array('nisn'=>$nisn,'id_deskripsi'=>$id_deskripsi,'id_mapel'=>$id_mapel,'deskripsi_spiritual'=>$deskripsi_spiritual,'deskripsi_sosial'=>$deskripsi_sosial,'deskripsi_pengetahuan'=>$deskripsi_pengetahuan,'deskripsi_keterampilan'=>$deskripsi_keterampilan);
        
       if(($id_deskripsi!='')||($id_deskripsi!=NULL)){
            // proses update
           
            $this->db->where('id_deskripsi',$id_deskripsi);
            $this->db->update('tbl_deskripsi_nilai',$parameters_update);
        }else{
            // proses insert
            $this->db->insert('tbl_deskripsi_nilai',$parameters_insert);
            
        }
        $this->session->set_flashdata('data_deskripsi', 'Data');
        redirect('nilai');
    }
    
    //////////
    
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
    
    function dataJadwalNilai(){
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
        
        $sql = "SELECT  tj.id_mapel,tj.hari,tj.id_jadwal,tm.nama_mapel,tg.username,tg.nama_guru,tr.nama_ruangan,tj.hari,tj.jam_mulai,tj.jam_selesai
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
                 <td>".anchor('nilai/rombel/'.$row->id_jadwal."/". $row->id_mapel."/". get_tahun_akademik_aktif('id_tahun_akademik'),'<i class="fa fa-eye" aria-hidden="true"></i>',"title='Lihat Kelas'")."</td></tr>";
            $no++;
        }
        
        echo"</table>";
    }
}