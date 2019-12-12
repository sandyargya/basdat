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
		$data['pengarang'] = $this->admin->get_pengarang()->result();
		$this->load->view("header");
		$this->load->view("admin/data_buku",$data);
		$this->load->view("footer");
	}
	
	
	public function editbuku()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_buku");
		$this->load->view("footer");
	}
	function add_buku() {
		$id_buku = $this->input->post('id_buku');
		$judul = $this->input->post('judul');
		$isbn = $this->input->post('isbn');
		$genre = $this->input->post('genre');
		$id_pengarang = $this->input->post('id_pengarang');
		$stok = $this->input->post('stok');
		$data = array (
			'id_buku' =>$id_buku,
			'judul' =>$judul,
			'isbn' =>$isbn,
			'genre' =>$genre,
			'id_pengarang' =>$id_pengarang,
			'stok' => $stok
		);
		$query = "SELECT * from tb_buku u
		where id_buku='" . $data['id_buku'] . "'";
		
		$hasil = $this->db->query($query);
		$yay = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus', 'Data already exist');
			redirect('admin/data_buku');
		} else {
			$insert = $this->admin->added_buku($data);
			if ($insert != '') {
				$id     = $this->db->insert_id();
				$this->session->set_flashdata('pesan', 'Data successfully add');
				redirect('admin/data_buku');
			} else {
				$this->session->set_flashdata('hapus', 'Data already exist');
				redirect('admin/data_buku');
			}
		}
	}
	function get_buku_edit($id_buku){
		$data = $this->admin->get_edit_buku($id_buku);
		echo json_encode($data);
	}
	function edited_buku(){
		$id_buku = $this->input->post('id_buku_edit');
		$judul = $this->input->post('judul');
		$isbn = $this->input->post('isbn');
		$genre = $this->input->post('genre');
		$id_pengarang = $this->input->post('id_pengarang');
		$data = array(
		
			'judul' =>$judul,
			'isbn' =>$isbn,
			'genre' =>$genre,
			'id_pengarang' =>$id_pengarang,
			'stok' => $stok
		);
		$query = "SELECT * from (select * from tb_buku where id_buku <> " . $id_buku . ") u
		where id_buku='" . $data['id_buku'] . "'";
		$hasil = $this->db->query($query);
		$yay = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus', 'Data already exist');
			redirect('admin/data_buku');
		}else{
			$this->admin->edit_buku(array('id_buku' => $this->input->post('id_buku_edit')), $data);
			$this->session->set_flashdata('pesan', 'Data successfully update');
			redirect('admin/data_buku');
		}
	}
	public function delete_buku() {
		$id_buku = $this->input->post('id_buku');
		$this->admin->delete_buku($id_buku);
		$this->session->set_flashdata('pesan', 'Data successfully delete');
		redirect('admin/data_buku');
	}
	// function add_buku()
	// {
	// 	$id_buku = $this->input->post('idbuku');
	// 	$judul = $this->input->post('judulbuku');
	// 	$isbn = $this->input->post('isbnbuku');
	// 	$genre = $this->input->post('genrebuku');
	// 	$id_pengarang = $this->input->post('pengarangbuku');
	// 	$data = array (
	// 		'idbuku' =>$id_buku,
	// 		'judulbuku' =>$judul,
	// 		'isbnbuku' =>$isbn,
	// 		'genrebuku' =>$genre,
	// 		'pengarangbuku' =>$id_pengarang
	// 	);
	// 	print_r($data);
	// 	// $this->admin->input_data($id_buku,$judul,$isbn,$genre,$id_pengarang);
	// 	// redirect('admin/data_buku');
	// }
}
?>