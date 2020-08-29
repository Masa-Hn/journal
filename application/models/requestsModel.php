<?php
class RequestsModel extends CI_Model {

	public function addRequest($data)
	{
		return $this->db->insert('requests', $data);
	}

	public function getDate($leaderEmail)
	{
		$this->db->where('leader_email', $leaderEmail);
		return $this->db->get('requests');
	}
}