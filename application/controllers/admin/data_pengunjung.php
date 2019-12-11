<?php
class Data_Pengunjung extends CI_Controller
{
	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
		$this->load->helper('url');
	}
	public function index ()
	{
		$data['pengunjung'] = $this->admin->get_pengunjung()->result();
		$this->load->view("header");
		$this->load->view("admin/data_pengunjung",$data);
		$this->load->view("footer");
	}
		
	
	
}
?>