<?php

Class Ruangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        $this->load->library('ssp');
        $this->load->model('Model_ruangan');
    }

    function data() {
        // nama tabel
        $table = 'tbl_ruangan';
        // nama PK
        $primaryKey = 'id_ruangan';
        // list field
        $columns = array(
            array('db' => 'kd_ruangan', 'dt' => 'kd_ruangan'),
            array('db' => 'nama_ruangan', 'dt' => 'nama_ruangan'),
            array(
                'db' => 'id_ruangan',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('ruangan/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('ruangan/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'ruangan/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_ruangan->save();
            $this->session->set_flashdata('data_ruang_masuk', 'Data');
            redirect('ruangan');
        } else {
            $this->template->load('template', 'ruangan/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_ruangan->update();
            $this->session->set_flashdata('data_ruang_change', 'Data');
            redirect('ruangan');
        }else{
            $id_ruangan      = $this->uri->segment(3);
            $data['ruangan'] = $this->db->get_where('tbl_ruangan',array('id_ruangan'=>$id_ruangan))->row_array();
            $this->template->load('template', 'ruangan/edit',$data);
        }
    }
    
    function delete(){
        $id_ruangan = $this->uri->segment(3);
        if(!empty($id_ruangan)){
            // proses delete data
            $this->db->where('id_ruangan',$id_ruangan);
            $this->db->delete('tbl_ruangan');
            $this->session->set_flashdata('data_ruang_hapus', 'Data');
        }
        redirect('ruangan');
    }

}