<?php

class JabatanModel extends CI_Model {
	private $_jabatan_tbl = 'jabatan';

	public function getJabatan() {
		$query = $this->db->get($this->_jabatan_tbl);
		if($query == TRUE) {
			return 1;
		}else{
			return 0;
		}
	}

	public function insertJabatan($data) {
		return $this->db->insert($this->_jabatan_tbl, $data);
	}

	public function getById($kode_jabatan) {
		$query = $this->db->get_where($this->_jabatan_tbl, array('kode_jabatan' => $kode_jabatan));
		return $query->result();
	}

	public function updateJabatan($data, $kode_jabatan)	{
		$this->db->update($this->_jabatan_tbl, $data, array('kode_jabatan' => $kode_jabatan));
	}

	public function deleteJabatan($kode_jabatan) {
		return $this->db->delete($this->_jabatan_tbl, array('kode_jabatan' => $kode_jabatan));
	}
}

?>
