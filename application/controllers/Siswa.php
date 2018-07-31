<?php

Class Siswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        //chekAksesModule();
        $this->load->library('ssp');
        $this->load->model('Model_siswa');        
    }

    function data() {
   
        // nama tabel
        $table = 'tbl_siswa';
        // nama PK
        $primaryKey = 'nisn';
        // list field
        $columns = array(
            array('db' => 'foto',
                'dt' => 'foto',
                'formatter' => function( $d) {
                   if(empty($d)){
                       return "<img width='30px' src='".  base_url()."/uploads/user-siluet.jpg'>";
                   }else{
                       return "<img width='20px' src='".  base_url()."/uploads/".$d."'>";
                   }   
                }
            ),
            array('db' => 'nisn', 'dt' => 'nisn'),
            array('db' => 'nim', 'dt' => 'nim'),
            array('db' => 'nama', 'dt' => 'nama'),
        //    array('db' => 'tbl_rombel.nama_rombel', 'dt' => 'nama_rombel'),
            array(
                'db' => 'nisn',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('siswa/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('siswa/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );
       // $qjoin = "join 'tbl_rombel' on 'tbl_rombel'.'id_rombel' = 'tbl_siswa'.id_rombel' ";

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $where = "id_sekolah =".$_SESSION['id_sekolah']."";
        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where,null)
        );
    }

    function index() {
        $this->template->load('template', 'siswa/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            //$uploadFoto = $this->upload_foto_siswa();
            $this->Model_siswa->save();
            $this->session->set_flashdata('data_siswa_masuk', '');
            redirect('siswa');
        } else {
            $id_sekolah         =   "SELECT id_rombel,nama_rombel FROM tbl_rombel WHERE id_sekolah = ".$_SESSION['id_sekolah'];
            $data['id_sekolah'] = $this->db->query($id_sekolah)->result(); 
            $this->template->load('template', 'siswa/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $uploadFoto = $this->upload_foto_siswa();
            $this->Model_siswa->update($uploadFoto);
            $this->session->set_flashdata('data_siswa_change', 'Data');
            redirect('siswa');
        }else{
            $nisn            = $this->uri->segment(3);
            $id_sekolah      =   "SELECT id_rombel,nama_rombel FROM tbl_rombel WHERE id_sekolah = ".$_SESSION['id_sekolah'];
            $data['id_sekolah'] = $this->db->query($id_sekolah)->result(); 
            $data['ulang'] = $this->db->query($id_sekolah)->result(); 
            $data['siswa'] = $this->db->get_where('tbl_siswa',array('nisn'=>$nisn))->row_array();
            $data['ortu'] = $this->db->get_where('tbl_orang_tua',array('nisn'=>$nisn))->row_array();
            $this->template->load('template', 'siswa/edit',$data);
        }
    }
    
    function delete(){
        $nisn = $this->uri->segment(3);
        if(!empty($nisn)){
            // proses delete data
            $this->db->where('nisn',$nisn);
            $this->db->delete('tbl_siswa');
        }
        $this->session->set_flashdata('data_siswa_hapus', 'Data Telah Dihapus');
        redirect('siswa');
    }
    
    function upload_foto_siswa(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
    
    function siswa_aktif(){
        $this->template->load('template', 'siswa/siswa_aktif');
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']= $this->db->query($infoSekolah)->row_array();
    }
    
    function load_data_siswa_by_rombel(){
        $rombel = $_GET['rombel'];
        
        echo "<table class='table table-bordered'>
            <tr><th width='90'>NISN</th><th>NAMA</th></tr>";
        $this->db->where('id_rombel',$rombel);
        $siswa = $this->db->get('tbl_siswa');
        foreach ($siswa->result() as $row){
            echo "<tr><td>$row->nisn</td><td>$row->nama</td></tr>";
        }
        echo"</table>";
    }
    
    function data_by_rombel_excel(){
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NISN');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'SISWA');
        
        $rombel = $_POST['rombel'];
        $this->db->where('id_rombel',$rombel);
        $siswa = $this->db->get('tbl_siswa');
        $no=2;
        foreach ($siswa->result() as $row){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row->nisn);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->nama);
            $no++;
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data-siswa.xlsx");
        $this->load->helper('download');
        force_download('data-siswa.xlsx', NULL);
    }

}