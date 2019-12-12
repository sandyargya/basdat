<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_buku extends CI_Controller {

    
       function __construct(){
        parent::__construct();      
        $this->load->model('admin');
        $this->load->helper('url');
        }

    public function index ()
    {
        $data['buku'] = $this->admin->get_book()->result();
        $data['pengarang'] = $this->admin->get_pengarang()->result();
        $this->load->view("user/daftarbuku",$data);
    }


    public function request($id_buku)
    {
        $user_id =$this->session->userdata('user_id');
        $data = array (
            'id_buku' =>$id_buku,
            'id_user' => $user_id,
            'status' => 'request'
        );

        $insert = $this->admin->request($data);
            if ($insert != '') {
                $id     = $this->db->insert_id();
                $this->session->set_flashdata('pesan', 'Data successfully add');
                redirect('user/daftar_buku');
            }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}