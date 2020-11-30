<?php
class VisitorModel extends CI_Model {

  public function incrementVisitors()
  {
    $this->db->set('visit_times', 'visit_times +1', FALSE);
    $this->db->where('id=', 1);
    $this->db->update('visitors');

  }//incrementVisitors

  public function countVisitors()
  {
  	$query = $this->db->query("SELECT SUM(visit_times) AS visit_times from visitors");
    return $query->result();

  }//countVisitors

}//class

?>
