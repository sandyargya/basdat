<?php
class Cetak extends CI_Controller
{
	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
		$this->load->helper('url');
	}
	public function index ()
	{
		$data['buku'] = $this->admin->get_book()->result();
		$data['pengarang'] = $this->admin->get_pengarang()->result();
		$this->load->view("cetak/c_buku",$data);
	}

	function pengarang ()
	{
		$data['pengarang'] = $this->admin->get_pengarang()->result();
		$this->load->view("cetak/c_pengarang",$data);
	}

	function pengunjung()
	{
		$data['pengunjung'] = $this->admin->get_pengunjung()->result();
		$this->load->view("cetak/c_pengunjung",$data);
	}
	function peminjam()
	{
		$data['peminjam'] = $this->admin->get_peminjam()->result();
		$this->load->view("cetak/c_peminjam",$data);
	}

	function users()
	{
		$data['user'] = $this->admin->get_user()->result();
		$this->load->view("cetak/c_user",$data);
	}
}
?>