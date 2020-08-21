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

  	public function getBySeries($id)
  	{ 
   	 	$this->db->where('series_id =',$id);
		return $this->db->get('infographic')->result();  
		
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

  public function insertBySeries($title,$pic,$section,$series_id)
  {
    $data['title']=$title;
    $data['pic']=$pic;
    $data['section']=$section;
    $data['series_id']=$series_id;
    $this->db->insert('infographic',$data);
  }//insertBySeries

  public function updateInfographic($id,$title,$section){
    
   $data = array(
        'title' => $title,
        'section' => $section
    );

$this->db->where('id', $id);
$this->db->update('infographic', $data);
  }//updateInfographic
}
?>