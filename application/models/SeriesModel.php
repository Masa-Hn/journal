<?php
class SeriesModel extends CI_Model {
    
  public function insertSeries($id){

  }//insertSeries
  public function getSeries(){
		$this->db->order_by('id DESC');
		return $this->db->get('series')->result();  

	}//getSeries

	public function getmore($id)
  	{ 
   	 	$this->db->where('id <',$id);
		$this->db->order_by('id DESC');
		$this->db->limit(10);
		return $this->db->get('series');  
		
  }//getmore 

  public function getById($id)
  { 
   	$this->db->where('id =',$id);
		$this->db->limit(1);
		return $this->db->get('series');  
		
  }//getmore 

  
  public function countSseries()
  {
    $this->db->select('COUNT(id) AS num_of_series');
    $this->db->from('series');
    return $this->db->get()->result();
  }//countSseries



}
?>