<?php
class ExceptionalExcutiveModel extends CI_Model {

	public
	function last_request( $id ) {
		$query = "SELECT Rid FROM leader_request WHERE leader_id='" . $id . "' ORDER BY date DESC LIMIT 1";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	public
	function last_request_isDone( $id ) {
		$query = "SELECT date FROM leader_request WHERE leader_id='" . $id . "' AND is_done = 0 ORDER BY date DESC LIMIT 1";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	public
	function retrieve_leaders_exc( $supervisor, $rank ) {
		$query = "SELECT * FROM leader_info WHERE leaders_team_name='" . $supervisor . "' AND leader_rank = '" . $rank . "'";
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		if ( $done ) {
			$conn->close();
			return $done;
		} else {
			return $conn->error;
		}
	}

	public
	function update_leader_info( $leader ) {
		$query = "UPDATE leader_info SET leader_name ='" . $leader[ 'leader_name' ] . "', leader_link ='" . $leader[ 'leader_link' ] . "', team_link ='" . $leader[ 'team_link' ] . "' WHERE id =" . $leader[ 'id' ];

		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();
	}

	public
	function updateFullRequest( $leader ) {

		$query = "UPDATE leader_info SET leader_link='" . $leader[ 'leader_link' ] . "', leader_gender='" . $leader[ 'leader_gender' ] . "', team_link='" . $leader[ 'team_link' ] . "', uniqid='" . $leader[ 'uniqid' ] . "' WHERE id=" . $leader[ 'leader_id' ];
		$conn = $this->connectToDB();
		$done = $conn->query( $query );
		$conn->close();
	}

	public
	function addRequest( $data ) {

		$leader_id = $data[ 'leader_id' ];
		$gender = $data[ 'gender' ];
		$num_of_members = $data[ 'members_num' ];
		$currentTeamCount = $data[ 'current_team_count' ];


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
	}

	public
	function connectToDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "journal";
		$conn = new mysqli( $servername, $username, $password, $dbname );
		return $conn;
	}
}

?>