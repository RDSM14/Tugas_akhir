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
            $logo = $this->input->post('foto_sekolah', TRUE);
            $uploadFoto = $this->upload_foto_sekolah($logo);
            $this->model_sekolah->update($uploadFoto);
            $this->session->set_flashdata('data_sekolah_masuk', 'Data Telah Disimpan');
            redirect('sekolah');
        } else {
            $data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah' => 1,'id_sekolah'=> $_SESSION['id_sekolah']))->row_array();
            $this->template->load('template', 'info_sekolah', $data);
        }
    }

    function upload_foto_sekolah($logo){
        $config['upload_path']          = './logosekolah/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload($logo);
        if( empty($this->upload->do_upload($logo)) ){
			$error = array( 'error' => $this->upload->display_errors() );
            redirect('siswa');
		}
		else{
			$data = array( 'upload_data' => $this->upload->data() );
		}
        //$upload = $this->upload->data();
        return $upload_data['file_name'];
    }
    
    
    
    
    
    
    
    
    
}

