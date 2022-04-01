<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->library('form_validation');
	}

	public function index()	{
		$data['title'] = "User";
		$data['user'] = $this->UserModel->getUser();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addUserProses() {
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$data['title'] = "User";
			$data['user'] = $this->UserModel->getUser();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer', $data);
		}else {
			$nama_user	= htmlspecialchars($this->input->post('nama_user', true));
			$username	= htmlspecialchars($this->input->post('username', true));
			$password	= password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT);
			$akses		= htmlspecialchars($this->input->post('akses', true));

			$data = array (
				'nama_user'		=> $nama_user,
				'username'		=> $username,
				'password'		=> $password,
				'role'			=> $role
			);	
		}

		$this->UserModel->insertUser($data);
		
		redirect('user');
	}

	public function editUser($id_user) {
		$data['title'] = "Edit Data User";

		$data['user'] = $this->UserModel->getById($id_user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/edit_user', $data);
		$this->load->view('templates/footer', $data);
	}

	public function editUserProses() {
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_user = $this->input->post('id_user');
			$this->editUser($id_user);
		}else{
			$id_user 		= htmlspecialchars($this->input->post('id_user', true));
			$nama_lengkap	= htmlspecialchars($this->input->post('nama_lengkap', true));
			$username		= htmlspecialchars($this->input->post('username', true));
			$password		= htmlspecialchars($this->input->post('password', true));
			$akses			= htmlspecialchars($this->input->post('akses', true));
			
			$data = array (
				'nama_lengkap'	=> $nama_lengkap,
				'username'		=> $username,
				'password'		=> $password,
				'akses'			=> $akses
			);
	
			$this->UserModel->updateUser($data, $id_user);
	
			redirect('user');
		}	
	}

	public function deleteUser($id_user) {
		$delete = $this->UserModel->deleteUser($id_user);

		redirect('user');
	}

	private function _rules()
	{
		// Form validation
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists|min_length[5]', array('required' => '%s Tidak Boleh Kosong!', 'min_length' => '{field} Harus Minimal {param} Karakter'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array('required' => '%s Tidak Boleh Kosong!', 'min_length' => '{field} Harus Minimal {param} Karakter'));
		$this->form_validation->set_rules('akses', 'Level', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
	}

	// Check if username ada tidak?
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'Username sudah pernah digunakan atau digunakan oleh orang lain. Silahkan menggunakan username lain!');
		if ($this->UserModel->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}
}
