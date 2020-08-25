<?php
class RequestsModel extends CI_Model {

	public function addRequest($data)
	{
		return $this->db->insert('requests', $data);
	}

	public function getDate($leaderName)
	{
		$this->db->where('leader_name', $leaderName);
		return $this->db->get('requests');
	}
}