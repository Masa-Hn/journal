<?php
class AmbassadorModel extends CI_Model {

	public function insertAmbassador($ambassador)
	{	
		return $this->db->insert('ambassador',$ambassador);

	}//checkAvailableRequests

	public function countRequests($request_id)
	{
		$this->db->select('request_id,COUNT(request_id) as totalRequests');
    	$this->db->from('ambassador');
    	$this->db->where('request_id =',$request_id);
    	return $this->db->get()->row();

	}//countRequests

	public function getByRequestId($request_id)
	{
		$this->db->select('name,profile_link,request_id,gender');
    	$this->db->from('ambassador');
    	$this->db->where('request_id =',$request_id);
    	return $this->db->get()->result();

	}

	public function checkAmbassador($fb_id)
	{
		$where = "fb_id = '".$fb_id."'";
		$this->db->select('request_id');
		$this->db->where($where);
    	$this->db->from('ambassador');
	    $this->db->limit(1);
    	return $this->db->get()->row();

	}//checkAmbassador

}//SignUpModel

?>
