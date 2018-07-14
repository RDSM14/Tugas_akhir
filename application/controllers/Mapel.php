<?php

Class Mapel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_mapel');
    }

    function data() {
        // nama tabel
        $table = 'tbl_mapel';
        // nama PK
        $primaryKey = 'kd_mapel';
        // list field
        $columns = array(
            array('db' => 'id_mapel', 'dt' => 'id_mapel'),
            array('db' => 'kd_mapel', 'dt' => 'kd_mapel'),
            array('db' => 'min_a', 'dt' => 'min_a'),
            array('db' => 'min_b', 'dt' => 'min_b'),
            array('db' => 'min_c', 'dt' => 'min_c'),
            array('db' => 'min_d', 'dt' => 'min_d'),
            array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
            array(
                'db' => 'id_mapel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('mapel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('mapel/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $this->template->load('template', 'mapel/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_mapel->save();
            $this->session->set_flashdata('data_mapel_masuk', 'Data Telah Disimpan');
            redirect('mapel');
        } else {
            $data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah' => 1,'id_sekolah'=> $_SESSION['id_sekolah']))->row_array();
            //$this->template->load('template', 'info_sekolah', $data);
            $this->template->load('template', 'mapel/add', $data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_mapel->update();
            $this->session->set_flashdata('data_mapel_ubah', 'Data Telah Berubah');
            redirect('mapel');
        }else{
            $id_mapel      = $this->uri->segment(3);
           
            //$data['mapel'] = $this->db->get_where('tbl_mapel',array('id_mapel'=>$id_mapel))->row_array();
            $this->db->select('*, a.nama_mapel as amapel,a.id_mapel as id_mpel,a.kd_mapel as kode,a.min_a as nilai_a,a.min_b as nilai_b,a.min_c as nilai_c,a.min_d as nilai_d,b.nilai_max as maximal,b.nilai_min as minimal');
            $this->db->from('tbl_mapel a'); 
            $this->db->join('tbl_sekolah_info b', 'b.id_sekolah=a.id_sekolah', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $query = $this->db->get(); 
            $data['mapel'] = $query->result();
            $this->template->load('template', 'mapel/edit', $data);
        }
    }
    
    function delete(){
        $id_mapel = $this->uri->segment(3);
        if(!empty($id_mapel)){
            // proses delete data
            $this->db->where('id_mapel',$id_mapel);
            $this->db->delete('tbl_mapel');
        }
        $this->session->set_flashdata('data_mapel_hapus', 'Data Telah Disimpan');
        redirect('mapel');
    }

}