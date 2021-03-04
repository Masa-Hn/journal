<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class DistributionArchive extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }

	} //end construct()

	public function index() {
		$title[ 'title' ]="أرشيف التوزيع";
		$this->load->view( 'management_book/templates/header', $title );
		$this->load->view( 'management_book/templates/navbar' );

		//filters specifications
		$filters['is_done'] = 1;
		$filters['send_to_leader'] = 1;
		$filters['conditions'] = 'lr.date >= DATE_SUB(now(), INTERVAL 2 MONTH)';

		//get all the results from leader_info & leader_request tables
		$qry = Orm_Leader_Request::get_all($filters, 0, 0, array('date'),array(), true, false);

		//assigne the results to array to be passed through the view
		$data['requests'] = $qry;

		//load the view
		$this->load->view( 'management_book/DistributionArchive', $data);

		$this->load->view( 'management_book/templates/footer' );

	}

	public function searchRequest()
	{
		$title[ 'title' ]="أرشيف التوزيع";
		$this->load->view( 'management_book/templates/header', $title );
		$this->load->view( 'management_book/templates/navbar' );

		if(isset($_POST['s-btn'])){
			//get input text
			$searchValue = $_POST['s-text'];
			//get date selected
			$date = $_POST['s-date'];
			//specify conditions (leader name , ambassador name, request date)
			$whereCondition = "";
				if(!empty($searchValue) && !empty($date)){
					$whereCondition = "li.leader_name like '%".$searchValue."%' or a.name like '%".$searchValue."%' or lr.date like '%".$date."%'";
				}else if(empty($date) && !empty($searchValue)){
					$whereCondition = "li.leader_name like '%".$searchValue."%' or a.name like '%".$searchValue."%'";
				}else if(!empty($date) && empty($searchValue)){
						$whereCondition = "lr.date like '%".$date."%'";
				}
				$data = array();
				if(empty($whereCondition) == false){
					//get matched data
					$filtered_data['conditions'] = $whereCondition;
					//$data['requests'] = $req_orm::get_all($filtered_data, true, true, 0, 0, array('date'));
					$num_rows = Orm_Leader_Request::get_count($filtered_data,array('lr.Rid'), true, true);
					echo $num_rows;
					if($num_rows > 0){
						$data['requests'] = Orm_Leader_Request::get_all($filtered_data, 0, 0, array('date'),array('lr.Rid', 'li.team_name', 'li.team_link', 'li.leader_link', 'li.leader_gender', 'li.leader_name', 'lr.date'), true, true);
					}else{
						$data['empty_data']  = "لا يوجد نتائج";
					}
					$this->load->view('management_book/search_requests', $data);
				}
		}
		$this->load->view( 'management_book/templates/footer' );
}
}
?>
