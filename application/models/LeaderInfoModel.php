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

	public function getLeaderInfoByEmail($leader_email)
	{
		$this->db->where('leader_email',$leader_email);
    	$this->db->from('leader_info');
    	$this->db->limit(1);
    	return $this->db->get()->row();

	}

	public function getReqInfo($leader_id)
	{
		$this->db->select('Rid as رقم الطلب , is_done as غير مكتمل , members_num as العدد المطلوب  , gender as جنس السفراء' );
		$this->db->where('leader_id',$leader_id);
		$this->db->where('is_done',0);
    	$this->db->from('leader_request');
    	return $this->db->get()->row();

	}
	public function updateRequest( $id ) {

		$this->db->set( 'is_done', 1, FALSE );
		$this->db->where( 'Rid', $id );
		$this->db->update( 'leader_request' );
	} //updateRequest

}//LeaderInfoModel

?>
