<?php

class Data_user extends CI_Controller
{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
        $this->load->helper('url');
	}

	public function index()
	{
		$data['user'] = $this->admin->get_user()->result();
		$this->load->view("header");
		$this->load->view("admin/data_user",$data);
		$this->load->view("footer");
	}

	public function edituser()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_user");
		$this->load->view("footer");
	}

	public function hapus($id_user){
  		$this->tb_user->delete($id_user);
		redirect('admin/data_user');
	}
}

?>