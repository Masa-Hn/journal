<?php
class ReallocateAmbassadorModel extends CI_Model {

	public function checkAvailableRequests()
	{	
		$query = $this->db->query("SELECT COUNT(IF(`is_done`=0,1, NULL)) FROM `leader_request`");
	    return $query->result();
	}//checkAvailableRequests


	public function getLeaderInfo($id)
	{
		$this->db->where('id',$id);
    	$this->db->from('leader_info');
    	return $this->db->get()->row();

	}


	//ANY LEADER
	public function newTeamsAnyLeader($ambassador_gender,$leader_id)
	{
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.date, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_request.is_done = 0 AND leader_request.current_team_count = 0 AND ( leader_request.gender = '".$ambassador_gender."' OR leader_request.gender = 'any') AND (leader_info.leader_gender = 'female' OR leader_info.leader_gender = 'male') AND leader_id != ".$leader_id." ORDER BY leader_request.date ASC LIMIT 1";
		$query = $this->db->query($sql);
	    return $query->row();

	}//getNewTeams

	public function anyLeader($ambassador_gender,$logical_operator,$leader_id)
	{
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.current_team_count, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_request.is_done = 0 AND leader_request.current_team_count ".$logical_operator." 12 AND ( leader_request.gender = '".$ambassador_gender."' OR leader_request.gender = 'any') AND (leader_info.leader_gender = 'female' OR leader_info.leader_gender = 'male') AND leader_id != ".$leader_id." ORDER BY leader_request.date ASC LIMIT 1";
		$query = $this->db->query($sql);
	    return $query->row();

	}//getTeams



	public function getNewTeams($Leader_gender,$ambassador_gender,$leader_id)
	{
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.date, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_request.is_done = 0 AND leader_request.current_team_count = 0 AND ( leader_request.gender = '".$ambassador_gender."' OR leader_request.gender = 'any') AND leader_info.leader_gender = '" .$Leader_gender."' AND leader_id != ".$leader_id." ORDER BY leader_request.date ASC LIMIT 1";
		$query = $this->db->query($sql);
	    return $query->row();

	}//getNewTeams

	public function getTeams($Leader_gender,$ambassador_gender,$logical_operator,$leader_id)
	{
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.current_team_count, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_request.is_done = 0 AND leader_request.current_team_count ".$logical_operator." 12 AND (leader_request.gender = '".$ambassador_gender."' OR leader_request.gender = 'any') AND leader_info.leader_gender = '".$Leader_gender. "' AND leader_id != ".$leader_id." ORDER BY leader_request.date ASC LIMIT 1";
		$query = $this->db->query($sql);
	    return $query->row();

	}//getTeams

	public function getRequestInfo($request_id){
		$this->db->where('Rid',$request_id);
    	$this->db->from('leader_request');
    	return $this->db->get()->row();

	}//getRequestInfo




}//SignUpModel

?>
