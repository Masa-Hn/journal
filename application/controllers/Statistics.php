<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Statistics extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'StatisticsModel' );
        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //end construct()

	public
	function index() {

		$data[ 'title' ] = 'الإحصائيات';	
		$this->load->view( 'management_book/templates/header', $data );
		$this->load->view( 'management_book/templates/navbar' );
		$this->load->view( 'management_book/statistics', $data );
		$this->load->view( 'management_book/templates/footer' );

	}

	public
	function code_button() {
	//	$ip_address = $_POST[ 'ip_address' ];
		$amb_id = $_POST['id'];
		$clicks = $this->StatisticsModel->button_clicks( $amb_id, 'ambassador', 'code_button' );
		
		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			if($res->code_button == 0){
			$this->StatisticsModel->update_data( $amb_id, 'code_button', 1, 'ambassador' );
			}
		} /*else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'code_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}*/
	}

	public
	function team_link_button() {
		//$ip_address = $_POST[ 'ip_address' ];
		$amb_id = $_POST['id'];
		
		$clicks = $this->StatisticsModel->button_clicks( $amb_id, 'ambassador', 'team_link_button' );

		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			if($res->team_link_button == 0){
			$this->StatisticsModel->update_data( $amb_id, 'team_link_button', 1, 'ambassador' );
			}
			
		}/* else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'team_link_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}*/
	}

	/* public
	function leader_link_button() {
		$ip_address = $_POST[ 'ip_address' ];

		$clicks = $this->StatisticsModel->button_clicks( $ip_address, 'buttons_statistics', 'leader_link_button' );

		if ( $clicks->num_rows() > 0 ) {
			$res = $clicks->row();
			if($res->code_button == 0){
				$id = $res->id;
			$this->StatisticsModel->update_data( $id, 'leader_link_button', 1, 'buttons_statistics' );
			}
			
		} else {
			$data[ 'ip_address' ] = $ip_address;
			$data[ 'leader_link_button' ] = 1;
			$this->StatisticsModel->insert_data( $data, 'buttons_statistics' );

		}
	}*/
}

?>