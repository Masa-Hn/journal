<?php
class LeaderInfoModel extends CI_Model {

	public function getInfoByTeamName($teamName)
	{
		$this->db->like('team_name', $teamName);
    	$this->db->from('leader_info');
    	$this->db->order_by("id", "desc");
    	return $this->db->get()->result();

	}
	public function getInfoByLeaderName($leaderName)
	{
		$this->db->like('leader_name', $leaderName);
    	$this->db->from('leader_info');
    	$this->db->order_by("id", "desc");
    	return $this->db->get()->result();

	}

}//LeaderInfoModel

?>
