<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('JabatanModel');
		$this->load->library('form_validation');
	}

	public function index()	{
		$data['title'] = "Data Jabatan dan Upah";
		$data['jabatan'] = $this->JabatanModel->getJabatan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jabatan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addJabatan() {
		$data['title'] = "Data Jabatan Baru";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jabatan/add_jabatan', $data);
		$this->load->view('templates/footer', $data);
		
	}

	public function addJabatanProses() {

		$this->_rules();
		if($this->form_validation->run() == false) {
			$data['title'] = "Data Jabatan Baru";
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('jabatan/add_jabatan', $data);
			$this->load->view('templates/footer');
		}else{
			$kode_jabatan	= htmlspecialchars($this->input->post('kode_jabatan', true));
			$nama_jabatan	= htmlspecialchars($this->input->post('nama_jabatan', true));
			$gaji_pokok		= htmlspecialchars($this->input->post('gaji_pokok', true));
			$uang_makan		= htmlspecialchars($this->input->post('uang_makan', true));

			$data = array (
			'kode_jabatan'		=> $kode_jabatan,
			'nama_jabatan'		=> $nama_jabatan,
			'gaji_pokok'		=> $gaji_pokok,
			'uang_makan'		=> $uang_makan
			);

			$jabatan = $this->JabatanModel->insertJabatan($data);
			if($jabatan == 1) {
				redirect('jabatan');
			}else{
				redirect('jabatan/add');
			}
		}	
	}

	public function editJabatan($kode_jabatan) {
		
		$data['title'] = "Edit Data Jabatan";
		$data['jabatan'] = $this->JabatanModel->getById($kode_jabatan);
		$this->load->view('jabatan/edit_jabtan', $data);

	}

	public function editJabatanProses() {
		
		$this->_rules();
		if($this->form_validation->run() == false) {
			$data['title'] = "Edit Data Jabatan";
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('jabatan/insert', $data);
			$this->load->view('templates/footer');

		}else{ 
			$kode_jabtan 	= htmlspecialchars($this->input->post('kode_jabtan', true));
			$nama_jabatan	= htmlspecialchars($this->input->post('nama_jabatan', true));
			$gaji_pokok		= htmlspecialchars($this->input->post('gaji_pokok', true));
			$uang_makan		= htmlspecialchars($this->input->post('uang_makan', true));

			$data = array (
				'nama_jabatan'		=> $nama_jabatan,
				'gaji_pokok'		=> $gaji_pokok,
				'uang_makan'		=> $uang_makan
			);
			
			$jabatan = $this->JabatanModel->updateJabatan($data, $kode_jabatan);
			if(jabatan == 1) {
				redirect('jabatan');
			}else{
				redirect('jabatan');
			}
		}
	}

	public function deleteJabatan($kode_jabatan) {
		$delete = $this->JabatanModel->deleteJabatan($kode_jabatan);

		redirect('jabatan');
	}

	private function _rules() {
		$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('uang_makan', 'Uang Makan', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
	}
}
