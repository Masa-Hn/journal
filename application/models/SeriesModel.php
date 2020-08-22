<?php
class SeriesModel extends CI_Model {
    
  public function insertSeries($title,$pic,$num_of_photos){
    $data['title']=$title;
    $data['pic']=$pic;
    $data['num_of_photos']=$num_of_photos;
    
    $this->db->insert('series',$data);
    $insert_id = $this->db->insert_id();

   return  $insert_id;

  }//insertSeries
  public function getSeries(){
		$this->db->order_by('id DESC');
		return $this->db->get('series')->result();  

	}//getSeries

  public function getById($id)
  { 
   	$this->db->where('id =',$id);
		$this->db->limit(1);
		return $this->db->get('series')->result();  
		
  }//getmore 

  
  public function countSseries()
  {
    $this->db->select('COUNT(id) AS num_of_series');
    $this->db->from('series');
    return $this->db->get()->result();
  }//countSseries

  public function deleteSeries($id){
    $this->db->where('id =',$id);
    return $this->db->delete('series');
  }//deleteSeries

  public function updateNumberOfPhotos($id,$newCount){
    $this->db->set('num_of_photos', $newCount, FALSE);
    $this->db->where('id', $id);
    $this->db->update('series'); 
  }//updateNumberOfPhotos

}
?>