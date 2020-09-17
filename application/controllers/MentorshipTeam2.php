<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class MentorshipTeam2 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'GeneralModel' );
		$this->load->model( 'RequestsModel' );

	} //end construct()

	public function index() {
		$title[ 'title' ]="أرشيف التوزيع";
		$this->load->view( 'management_book/templates/header', $title );
		$this->load->view( 'management_book/templates/navbar' );
		$whereCondition = "is_done=1 AND send_to_leader=1 AND date >= DATE_SUB(now(), INTERVAL 2 MONTH)";
		$data['requests'] = $this->RequestsModel->selectWithJoin('leader_info', 'leader_request', 'id=leader_id', $whereCondition, 'leader_name, leader_link, team_name, team_link, Rid, gender, date');

		$this->load->view( 'management_book/mentorshipTeam', $data);

		$this->load->view( 'management_book/templates/footer' );

	}

	public function searchRequest()
	{
		$title[ 'title' ]="أرشيف التوزيع";
		$this->load->view( 'management_book/templates/header', $title );
		$this->load->view( 'management_book/templates/navbar' );

		if(isset($_POST['s-btn'])){
			$searchValue = $_POST['s-text'];
			$date = $_POST['s-date'];
			$whereCondition = "";
				if(!empty($searchValue) && !empty($date)){
					$whereCondition = "leader_name like '%".$searchValue."%' or ambassador.name like '%".$searchValue."%' or date like '%".$date."%'";
				}else if(empty($date) && !empty($searchValue)){
					$whereCondition = "leader_name like '%".$searchValue."%' or ambassador.name like '%".$searchValue."%'";
				}else if(!empty($date) && empty($searchValue)){
						$whereCondition = "date like '%".$date."%'";
				}

				if(empty($whereCondition) == false){
					$data['requests'] = $this->RequestsModel->searchRequest($whereCondition);

					$data['sval'] = $searchValue;
					$data['date'] = $date;

					$this->load->view('management_book/search_requests', $data);

				}
		}
		$this->load->view( 'management_book/templates/footer' );
}
}
?>
