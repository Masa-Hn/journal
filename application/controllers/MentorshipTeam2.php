<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class MentorshipTeam2 extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model( 'GeneralModel' );
		$this->load->model( 'RequestsModel' );

	} //end construct()

	public function index() {
		$whereCondition = array( 'is_done' => 1 );
$data['requests'] = $this->RequestsModel->selectWithJoin('leader_info', 'leader_request', 'id=leader_id', $whereCondition);
		$this->load->view( 'management_book/mentorshipTeam', $data);
	}

}
?>
