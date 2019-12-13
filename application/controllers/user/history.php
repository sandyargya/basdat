<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

    
       function __construct(){
        parent::__construct();      
        $this->load->model('admin');
        $this->load->helper('url');
        }

    public function index ()
    {
        $user_id =$this->session->userdata('user_id');
        $data['peminjam'] = $this->admin->get_peminjam_user($user_id)->result();
        $this->load->view("user/histori_peminjaman",$data);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}