<?php
class RequestsModel extends CI_Model {

	public function selectWithJoin( $table1, $table2, $ON, $whereCondition, $select = '*' ) {
		$this->db->select( $select );
		$this->db->from( $table1 );
		$this->db->join( $table2, $ON );
		$this->db->where($whereCondition);
		return $this->db->get();
	}

	public function searchRequest( $whereCondition ) {
		$this->db->select ( '*' );
	 $this->db->from ( 'leader_request' );
	 $this->db->join ( 'leader_info', 'leader_request.leader_id = leader_info.id' );
	 $this->db->join ( 'ambassador', 'ambassador.requestId = leader_request.Rid' );
	 $this->db->where($whereCondition);
	 $query = $this->db->get ();
	 return $query;
	}
}
?>
