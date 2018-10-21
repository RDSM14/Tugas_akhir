<?php
class Raport extends CI_Controller{
    
    
    // menampilkan list siswa
    function index(){
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
        if($this->session->userdata('id_level_user')==5){
            $walikelas      = $this->db->get_where('tbl_walikelas',array('username_guru'=>  $_SESSION['username']))->row_array();
            $rombel         =   "SELECT rb.id_rombel,rb.nama_rombel,rb.kelas, mp.nama_mapel
                                FROM tbl_jadwal AS j, tbl_rombel as rb,tbl_mapel as mp
                                WHERE rb.id_rombel=j.id_rombel and mp.id_mapel=j.id_mapel 
                                and j.id_rombel='".$walikelas['id_rombel']."'";
            $siswa          =   "SELECT s.id_rombel,s.nim,s.nisn,s.nama
                                FROM tbl_history_kelas as hk,tbl_siswa as s 
                                WHERE hk.nisn=s.nisn AND hk.id_rombel='".$walikelas['id_rombel']."'
                                AND hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');

            $data['rombel'] =   $this->db->query($rombel)->row_array();
            $data['siswa']  =   $this->db->query($siswa);
            $this->template->load('template','raport/list_siswa',$data);
        }
        
        elseif($this->session->userdata('id_level_user')==6||$this->session->userdata('id_level_user')==7){
            $murid          = $this->db->get_where('tbl_siswa',array('nisn'=>  $_SESSION['username']))->row_array();
            $rombel         =   "SELECT rb.id_rombel,rb.nama_rombel,rb.kelas, mp.nama_mapel
                                FROM tbl_jadwal AS j, tbl_rombel as rb,tbl_mapel as mp
                                WHERE rb.id_rombel=j.id_rombel and mp.id_mapel=j.id_mapel 
                                and j.id_rombel='".$murid['id_rombel']."'";
            $siswa          =   "SELECT s.id_rombel,s.nim,s.nisn,s.nama
                                FROM tbl_history_kelas as hk,tbl_siswa as s 
                                WHERE hk.nisn=s.nisn AND hk.id_rombel='".$murid['id_rombel']."' AND hk.nisn='". $_SESSION['username']."'
                                AND hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');

            $data['rombel'] =   $this->db->query($rombel)->row_array();
            $data['siswa']  =   $this->db->query($siswa);
            $this->template->load('template','raport/list_siswa',$data);
        }
        elseif($this->session->userdata('id_level_user')==2||$this->session->userdata('id_level_user')==3){
        $id_sekolah = $_SESSION['id_sekolah'];
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $this->template->load('template','raport/list',$data);
        }
    }
    function excel (){
        $output = '';
            $nisin = $_POST["nisnnya"];
            $id_rombelx = $_POST["rombel"];
            if(isset($_POST["export_excel"]))
            {
             $query = "SELECT DISTINCT ts.nim,ts.nama as nama_siswa,ts.nisn,tr.nama_rombel,tr.kelas,tr.id_rombel,tm.nama_mapel,tj.id_jadwal,tm.min_a,tm.min_b,tm.min_c,tm.min_d,tm.min_aplus,tm.min_bplus,tm.min_cplus,tm.min_dplus,tm.min_amin,tm.min_bmin,tm.min_cmin,tm.min_dmin
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_rombel as tr, tbl_jadwal as tj, tbl_mapel as tm,tbl_nilai as tn
                    WHERE ts.nisn=hk.nisn and tr.id_rombel=ts.id_rombel and tj.id_mapel=tm.id_mapel and tj.id_rombel='$id_rombelx'
                    and hk.nisn='$nisin' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
             $result_count = $this->db->query($query)->num_rows();
             $result = $this->db->query($query);
             if($result_count > 0)
             {
              $output .= '
               <table class="table" bordered="1">  
                                <tr>  
                                     <th>NIM</th>  
                                     <th>NAMA</th>  
                                     <th>KELAS/ROMBEL</th>  
                                     <th>MAPEL</th>
                                     <th>NIS</th>
                                </tr>
              ';
              while($row = mysqli_fetch_array($result))
              {
               $output .= '
                <tr>  
                                     <td>'.$row["nisn"].'</td>  
                                     <td>'.$row["nama_siswa"].'</td>  
                                     <td>'.$row["nama_rombel"].'</td>  
                   <td>'.$row["nama_mapel"].'</td>  
                   <td>'.$row["nim"].'</td>
                                </tr>
               ';
              }
              $output .= '</table>';
              header('Content-Type: application/xls');
              header('Content-Disposition: attachment; filename=download.xls');
              echo $output;
             }
            }
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
    function show_ta(){
        echo "<select id='id_tahun_akademik' name='tahun_akademik' class='form-control' onchange='loadPelajaran()'>";
        $id_sekolah = $_SESSION['id_sekolah'];
        $where  = array ('rombel'=>$_GET['rombel'],'id_sekolah'=>$id_sekolah);
        $ta = $this->db->get_where('tbl_tahun_akademik',$where);
        foreach ($ta->result() as $row){
            echo "<option value='$row->id_tahun_akademik'>$row->tahun_akademik</option>";
        }
        echo "</select>";
    }
    
    function dataRaport(){
        $id_sekolah     = $_SESSION['id_sekolah'];
        //$kelas          = $_GET['kelas'];
        //$id_kurikulum   = $_GET['id_kurikulum'];
        $rombel         = $_GET['rombel'];
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th></th>
                    </tr>
                </thead>";
        
        $sql = "SELECT s.id_rombel,s.nim,s.nisn,s.nama
                                FROM tbl_history_kelas as hk,tbl_siswa as s 
                                WHERE hk.nisn=s.nisn AND hk.id_rombel='".$rombel."'
                                AND hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
        $rapor = $this->db->query($sql)->result();
        $no=1;
        foreach ($rapor as $row){
            echo"<tr><td>$no</td>
                <td>$row->nim</td>
                <td>$row->nisn</td>
                <td>$row->nama</td>
                <td width='100'>".anchor('raport/nilai_semester/'.$row->nisn,'Lihat Raport','class="btn btn-success btn-sm"')."</td> </tr>";
            $no++;
        }
        
        echo"</table>";
    }
    
    
    
   function nilai_semester(){
       // blok query info siswa
       $nisn = $this->uri->segment(3);
       $sekolah   =   "SELECT * FROM tbl_sekolah_info";
       $sqlSiswa = "SELECT ts.nim,ts.nama as nama_siswa,ts.nisn,tr.nama_rombel,tr.kelas,tr.id_rombel
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_rombel as tr
                    WHERE ts.nisn=hk.nisn and tr.id_rombel=ts.id_rombel
                    and hk.nisn='$nisn' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();
       $sekolah_info = $this->db->query($sekolah)->row_array();
       $id_rombels = $siswa['id_rombel'];
        $this->load->library('CFPDF');
        $column_widths = ["50","50","50","50"];
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
        $pdf->Cell(30,5,'NISN / NIS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nisn'].' / '.$siswa['nim'],0,0,'L');
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(40,5,': '.$siswa['nama_rombel'],0,1,'L');
        //$pdf->AddPage(); MENAMBAHKAN PAGE BARU
        $pdf->Cell(30,5,'NAMA',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('tahun_akademik'),0,1,'L');
        
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_rombel'],0,0,'L');
        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('semester_aktif').' ('.Terbilang(get_tahun_akademik_aktif('semester_aktif')).' )',0,1,'L');
        
        // END BLOCK INFO SISWA
        
        
        // BLOCK NILAI SISWA ------------------------
        $pdf->Cell(1,10,'CAPAIAN KOMPETENSI ',0,1);
        $pdf->Cell( 8,15,'NO',1,0,'C');
        $pdf->Cell(100,15,'Mata Pelajaran',1,0,'C');
        $pdf->Cell(40,5,'Pengetahuan',1,0,'C');
        $pdf->Cell(40,5,'Keterampilan',1,1,'C');
        $pdf->Cell(108,5,'',0,0,'C');
        $pdf->Cell(20,5,'Angka',1,0,'C');
        $pdf->Cell(20,5,'Predikat',1,0,'C');
        $pdf->Cell(20,5,'Angka',1,0,'C');
        $pdf->Cell(20,5,'Predikat',1,1,'C');
        $pdf->Cell(108,5,'',0,0,'C');
        $pdf->Cell(20,5,'1-'.$sekolah_info['nilai_max'],1,0,'C');
        $pdf->Cell(20,5,'A/B/C/D/E',1,0,'C');
        $pdf->Cell(20,5,'1-'.$sekolah_info['nilai_max'],1,0,'C');
        $pdf->Cell(20,5,'A/B/C/D/E',1,1,'C');
        ///////THE END OF HEADER TABLE
       
        //$pdf->Cell(20,5,'Rata Rata',1,1,'C');
        //$pdf->Cell(lebar 37,tinggi 5,titel: 'Catatan',frame (true1,false 0 ) 1,(enter 1,spasi 0) 1, align: c center,l left,r right'C');
        $pdf->SetFont('Arial','',9);
        $sqlMapel = "SELECT DISTINCT tm.nama_mapel,tj.id_jadwal,tm.min_a,tm.min_b,tm.min_c,tm.min_d,tm.min_aplus,tm.min_bplus,tm.min_cplus,tm.min_dplus,tm.min_amin,tm.min_bmin,tm.min_cmin,tm.min_dmin
                    FROM tbl_jadwal as tj,tbl_mapel as tm, tbl_nilai as tn
                    WHERE tj.id_mapel=tm.id_mapel and tj.id_rombel='$id_rombels' AND tn.nisn ='".$this->uri->segment(3)."'";
        $mapel = $this->db->query($sqlMapel)->result();
        $no=1;
        foreach ($mapel as $m){
            $hitung_n_p = round($this->nilai_pengetahuan($m->id_jadwal),2);
            $hitung_n_k = round($this->nilai_keterampilan($m->id_jadwal),2);
            
            $pdf->Cell(8,5,$no,1,0,'C');
            $pdf->Cell(100,5,$m->nama_mapel,1,0,'L');
            $pdf->Cell(20,5,  round($this->nilai_pengetahuan($m->id_jadwal),2),1,0,'C');
            $pdf->Cell(20,5, $this->ketercapaian_kopetensi($hitung_n_p,$m->min_a,$m->min_b,$m->min_c,$m->min_d,$m->min_aplus,$m->min_bplus,$m->min_cplus,$m->min_dplus,$m->min_amin,$m->min_bmin,$m->min_cmin,$m->min_dmin),1,0,'C') ;
            $pdf->Cell(20,5,  round($this->nilai_keterampilan($m->id_jadwal),2),1,0,'C');
            $pdf->Cell(20,5, $this->ketercapaian_kopetensi_keterampilan($hitung_n_k,$m->min_a,$m->min_b,$m->min_c,$m->min_d,$m->min_aplus,$m->min_bplus,$m->min_cplus,$m->min_dplus,$m->min_amin,$m->min_bmin,$m->min_cmin,$m->min_dmin),1,1,'C') ;
            
                          
            $no++;
        }
       
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(200,5,'',0,1,'C');
        // END BLOCK NILAI SISWA NILAI PENGETAHUAN DAN KETERAMPILAN--------------------------------
        
       
        /// BLOK NILAI ESKUL
        $pdf->SetFont('Arial','B',8);
       
        $pdf->Cell( 8,5,'NO',1,0,'C');
        $pdf->Cell(80,5,'Ekstra Kurikuler',1,0,'C');
        $pdf->Cell(100,5,'Keterangan dalam Kegiatan',1,1,'C');
        $pdf->Cell( 8,5,'1',1,0,'C');
        $pdf->Cell(80,5,' ',1,0,'C');
        $pdf->Cell(100,5,' ',1,1,'C');
        $pdf->Cell( 8,5,'2',1,0,'C');
        $pdf->Cell(80,5,' ',1,0,'C');
        $pdf->Cell(100,5,' ',1,1,'C');
        $pdf->Cell( 8,5,'3',1,0,'C');
        $pdf->Cell(80,5,' ',1,0,'C');
        $pdf->Cell(100,5,' ',1,1,'C');
        $pdf->Cell( 8,5,'4',1,0,'C');
        $pdf->Cell(80,5,' ',1,0,'C');
        $pdf->Cell(100,5,' ',1,1,'C');
       
       /// END BLOK NILAI ESKUL
       
       
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(200,5,'',0,1,'C');
       /// BLOK NILAI KEHADIRAN
        $pdf->SetFont('Arial','B',8);
       
        $pdf->Cell( 30,5,'Kehadiran',1,1,'C');
        $pdf->Cell( 8,5,'NO',1,0,'C');
        $pdf->Cell(50,5,'Ekstra Kurikuler',1,0,'C');
        $pdf->Cell(60,5,'Keterangan dalam Kegiatan',1,1,'C');
        $pdf->Cell( 8,5,'1',1,0,'C');
        $pdf->Cell(50,5,'Sakit ',1,0,'L');
        $pdf->Cell(60,5,' Hari',1,1,'C');
        $pdf->Cell( 8,5,'2',1,0,'C');
        $pdf->Cell(50,5,'Izin ',1,0,'L');
        $pdf->Cell(60,5,' Hari',1,1,'C');
        $pdf->Cell( 8,5,'3',1,0,'C');
        $pdf->Cell(50,5,'Tanpa Keterangan ',1,0,'L');
        $pdf->Cell(60,5,' Hari',1,1,'C');
       /// END BLOK NILAI KEHADIRAN
       
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(200,5,'',0,1,'C');
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
        $pdf->Cell(45, 15, '', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Diberikan Di', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(45, 15, '', 0,0,'C');
        $pdf->Cell(87, 5, '', 0,0,'c');
        $pdf->Cell(25, 5, 'Pada', 0,0,'c');
        $pdf->Cell(33, 5, ': ', 0,1,'L');
        $pdf->Cell(132, 5, '', 0,0,'c');
        $pdf->Cell(33, 5, ' ', 0,1,'L');
        $pdf->Cell(45, 5, 'Mengetahui,', 0,0,'C');
        $pdf->Cell(80, 5, '', 0,0,'L');
        $pdf->Cell(45, 5, '..........................,....................20.......', 0,1,'C');
        $pdf->Cell(45, 5, 'Orang Tua / Wali', 0,0,'C');
        $pdf->Cell(80, 5, '', 0,0,'L');
        $pdf->Cell(45, 5, 'Wali Kelas,', 0,1,'C');
        
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(200,5,'',0,1,'C');
        $pdf->Cell(45, 5, '', 0,0,'C');
        $pdf->Cell(80, 5, '', 0,0,'L');
        $pdf->Cell(45, 5, ''.$_SESSION['nama_lengkap'], 0,0,'C');
        ///////////////END of FIRST PAGE
        // SECOND PAGE
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
        $pdf->Cell(30,5,'NISN / NIS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nisn'].' / '.$siswa['nim'],0,0,'L');
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(40,5,': '.$siswa['nama_rombel'],0,1,'L');
        //$pdf->AddPage(); MENAMBAHKAN PAGE BARU
        $pdf->Cell(30,5,'NAMA',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('tahun_akademik'),0,1,'L');
        
        $pdf->Cell(30,5,'KELAS',0,0,'L');
        $pdf->Cell(88,5,': '.$siswa['nama_rombel'],0,0,'L');
        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
        $pdf->Cell(40,5,': '.  get_tahun_akademik_aktif('semester_aktif').' ('.Terbilang(get_tahun_akademik_aktif('semester_aktif')).' )',0,1,'L');
       
        $pdf->Cell(1,10,'DESKRIPSI ',0,1);
        $pdf->Cell( 8,5,'NO',1,0,'C');
        $pdf->Cell(60,5,'Mata Pelajaran',1,0,'C');
        $pdf->Cell(40,5,'Kompetensi',1,0,'C');
        $pdf->Cell(70,5,'Catatan',1,1,'C');
        //$pdf->MultiCell(2, 5, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',1 ,'L' ,false);
       
        $pdf->SetFont('Arial','',6);
        $sqlMapel_desk = "SELECT DISTINCT tm.nama_mapel,tj.id_jadwal,tm.min_a,tm.min_b,tm.min_c,tm.min_d,tn.nisn, tdn.deskripsi_pengetahuan,tdn.deskripsi_keterampilan,tdn.deskripsi_spiritual,tdn.deskripsi_sosial
                    FROM tbl_jadwal as tj,tbl_mapel as tm,tbl_nilai as tn,tbl_deskripsi_nilai as tdn
                    WHERE tj.id_mapel=tm.id_mapel AND tn.id_jadwal=tj.id_jadwal AND tm.id_mapel=tdn.id_mapel AND tj.id_rombel='$id_rombels' AND tn.nisn ='".$this->uri->segment(3)."'";
        $desk = $this->db->query($sqlMapel_desk)->result();
        $no=1;
        foreach ($desk as $d){
            
            $hitung_n_sp = round($this->nilai_spiritual($m->id_jadwal),2);
            $hitung_n_s = round($this->nilai_sosial($m->id_jadwal),2);
            if(($hitung_n_sp)==''){
                    $angka = '-';
            }
            else{
                    $angka = $hitung_n_sp;
            }
            if(($hitung_n_s)==''){
                    $sosial = '-';
            }
            else{
                    $sosial = $hitung_n_s;
            }
            
            $pdf->Cell(8,20,$no,1,0,'C');
            $pdf->Cell(60,20,$d->nama_mapel,1,0,'L');
            $pdf->Cell(40,20,  'Deskripsi Pengetahuan',1,0,'C');
            //$pdf->Cell(40,20,  $d->deskripsi_pengetahuan,1,0,'C');
            $pdf->MultiCell(70, 5, $d->deskripsi_pengetahuan,1 ,'L' ,false);
            //$pdf->Cell(8,5,'',0,1,'C');
            $pdf->Cell(8,20,'',0,0,'C');
            $pdf->Cell(60,20,'',0,0,'L');
            $pdf->Cell(40,20,  'Deskripsi Keterampilan',1,0,'C');
            $pdf->MultiCell(70, 5, $d->deskripsi_keterampilan,1 ,'L' ,false);
            $pdf->Cell(8,20,'',0,0,'C');
            $pdf->Cell(60,20,'',0,0,'L');
            $pdf->Cell(40,20,  'Deskripsi Spiritual',1,0,'C');
            $pdf->MultiCell(70, 5, $d->deskripsi_spiritual.'   Nilai Angka ( '.$angka .' )',1 ,'L' ,false);
            $pdf->Cell(8,20,'',0,0,'C');
            $pdf->Cell(60,20,'',0,0,'L');
            $pdf->Cell(40,20,  'Deskripsi Spiritual',1,0,'C');
            $pdf->MultiCell(70, 5, $d->deskripsi_sosial.'   Nilai Angka ( '.$sosial .' )',1 ,'L' ,false);
            $pdf->Cell(8,5,'',0,1,'C');
            
                          
            $no++;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////

       
       
       /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
       
        $pdf->Output();
   }
    
    function myCell ($w,$h,$x,$t){
        $height = $h/3;
        $first = $height+2;
        $second = $height+$height+height+3;
        $len = strlen($t);
        if($len>15){
            $txt = str_split($t,15);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,'L',0);
        }
        else {
            $this-> SetX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
    function nilai_pengetahuan($id_jadwal){
        $sql   =  "SELECT SUM((skor)*porsi/100) as nilai_pengetahuan FROM tbl_nilai,tbl_komponen_nilai WHERE id_jadwal= $id_jadwal AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen AND id_jenis_nilai = 3";
        $nilai_pengetahuan = $this->db->query($sql)->row_array();
        return $nilai_pengetahuan['nilai_pengetahuan'];
    }
    
    function nilai_keterampilan($id_jadwal){
        $sql   =  "SELECT SUM((skor)*porsi/100) as nilai_keterampilan FROM tbl_nilai,tbl_komponen_nilai WHERE id_jadwal= $id_jadwal AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen AND id_jenis_nilai = 4";
        $nilai_keterampilan = $this->db->query($sql)->row_array();
        return $nilai_keterampilan['nilai_keterampilan'];
    }
    
    function nilai_sosial($id_jadwal){
        $sql   =  "SELECT SUM((skor)*porsi/100) as nilai_sosial FROM tbl_nilai,tbl_komponen_nilai WHERE id_jadwal= $id_jadwal AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen AND id_jenis_nilai = 2";
        $nilai_sosial = $this->db->query($sql)->row_array();
        return $nilai_sosial['nilai_sosial'];
    }
    
    function nilai_spiritual($id_jadwal){
        $sql   =  "SELECT SUM((skor)*porsi/100) as nilai_spiritual FROM tbl_nilai,tbl_komponen_nilai WHERE id_jadwal= $id_jadwal AND tbl_nilai.id_komponen=tbl_komponen_nilai.id_komponen AND id_jenis_nilai = 3";
        $nilai_spiritual = $this->db->query($sql)->row_array();
        return $nilai_spiritual['nilai_spiritual'];
    }
    function rata_rata_nilai($id_jadwal){
        $sql   =  "SELECT sum(nilai)/count(nisn) as nilai_rata_rata FROM tbl_nilai WHERE id_jadwal=$id_jadwal";
        $nilai = $this->db->query($sql)->row_array();
        return $nilai['nilai_rata_rata'];
    }
    
    function ketercapaian_kopetensi($hitung_n_p,$min_a,$min_b,$min_c,$min_d,$min_aplus,$min_bplus,$min_cplus,$min_dplus,$min_amin,$min_bmin,$min_cmin,$min_dmin){
        
        if($hitung_n_p >= $min_aplus){
            return 'A+';
        }elseif($hitung_n_p>=$min_a and $hitung_n_p<$min_aplus){
            return 'A';
        }elseif($hitung_n_p>=$min_amin and $hitung_n_p<$min_a){
            return 'A-';
        }elseif($hitung_n_p>=$min_bplus and $hitung_n_p<$min_amin){
            return 'B+';
        }elseif($hitung_n_p>=$min_b and $hitung_n_p<$min_bplus){
            return 'B';
        }elseif($hitung_n_p>=$min_bmin and $hitung_n_p<$min_b){
            return 'B-';
        }elseif($hitung_n_p>=$min_cplus and $hitung_n_p<$min_bmin){
            return 'C+';
        }elseif($hitung_n_p>=$min_c and $hitung_n_p<$min_cplus){
            return 'C';
        }elseif($hitung_n_p>=$min_cmin and $hitung_n_p<$min_c){
            return 'C-';
        }elseif($hitung_n_p>=$min_dplus and $hitung_n_p<$min_cmin){
            return 'D+';
        }elseif($hitung_n_p>=$min_d and $hitung_n_p<$min_dplus){
            return 'D';
        }elseif($hitung_n_p>=$min_dmin and $hitung_n_p<$min_d){
            return 'D-';
        }else{
            return "E";
        }
        
    }
    function ketercapaian_kopetensi_keterampilan($hitung_n_k,$min_a,$min_b,$min_c,$min_d,$min_aplus,$min_bplus,$min_cplus,$min_dplus,$min_amin,$min_bmin,$min_cmin,$min_dmin){
        if($hitung_n_k >= $min_aplus){
            return 'A+';
        }elseif($hitung_n_k>=$min_a and $hitung_n_k<$min_aplus){
            return 'A';
        }elseif($hitung_n_k>=$min_amin and $hitung_n_k<$min_a){
            return 'A-';
        }elseif($hitung_n_k>=$min_bplus and $hitung_n_k<$min_amin){
            return 'B+';
        }elseif($hitung_n_k>=$min_b and $hitung_n_k<$min_bplus){
            return 'B';
        }elseif($hitung_n_k>=$min_bmin and $hitung_n_k<$min_b){
            return 'B-';
        }elseif($hitung_n_k>=$min_cplus and $hitung_n_k<$min_bmin){
            return 'C+';
        }elseif($hitung_n_k>=$min_c and $hitung_n_k<$min_cplus){
            return 'C';
        }elseif($hitung_n_k>=$min_cmin and $hitung_n_k<$min_c){
            return 'C-';
        }elseif($hitung_n_k>=$min_dplus and $hitung_n_k<$min_cmin){
            return 'D+';
        }elseif($hitung_n_k>=$min_d and $hitung_n_k<$min_dplus){
            return 'D';
        }elseif($hitung_n_k>=$min_dmin and $hitung_n_k<$min_d){
            return 'D-';
        }else{
            return "E";
        }
    }
    
}
