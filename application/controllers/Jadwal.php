<?php
Class jadwal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('Model_jadwal'));
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
    }
    
        
    function index(){
        if($this->session->userdata('id_level_user')==4 || $this->session->userdata('id_level_user')==5){
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
    
    function generate_jadwal(){
        if(isset($_POST['submit'])){
            $this->model_jadwal->generateJadwal();
        }
        redirect('jadwal');
    }
    
    function dataJadwal(){
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
    
    function show_rombel(){
        echo "<select id='rombel' name='rombel' class='form-control' onchange='loadPelajaran()'>";
        $id_sekolah = $_SESSION['id_sekolah'];
        $where  = array ('kelas'=>$_GET['kelas'],'id_sekolah'=>$id_sekolah);
        $rombel = $this->db->get_where('tbl_rombel',$where);
        foreach ($rombel->result() as $row){
            echo "<option value='$row->id_rombel'>$row->nama_rombel</option>";
        }
        echo "</select>";
    }
    
    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_jadwal->save();
            $this->session->set_flashdata('data_jadwal_masuk', 'Data Telah Disimpan');
            redirect('jadwal');
        } else {
            $data['tahun_akademik'] =  $this->Model_jadwal->tahun_akademik();
            $data['kelas'] = $this->Model_jadwal->kelas();
            $data['mapel'] = $this->Model_jadwal->mapel();
            $data['guru'] = $this->Model_jadwal->guru();
            $data['ruangan'] = $this->Model_jadwal->ruangan();
            $data['rombel'] = $this->Model_jadwal->rombel();
            $data['hari']          = array (
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU',
                        'MINGGU'=>'MINGGU');
            $this->template->load('template', 'jadwal/add', $data);
        }
    }
    
    function edit_jadwal($id) {
        if (isset($_POST['submit'])) {
            $this->Model_jadwal->update();
            $this->session->set_flashdata('data_jadwal_change', 'Data Telah Diubah');
            redirect('jadwal');
        } else {
            $data['tahun_akademik'] =  $this->Model_jadwal->tahun_akademik();
            $data['kelas'] = $this->Model_jadwal->kelas();
            $data['mapel'] = $this->Model_jadwal->mapel();
            $data['guru'] = $this->Model_jadwal->guru();
            $data['ruangan'] = $this->Model_jadwal->ruangan();
            $data['rombel'] = $this->Model_jadwal->rombel();
            $data['jadwal'] = $this->Model_jadwal->pilih_jadwal($id);
            $data['hari']          = array (
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU',
                        'MINGGU'=>'MINGGU');
            $this->template->load('template', 'jadwal/edit', $data);
        }
    }
    
    
    function cetak_jadwal(){
        $rombel = $_POST['rombel'];
        $this->load->library('CFPDF');
        $days          = array (
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU');
        
        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,10,'NO',1,0,'L');
        $pdf->Cell(30,10,'WAKTU',1,0,'L');
        // foreach di kolom judul
        foreach ($days as $day){
            $pdf->Cell(40,10,$day,1,0,'L');
        }
        $pdf->Cell(30,10,'',0,1,'L');
        
        $jam_ajar = $this->model_jadwal->getJamPelajaran();
        $no=1;
        foreach ($jam_ajar  as $jam){
            $pdf->Cell(10,10,$no,1,0,'L');
            $pdf->Cell(30,10,$jam,1,0,'L');
            // foreach hari di kolom jadwal
            foreach ($days as $day){
                $pdf->Cell(40,10,  $this->getPelajaran($jam, $day, $rombel),1,0,'L');
            }
             $pdf->Cell(30,10,'',0,1,'L');
            $no++;
        }
        $pdf->Output();
    }
    
    function delete($id){
        if(!empty($id)){
            // proses delete data
            $this->db->where('id_jadwal',$id);
            $this->db->delete('tbl_jadwal');
        }
        $this->session->set_flashdata('data_jadwal_hapus', 'Data Telah Dihapus');
        redirect('jadwal');
    }
    function getPelajaran($jam,$hari,$rombel){
        $sql = "SELECT tj.*,tm.nama_mapel
                FROM tbl_jadwal as tj,tbl_mapel as tm 
                WHERE tj.id_mapel=tm.id_mapel and tj.id_rombel=$rombel and tj.hari='$hari' and tj.jam='$jam'";
        $pelajaran = $this->db->query($sql);
        if($pelajaran->num_rows()>0){
            $row = $pelajaran->row_array();
            return $row['nama_mapel'];
        }else{
            return '-';
        }
    }
    
}