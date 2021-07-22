<?php
class HighPriorityReqModel extends CI_Model {

  public function store($request_id)
  {
    $data['request_id']=$request_id;
    $this->db->insert('high_priority_requests',$data);
  }// store()
  public function getByRequestId($request_id){
      $this->db->where('request_id',$request_id);
      $this->db->from('high_priority_requests');
      $this->db->limit(1);
      return $this->db->get()->row();

  }

}//class

?>
