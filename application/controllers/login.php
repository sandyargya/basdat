<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		//load library from validasi
		$this->load->library('form_validation');
		//load model admin
		$this->load->model('admin');
	}

	public function index()
    {

            if($this->admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboard");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('tb_user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'user_nama' => $apps->nama_user,
                            'role'      => $apps->role
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "admin"){
                            redirect('admin/dashboard/');
                        }else{                            
                            $this->add_pengunjung($session_data['user_id']);
                            // redirect('user/dashboard/');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }

    public function add_pengunjung($user_id) {		
        $tanggal = date('Y-m-d');	
		$data = array (
            'id_visitor' => "",
			'id_user' =>$user_id,
			'tanggal' =>$tanggal
		);
		$query = "SELECT * from tb_pengunjung u
		where id_user='" . $data['id_user'] . "' AND tanggal='" .$data['tanggal'] ."'";
		
		$hasil = $this->db->query($query);
		$yay = $hasil->result_array();
		$cek = $hasil->num_rows();
		if ($hasil->num_rows() > 0) {
			$this->session->set_flashdata('hapus', 'Data already exist');
			redirect('user/dashboard/');
		} else {
			$insert = $this->admin->added_pengunjung($data);
			if ($insert != '') {
				$id     = $this->db->insert_id();
				$this->session->set_flashdata('pesan', 'Data successfully add');
				redirect('user/dashboard/');
			} else {
				$this->session->set_flashdata('hapus', 'Data already exist');
				redirect('user/dashboard/');
			}
		}
	}
}
?>