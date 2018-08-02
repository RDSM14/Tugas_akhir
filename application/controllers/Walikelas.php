<?php
class Walikelas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_walikelas');
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
    }
    
    
    function data() {
        // nama tabel
        $table = 'v_wali_kelas';
        // nama PK
        $primaryKey = 'id_walikelas';
        // list field
        $columns = array(
            array('db' => 'nama_rombel', 'dt' => 'nama_rombel'),
            array('db' => 'kelas', 'dt' => 'kelas'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array('db' => 'tahun_akademik', 'dt' => 'tahun_akademik'),
            array(
                'db' => 'id_walikelas',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('walikelas/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('walikelas/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        
        //$where = 'tahun_akademik='.get_tahun_akademik_aktif('tahun_akademik');
        $where = "id_sekolah=".$_SESSION['id_sekolah']."";
        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }
    
    
    function index(){
        $this->template->load('template','walikelas/list');
    }
    
    
    function updatewalikelas(){
        $id_walikelas   =   $_GET['id_walikelas'];
        $username        =   $_GET['username'];
        $this->db->where('id_walikelas',$id_walikelas);
        $this->db->update('tbl_walikelas',array('username_guru'=>$username));
        $this->session->set_flashdata('data_wali_ubah', 'Data Telah Disimpan');
    }
    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_walikelas->save();
            $this->session->set_flashdata('data_wali_masuk', 'Data Telah Disimpan');
            redirect('walikelas');
        } else {
            $data['tahun_akademik'] =  $this->Model_walikelas->tahun_akademik();
            $data['guru'] = $this->Model_walikelas->guru();
            $data['rombel'] = $this->Model_walikelas->rombel();
            $this->template->load('template', 'walikelas/add', $data);
        }
    }
    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_walikelas->update();
            $this->session->set_flashdata('data_wali_ubah', 'Data Telah Disimpan');
            redirect('walikelas');
        } else {
            $d           = $this->uri->segment(3);
            $data['tahun_akademik'] =  $this->Model_walikelas->tahun_akademik();
            $data['guru'] = $this->Model_walikelas->guru();
            $data['rombel'] = $this->Model_walikelas->rombel();
            $data['wali'] = $this->db->get_where('tbl_walikelas',array('id_walikelas'=>$d))->row_array();
            $this->template->load('template', 'walikelas/edit', $data);
        }
    }
    function delete(){
        $d = $this->uri->segment(3);
        if(!empty($d)){
            // proses delete data
            $this->db->where('id_walikelas',$d);
            $this->db->delete('tbl_walikelas');
            
            
        }
        $this->session->set_flashdata('data_wali_hapus', 'Data Telah Dihapus');
        redirect('walikelas');
    }
    
    
}