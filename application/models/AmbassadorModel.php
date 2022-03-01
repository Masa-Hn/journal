<?php
class AmbassadorModel extends CI_Model {

	public function getById($ambassador_id)
	{
		$this->db->select('*');
    	$this->db->from('ambassador');
    	$this->db->where('id =',$ambassador_id);
    	$this->db->limit(1);
    	return $this->db->get()->row();

	}

	public function ambassadorCode()
	{
		$this->db->select('code');
    	$this->db->from('ambassador_code');
    	return $this->db->get()->row();

	}

	public function insertAmbassador($ambassador)
	{
		$this->db->insert('ambassador',$ambassador);
		return  $this->db->insert_id();
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
		$this->db->select('id,name,profile_link,request_id,gender,fb_id');
    	$this->db->from('ambassador');
    	$this->db->where('request_id =',$request_id);
    	return $this->db->get()->result();

	}

	public function getByFBId($fb_id)
	{
		$this->db->select('id,name,profile_link,request_id,gender,fb_id');
    	$this->db->from('ambassador');
    	$this->db->where('fb_id =',$fb_id);
    	return $this->db->get()->result();

	}//getByFBId

	public function checkAmbassador($fb_id)
	{
		$where = "fb_id = '".$fb_id."'";
		$this->db->select('id, name, fb_id, gender, request_id, created_at,messenger_id');
		$this->db->where($where);
    	$this->db->from('ambassador');
	    $this->db->limit(1);
    	return $this->db->get()->row();

	}//checkAmbassador

	public function updateAmbassador($fb_id,$leader_gender, $request_id,$date_update){
		$data = array(
        'leader_gender' => $leader_gender,
        'request_id' => $request_id,
        'created_at'=>$date_update
    	);

		$this->db->where('fb_id', $fb_id);
		$this->db->update('ambassador', $data);
	}//updateAmbassador

	public function updateMessengerId($requestNo,$messengerId){
		$this->db->set('messenger_id', $messengerId);
		$this->db->where('id', $requestNo);
		$this->db->update('ambassador');
	}//updateMessengerId


}//SignUpModel

?>
