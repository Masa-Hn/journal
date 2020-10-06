<?php
class StatisticsModel extends CI_Model {

public function incrementVisitors($page_id)
  {
    $this->db->set('viewers', 'viewers +1', FALSE);
    $this->db->where('id', $page_id);
    $this->db->update('pages');

  }

public function retrieveVisitor($ip_add, $page_id){
	$this->db->select('*');
	$this->db->from('statistics');
	$where = 'ip_address = "'.$ip_add.'" AND page_id = '.$page_id. ' AND date > CURDATE()';
    $this->db->where($where);
	
	return $this->db->get();
}

public function insertVisitor($data){
		$this->db->insert('statistics', $data);
	}
	
public function countVisitors($page_id)
  {
	  $this->db->select('viewers');
	  $this->db->where('id', $page_id);
	return  $this->db->get('pages')->result(); 	
  }
	
public function selectPages(){
	$this->db->select('*');
	$this->db->from('pages');
	return $this->db->get();
}
	
public function selectStatisticsPerPage($id){
	$this->db->select('viewers');
	$this->db->from('pages');
	$this->db->where('id', $id);
	return $this->db->get();
}

function addVisitor($page_id){
		
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
	$qry = $this->retrieveVisitor($visitor_ip, $page_id);

	if($qry->num_rows() == 0){
		$visitor['ip_address'] = $visitor_ip;
		$visitor['page_id'] = $page_id;
		$this->insertVisitor($visitor);
		$this->incrementVisitors($page_id);
	}
}
	
}
?>
