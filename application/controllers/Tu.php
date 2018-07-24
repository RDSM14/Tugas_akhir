<?php

Class Tu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_tu');
        
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
    }

    function data() {
        // nama tabel
        $table = 'tbl_tu';
        // nama PK
        $primaryKey = 'nip';
        // list field
        $columns = array(
            array('db' => 'nip', 'dt' => 'nip'),
            array('db' => 'telepon_TU', 'dt' => 'telepon_TU'),
            array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
            array(
                'db' => 'nip',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('tu/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('tu/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $where = "id_sekolah =".$_SESSION['id_sekolah']."";
        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }

    function index() {
        $this->template->load('template', 'tu/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_tu->save();
            $this->session->set_flashdata('data_tu_masuk', 'Data Telah Dihapus');
            redirect('tu');
        } else {
            $this->template->load('template', 'tu/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_tu->update();
            $this->session->set_flashdata('data_tu_change', 'Data Telah Dihapus');
            redirect('tu');
        }else{
            $nip      = $this->uri->segment(3);
            $data['tu'] = $this->db->get_where('tbl_tu',array('nip'=>$nip))->row_array();
            $this->template->load('template', 'tu/edit',$data);
        }
    }
    
    function delete(){
        $nip = $this->uri->segment(3);
        if(!empty($nip)){
            // proses delete data
            $this->db->where('nip',$nip);
            $this->db->delete('tbl_tu');
            $this->session->set_flashdata('data_tu_hapus', 'Data Telah Dihapus');
        }
        redirect('tu');
    }

}