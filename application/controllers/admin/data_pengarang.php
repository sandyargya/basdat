<?php

class Data_pengarang extends CI_Controller
{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin');
        $this->load->helper('url');
	}

	public function index()
	{
		$data['pengarang'] = $this->admin->get_pengarang()->result();
		$this->load->view("header");
		$this->load->view("admin/data_pengarang",$data);
		$this->load->view("footer");
	}

	public function editpengarang()
	{
		$this->load->view("header");
		$this->load->view("admin/edit_pengarang");
		$this->load->view("footer");
	}

	//public function hapus($id_user){
  	//	$this->tb_user->delete($id_user);
	//	redirect('admin/data_user');
	//}

	function add_pengarang() {
		$id_pengarang = $this->input->post('id_pengarang');
		$nama_pengarang = $this->input->post('nama_pengarang');
		$alamat = $this->input->post('alamat');
		$no_telepon = $this->input->post('no_telepon');
		$data = array (
			'id_pengarang' => $id_pengarang,
			'nama_pengarang' => $nama_pengarang,
			'Alamat' => $alamat,
			'No_telp' => $no_telepon
 		);
 		$query = "SELECT * from tb_pengarang u
 		where id_pengarang='" . $data['id_pengarang'] . "'";

 		$hasil = $this->db->query($query);
 		$oke = $hasil->result_array();
 		$cek = $hasil ->num_rows();
 		if ($hasil->num_rows() > 0) {
 			$this->session0>set_flashdata('hapus','Pengarang sudah terdaftar');
 			redirect('admin/data_pengarang');
 		} else {
 			$insert = $this->admin->added_pengarang($data);
 			if ($insert != '') {
 				$id 	= $this->db->insert_id();
				 $this->session->set_flashdata('pesan','Pengarang berhasil terdaftar');
				 redirect('admin/data_pengarang');
 			} else {
 				$this->session->set_flashdata('hapus','Pengarang sudah terdaftar');
 				redirect('admin/data_pengarang');
 			}
 		}
	}

	function get_pengarang_edit($id_pengarang){
		$data = $this->admin->get_pengarang_edit($id_pengarang);
		echo json_encode($data);
	}

	function edited_pengarang(){
		$id_pengarang = $this->input->post('id_pengarang_edit');
		$nama_pengarang = $this->input->post('nama_pengarang');
		$alamat = $this->input->post('alamat');
		$no_telepon = $this->input->post('no_telepon');
		echo '<script type="text/javascript">';		
		echo 'console.log("idpengarang")'.$id_pengarang;
		echo '</script>';
		$data = array (
			'id_pengarang' => $id_pengarang,
			'nama_pengarang' => $nama_pengarang,
			'Alamat' => $alamat,
			'No_telp' => $no_telepon
 		);
		$query = "SELECT * from (select * from tb_pengarang where id_pengarang <> " . $id_pengarang . ") u 
		where id_pengarang= '" . $data['id_pengarang'] . "'";
		
		
		$hasil = $this->db->query($query);
		$oke = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus','Pengarang sudah terdaftar');
			redirect('admin/data_pengarang');
		} else {
			$this->admin->edit_pengarang(array('id_pengarang' => $this->input->post('id_pengarang_edit')), $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/data_pengarang');
		}
	}

	public function delete_pengarang() {
		$id_pengarang = $this->input->post('id_pengarang');
		$this->admin->delete_pengarang($id_pengarang);
		$this->session->set_flashdata('pesan','Data berhasil dihapus');
		redirect('admin/data_pengarang');
	}
}

?>