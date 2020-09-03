<?php
class RequestsModel extends CI_Model {

  public function selectRequests($whereCondition)
  {    
        $this->db->where($whereCondition);
        return $this->db->get('requests');
	  
  }

  
}

?>
