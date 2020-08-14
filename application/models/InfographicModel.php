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
		
  	}//getById 

  	public function getSections()
  	{
    	$this->db->select('section,COUNT(section) As num_of_infographics');
    	$this->db->from('infographic');
    	$this->db->group_by('section');
    	return $this->db->get()->result();
  	}//getSections
  
  public function sectionFilter($section)
  {
    $where = "section IN (". $section .")";
    $this->db->from('infographic');
    $this->db->where($where);
    return $this->db->get()->result();
  }//sectionFilter


}
?>