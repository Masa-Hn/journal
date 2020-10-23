<?php
class RequestsModel extends CI_Model {

//check leader email
public function get_info($email){
	$query = "SELECT * FROM leader_info WHERE leader_email='" . $email . "'";
	$conn = $this->connectToDB();
	$done = $conn->query( $query );
	if ( $done ) {
		$conn->close();
		return $done;
	} else {
		return $conn->error;
	}

}
	//distribution process

	//get the none distributed ambassadors
	public
	function getNoneDistributedAmbassadors() {
		$query = "SELECT * FROM ambassador WHERE request_id IS NULL";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	//get the destributed ambassadors for certain request
	public function getDistributedAmbassadors( $request_id ) {
		$query = "SELECT * FROM ambassador WHERE request_id =".$request_id;
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	//get leader info of a certain request
	public
	function getLeaderInfo( $leader_id ) {
		$query = "SELECT * FROM leader_info WHERE id =".$leader_id;
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	//get request info
	public
	function getRequest( $rid ) {
		$query = "SELECT * FROM leader_request WHERE Rid =".$rid;
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	//set the request_id as the request for the proper ambassadors
	public
	function updateAmbassador( $ambassador_id, $request_id ) {
		$query = "UPDATE ambassador SET request_id =" . $request_id . " WHERE id =" . $ambassador_id;
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();
	}

	public function updateReq($id){
		$query = "UPDATE leader_request SET is_done = 1 WHERE Rid = " . $id;
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();
	}
	//end process

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

	public
	function get_data( $val, $where, $table, $select = '*' ) {
		$query = "SELECT " . $select . " FROM " . $table . " WHERE " . $where . "='" . $val . "'";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	} //get_data

	public
	function selectWithJoin( $table1, $table2, $ON, $whereCondition, $select = '*' ) {
		$this->db->select( $select );
		$this->db->from( $table1 );
		$this->db->join( $table2, $ON );
		$this->db->where( $whereCondition );
		return $this->db->get();
	} //selectWithJoin

	public
	function updateFullRequest( $leader) {

		$query = "UPDATE leader_info SET leader_name='".$leader['leader_name']."' , leader_link='".$leader['leader_link']."', leader_gender='".$leader['leader_gender']."',
		 team_name='".$leader['team_name']."', team_link='".$leader['team_link']."' WHERE id=".$leader['leader_id'];
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();
	} //updatetLeaderInfo
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
