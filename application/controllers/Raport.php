<?php
class Raport extends CI_Controller{
    
    
    // menampilkan list siswa
    function index(){
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        $walikelas      = $this->db->get_where('tbl_walikelas',array('id_guru'=>  $this->session->userdata('id_guru')))->row_array();
        $rombel         =   "SELECT rb.nama_rombel,rb.kelas,jr.nama_jurusan, mp.nama_mapel
                            FROM tbl_jadwal AS j,tbl_jurusan as jr, tbl_rombel as rb,tbl_mapel as mp
                            WHERE j.kd_jurusan=jr.kd_jurusan and rb.id_rombel=j.id_rombel and mp.kd_mapel=j.kd_mapel 
                            and j.id_rombel='".$walikelas['id_rombel']."'";
        $siswa          =   "SELECT s.nim,s.nama
                            FROM tbl_history_kelas as hk,tbl_siswa as s 
                            WHERE hk.nim=s.nim and hk.id_rombel=".$walikelas['id_rombel']." 
                            and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
        
        $data['rombel'] =   $this->db->query($rombel)->row_array();
        $data['siswa']  =   $this->db->query($siswa);
        $this->template->load('template','raport/list_siswa',$data);
    }
    
   function nilai_semester(){
       // blok query info siswa
       $nim = $this->uri->segment(3);
       $sekolah   =   "SELECT * FROM tbl_sekolah_info";
       $sqlSiswa = "SELECT ts.nama as nama_siswa,ts.nim,tj.nama_jurusan,tr.nama_rombel,tr.kelas,tr.id_rombel
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_rombel as tr,tbl_jurusan as tj
                    WHERE ts.nim=hk.nim and tr.id_rombel=ts.id_rombel and tr.kd_jurusan=tj.kd_jurusan 
                    and hk.nim='$nim' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();
       $sekolah_info = $this->db->query($sekolah)->row_array();
       $id_rombels = $siswa['id_rombel'];
        $this->load->library('CFPDF');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,5,'Raport Siswa',1,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,''.$sekolah_info['nama_sekolah'],1,1,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(190,5,''.$sekolah_info['alamat_sekolah'].', Telpon : '.$sekolah_info['telpon'].', email: '.$sekolah_info['email'],1,1,'C');
         
        $pdf->Cell(190,5,'',0,1);
        
        $pdf->SetFont('Arial','B',9);
        // BLOCK INFO SISWA
        $pdf->Cell(30,5,'NIS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nim'],0,0,'L');
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(40,5,': '.$siswa['nama_rombel'],0,1,'L');
        
        $pdf->Cell(30,5,'NAMA',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('tahun_akademik'),0,1,'L');
        
        $pdf->Cell(30,5,'JURUSAN',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_jurusan'],0,0,'L');
        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('semester_aktif'),0,1,'L');
        
        // END BLOCK INFO SISWA
        
        
        // BLOCK NILAI SISWA ------------------------
        $pdf->Cell(1,10,'',0,1);
        $pdf->Cell(8,5,'NO',1,0,'C');
        $pdf->Cell(65,5,'Mata Pelajaran',1,0,'C');
        $pdf->Cell(10,5,'KKM',1,0,'C');
        $pdf->Cell(12,5,'Angka',1,0,'C');
        $pdf->Cell(40,5,'Huruf',1,0,'C');
        $pdf->Cell(30,5,'Ketercapaian',1,0,'C');
        $pdf->Cell(20,5,'Rata Rata',1,1,'C');
        //$pdf->Cell(lebar 37,tinggi 5,titel: 'Catatan',frame (true1,false 0 ) 1,(enter 1,spasi 0) 1, align: c center,l left,r right'C');
        $pdf->SetFont('Arial','',9);
        $sqlMapel = "SELECT DISTINCT tm.nama_mapel,tj.id_jadwal 
                    FROM tbl_jadwal as tj,tbl_mapel as tm
                    WHERE tj.kd_mapel=tm.kd_mapel and tj.id_rombel='$id_rombels'";
        $mapel = $this->db->query($sqlMapel)->result();
        $no=1;
        foreach ($mapel as $m){
            $pdf->Cell(8,5,$no,1,0,'C');
            $pdf->Cell(65,5,$m->nama_mapel,1,0,'L');
            $pdf->Cell(10,5,75,1,0,'C');
            $nilai = chek_nilai($siswa['nim'], $m->id_jadwal);
            $pdf->Cell(12,5,  $nilai,1,0,'C');
            $pdf->Cell(40,5,  Terbilang($nilai),1,0,'L');
            $pdf->Cell(30,5,  $this->ketercapaian_kopetensi($nilai),1,0,'L');
            $pdf->Cell(20,5,  ceil($this->rata_rata_nilai($m->id_jadwal)),1,1,'C');
            //$pdf->Cell(37,5,'----',1,1,'C');
            $no++;
        }
        // END BLOCK NILAI SISWA --------------------------------
        
        /* Tambahan Tabel
        $pdf->Cell(190,5,'',0,1);
        $pdf->Cell(8, 5, 'No', 1,0);
        $pdf->Cell(50, 5, 'Pengembangan Diri', 1,0);
        $pdf->Cell(10, 5, 'Nilai', 1,0);
        $pdf->Cell(66, 5, 'Kepribadian', 1,0);
        $pdf->Cell(20, 5, 'Nilai', 1,0);
        $pdf->Cell(36, 5, 'Catatan Khusus', 1,1);
        */
        $pdf->Cell(190,5,'',0,1);
        $pdf->Cell(45, 15, 'Mengetahui,', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Diberikan Di', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(45, 15, 'Orang Tua / Wali', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Pada', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(132, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Wali Kelas', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Output();
    }
    
    function rata_rata_nilai($id_jadwal){
        $sql   =  "SELECT sum(nilai)/count(nim) as nilai_rata_rata FROM tbl_nilai WHERE id_jadwal=$id_jadwal";
        $nilai = $this->db->query($sql)->row_array();
        return $nilai['nilai_rata_rata'];
    }
    
    
    function ketercapaian_kopetensi($nilai){
        if($nilai>90){
            return 'Sangat baik';
        }elseif($nilai>80 and $nilai<=90){
            return 'Baik';
        }elseif($nilai>75 and $nilai<=80){
            return 'Cukup';
        }else{
            return "Kurang";
        }
    }
}