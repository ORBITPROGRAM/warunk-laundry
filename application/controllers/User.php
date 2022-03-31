<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->library('form_validation');
	}

	public function index()	{
		$data['title'] = "Data User";
		$data['user'] = $this->UserModel->getUser();

		$this->load->view('user/index', $data);
	}

	public function addUser() {
		$data['title'] = "Data User Baru";

		$this->load->view('user/add_user', $data);
	}

	public function addUserProses() {
		
		$nama_user	= htmlspecialchars($this->input->post('nama_user', true));
		$username	= htmlspecialchars($this->input->post('username', true));
		$password	= htmlspecialchars($this->input->post('password', true));
		$role		= htmlspecialchars($this->input->post('role', true));

		$data = array (
			'nama_user'		=> $nama_user,
			'username'		=> $username,
			'password'		=> $password,
			'role'			=> $role
		);

		$this->UserModel->insertUser($data);
		
		redirect('user');
	}

	public function editUser($id_user) {
		$data['title'] = "Edit Data User";

		$data['user'] = $this->UserModel->getById($id_user);

		$this->load->view('user/edit_user', $data);
	}

	public function editUserProses() {
		$id_user 	= htmlspecialchars($this->input->post('id_user', true));
		$nama_user	= htmlspecialchars($this->input->post('nama_user', true));
		$username	= htmlspecialchars($this->input->post('username', true));
		$password	= htmlspecialchars($this->input->post('password', true));
		$role		= htmlspecialchars($this->input->post('role', true));

		$data = array (
			'nama_user'		=> $nama_user,
			'username'		=> $username,
			'password'		=> $password,
			'role'			=> $role
		);

		$this->UserModel->updateUser($data, $id_user);

		redirect('user');
	}

	public function deleteUser($id_user) {
		$delete = $this->UserModel->deleteUser($id_user);

		redirect('user');
	}
}
