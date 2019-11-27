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
	
	}

	public function editbuku()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_buku");
		$this->load->view("footer");
	}

	function add_buku()
	{
		$id_buku = $this->input->post('idbuku');
		$judul = $this->input->post('judulbuku');
		$isbn = $this->input->post('isbnbuku');
		$genre = $this->input->post('genrebuku');
		$id_pengarang = $this->input->post('pengarangbuku');

		$data = array (
			'idbuku' =>$id_buku,
			'judulbuku' =>$judul,
			'isbnbuku' =>$isbn,
			'genrebuku' =>$genre,
			'pengarangbuku' =>$id_pengarang
		);

		$this->admin->input_data($id_buku,$judul,$isbn,$genre,$id_pengarang);
		redirect('admin/data_buku');
	}
}
?>