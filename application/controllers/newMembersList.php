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
		//	$arr['ambassadors'] = "";
		//	$arr['info'] = "";

		$this->load->view( 'leader_request/header' );
		$leader_info = $this->requestsModel->get_info( $_GET[ 'email' ] )->fetch_array( MYSQLI_ASSOC );

		if ( $leader_info[ 'leader_link' ] != null && $leader_info[ 'leader_gender' ] != null ) {
			$id = $leader_info[ 'id' ];
			$request_info = $this->requestsModel->get_data( $id, 'leader_id', 'leader_request', 'Rid' )->fetch_array( MYSQLI_ASSOC );
			$Rid = $request_info[ 'Rid' ];
			$arr['leader_id'] = $id;
			$arr['uniqid'] = $leader_info['uniqid'];
			$arr[ 'ambassadors' ] = $this->requestsModel->get_data( $Rid, 'request_id', 'ambassador', '*' );
		} else {
			$arr[ 'info' ] = "لم تطلب أعضاء مسبقاً...بياناتك غير مكتملة!!";
		}
		$this->load->view( 'leader_request/newMembersList', $arr );

	}

	function joined_ambassador() {
		if ( isset( $_POST[ 'Checked' ] ) ) {
			$id = $_POST[ 'Checked' ];
			$this->requestsModel->update_data( 1, $id );

		} else if ( isset( $_POST[ 'notChecked' ] ) ) {
			$id = $_POST[ 'notChecked' ];
			$this->requestsModel->update_data( 0, $id );
		}
	}
	function notJoined_ambassador() {
		if ( isset( $_POST[ 'Checked' ] ) ) {
			$id = $_POST[ 'Checked' ];
			$this->requestsModel->update_data( 2, $id );

		} else if ( isset( $_POST[ 'notChecked' ] ) ) {
			$id = $_POST[ 'notChecked' ];
			$this->requestsModel->update_data( 0, $id );
		}
	}
}
?>