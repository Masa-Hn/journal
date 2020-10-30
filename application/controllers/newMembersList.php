<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class NewMembersList extends CI_Controller {
	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
	} //end construct()
	public

	function index() {
		$this->load->view( 'leader_request/header' );
		$leader_info = $this->requestsModel->get_info( $_GET[ 'email' ] )->fetch_array( MYSQLI_ASSOC );
		$id = $leader_info[ 'id' ];

		$request_info = $this->requestsModel->get_data( $id, 'leader_id', 'leader_request', 'Rid' )->fetch_array( MYSQLI_ASSOC );
		$Rid = $request_info[ 'Rid' ];

		$arr[ 'ambassadors' ] = $this->requestsModel->get_data( $Rid, 'request_id', 'ambassador', '*' );

		$this->load->view( 'leader_request/newMembersList', $arr );

	}

	function joined_ambassador() {
		if ( isset( $_POST[ 'checked' ] ) ) {
			$id = $_POST[ 'checked' ];
			$this->requestsModel->update_data( 1, $id );

		} else if ( isset( $_POST[ 'notChecked' ] ) ) {
			$id = $_POST[ 'notChecked' ];
			$this->requestsModel->update_data( 0, $id );
		}
	}
}
?>