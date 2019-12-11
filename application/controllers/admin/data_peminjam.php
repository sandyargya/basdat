<?php

class Data_peminjam extends CI_Controller
{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
        $this->load->helper('url');
	}

	public function index()
	{
		$data['peminjam'] = $this->admin->get_peminjam()->result();
		$this->load->view("header");
		$this->load->view("admin/data_peminjam",$data);
		$this->load->view("footer");
	}

	public function editpeminjam()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_peminjam");
		$this->load->view("footer");
	}

	//public function hapus($id_user){
  	//	$this->tb_user->delete($id_user);
	//	redirect('admin/data_user');
	//}

	function add_peminjam() {
		$id_visitor = $this->input->post('id_visitor');
		$id_buku = $this->input->post('id_buku');
		$start = $this->input->post('tanggal_mulai');
		$end = $this->input->post('tanggal_selesai');		
		$data = array (
			'id_peminjam' => "",
			'id_visitor' => $id_visitor,
			'id_buku' => $id_buku,
			'start' => $start,
			'end' => $end
 		);
 		$query = "SELECT * from tb_peminjam u
 		where id_peminjam='" . $data['id_peminjam'] . "'";

 		$hasil = $this->db->query($query);
 		$oke = $hasil->result_array();
 		$cek = $hasil ->num_rows();
 		if ($hasil->num_rows() > 0) {
 			$this->session0>set_flashdata('hapus','Peminjam sudah terdaftar');
 			redirect('admin/data_peminjam');
 		} else {
 			$insert = $this->admin->added_peminjam($data);
 			if ($insert != '') {
 				$id 	= $this->db->insert_id();
				 $this->session->set_flashdata('pesan','Peminjam berhasil terdaftar');
				 redirect('admin/data_peminjam');
 			} else {
 				$this->session->set_flashdata('hapus','Peminjam sudah terdaftar');
 				redirect('admin/data_peminjam');
 			}
 		}
	}

	function get_peminjam_edit($id_peminjam){
		$data = $this->admin->get_peminjam_edit($id_peminjam);
		echo json_encode($data);
	}

	function edited_peminjam(){
		$id_peminjam = $this->input->post('id_peminjam_edit');
		$id_visitor = $this->input->post('id_visitor');
		$id_buku = $this->input->post('id_buku');
		$start = $this->input->post('tanggal_mulai');
		$end = $this->input->post('tanggal_selesai');		
		$data = array(
			'id_buku' => $id_buku,
			'start' => $start,
			'end' => $end
		);
		$query = "SELECT * from (select * from tb_peminjam where id_peminjam <> " . $id_peminjam . ") u 
		where id_peminjam= '" . $data['id_peminjam'] . "'";
		$hasil = $this->db->query($query);
		$oke = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus','Peminjam sudah terdaftar');
			redirect('admin/data_peminjam');
		} else {
			$this->admin->edit_peminjam(array('id_peminjam' => $this->input->post('id_peminjam_edit')), $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/data_peminjam');
		}
	}

	public function delete_peminjam() {
		$id_peminjam = $this->input->post('id_peminjam');
		$this->admin->delete_peminjam($id_peminjam);
		$this->session->set_flashdata('pesan','Data berhasil dihapus');
		redirect('admin/data_peminjam');
	}
}

?>