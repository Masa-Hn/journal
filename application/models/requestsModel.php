<?php
class RequestsModel extends CI_Model {

	//distribution process

	//get the none distributed ambassadors
	public
	function getNoneDistributedAmbassadors() {
		$this->db->select( '*' );
		$this->db->where( 'request_id', NULL );
		$this->db->from( 'ambassador' );

		return $this->db->get();
	}

	//get the destributed ambassadors for certain request
	public
	function getDistributedAmbassadors( $request_id ) {
		$this->db->select( '*' );
		$this->db->where( 'request_id', $request_id );
		$this->db->from( 'ambassador' );

		return $this->db->get();
	}

	//get leader info of a certain request
	public
	function getLeaderInfo( $leader_id ) {
		$this->db->where( 'id', $leader_id );
		$this->db->from( 'leader_info' );

		return $this->db->get();
	}

	//get request info
	public
	function getRequest( $rid ) {
		$this->db->select( '*' );
		$this->db->where( 'Rid', $rid );
		$this->db->from( 'leader_request' );

		return $this->db->get();
	}

	//set the request_id as the request for the proper ambassadors
	public
	function updateAmbassador( $ambassador_id, $request_id ) {
		$this->db->set( 'request_id', $request_id, FALSE );
		$this->db->where( 'id', $ambassador_id );
		$this->db->update( 'ambassador' );
	}
	//end
	public
	function get_ambassadors() {
		$this->db->select( 'id, name, profile_link, gender, is_joined' );
		$this->db->where( 'is_joined', 0 );
		$this->db->from( 'ambassador' );
		$this->db->order_by( 'name', 'DESC' );
		$query = $this->db->get();
		return $query;

	}
	public
	function searchAmbassador( $whereCondition ) {
		$this->db->select( 'id, name, profile_link, gender, is_joined' );
		$this->db->where( $whereCondition );
		$this->db->from( 'ambassador' );
		$this->db->order_by( 'name', 'DESC' );
		$query = $this->db->get();
		return $query;
	}
	public
	function addRequest( $data ) {
		$leader_id = $data[ 'leader_id' ];
		// $leader_link=$data['leader_link'];
		// $team_link=$data['team_link'];
		$gender = $data[ 'gender' ];
		$num_of_members = $data[ 'members_num' ];
		$currentTeamCount = $data[ 'current_team_count' ];
		// $leader_email=$data['leader_email'];

		$query = "INSERT INTO leader_request (`leader_id`,`gender`, `members_num`, `current_team_count`) VALUES ('" . $leader_id . "','" . $gender . "','" . $num_of_members . "', '" . $currentTeamCount . "')";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$last_id = $conn->insert_id;
			$conn->close();
			return $last_id;
		} else {
			return $conn->error;
		}
    
	} //addRequest

	public
	function updateRequest( $id ) {
		$this->db->set( 'is_done', 1, FALSE );
		$this->db->where( 'Rid', $id );
		$this->db->update( 'leader_request' );

	} //updateRequest

	public
	function getDate( $leaderEmail ) {
		$this->db->where( 'leader_email', $leaderEmail );
		return $this->db->get( 'leader_request' );
	} //getDate

	public function get_data($val, $where, $table, $select = '*')
    {
		$query = "SELECT ".$select." FROM ".$table." WHERE ".$where."='".$val."'";
		$conn= $this->connectToDB();
		$done=$conn->query($query);
		if($done){
			$conn->close();
			return $done;	
		}
		else{
			return $conn->error;
		}
	}//get_data

	public
	function selectWithJoin( $table1, $table2, $ON, $whereCondition, $select = '*' ) {
		$this->db->select( $select );
		$this->db->from( $table1 );
		$this->db->join( $table2, $ON );
		$this->db->where( $whereCondition );
		return $this->db->get();
	} //selectWithJoin

	public
	function insertLeaderInfo( $leader ) {

		$query = "INSERT INTO leader_info (`leader_name`, `leader_link`, `leader_gender`, `team_name`,`team_link`, `leader_email`) VALUES ('" . $leader[ 'leader_name' ] . "','" . $leader[ 'leader_link' ] . "','" . $leader[ 'leader_gender' ] . "','" . $leader[ 'team_name' ] . "','" . $leader[ 'leader_link' ] . "','" . $leader[ 'leader_email' ] . "')";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );

		if ( $done ) {
			$last_id = $conn->insert_id;
			$conn->close();
			return $last_id;
		} else {
			return $conn->error;
		}

	} //insertLeaderInfo
	public
	function leaderLastRequest( $id ) {
		$query = "SELECT date,is_done FROM leader_request WHERE leader_id =" . $id . " ORDER BY date DESC LIMIT 1";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return$done;
		} else {
			return $conn->error;
		}

	}

	public
	function searchRequest( $whereCondition ) {
		$this->db->distinct();
		$this->db->select( 'Rid, leader_info.leader_gender, leader_link, leader_name, team_name, team_link, date' );
		$this->db->from( 'leader_request' );
		$this->db->join( 'leader_info', 'leader_request.leader_id = leader_info.id' );
		$this->db->join( 'ambassador', 'ambassador.request_id = leader_request.Rid' );
		$this->db->where( $whereCondition );
		$query = $this->db->get();
		return $query;
	}

	public
	function updateLeaderInfo( $leader ) {
		$query = "UPDATE leader_info SET leader_name ='" . $leader[ 'leader_name' ] . "', leader_link ='" . $leader[ 'leader_link' ] . "' WHERE id =" . $leader[ 'id' ];

		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();

	} //updateLeaderInfo
	public
	function connectToDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "journal";
		// Create connection
		$conn = new mysqli( $servername, $username, $password, $dbname );
		return $conn;
	} //connectToDB
} //RequestsModel

?>