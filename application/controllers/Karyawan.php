<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('KaryawanModel');
	}

	public function index()
	{
		$data['title'] = "List Karyawan";
		$data['karyawan'] = $this->KaryawanModel->getKaryawan();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('karyawan/index', $data);
		$this->load->view('templates/footer');
	}

	public function addKaryawan() {
		$data['title'] = "Data Karyawan Baru";

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('karyawan/add_karyawan', $data);
		$this->load->view('templates/footer');
	}

	public function addKaryawanProses() {
		

		$this->_rulesKaryawan();
		if($this->form_validation->run() == false) {
			$data['title'] = "Data Karyawan Baru";
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('karyawan/add_karyawan', $data);
			$this->load->view('templates/footer');

		}else{
			$nip			= htmlspecialchars($this->input->post('nip'));
			$nama_karyawan	= htmlspecialchars($this->input->post('nama_karyawan'));
			$role			= htmlspecialchars($this->input->post('role'));
			$tgl_lahir		= htmlspecialchars($this->input->post('tgl_lahir'));
			$jenis_kelamin	= htmlspecialchars($this->input->post('jenis_kelamin'));
			$no_hp			= htmlspecialchars($this->input->post('no_hp'));
			$email			= htmlspecialchars($this->input->post('email'));
			$tgl_masuk		= htmlspecialchars($this->input->post('tgl_masuk'));
			//$foto			= $_FILES['foto']['name'];
			$alamat			= htmlspecialchars($this->input->post('alamat'));

			// var_dump($nip);
			// var_dump($nama_karyawan);
			// var_dump($role);
			// var_dump($tgl_lahir);
			// var_dump($jenis_kelamin);
			// var_dump($no_hp);
			// var_dump($email);
			// var_dump($tgl_masuk);
			// var_dump($foto);
			// var_dump($alamat);

			// Handle of Image File
			/*if ($foto) {
				$config['upload_path'] 		= './assets/img/uploads/foto/';
				$config['allowed_types'] 	= 'jpg|jpeg|gif|png';

				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					if ($this->upload->do_upload('foto')) {
						$dataFoto = $this->upload->data();
						// Compress
						$config['image_library'] 	= 'gd2';
						$config['source_image']  	= './assets/img/uploads/foto/' . $dataFoto['file_name'];
						$config['create_thumb']  	= false;
						$config['width']         	= 500;
						$config['height']        	= 500;
						$config['maintain_ratio'] 	= true;
						$config['quality']       	= '80%';
						$config['new_image']		= './assets/img/uploads/foto/' . $dataFoto['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						
						$fotoBaru = $dataFoto['file_name'];
						var_dump($fotoBaru);
						$dataKaryawan = array(
							'nip'			=> $nip,
							'nama_lengkap' 	=> $nama_karyawan,
							'role' 			=> $role,
							'jenis_kelamin' => $jenis_kelamin,
							'no_hp' 		=> $no_hp,
							'email'			=> $email,
							'tgl_masuk' 	=> $tgl_masuk,
							'foto' 			=> $fotoBaru,
							'alamat' 		=> $alamat
						);

						
						$karyawan = $this->KaryawanModel->insertKaryawa($dataKaryawan);
											
						if ($karyawan == 1) {
							redirect('karyawan/sukses' . $nip );
							
						} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"<strong>Pembelian Gagal Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('karyawan');
						}
					}
				}
			} else {*/
				$dataKaryawan = array(
					'nip'			=> $nip,
					'nama_karyawan'	=> $nama_karyawan,
					'kode_jabatan' 	=> $role,
					'jenis_kelamin' => $jenis_kelamin,
					'no_hp' 		=> $no_hp,
					'email'			=> $email,
					'join_date' 	=> $tgl_masuk,
					//'foto' 			=> $fotoBaru,
					'alamat' 		=> $alamat
				);

				
				$karyawan = $this->KaryawanModel->insertKaryawan($dataKaryawan);
									
				if ($karyawan == 1) {
					redirect('karyawan/sukses/' . $nip );
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"<strong>Pembelian Gagal Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('karyawan');
				}
			
		}
	}

	// Notif Karyawan berhasil ditambahkan
	public function karyawanSukses()
	{
		$nip = rawurldecode($this->uri->segment(3));

		$data['title'] = "Karyawan Berhasil Disimpan";
		$data['karyawan'] = $this->KaryawanModel->getByNip($nip);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('karyawan/karyawan_berhasil', $data);
		$this->load->view('templates/footer');
	}

	private function _rulesKaryawan() {		
		// Form validation
		$this->form_validation->set_rules('nip', 'Nomor Indek Pegawai', 'trim|required|max_length[16]' , array('required' => '%s Tidak Boleh Kosong!', 'max_length' => '{field} Harus Maksimal {param} Karakter'));
		$this->form_validation->set_rules('nama_karyawan', 'Nama Lengkap', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => '%s Tidak Boleh Kosong!'));
	}
}
