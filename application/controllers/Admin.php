<?php

Class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_user');
        
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
    }

    function data() {
        // nama tabel
        $table = 'tbl_admin';
        // nama PK
        $primaryKey = 'email';
        // list field
        $columns = array(
            array('db' => 'email', 'dt' => 'email'),
            array('db' => 'telepon_admin', 'dt' => 'telepon_admin'),
            array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
            array(
                'db' => 'email',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('admin/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('admin/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'admin/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_user->save();
            $this->session->set_flashdata('data_admin_masuk', 'Data Telah Dihapus');
            redirect('admin');
        } else {
            $this->template->load('template', 'admin/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_user->update();
            $this->session->set_flashdata('data_admin_change', 'Data Telah Dihapus');
            redirect('admin');
        }else{
            $email      = $this->uri->segment(3);
            $data['admin'] = $this->db->get_where('tbl_admin',array('email'=>$email))->row_array();
            $this->template->load('template', 'admin/edit',$data);
        }
    }
    
    function delete(){
        $email = $this->uri->segment(3);
        if(!empty($email)){
            // proses delete data
            $this->db->where('email',$email);
            $this->db->delete('tbl_admin');
            $this->session->set_flashdata('data_admin_hapus', 'Data Telah Dihapus');
        }
        redirect('admin');
    }

}