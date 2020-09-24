<?php
class RequestsModel extends CI_Model {

	public function addRequest($data)
	{
		$leader_id=$data['leader_id'];
		// $leader_link=$data['leader_link'];
		// $team_link=$data['team_link'];
		$gender =$data['gender'];
		$num_of_members=$data['members_num'];
		// $leader_email=$data['leader_email'];

		$query ="INSERT INTO leader_request (`leader_id`,`gender`, `members_num`) VALUES ('".$leader_id."','".$gender."',".$num_of_members.")";
		$conn= $this->connectToDB();
		$done=$conn->query($query);
		if($done){
			$conn->close();
			$msg = "<div class='alert alert-success'>
                تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                </div>";
		}
		else{

			$msg= $conn->error;
		}
		return $msg;

	}//addRequest

	public function getDate($leaderEmail)
	{
		$this->db->where('leader_email', $leaderEmail);
		return $this->db->get('leader_request');
	}//getDate

    public function get_data($val, $where, $table, $select = '*')
    {
		$query = "SELECT ".$select." FROM ".$table." WHERE ".$where."='".$val."'";
		$conn= $this->connectToDB();
		$done=$conn->query($query);
		if($done){
			$conn->close();
			return$done;
		}
		else{
			return $conn->error;
		}


	}//get_data

	public function selectWithJoin( $table1, $table2, $ON, $whereCondition, $select = '*' ) {
		$this->db->select( $select );
		$this->db->from( $table1 );
		$this->db->join( $table2, $ON );
		$this->db->where($whereCondition);
		return $this->db->get();
	}//selectWithJoin

	public function insertLeaderInfo($leader){

        $query ="INSERT INTO leader_info (`leader_name`, `leader_link`, `leader_gender`, `team_name`,`team_link`, `leader_email`) VALUES ('".$leader[ 'leader_name' ]."','".$leader[ 'leader_link' ]."','".$leader[ 'leader_gender' ]."','".$leader[ 'team_name' ]."','".$leader[ 'leader_link' ]."','".$leader[ 'leader_email' ]."')";
		$conn= $this->connectToDB();
		$done=$conn->query($query);

        if($done){
        	$last_id = $conn->insert_id;
			$conn->close();
			return $last_id;
		}
		else{
			return $conn->error;
		}

	}//insertLeaderInfo
	public function leaderLastRequest($id){
		$query = "SELECT date FROM leader_request WHERE leader_id =".$id." ORDER BY date DESC LIMIT 1";
		$conn= $this->connectToDB();
		$done=$conn->query($query);
		if($done){
			$conn->close();
			return$done;
		}
		else{
			return $conn->error;
		}

	}

	public function searchRequest( $whereCondition ) {
		$this->db->select ( '*' );
	 $this->db->from ( 'leader_request' );
	 $this->db->join ( 'leader_info', 'leader_request.leader_id = leader_info.id' );
	 $this->db->join ( 'ambassador', 'ambassador.requestId = leader_request.Rid' );
	 $this->db->where($whereCondition);
	 $query = $this->db->get();
	 return $query;
	}

	public function updateLeaderInfo($leader){
        $query ="UPDATE leader_info SET leader_name ='".$leader['leader_name']."', leader_link ='". $leader['leader_link']."' WHERE id =".$leader['id'];

		$conn= $this->connectToDB();
		$done=$conn->query($query);
		$conn->close();

	}//updateLeaderInfo
    public function connectToDB(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "journal";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);
		return $conn;
	}//connectToDB
}//RequestsModel

?>
