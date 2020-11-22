<?php
class StatisticsModel extends CI_Model {

	//add records
	public function addRecords($data)
	{
		$this->db->insert('statistics', $data);
	}
	
	public function getRecords(){
		$this->db->from('statistics');
		$this->db->order_by('date', 'DESC');
		$this->db->limit(1);
		$this->db->where('page_id', 1);
		return $this->db->get();
	}
	
public function incrementVisitors($page_id)
  {
    $this->db->set('visitors', 'visitors +1', FALSE);
	$where = "page_id = " . $page_id . " AND date = CURDATE()";
    $this->db->where($where);
    $this->db->update('statistics');

  }


	/*public
	function retrieveVisitor( $ip_add, $page_id ) {
		$this->db->select( '*' );
		$this->db->from( 'statistics' );
		$where = 'ip_address = "' . $ip_add . '" AND page_id = ' . $page_id . ' AND date >= CURDATE()';
		$this->db->where( $where );

		return $this->db->get();
	}*/

	/*public
	function insertVisitor( $data ) {
		$this->db->insert( 'statistics', $data );
	}*/
	
	/*public function countVisitors($page_id)
	  {
		  $this->db->select('viewers');
		  $this->db->where('id', $page_id);
		return  $this->db->get('pages')->result(); 	
	  }
		*/
	public
	function selectPages() {
		$this->db->select( '*' );
		$this->db->from( 'pages' );
		$this->db->order_by('id', 'ASC');
		return $this->db->get();
	}

	public
	function selectStatisticsPerDay( $id ) {
		$this->db->select( 'visitors' );
		$this->db->from( 'statistics' );
		$where = 'page_id = "' . $id . '" AND date = DATE(CURDATE())';
		$this->db->where( $where );
		return $this->db->get();
	}

	public
	function selectStatisticsPerWeek( $id ) {
		$this->db->select( 'visitors' );
		$this->db->from( 'statistics' );
		$where = 'page_id = "' . $id . '" AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)';
		$this->db->where( $where );
		return $this->db->get();
	}
	public
	function selectStatisticsPerMonth( $id ) {
		$this->db->select( 'visitors' );
		$this->db->from( 'statistics' );
		$where = 'page_id = "' . $id . '" AND YEAR( date ) = YEAR( CURDATE() )AND MONTH( date ) = MONTH( CURDATE() )';
		$this->db->where( $where );
		return $this->db->get();
	}

	/*function addVisitor( $page_id ) {

		$visitor_ip = $_SERVER[ 'REMOTE_ADDR' ];
		$qry = $this->retrieveVisitor( $visitor_ip, $page_id );
		$res = $qry->row();
		if ( $qry->num_rows() == 0 ) {
			$visitor[ 'ip_address' ] = $visitor_ip;
			$visitor[ 'page_id' ] = $page_id;
			$this->insertVisitor( $visitor );
			//$this->incrementVisitors($page_id);
		}
	}*/
	public
	function button_clicks( $ip_address, $table_name, $cond ) {
		$this->db->select( '*' );
		$this->db->from( $table_name );
		$where = "ip_address = '" . $ip_address . "' AND " . $cond . "= 0";
		$this->db->where( $where );
		return $this->db->get();

	}
	public
	function update_data( $id, $field, $val, $table_name ) {
		$this->db->set( $field, $val, FALSE );
		$this->db->where( 'id', $id );
		$this->db->update( $table_name );
	}

	public
	function insert_data( $data, $table_name ) {
		$this->db->insert( $table_name, $data );
	}

	public
	function get_data( $table_name, $col, $cond ) {
		$this->db->select( $col );
		$this->db->from( $table_name );
		$this->db->where( $cond );
		return $this->db->get();
	}

	public
	function get_sum_data( $table_name, $col, $cond ) {
		$this->db->select_sum( $col );
		$this->db->from( $table_name );
		$this->db->where( $cond );
		return $this->db->get();
	}
}
?>