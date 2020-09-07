<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class MentorshipTeam extends CI_Controller {

	public
	function __construct() {
		parent::__construct();

		$this->load->model( 'GeneralModel' );
		$this->load->model( 'RequestsModel' );

	} //end construct()

	public
	function index() {
		$title[ 'title' ] = 'فريق الإدخال';

		$this->load->view( 'management_book/templates/header', $title );

		$arr[ 'model' ] = $this->GeneralModel;

		$whereCondition = array( 'is_done' => 1, 'send_to_leader' => 0 );

		//get the requests that are done (ambassadors distributed) in which the msg hasn't sent yet
		$arr[ 'requests' ] = $this->RequestsModel->selectRequests( $whereCondition );

        $this->load->view('management_book/templates/navbar');
		$this->load->view( 'management_book/mentorshipTeam_2', $arr );
        $this->load->view('management_book/templates/footer');
	}

	//update the send_to_leader field (set to 1 ) after messaging the leader
	public
	function send_to_leader()

	{
		$data[ 'send_to_leader' ] = 1;
		$val = $_POST[ 'id' ];
		$this->GeneralModel->update( $data, $val, 'requests' );


	}
}
?>