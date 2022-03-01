<?php
class SignUpModel extends CI_Model {

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
	public function selectHighPriority($leader_gender,$ambassador_gender){
		$sql = "SELECT leader_request.Rid,leader_request.members_num,leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id INNER JOIN high_priority_requests ON leader_request.Rid = high_priority_requests.request_id WHERE ".$leader_gender." AND ".$ambassador_gender." AND leader_request.is_done = 0 ORDER BY high_priority_requests.id ASC LIMIT 1";

		$query = $this->db->query($sql);
	    return $query->row();

	}//selectHighPriority


	public function selectSpecialCare($leader_gender,$ambassador_gender){
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.date, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_info.leader_rank = 23  AND ".$leader_gender." AND ".$ambassador_gender." AND leader_request.is_done = 0 ORDER BY leader_request.date ASC LIMIT 1";

		$query = $this->db->query($sql);
	    return $query->row();

	}//selectSpecialCare
	public function selectTeam($leader_gender,$ambassador_gender,$logical_operator = "=0"){
		$sql = "SELECT leader_request.Rid,leader_request.members_num, leader_request.date, leader_request.is_done, leader_request.leader_id, leader_request.gender, leader_info.leader_gender FROM leader_request INNER JOIN leader_info ON leader_request.leader_id = leader_info.id WHERE leader_request.current_team_count ".$logical_operator ." AND ".$leader_gender." AND ".$ambassador_gender." AND leader_request.is_done = 0 ORDER BY leader_request.date ASC LIMIT 1";

		$query = $this->db->query($sql);
	    return $query->row();
	}//selectTeam

	public function getRequestInfo($request_id){
		$this->db->where('Rid',$request_id);
    	$this->db->from('leader_request');
    	return $this->db->get()->row();

	}//getRequestInfo

	public function startTransaction()
	{
		$this->db->trans_start();
	}//startTransaction

	public function closeTransaction()
	{
		$this->db->trans_complete();
	}//startTransaction

}//SignUpModel

?>
