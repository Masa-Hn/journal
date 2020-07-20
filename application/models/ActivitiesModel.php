<?php
class ActivitiesModel extends CI_Model {

  public function getAllActivities()
  {
  	$query = $this->db->query("SELECT DISTINCT name from activities ORDER BY id DESC");
    return $query->result();

  }//getAllActivities

  public function getLastActivity()
  {
    $this->db->order_by('id DESC');
    $this->db->limit(1);
    return $this->db->get('activities')->result(); 


  }//getLastActivity

  public function getActivityById($id){
    $this->db->where('id =',$id);
    $this->db->limit(1);
    return $this->db->get('activities')->result();
  }//getActivityById

  public function getCopies($name)
  {
    $this->db->select('copy,id');
    $this->db->where('name =',$name);
    $this->db->order_by('id DESC');
    return $this->db->get('activities')->result(); 


  }//getCopies


}//class

?>
