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
		$leader_info = $this->requestsModel->check_email( $_GET[ 'email' ] );

		if ( $leader_info->num_rows > 0) {
			$res = $leader_info->fetch_array( MYSQLI_ASSOC );
			if($res['leader_link'] != null && $res['leader_gender'] != null){
				$id = $res[ 'id' ];
			$request_info = $this->requestsModel->get_data( $id, 'leader_id', 'leader_request', 'Rid' )->fetch_array( MYSQLI_ASSOC );
			$Rid = $request_info[ 'Rid' ];
			$arr['leader_id'] = $id;
			$arr['uniqid'] = $res['uniqid'];
			$arr['leader_name'] = $res['leader_name'];
			$arr['team_link'] = $res['team_link'];
			$arr[ 'ambassadors' ] = $this->requestsModel->get_data( $Rid, 'request_id', 'ambassador', '*' );
			}else{
				$arr[ 'info' ] = "لم تطلب أعضاء مسبقاً...بياناتك غير مكتملة!!";
			}
			
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