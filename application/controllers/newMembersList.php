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
		$title['title'] = "الأعضاء الجدد";
		$this->load->view( 'leader_request/header' , $title);
		$leader_info = $this->requestsModel->check_email( $_GET[ 'email' ] );
		$arr = null;

		if ( $leader_info->num_rows > 0 ) {
			$res = $leader_info->fetch_array( MYSQLI_ASSOC );
			$id = $res[ 'id' ];
			$request = $this->requests_model->leaderLastRequest( $id, 'leader_id', 'leader_request', '*' );
			if ( $request->num_rows > 0 ) {
				$request_info = $request->fetch_array( MYSQLI_ASSOC );
				$Rid = $request_info[ 'Rid' ];
				$arr[ 'leader_id' ] = $id;
				$arr[ 'uniqid' ] = $res[ 'uniqid' ];
				$arr[ 'leader_name' ] = $res[ 'leader_name' ];
				$arr[ 'team_link' ] = $res[ 'team_link' ];
				$arr[ 'ambassadors' ] = $this->requests_model->get_data($Rid, 'request_id', 'ambassador', '*', 'AND display = 1');

				if ( $arr[ 'ambassadors' ]->num_rows == 0 ) {
					$arr[ 'info' ] = 'لم يتم التوزيع لك بعد!';
				}
				$this->load->view( 'leader_request/new_members_list', $arr );
			} else {
				$arr[ 'info' ] = "لا يوجد لديك طلبات!";
				$this->load->view( 'leader_request/new_members_list', $arr );
			}
		}
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

	function saveProfileLink()
		{
			$profile=$this->input->post('profile_link');
			$id=$this->input->post('amb_id');
			$data['profile_link']=$profile;
			if ($profile!=null)
			{
				$this->requestsModel->updateAmbassadorLink($id,$profile);
			}
			redirect(base_url().'newMembersList/index');
		}
}
?>