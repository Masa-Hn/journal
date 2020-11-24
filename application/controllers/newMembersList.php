<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class NewMembersList extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
	} //end construct()
    
	public function index() {
		//	$arr['ambassadors'] = "";
		//	$arr['info'] = "";

		$this->load->view( 'leader_request/header' );
		$leader_info = $this->requests_model->check_email( $_GET[ 'email' ] );
        $arr = null;
        
		if ( $leader_info->num_rows > 0) {
			$res = $leader_info->fetch_array( MYSQLI_ASSOC );
			if($res != null){
    			$id = $res[ 'id' ];
    			$request_info = $this->requests_model->get_data( $id, 'leader_id', 'leader_request', 'Rid' )->fetch_array( MYSQLI_ASSOC );
    			if($request_info != null){
        			$Rid = $request_info[ 'Rid' ];
        			$arr['leader_id'] = $id;
        			$arr['uniqid'] = $res['uniqid'];
        			$arr['leader_name'] = $res['leader_name'];
        			$arr['team_link'] = $res['team_link'];
        			$arr[ 'ambassadors' ] = $this->requests_model->get_data( $Rid, 'request_id', 'ambassador', '*' );
    			}
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