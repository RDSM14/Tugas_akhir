<?php

Class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_users');
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
    }

    function data() {
        // nama tabel
        $table = 'v_tbl_user';
        // nama PK
        $primaryKey = 'id_user';
        // list field
        $columns = array(
            array('db' => 'foto', 'dt' => 'foto'),
            array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
            array('db' => 'nama_level', 'dt' => 'nama_level'),
            array(
                'db' => 'id_user',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('users/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('users/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'users/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uplodFoto = $this->upload_foto_user();
            $this->Model_users->save($uplodFoto);
            redirect('users');
        } else {
            $this->template->load('template', 'users/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $uplodFoto = $this->upload_foto_user();
            $this->Model_users->update($uplodFoto);
            redirect('users');
        }else{
            $id_user       = $this->uri->segment(3);
            $data['user']  = $this->db->get_where('tbl_user',array('id_user'=>$id_user))->row_array();
            $this->template->load('template', 'users/edit',$data);
        }
    }
    
    function delete(){
        $id_user = $this->uri->segment(3);
        if(!empty($id_user)){
            // proses delete data
            $this->db->where('id_user',$id_user);
            $this->db->delete('tbl_user');
        }
        redirect('users');
    }
    
    
     function upload_foto_user(){
        $config['upload_path']          = './uploads/foto_user/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
    
    function rule(){
        $this->template->load('template','users/rule');
    }
    
    function modul(){
        $level_user = $_GET['level_user'];
        $id_sekolah = $_SESSION['id_sekolah'];
        echo "<table id='mytable2' class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th width='10'>NO</th>
                        <th>NAMA MODULE</th>
                        <th width='100'>READ</th>
                        <th width='100'>UPDATE / UBAH</th>
                        <th width='100'>INPUT & DELETE</th>
                    </tr>";
        
        $menu = $this->db->get('tabel_menu');
        $no=1;
        foreach ($menu->result() as $row){
            echo "<tr>
                <td>$no</td>
                <td>".  strtoupper($row->nama_menu)."</td>
                <td align='center'><input type='checkbox' ";
            $this->chek_akses($level_user, $row->id,$id_sekolah);
             echo " onclick='addRule($row->id)'></td>
                
                <td align='center'><input type='checkbox' ";
            $this->chek_upd($level_user, $row->id,$id_sekolah);
             echo " onclick='updRule($row->id)'></td>
                
                <td align='center'><input type='checkbox' ";
            $this->chek_indel($level_user, $row->id,$id_sekolah);
             echo " onclick='indelRule($row->id)'></td>
                
                </tr>";
            $no++;
        }
        
        echo"</thead>
            </table>";
    }
    
    function chek_akses($level_user,$id_menu,$id_sekolah){
        $data = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah);
        $chek = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()>0){
            echo "checked";
        }
    }
    
    function chek_upd($level_user,$id_menu,$id_sekolah){
        $data = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah,'upd'=>'1');
        $chek = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()>0){
            echo "checked";
        }
        /*$this->db->select('upd');
        $query = $this->db->query('SELECT upd FROM tbl_user_rule');
        $this->db->where('id_level_user', $level_user);
        $this->db->where('id_sekolah', $id_sekolah);
        $this->db->where('id_menu', $id_menu);
        $upd = $this->db->get('tbl_user_rule');
        // = $query->result();
        $sql = "SELECT upd FROM `tbl_user_rule` WHERE id_menu='$id_menu' AND id_level_user='$level_user' AND id_sekolah = '$level_user'";
        $query = $this->db->query($sql);
        $hasil = $query->result();
        if($query == 1){
            echo "checked";
        }*/
    }
    function chek_indel($level_user,$id_menu,$id_sekolah){
        $data = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah,'indel'=>'1');
        $chek = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()>0){
            echo "checked";
        }
    }




    function addrule(){
        $level_user = $_GET['level_user'];
        $id_menu    = $_GET['id_menu'];
        $id_sekolah = $_SESSION['id_sekolah'];
        $data       = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah);
        $chek       = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()<1){
            $this->db->insert('tbl_user_rule',$data);
            echo "berhasil memberikan akses modul";
        }else{
            $this->db->where('id_menu',$id_menu);
            $this->db->where('id_level_user',$level_user);
            $this->db->where('id_sekolah',$id_sekolah);
            $this->db->delete('tbl_user_rule');
            echo " berhasil delete akses modul";
        }
    }
    
    function updrule(){
        $level_user = $_GET['level_user'];
        $id_menu    = $_GET['id_menu'];
        $id_sekolah = $_SESSION['id_sekolah'];
        $data       = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah,'upd'=>'1');
        $chek       = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()<1){
            $value = array(
            'upd'     => 1,
            );
            $this->db->where('id_level_user', $level_user);
            $this->db->where('id_sekolah', $id_sekolah);
            $this->db->where('id_menu', $id_menu);
            $this->db->update('tbl_user_rule',$value);
        }else{
            $value = array(
            'upd'     => 0,
            );
            $this->db->where('id_level_user', $level_user);
            $this->db->where('id_sekolah', $id_sekolah);
            $this->db->where('id_menu', $id_menu);
            $this->db->update('tbl_user_rule',$value);
            
        }
    }
    
    function indelrule(){
        $level_user = $_GET['level_user'];
        $id_menu    = $_GET['id_menu'];
        $id_sekolah = $_SESSION['id_sekolah'];
        $data       = array('id_level_user'=>$level_user,'id_menu'=>$id_menu,'id_sekolah'=>$id_sekolah,'indel'=>'1');
        $chek       = $this->db->get_where('tbl_user_rule',$data);
        if($chek->num_rows()<1){
            $value = array(
            'indel'     => 1,
            );
            $this->db->where('id_level_user', $level_user);
            $this->db->where('id_sekolah', $id_sekolah);
            $this->db->where('id_menu', $id_menu);
            $this->db->update('tbl_user_rule',$value);
        }else{
            $value = array(
            'indel'     => 0,
            );
            $this->db->where('id_level_user', $level_user);
            $this->db->where('id_sekolah', $id_sekolah);
            $this->db->where('id_menu', $id_menu);
            $this->db->update('tbl_user_rule',$value);
            
        }
    }
        
        

}