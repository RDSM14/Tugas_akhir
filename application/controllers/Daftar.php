<?php

Class Daftar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
   
    function index() {
        $this->template->load('homepage', 'daftar/daftar');
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