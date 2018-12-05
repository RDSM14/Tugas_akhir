<?php

Class Guru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_guru');
        
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('auth');
        }
    }

    function data() {
        // nama tabel
        $table = 'tbl_guru';
        // nama PK
        $primaryKey = 'username';
        // list field
        $columns = array(
            array('db' => 'username', 'dt' => 'username'),
            array('db' => 'nuptk', 'dt' => 'nuptk'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array('db' => 'username', 'dt' => 'username'),
            array('db' => 'gender', 
                  'dt' => 'gender',
                  'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return $d=='p'?'Laki Laki':'Wanita';
                }),
            array(
                'db' => 'username',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('guru/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('guru/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'guru/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_guru->save();
            $this->session->set_flashdata('data_guru_masuk', 'Data Telah Dihapus');
            redirect('guru');
        } else {
            $this->template->load('template', 'guru/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_guru->update();
            $this->session->set_flashdata('data_guru_change', 'Data Telah Dihapus');
            redirect('guru');
        }else{
            $username      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tbl_guru',array('username'=>$username))->row_array();
            $this->template->load('template', 'guru/edit',$data);
        }
    }
    
    function delete(){
        $username = $this->uri->segment(3);
        if(!empty($username)){
            // proses delete data
            $this->db->where('username',$username);
            $this->db->delete('tbl_guru');
            $this->session->set_flashdata('data_guru_hapus', 'Data Telah Dihapus');
        }
        redirect('guru');
    }

}