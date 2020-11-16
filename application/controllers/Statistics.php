<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Statistics extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'StatisticsModel' );
	} //end construct()

	public
	function index() {

		$data[ 'title' ] = 'الإحصائيات';

		//this is the code for testing == to count viewers per page ==> to be inserted in each page of mentorship pages

		//change the ip_add, page_id, or date to test it
		//$page_id = 6;

		//$this->StatisticsModel->addVisitor($page_id);

		//end code

		$this->load->view( 'management_book/templates/header', $data );
		$this->load->view( 'management_book/templates/navbar' );
		$this->load->view( 'management_book/statistics', $data );
		$this->load->view( 'management_book/templates/footer' );

	}

	public
	function code_button() {
		$ip_address = $_POST[ 'ip_address' ];

		$clicks = $this->StatisticsModel->button_clicks( $ip_address, 'buttons_statistics', 'code_button' );

		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			$id = $res->id;
			$this->StatisticsModel->update_data( $id, 'code_button', 1, 'buttons_statistics' );
		} else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'code_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}
	}

	public
	function team_link_button() {
		$ip_address = $_POST[ 'ip_address' ];

		$clicks = $this->StatisticsModel->button_clicks( $ip_address, 'buttons_statistics', 'team_link_button' );

		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			$id = $res->id;
			$this->StatisticsModel->update_data( $id, 'team_link_button', 1, 'buttons_statistics' );
		} else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'team_link_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}
	}

	public
	function leader_link_button() {
		$ip_address = $_POST[ 'ip_address' ];

		$clicks = $this->StatisticsModel->button_clicks( $ip_address, 'buttons_statistics', 'leader_link_button' );

		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			$id = $res->id;
			$this->StatisticsModel->update_data( $id, 'leader_link_button', 1, 'buttons_statistics' );
		} else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'leader_link_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}
	}
}

?>