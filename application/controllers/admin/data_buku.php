<?php

class Data_buku extends CI_Controller
{
	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
        $this->load->helper('url');
	}

	public function index ()
	{
		$data['buku'] = $this->admin->get_book()->result();
		$this->load->view("header");
		$this->load->view("admin/data_buku",$data);
		$this->load->view("footer");
	}

	public function addbuku()
	{
		$this->load->view("header");
		$this->load->view("admin/add_buku");
		$this->load->view("footer");
	}

	public function editbuku()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_buku");
		$this->load->view("footer");
	}

	function hapus($data){
  		$this->admin->delete($data);
		redirect('admin/data_buku');
	}
}
?>