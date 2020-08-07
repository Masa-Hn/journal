<?php
class VisitorModel extends CI_Model {

  public function checkVisitor($userIP)
  { 
    $checkVisitor = $this->db->query("SELECT visit_times,INET_NTOA(user_IP) AS userIP FROM visitors")->result();
    
    if(count($checkVisitor) == 0){
      $insertVisitor=$this->db->query("INSERT visitors VALUES (INET_ATON('".$userIP."'),1)");

    }//if
    else{
      //update visit_times
      $this->db->set('visit_times', 'visit_times +1', FALSE);
      $this->db->where('INET_NTOA(user_IP)', $userIP);
      $this->db->update('visitors');

    }

  }//insertVisitor

  public function countVisitors()
  {
  	$query = $this->db->query("SELECT SUM(visit_times) AS visit_times from visitors");
    return $query->result();

  }//countVisitors

}//class

?>
