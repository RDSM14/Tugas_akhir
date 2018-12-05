<?php

Class sekolah extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        $this->load->model('model_sekolah');
    }
    
    function index() {
        if (isset($_POST['submit'])) {
            //$logo = $this->input->post('foto_sekolah', TRUE);
            $uploadFoto = $this->upload_foto_sekolah();
            $this->model_sekolah->update($uploadFoto);
            $this->session->set_flashdata('data_sekolah_masuk', 'Data Telah Disimpan');
            redirect('sekolah');
        } else {
            $data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah' => 1,'id_sekolah'=> $_SESSION['id_sekolah']))->row_array();
            $this->template->load('template', 'info_sekolah', $data);
        }
    }

    function upload_foto_sekolah(){
        $config['upload_path'] = './logosekolah/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '50000';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('foto_sekolah');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
    
    
    
    
    
    
    
    
}

