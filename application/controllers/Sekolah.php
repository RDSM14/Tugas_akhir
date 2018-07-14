<?php

Class sekolah extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_sekolah');
    }
    
    function index() {
        if (isset($_POST['submit'])) {
            $this->model_sekolah->update();
            $this->session->set_flashdata('data_sekolah_masuk', 'Data Telah Disimpan');
            redirect('sekolah');
        } else {
            $data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah' => 1,'id_sekolah'=> $_SESSION['id_sekolah']))->row_array();
            $this->template->load('template', 'info_sekolah', $data);
        }
    }

}