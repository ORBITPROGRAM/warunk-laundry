<?php

class KaryawanModel extends CI_Model {
	
	private $_karyawan_tbl = 'karyawan';

	public function getKaryawan() {
		$query = $this->db->get($this->_karyawan_tbl);
		return $query->result();
	}

	public function insertKaryawan($dataKaryawan) {
		$insert =  $this->db->insert($this->_karyawan_tbl, $dataKaryawan);

		if($insert == true) {
			return 1;
		}else {
			return 0;
		}

	}

	public function getByNip($nip) {
		$query = $this->db->get_where($this->_karyawan_tbl, array('nip' => $nip));
		return $query->result();
	}

	public function getById($id_user) {
		$query = $this->db->get_where($this->_karyawan_tbl, array('id_user' => $id_user));
		return $query->result();
	}

	public function updateUser($data, $id_user)	{
		$this->db->update($this->_karyawan_tbl, $data, array('id_user' => $id_user));
	}

	public function deleteUser($id_user) {
		return $this->db->delete($this->_karyawan_tbl, array('id_user' => $id_user));
	}
}

?>
