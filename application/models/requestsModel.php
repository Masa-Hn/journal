<?php
class RequestsModel extends CI_Model {

	public function addRequest($data)
	{
		$leader_name=$data['leader_name'];
		$leader_link=$data['leader_link'];
		$team_link=$data['team_link'];
		$gender =$data['gender'];
		$num_of_members=$data['num_of_members'];
		$leader_email=$data['leader_email'];

		$query ="INSERT INTO requests (`leader_name`, `leader_link`, `gender`, `num_of_members`, `leader_email`) VALUES ('".$leader_name."','".$leader_link."','".$gender."',".$num_of_members.",'".$leader_email."')";
		$conn= $this->connectToDB();
		$done=$conn->query($query);
		$conn->close();
		return$done;
	}//addRequest

	public function getDate($leaderEmail)
	{
		$this->db->where('leader_email', $leaderEmail);
		return $this->db->get('requests');
	}//getDate

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