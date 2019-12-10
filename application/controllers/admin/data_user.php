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

	//public function hapus($id_user){
  	//	$this->tb_user->delete($id_user);
	//	redirect('admin/data_user');
	//}

	function add_user() {
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_user = $this->input->post('nama_user');
		$role = $this->input->post('role');
		$data = array (
			'id_user' => $id_user,
			'username' => $username,
			'password' => $password,
			'nama_user' => $nama_user,
			'role' => $role
 		);
 		$query = "SELECT * from tb_user u
 		where id_user='" . $data['id_user'] . "'";

 		$hasil = $this->db->query($query);
 		$oke = $hasil->result_array();
 		$cek = $hasil ->num_rows();
 		if ($hasil->num_rows() > 0) {
 			$this->session0>set_flashdata('hapus','User sudah terdaftar');
 			redirect('admin/data_user');
 		} else {
 			$insert = $this->admin->added_user($data);
 			if ($insert != '') {
 				$id 	= $this->db->insert_id();
				 $this->session->set_flashdata('pesan','User berhasil terdaftar');
				 redirect('admin/data_user');
 			} else {
 				$this->session->set_flashdata('hapus','User sudah terdaftar');
 				redirect('admin/data_user');
 			}
 		}
	}

	function get_user_edit($id_user){
		$data = $this->admin->get_user_edit($id_user);
		echo json_encode($data);
	}

	function edited_user(){
		$id_user = $this->input->post('id_user_edit');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_user = $this->input->post('nama_user');
		$role = $this->input->post('role');
		$data = array(
			'username' => $username,
			'password' => $password,
			'nama_user' => $nama_user,
			'role' => $role
		);
		$query = "SELECT * from (select * from tb_user where id_user <> " . $id_user . ") u 
		where id_user= '" . $data['id_user'] . "'";
		$hasil = $this->db->query($query);
		$oke = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus','User sudah terdaftar');
			redirect('admin/data_user');
		} else {
			$this->admin->edit_user(array('id_user' => $this->input->post('id_user_edit')), $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/data_user');
		}
	}

	public function delete_user() {
		$id_user = $this->input->post('id_user');
		$this->admin->delete_user($id_user);
		$this->session->set_flashdata('pesan','Data berhasil dihapus');
		redirect('admin/data_user');
	}
}

?>