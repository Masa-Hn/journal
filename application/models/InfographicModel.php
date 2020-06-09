<?php
class InfographicModel extends CI_Model {
    
    function getPhoto(){
		$this->db->order_by('id DESC');
		$this->db->limit(10);
		return $this->db->get('infographic');  

	}

	public function getmore($id)
  	{ 
   	 	$this->db->where('id <',$id);
		$this->db->order_by('id DESC');
		$this->db->limit(10);
		return $this->db->get('infographic');  
		
  }//getmore 

  	public function getById($id)
  	{ 
   	 	$this->db->where('id =',$id);
		$this->db->limit(1);
		return $this->db->get('infographic');  
		
  	}//getmore 
}
?>