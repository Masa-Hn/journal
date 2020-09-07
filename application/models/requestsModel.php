<?php
class RequestsModel extends CI_Model {

	public
	function selectWithJoin( $table1, $table2, $ON, $whereCondition, $select = '*' ) {
		$this->db->select( $select );
		$this->db->from( $table1 );
		$this->db->join( $table2, $ON );
		$this->db->where($whereCondition);
		return $this->db->get();
	}
}

?>