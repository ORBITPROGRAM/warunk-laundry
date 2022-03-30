<?php

class UserModel extends CI_Model {
	private $_user_tbl = 'users';

	public function getUser() {
		$query = $this->db->get($this->_user_tbl);
		return $query->result();
	}

	public function insertUser($data) {
		return $this->db->insert($this->_user_tbl, $data);
	}

	public function getById($id_user) {
		$query = $this->db->get_where($this->_user_tbl, array('id_user' => $id_user));
		return $query->result();
	}

	public function updateUser($data, $id_user)	{
		$this->db->update($this->_user_tbl, $data, array('id_user' => $id_user));
	}

	public function deleteUser($id_user) {
		return $this->db->delete($this->_user_tbl, array('id_user' => $id_user));
	}
}

?>
